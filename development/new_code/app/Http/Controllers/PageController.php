<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Component;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('admin.cms-dashboard', compact('pages'));
    }

    public function show(Page $page)
    {
        $component = new Component;
        $childTypesWithTitles = [];

        foreach ($component->childTypes as $type => $class) {
            if (method_exists($class, 'getTitle')) {
                $childTypesWithTitles[$type] = [
                    'class' => $class,
                    'title' => (new $class)->getTitle(),
                ];
            }
        }

        $componentTypes = $childTypesWithTitles;

        return view('admin.cms-page-edit', compact('page', 'componentTypes'));
    }

    public function store(StorePageRequest $request)
    {
        Page::create([
            'title' => $request->title,
            'slug' => 'pagina/'.$request->slug,
        ]);

        return redirect()->back();
    }

    public function destroy()
    {
        Page::destroy(request('page_id'));

        return redirect()->back()->with('success', 'Pagina is verwijderd');
    }
}
