<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout Page</h1>
    <form method="GET" action="{{ route('checkout') }}">
        <input type="text" name="search" placeholder="Search by name or number" value="{{ request('search') }}">
        <select name="category">
            <option value="">Select Category</option>
            <option value="starter" {{ request('category') == 'starter' ? 'selected' : '' }}>Starter</option>
            <option value="main" {{ request('category') == 'main' ? 'selected' : '' }}>Main Course</option>
            <option value="dessert" {{ request('category') == 'dessert' ? 'selected' : '' }}>Dessert</option>
            <!-- Voeg meer categorieën toe indien nodig -->
        </select>
        <button type="submit">Search</button>
    </form>

    <ul>
        @forelse($dishes as $dish)
            <li>{{ $dish->id }} - {{$dish->price}} - {{ $dish->name }} ({{ $dish->description }})</li>
        @empty
            <li>No dishes found</li>
        @endforelse
    </ul>
</body>
</html>

