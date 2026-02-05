@extends('layoute')

@section('content')
<div class="flex min-h-screen bg-gray-50">
    @include('partials.sidebar_admin')

    <div class="flex-1 ml-64">
        @include('partials.header')

        <div class="p-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 italic uppercase tracking-tighter">Catalogue Formations</h1>
                    <p class="text-sm text-gray-500 font-medium">Définissez les programmes pédagogiques globaux.</p>
                </div>
                <button onclick="document.getElementById('modal-formation').classList.remove('hidden')"
                        class="bg-[#ff002b] text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-red-200 hover:bg-red-600 transition-all flex items-center gap-2">
                    <i class="fas fa-graduation-cap"></i> Nouvelle Formation
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($formations as $formation)
                    <div class="bg-white rounded-[2.5rem] p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                        <div class="flex justify-between items-start mb-6">
                            <div class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center group-hover:bg-[#ff002b] transition-colors">
                                <i class="fas fa-book-open text-lg"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $formation->is_active ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                {{ $formation->is_active ? 'Active' : 'Archivée' }}
                            </span>
                        </div>

                        <h3 class="text-xl font-black text-gray-900 italic mb-2 tracking-tight">
                            {{ $formation->title }}
                        </h3>

                        <div class="flex items-center gap-2 mb-8">
                            <i class="fas fa-users text-gray-300 text-xs"></i>
                            <span class="text-xs font-bold text-gray-400 uppercase">
                                {{ $formation->classes_count ?? 0 }} Classes rattachées
                            </span>
                        </div>

                        <div class="flex gap-2">
                            <button class="flex-1 py-3 bg-gray-50 text-gray-700 rounded-xl font-bold text-[10px] uppercase hover:bg-gray-100 transition">Modifier</button>
                            <button class="w-12 py-3 border border-gray-100 text-gray-400 rounded-xl hover:text-red-500 transition">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-200 flex flex-col items-center">
                        <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">Aucune formation créée</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- MODAL CREATE FORMATION --}}
<div id="modal-formation" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-md z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] max-w-md w-full p-10 shadow-2xl animate-in zoom-in duration-200">
        <h2 class="text-2xl font-black text-gray-900 italic uppercase mb-8">Nouvelle Formation</h2>

        <form action="{{ route('formation.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block">Titre de la formation</label>
                <input type="text" name="title" required placeholder="ex: Développeur Fullstack Java"
                       class="w-full px-5 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-sm">
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                <span class="text-xs font-bold text-gray-600 uppercase">Activer immédiatement</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#ff002b]"></div>
                </label>
            </div>

            <div class="pt-4 flex gap-4">
                <button type="button" onclick="document.getElementById('modal-formation').classList.add('hidden')" class="flex-1 font-black text-gray-400 uppercase text-[10px]">Annuler</button>
                <button type="submit" class="flex-[2] py-4 bg-[#ff002b] text-white rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-lg shadow-red-100">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
