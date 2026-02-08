@extends('layoute')

@section('title', 'SimplonLine - Gestion des Compétences')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')
<div class="p-6 lg:p-10 max-w-7xl mx-auto bg-gray-50 min-h-screen">

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">
                🛠️ Matrice des <span class="text-indigo-600">Compétences</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Définissez les référentiels et les objectifs d'apprentissage par formation.</p>
        </div>

        <div class="flex gap-3">
            <button class="inline-flex items-center px-4 py-2 bg-white border-2 border-slate-200 text-slate-700 text-sm font-bold rounded-xl hover:border-indigo-500 transition-all">
                Importer (CSV)
            </button>
            <button class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-indigo-100">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Nouvelle Compétence
            </button>
        </div>
    </div>

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div class="flex bg-slate-200/50 p-1 rounded-xl w-fit">
            <button class="px-4 py-2 bg-white shadow-sm rounded-lg text-xs font-black text-indigo-600 uppercase">Développement Web</button>
            <button class="px-4 py-2 text-xs font-black text-slate-500 uppercase hover:text-indigo-600 transition">Data AI</button>
            <button class="px-4 py-2 text-xs font-black text-slate-500 uppercase hover:text-indigo-600 transition">Cyber-Sec</button>
        </div>

        <div class="relative">
            <input type="text" placeholder="Rechercher une compétence..." class="pl-10 pr-4 py-2 bg-white border-none rounded-xl text-sm shadow-sm focus:ring-2 focus:ring-indigo-500 w-full md:w-64">
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Card Item 1 --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition group">
            <div class="flex justify-between items-start mb-4">
                <span class="px-2 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded uppercase">Front-end</span>
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition">
                    <button class="text-slate-400 hover:text-indigo-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg></button>
                </div>
            </div>

            <h3 class="text-lg font-bold text-slate-800 mb-2">Maquetter une application</h3>
            <p class="text-xs text-slate-500 leading-relaxed mb-6">Concevoir des interfaces utilisateur en respectant les principes d'ergonomie et d'accessibilité.</p>

            <div class="space-y-3">
                <div class="flex items-center justify-between text-[10px] font-black text-slate-400 uppercase tracking-tighter">
                    <span>Niveaux d'acquisition</span>
                    <span class="text-indigo-600">3 Niveaux</span>
                </div>
                <div class="flex gap-1 h-2">
                    <div class="flex-1 bg-amber-400 rounded-full" title="Imitation"></div>
                    <div class="flex-1 bg-amber-400 rounded-full" title="Adaptation"></div>
                    <div class="flex-1 bg-slate-100 rounded-full" title="Production"></div>
                </div>
                <div class="flex justify-between text-[10px] text-slate-400 font-bold">
                    <span>Imitation</span>
                    <span>Adaptation</span>
                    <span class="opacity-30">Production</span>
                </div>
            </div>
        </div>

        {{-- Card Item 2 --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition group">
            <div class="flex justify-between items-start mb-4">
                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black rounded uppercase">Back-end</span>
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition">
                    <button class="text-slate-400 hover:text-indigo-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg></button>
                </div>
            </div>

            <h3 class="text-lg font-bold text-slate-800 mb-2">Créer une base de données</h3>
            <p class="text-xs text-slate-500 leading-relaxed mb-6">Concevoir le schéma relationnel et implémenter la persistance des données via SQL.</p>

            <div class="space-y-3">
                <div class="flex items-center justify-between text-[10px] font-black text-slate-400 uppercase tracking-tighter">
                    <span>Niveaux d'acquisition</span>
                    <span class="text-indigo-600">3 Niveaux</span>
                </div>
                <div class="flex gap-1 h-2">
                    <div class="flex-1 bg-emerald-500 rounded-full"></div>
                    <div class="flex-1 bg-emerald-500 rounded-full"></div>
                    <div class="flex-1 bg-emerald-500 rounded-full"></div>
                </div>
                <div class="flex justify-between text-[10px] text-emerald-600 font-black tracking-widest">
                    <span>CONFIGURÉ</span>
                    <span>✓</span>
                </div>
            </div>
        </div>

        {{-- Add New Card Placeholder --}}
        <div class="border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center justify-center p-6 hover:border-indigo-300 hover:bg-indigo-50/30 transition cursor-pointer group">
            <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6 text-slate-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            </div>
            <span class="text-sm font-bold text-slate-500 group-hover:text-indigo-600">Ajouter une compétence</span>
        </div>

    </div>

    {{-- Stats Mini-Footer --}}
    <div class="mt-12 p-6 bg-slate-900 rounded-2xl text-white flex flex-col md:flex-row items-center justify-between shadow-xl shadow-slate-200">
        <div class="flex items-center gap-6 mb-4 md:mb-0">
            <div>
                <div class="text-[10px] font-black text-slate-400 uppercase">Total Compétences</div>
                <div class="text-2xl font-black">24</div>
            </div>
            <div class="w-px h-10 bg-slate-700"></div>
            <div>
                <div class="text-[10px] font-black text-slate-400 uppercase">Référentiels</div>
                <div class="text-2xl font-black">03</div>
            </div>
        </div>
        <div class="text-xs text-slate-400 font-medium max-w-xs text-center md:text-right italic">
            "La compétence n'est pas un état, c'est un processus en mouvement permanent."
        </div>
        
    </div>
</div>
@endsection
