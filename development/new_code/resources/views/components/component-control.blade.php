@if(!isset($isView))
    <div class="flex justify-between">
        <x-order-controls :page="$page" :component="$component"/>
        <x-component-delete-button :page="$page" :component="$component"/>
    </div>
@endif
