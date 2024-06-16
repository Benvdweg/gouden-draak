<div class="flex flex-col min-h-screen w-64 px-4 py-8 bg-gray-800 text-gray-100">
    <div class="flex items-center justify-center">
        <span class="text-2xl font-semibold">Admin</span>
    </div>
    <nav class="flex flex-col mt-10 space-y-4">
        <a href="{{ route('admin.dishes') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.dishes') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Gerechten Beheer</span>
        </a>
        <a href="{{ route('admin.news.index') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.news.index') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Nieuws berichten</span>
        </a>
        <a href="{{ route('reservations.index') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('reservations.index') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Tafels & Reserveringen</span>
        </a>
        <a href="{{ route('waiter.calls') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('waiter.calls') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Tafel meldingen</span>
            @if($callCount > 0)
                <span class="ml-2 px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $callCount }}</span>
            @endif
        </a>
    </nav>
</div>
