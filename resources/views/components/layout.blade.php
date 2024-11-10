

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-200 text-slate-900 ">

    <header>
        <nav class="fixed top-0 left-0 right-0 flex justify-between text-xl border-b-4 p-4 bg-slate-900 text-slate-300 z-50">
            <a href={{route('home')}} class="nav-link hover:text-white">Home</a>

            @auth
                <div class="relative place-items-center flex"

                
                     x-data="{open:false}"   >
                     <div>
                        <p class="name text-center">Hi {{auth()->user()->name}}!</p>
                     </div>
                    <button @click="open = !open" type="button" class="mx-4">
                        <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&color=7F9CF5&background=EBF4FF" alt="avatar" class="w-10 h-10 rounded-full">
                    </button>

                    <div x-show="open" @click.outside="open=false" class="text-sm font-semibold py-3 px-6 bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden text-black">
                        

                        <a href={{route('items.index')}} class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-2 mt-2">Inventory</a>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="block hover:bg-slate-100 pl-4 pr-8 py-2 text-red-500 mb-2">Logout</button>
                        </form>
                    </div>

                </div>


            @endauth

            @guest
                
            <div class="px-2 gap-6 flex">
                <a href={{route('login')}} class="nav-link px-4 hover:text-white">Login</a>
                <a href={{route('register')}} class="nav-link hover:text-white">Register</a>
            </div>

            @endguest

        </nav>
    </header>

    <main class="mx-auto m-w-screen-lg">
        
        {{$slot}}
        
    </main>
</body>
</html>