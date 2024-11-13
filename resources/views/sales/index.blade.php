<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Sales</h1>

        <!-- Flash Message -->
        @if (session('status'))
            <div class="text-white font-semibold mb-6 bg-green-600 rounded-md w-full px-6 py-2">
                <i class="fas fa-check"></i> {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-4">
            @csrf

            <div class="mb-4">
                <label for="item_id" class="block text-sm font-medium text-gray-700">Select Item</label>
                <select name="item_id" id="item_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                            {{ $item->name }} - ₹{{ $item->price }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1" value="1"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Total Price</label>
                <input type="text" id="total_price" readonly
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Complete Sale</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const itemSelect = document.getElementById('item_id');
            const quantityInput = document.getElementById('quantity');
            const totalPriceInput = document.getElementById('total_price');

            function updateTotalPrice() {
                const price = parseFloat(itemSelect.options[itemSelect.selectedIndex].getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);
                totalPriceInput.value = (price * quantity).toFixed(2);
            }

            itemSelect.addEventListener('change', updateTotalPrice);
            quantityInput.addEventListener('input', updateTotalPrice);

            updateTotalPrice(); // Initial calculation
        });
    </script>
</x-layout>
