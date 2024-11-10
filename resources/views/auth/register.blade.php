<x-layout>
    <h1 class="text-4xl text-center mb-4 font-semibold mt-24">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm">
        <form action="{{route('register')}}" method="post" class="flex flex-col justify-center max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg relative">
    
            <!-- Blue Stripe Inside Form -->
            <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div>
    
            @csrf
            {{-- Username --}}
            <div class="mb-6 mt-8">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="text" name="name" id="username" 
                    value="{{old('name')}}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-slate-500 focus:border-slate-500
                    @error('name') border-red-500 @enderror"
                    placeholder="Enter your username">       
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>    
                @enderror
            </div>
        
            {{-- Email --}}
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="text" name="email" id="email" 
                value="{{old('email')}}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-slate-500 @error('email') border-red-500 @enderror" placeholder="Enter your email">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>    
            @enderror
            </div>
        
            {{-- Password --}}
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" 
                
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-slate-500 @error('password') border-red-500 @enderror" placeholder="Enter your password">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>    
            @enderror
            </div>
        
            {{-- Confirm Password --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-slate-500 @error('password') border-red-500 @enderror" placeholder="Confirm your password">
                
            </div>
        
            {{-- Submit Button --}}
            <button class="py-3 px-6 bg-slate-800 text-white font-semibold rounded-lg hover:bg-slate-500 transition duration-300">Register</button>
        
        </form>
    </div>
    
    

</x-layout>