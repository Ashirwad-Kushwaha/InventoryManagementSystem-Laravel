<x-layout>

    <h1 class="text-4xl font-bold text-gray-800 text-center mt-24 pt-6">Edit item</h1>

    <div class="max-w-lg mx-auto mt-6 p-6 bg-white shadow-md rounded-md relative">
        <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>

        
        <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-6">
            @csrf 
            @method('PUT')

            <!-- Name (String, item name) -->
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
                <input type="text" 
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="name" name="name"
                       value = {{ $item->name }}>
                       
                       @error('name')
                    <p class="text-red-500 text-sm ">{{ $message }}</p>
                @enderror
            
            </div>

            <!-- Description (Text, optional) -->
            <div class="mb-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="description" name="description" rows="3">{{ $item->description }} </textarea>
                @error('description')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
            </div>

            <!-- Quantity (Integer, number of items in stock) -->
            <div class="mb-3">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" value = {{ $item->quantity }} class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="quantity" name="quantity">
                @error('quantity')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
            </div>

            <!-- Price (Decimal, item price) -->
            <div class="mb-3">
                <label for="price" class="block text-sm font-medium text-gray-700">Price(LKR)</label>
                <input type="number" value = {{ $item->price }} step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 sm:text-sm" id="price" name="price">
                @error('price')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-slate-600 text-white py-2 px-4 rounded-md shadow hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                    Update Item
                </button>
            </div>
        </form>
    </div>

    <!-- Optional: Display created_at and updated_at -->
    {{-- <div class="max-w-lg mx-auto mt-6 text-center">
        <p class="text-sm text-gray-500">Created At: {{ $item->created_at ?? 'N/A' }}</p>
        <p class="text-sm text-gray-500">Updated At: {{ $item->updated_at ?? 'N/A' }}</p>
    </div> --}}

</x-layout>
