@extends('layoute')

@section('title', 'Connexion')

@section('content')


<main class="h-full font-sans antialiased text-slate-900">

<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-0.5 text-sm font-medium text-indigo-800 mb-4">
            Formation DWWM 2024
        </span>
        <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
            Connexion au système
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Veuillez entrer vos identifiants pour accéder à vos briefs.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white px-6 py-10 shadow-xl border border-slate-200 sm:rounded-3xl sm:px-12">
            
            @if(isset($error))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <i class="fas fa-exclamation-circle"></i>
                <p>{{ $error }}</p>
            </div>
            @endif

            <form action="/" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Email professionnel</label>
                    <div class="mt-1 relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors group-focus-within:text-indigo-600">
                            <i class="fas fa-at text-slate-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required 
                            class="block w-full rounded-xl border border-slate-300 pl-10 pr-4 py-2.5 text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all duration-200 sm:text-sm"
                            placeholder="nom@exemple.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Mot de passe</label>
                    <div class="mt-1 relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors group-focus-within:text-indigo-600">
                            <i class="fas fa-key text-slate-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required 
                            class="block w-full rounded-xl border border-slate-300 pl-10 pr-4 py-2.5 text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all duration-200 sm:text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-slate-700 cursor-pointer">Rester connecté</label>
                    </div>
                </div>

                <button type="submit" 
                    class="relative group w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-lg shadow-indigo-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt text-indigo-300 group-hover:text-indigo-100 transition-colors"></i>
                    </span>
                    Se connecter
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold">
                &mdash; Accès sécurisé &mdash;
            </p>
        </div>
    </div>
</div>

</main>

@endsection
