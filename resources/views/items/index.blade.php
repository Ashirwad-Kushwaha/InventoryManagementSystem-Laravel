<x-layout>

    <div class="container mx-auto p-4">
        <div class="flex flex-col md:w-full">

            <h1 class="text-2xl text-left mb-3 font-bold mt-24">{{auth()->user()->name}}'s Inventory</h1>

            <!-- Session Flash Messages -->
            @if (session('status'))
                <div class="text-white font-semibold mb-6 bg-green-600 rounded-md w-full px-6 py-2">
                    <i class="fas fa-check"></i> {{ session('status') }}
                </div>
            @endif

            @if (session('delete_status'))
                <div class="text-white font-semibold mb-6 bg-red-600 rounded-md w-full px-6 py-2">
                    <i class="fas fa-check"></i> {{ session('delete_status') }}
                </div>
            @endif

            @if (session('message'))
                <div class="text-white font-semibold mb-6 bg-green-600 rounded-md w-full px-6 py-2">
                    <i class="fas fa-check"></i> {{ session('message') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-slate-700 p-4 flex justify-between items-center">
                    <div class=" w-[360px]">
                        <h1 class="text-3xl font-bold  text-white">Items</h1>

                        <form action="{{ route('items.index') }}" method="GET" class="mb-3 mt-3">
                            <div class="flex items-center">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Search by name or description..." 
                                       class="px-4 py-2 border rounded-md w-full text-sm" />
                                <button type="submit" class="ml-2 bg-slate-300 text-black px-4 py-2 rounded-md hover:bg-slate-200 transition duration-300 text-sm">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    

                    <div class="mt-7">
                        
                    <a href="{{ url('items/create') }}" class="bg-slate-300 text-black px-4 py-2 rounded-md hover:bg-slate-200 transition duration-300">
                        Add Item
                    </a>
                </div>
                </div>

                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-slate-100">
                            <thead class="bg-gray-300 text-slate-800 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-right  hover:text-slate-400">
                                        <a href="{{ route('items.index', ['sortBy' => 'id', 'sortOrder' => $sortBy == 'id' && $sortOrder == 'asc' ? 'desc' : 'asc']) }} ">
                                            Id
                                            @if ($sortBy == 'id')
                                                <i class="fas fa-sort-{{ $sortOrder == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="py-3 px-6 text-right hover:text-slate-400">
                                        <a href="{{ route('items.index', ['sortBy' => 'name', 'sortOrder' => $sortBy == 'name' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                            Name
                                            @if ($sortBy == 'name')
                                                <i class="fas fa-sort-{{ $sortOrder == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="py-3 px-6 text-right">Description</th>
                                    <th class="py-3 px-6 text-right hover:text-slate-400">
                                        <a href="{{ route('items.index', ['sortBy' => 'quantity', 'sortOrder' => $sortBy == 'quantity' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                            Quantity
                                            @if ($sortBy == 'quantity')
                                                <i class="fas fa-sort-{{ $sortOrder == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="py-3 px-6 text-right hover:text-slate-400">
                                        <a href="{{ route('items.index', ['sortBy' => 'price', 'sortOrder' => $sortBy == 'price' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                            Price (LKR)
                                            @if ($sortBy == 'price')
                                                <i class="fas fa-sort-{{ $sortOrder == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="py-3 px-6 text-right">Created At</th>
                                    <th class="py-3 px-6 text-right">Updated At</th>
                                    <th class="py-3 px-6 text-right"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm font-light">
                                @foreach ($items as $item)
                                    <tr class="border-b border-slate-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-right whitespace-nowrap font-semibold">{{ $item->id }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->name }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->description }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->quantity }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->price }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->created_at }}</td>
                                        <td class="py-3 px-6 text-right text-md font-semibold">{{ $item->updated_at }}</td>
                                        <td class="flex flex-row items-center justify-center pt-2.5">
                                            <a href="{{ route('items.show', $item->id) }}" class="text-slate-600 hover:text-slate-800 ml-8 text-xl">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('items.edit', $item->id) }}" class="text-slate-600 hover:text-slate-800 ml-8 text-xl">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600 ml-8 mr-8 text-xl">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        {{ $items->appends(['sortBy' => $sortBy, 'sortOrder' => $sortOrder])->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
