<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Bill</h1>

        @if (session('status'))
            <div class="text-white font-semibold mb-6 bg-green-600 rounded-md w-full px-6 py-2">
                <i class="fas fa-check"></i> {{ session('status') }}
            </div>
        @endif

        <form id="billForm" action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div id="itemsList">
                <div class="item-row">
                    <select name="items[0][item_id]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                                {{ $item->name }} - ₹{{ $item->price }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][quantity]" min="1" value="1"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <button type="button" id="addItem" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Item</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Complete Bill</button>
        </form>
    </div>

    <script>
        document.getElementById('addItem').addEventListener('click', function () {
            const itemsList = document.getElementById('itemsList');
            const index = itemsList.children.length;

            const itemRow = document.createElement('div');
            itemRow.className = 'item-row';
            itemRow.innerHTML = `
                <select name="items[${index}][item_id]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                            {{ $item->name }} - ₹{{ $item->price }}
                        </option>
                    @endforeach
                </select>
                <input type="number" name="items[${index}][quantity]" min="1" value="1"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            `;
            itemsList.appendChild(itemRow);
        });
    </script>
</x-layout>
