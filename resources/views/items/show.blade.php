<x-layout>

    <h1 class="text-4xl font-bold text-gray-800 text-center mt-24 pt-6">Item Details</h1>

    <div class="max-w-lg mx-auto mt-6 p-6 bg-white shadow-md rounded-md relative">
        <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>

        <!-- Name (String, item name) -->
        <div class="mb-3">
            <label for="name" class="block text-sm font-medium text-gray-700 mt-3">Item Name</label>
            <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm bg-gray-100">{{ $item->name }}</p>
        </div>

        <!-- Description (Text, optional) -->
        <div class="mb-3">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm bg-gray-100">{{ $item->description ?? 'No description available' }}</p>
        </div>

        <!-- Quantity (Integer, number of items in stock) -->
        <div class="mb-3">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm bg-gray-100">{{ $item->quantity }}</p>
        </div>

        <!-- Price (Decimal, item price) -->
        <div class="mb-3">
            <label for="price" class="block text-sm font-medium text-gray-700">Price (LKR)</label>
            <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm bg-gray-100">{{ number_format($item->price, 2) }} LKR</p>
        </div>

        <!-- Back to List Button -->
        <div class="mt-4">
            <a href="{{ route('items.index') }}" class="w-full block bg-slate-600 text-white py-2 px-4 rounded-md shadow hover:bg-slate-700 text-center focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 ">
                Back to Item List
            </a>
        </div>
    </div>

    <!-- Optional: Display created_at and updated_at -->
    <div class="max-w-lg mx-auto mt-6 text-center">
        <p class="text-sm text-gray-500">Created At: {{ $item->created_at->format('d M Y') }}</p>
        <p class="text-sm text-gray-500">Updated At: {{ $item->updated_at->format('d M Y') }}</p>
    </div>

</x-layout>
