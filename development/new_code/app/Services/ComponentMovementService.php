<?php

namespace App\Services;

use App\Models\Component;
use Illuminate\Support\Facades\DB;
use Throwable;

class ComponentMovementService
{
    /**
     * @throws Throwable
     */
    public function moveUp(Component $component): void
    {
        if ($component->order === 1) {
            return;
        }

        $selectedComponentNewPlacement = $component->order - 1;

        DB::transaction(function () use ($component, $selectedComponentNewPlacement) {
            $otherComponent = $this->getComponentAtOrder($component->page_id, $selectedComponentNewPlacement);

            $this->swapOrder($component, $otherComponent);
        });
    }

    /**
     * @throws Throwable
     */
    public function moveDown(Component $component): void
    {
        $lastComponent = $this->getLastComponent($component->page_id);

        if ($component->order === $lastComponent->order) {
            return;
        }

        $selectedComponentNewPlacement = $component->order + 1;

        DB::transaction(function () use ($component, $selectedComponentNewPlacement) {
            $otherComponent = $this->getComponentAtOrder($component->page_id, $selectedComponentNewPlacement);

            $this->swapOrder($component, $otherComponent);
        });
    }

    public function correctOrdersAfterDelete($deletedOrder, $page): void
    {
        $components = Component::where('page_id', $page->id)->where('order', '>', $deletedOrder)->get();

        foreach ($components as $component) {
            $component->update([
                'order' => $component->order - 1,
            ]);
        }
    }

    protected function getComponentAtOrder($pageId, $order): Component
    {
        return Component::where('page_id', $pageId)->where('order', $order)->first();
    }

    protected function getLastComponent($pageId): Component
    {
        return Component::where('page_id', $pageId)->orderByDesc('order')->first();
    }

    protected function swapOrder(Component $component, Component $otherComponent): void
    {
        [$component->order, $otherComponent->order] = [$otherComponent->order, $component->order];

        $component->save();
        $otherComponent->save();
    }
}
