@extends('layoute')

@section('title', 'SimplonLine - Gestion des Sprints')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')
<div class="p-8 max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 italic uppercase tracking-tighter">Timeline des Sprints</h1>
            <p class="text-sm text-gray-500 font-medium">Définissez les périodes de travail globales pour toutes les promotions.</p>
        </div>
        <button onclick="toggleModal('modal-sprint')" class="bg-gray-900 text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-gray-200 hover:bg-[#ff002b] transition-all flex items-center gap-2">
            <i class="fas fa-calendar-plus"></i> Nouveau Sprint
        </button>
    </div>

    {{-- Grid des Sprints --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($sprints as $sprint)
            <div class="bg-white rounded-[2.5rem] p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all group relative overflow-hidden">
                {{-- Décoration latérale --}}
                <div class="absolute top-0 left-0 w-2 h-full bg-[#ff002b]"></div>

                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-[#ff002b] uppercase tracking-[0.2em] mb-1">
                            {{ \Carbon\Carbon::parse($sprint->date_debut)->format('M Y') }}
                        </span>
                        <h3 class="text-2xl font-black text-gray-900 italic tracking-tight">{{ $sprint->nom }}</h3>
                    </div>
                    <div class="bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                         <span class="text-[10px] font-bold text-gray-500">{{ $sprint->briefs_count }} Briefs</span>
                    </div>
                </div>

                {{-- Dates --}}
                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-play text-[10px] text-green-500"></i>
                        <p class="text-xs font-bold text-gray-600">Début : <span class="text-gray-900">{{ $sprint->date_debut }}</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-stop text-[10px] text-red-500"></i>
                        <p class="text-xs font-bold text-gray-600">Fin : <span class="text-gray-900">{{ $sprint->date_fin }}</span></p>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-2 border-t border-gray-50 pt-6">
                    <button class="flex-1 py-3 bg-gray-50 text-gray-700 rounded-xl font-bold text-[10px] uppercase hover:bg-gray-900 hover:text-white transition">Modifier</button>
                    <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="w-12 py-3 border border-gray-100 text-gray-300 rounded-xl hover:text-[#ff002b] hover:border-red-100 transition">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-100 flex flex-col items-center">
                <i class="fas fa-history text-4xl text-gray-200 mb-4"></i>
                <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">Aucun sprint n'a encore été planifié</p>
            </div>
        @endforelse
    </div>
</div>

{{-- MODAL CREATE SPRINT --}}
<div id="modal-sprint" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-md z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] max-w-md w-full p-10 shadow-2xl animate-in zoom-in duration-200">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black text-gray-900 italic uppercase tracking-tighter">Planifier un Sprint</h2>
            <button onclick="toggleModal('modal-sprint')" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="fas fa-times-circle text-xl"></i>
            </button>
        </div>

        <form action="{{ route('sprints.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-[0.1em]">Nom du Sprint</label>
                <input type="text" name="nom" required placeholder="ex: Sprint 04 - Backend PHP"
                       class="w-full px-5 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-[0.1em]">Date de début</label>
                    <input type="date" name="date_debut" required
                           class="w-full px-5 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-xs">
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-[0.1em]">Date de fin</label>
                    <input type="date" name="date_fin" required
                           class="w-full px-5 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-xs">
                </div>
            </div>

            <div class="pt-4 flex gap-4">
                <button type="button" onclick="toggleModal('modal-sprint')" class="flex-1 font-black text-gray-400 uppercase text-[10px] tracking-widest">Annuler</button>
                <button type="submit" class="flex-[2] py-4 bg-[#ff002b] text-white rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-lg shadow-red-200">
                    Lancer le Sprint
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(id) {
        document.getElementById(id).classList.toggle('hidden');
    }
</script>
@endsection
