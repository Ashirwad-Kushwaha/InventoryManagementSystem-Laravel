<x-layout>
    <h1 class="text-4xl text-center py-6 font-semibold mt-24">Login to your Account</h1>

    <div class="mx-auto max-w-screen-sm">

        <form action="{{route('login')}}" method="post" class="flex flex-col justify-center max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg relative">
            <div class="absolute top-0 left-0 w-full h-3 bg-slate-700 rounded-t-lg"></div> 
            @csrf
        
            {{-- Email --}}
            <div class="mb-6 mt-3">
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

            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-sm">Remember me</label>

            </div>

            @error('failed')
                <p class="text-red-500 text-sm mt-3 mb-5">{{$message}}</p>    
            @enderror
        
            {{-- Submit Button --}}
            <button class="py-3 px-6 bg-slate-800 text-white font-semibold rounded-lg hover:bg-slate-500 transition duration-300">Login</button>
        
        </form>
        

    </div>

</x-layout>