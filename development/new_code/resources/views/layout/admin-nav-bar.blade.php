<!-- resources/views/components/left-navbar.blade.php -->
<div class="flex flex-col w-64 h-screen px-4 py-8 bg-gray-800 text-gray-100">
    <div class="flex items-center justify-center">
        <span class="text-2xl font-semibold">Admin</span>
    </div>
    <nav class="flex flex-col mt-10 space-y-4">
        <a href="{{ route('admin.dishes') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.dishes') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Gerechten Beheer</span>
        </a>
        <a href="{{ route('admin.news') }}" class="flex items-center px-4 py-2 rounded-md {{ request()->routeIs('admin.news') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-700 hover:text-gray-100' }}">
            <span>Nieuws berichten</span>
        </a>
    </nav>
    <div class="mt-auto">
        <div class="flex flex-col mt-4 space-y-2">
            <a href="#" class="px-4 py-2 text-sm text-gray-400 hover:bg-gray-700 hover:text-gray-100 rounded-md">Uitloggen</a>
        </div>
    </div>
</div>
