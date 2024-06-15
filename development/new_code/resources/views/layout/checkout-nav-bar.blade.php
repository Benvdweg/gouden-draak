<div class="flex flex-col min-h-screen w-64 px-4 py-8 bg-gray-800 text-gray-100">
    <div class="flex items-center justify-center">
        <span class="text-2xl font-semibold">Checkout</span>
    </div>
    <nav class="flex flex-col mt-10 space-y-4">
        <a href="{{ route('checkout') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.dishes') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Gerechten zoeken</span>
        </a>
        <a href="{{ route('checkout.orders') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.news.index') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Bestellingen</span>
        </a>
    </nav>
</div>
