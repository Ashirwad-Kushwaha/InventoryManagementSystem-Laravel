<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Invoice</h1>
        <p><strong>Bill ID:</strong> {{ $bill->id }}</p>
        <p><strong>Total Amount:</strong> ₹{{ $bill->total_amount }}</p>
        <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill->billItems as $item)
                    <tr>
                        <td>{{ $item->item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ $item->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
