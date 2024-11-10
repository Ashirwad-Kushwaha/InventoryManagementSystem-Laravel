<x-layout>
    
    @auth
    <div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center pt-24">  <!-- Added pt-20 for top padding -->
        
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome to the Inventory Management System</h1>
            <p class="text-lg text-gray-600 mb-8">
                Manage your stock, track items, and keep your inventory organized effectively.
            </p>
    
            <div class="space-x-4">
                <a href="{{ url('items') }}" class="inline-block px-8 py-3 text-white bg-slate-800 rounded-lg hover:bg-slate-700 transition duration-300">
                    View Inventory
                </a>
            </div>
        </div>
    
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-4xl ">
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Track Inventory</h3>
                <img src="{{ asset('images/inv2.png') }}" alt="Inventory Management" class="w-64 h-auto mb-8">
                
                <p class="text-gray-600">Easily track your items and avoid overstocking or shortages.</p>
            </div>
    
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg "></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Add New Items</h3>
                <img src="{{ asset('images/form.png') }}" alt="Inventory Management" class="w-24 h-auto mb-6 mx-auto">
                <p class="text-gray-600">Quickly add new items to your inventory with our simple form.</p>
            </div>
    
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Edit or Delete Items</h3>
                <img src="{{ asset('images/inv.png') }}" alt="Inventory Management" class="w-64 h-auto mb-11">
                <p class="text-gray-600">Easily edit item details or remove items from your inventory.</p>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center pt-24"> <!-- Added pt-20 for top padding -->
    
        <div class="text-center flex flex-col justify-center items-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-2">Welcome to the Inventory Management System</h1>
            <p class="text-xl text-gray-600">
                Please log in to manage your inventory, add new items, or edit existing ones.
            </p>
            
            <!-- Replacing Login/Register buttons with an image -->
            <img src="{{ asset('images/inventory.png') }}" alt="Inventory Management" class="w-64 h-auto">
        </div>
        
        
        <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-4xl">
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Manage Inventory</h3>
                <p class="text-gray-600">Login to add, update, and manage your stock efficiently.</p>
            </div>
    
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Track Stock Levels</h3>
                <p class="text-gray-600">Keep your inventory up-to-date and prevent stock issues.</p>
            </div>
    
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-4">Organize Items</h3>
                <p class="text-gray-600">Organize your inventory by adding, editing, or removing items.</p>
            </div>
        </div>
    </div>
    @endguest

</x-layout>
