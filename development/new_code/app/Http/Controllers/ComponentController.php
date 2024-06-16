<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyComponentRequest;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateTextComponentRequest;
use App\Models\Component;
use App\Models\Page;
use App\Services\ComponentMovementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;

class ComponentController extends Controller
{
    public function __construct(private readonly ComponentMovementService $componentMovementService)
    {

    }

    public function store(StoreComponentRequest $request, Page $page)
    {
        $validated = $request->validated();

        $order_number = Component::where('page_id', $page->id)->count() + 1;
        $type = $validated['type'];

        $component = Component::create([
            'type' => $type,
            'page_id' => $page->id,
            'order' => $order_number,
        ]);

        return redirect()->route('cms.show.page', ['page' => $page])->with('success', 'Component is aangemaakt!')->with('editing', $component->id);
    }

    public function destroy(DestroyComponentRequest $request, Page $page)
    {
        $validated = $request->validated();

        $componentId = $validated['id'];

        DB::transaction(function () use ($componentId, $page) {
            $component = Component::find($componentId);
            $deletedOrder = $component->order;

            Component::destroy($componentId);

            $this->componentMovementService->correctOrdersAfterDelete($deletedOrder, $page);
        });

        return redirect()->route('cms.show.page', ['page' => $page])->with('success', 'Component is verwijderd!');
    }

    public function edit(Request $request, Page $page)
    {
        $validated = $request->validate([
            'componentId' => 'required|int|exists:components,id',
        ]);

        return redirect()->route('cms.show.page', ['page' => $page])->with('editing', $validated['componentId']);
    }

    public function updateTextComponent(UpdateTextComponentRequest $request, Page $page)
    {
        $validated = $request->validated();

        $content = Purifier::clean($validated['content']);

        $component = Component::find($validated['componentId']);

        $component->update([
            'content' => $content,
        ]);

        return redirect()->route('cms.show.page', ['page' => $page])->with('success', 'Component is geupdate!');
    }

    public function updateComponentOrder(Request $request, Page $page, Component $component)
    {
        if ($request->direction == 'up') {
            $this->componentMovementService->moveUp($component);
        } elseif ($request->direction == 'down') {
            $this->componentMovementService->moveDown($component);
        }

        return redirect()->route('cms.show.page', ['page' => $page]);
    }
}
