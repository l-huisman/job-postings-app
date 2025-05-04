<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..600;1,100..600&display=swap"
          rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans pb-20">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div><a href="/"><img src="{{ Vite::asset('./resources/images/logo.svg') }}" alt="Logo"></a></div>
        <div class="space-x-6 font-bold">
            <a href="/">Jobs</a>
            <a href="#" class="text-gray-500 cursor-not-allowed">Career</a>
            <a href="#" class="text-gray-500 cursor-not-allowed">Salaries</a>
            <a href="#" class="text-gray-500 cursor-not-allowed">Companies</a>
        </div>
        @auth
            <div class="flex space-x-6 font-bold">
                <a href="/jobs/create">Post a Job</a>
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Log Out</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
            </div>
        @endguest
    </nav>
    <main class="mt-10 max-w-[986px] m-auto">
        {{ $slot }}
    </main>
</div>


</body>
</html>
