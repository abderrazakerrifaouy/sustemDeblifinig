
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>  </head>
  <body class="h-full font-sans antialiased text-gray-900">

    @yield('sidebar')

    <div class="ml-64 flex flex-col min-h-screen">

        @include('partials.header')
        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="p-6 text-center text-xs text-gray-400">
            &copy; 2026 SimplonLine - Système de Débriefing Pédagogique
        </footer>
    </div>

</body>
</html>
