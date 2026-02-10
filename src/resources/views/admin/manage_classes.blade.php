@extends('layoute')

@section('title', 'SimplonLine - Gestion des Classes')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')

@if (session('success'))
<div class="mb-5 p-4 rounded-2xl bg-green-50 text-green-700 font-bold text-sm shadow-sm">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="mb-5 p-4 rounded-2xl bg-red-50 text-red-700 font-bold text-sm shadow-sm">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="mb-5 p-4 rounded-2xl bg-red-50 text-red-700 font-bold text-sm shadow-sm">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="p-8 max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 italic uppercase tracking-tighter">Promotions & Staff</h1>
            <p class="text-sm text-gray-500 font-medium">Gestion des classes de 25 et affectation des formateurs.</p>
        </div>
        <button onclick="toggleModal('modal-classe')"
            class="bg-[#ff002b] text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-red-200 hover:bg-red-600 hover:-translate-y-1 transition-all flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Créer une Classe
        </button>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/40 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Classe / Formation</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Staff (Principal & Adjoints)</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Effectif</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Status</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">anne Etudiant</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($classes as $classe)
                <tr onclick="window.location='{{ route('admin.classes.show', $classe->id) }}'" class="hover:bg-red-50/20 transition-all group">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center font-black italic shadow-lg group-hover:scale-110 transition-transform">
                                {{ substr($classe->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-gray-800 tracking-tight">{{ $classe->name }}</p>
                                <p class="text-[10px] text-[#ff002b] font-bold uppercase italic">
                                    {{ $classe->formation->title ?? 'Sans Formation' }}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        @php
                            $principal = $classe->formateurs->firstWhere('pivot.is_principal', true);
                            $adjoints = $classe->formateurs->where('pivot.is_principal', false);
                        @endphp

                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-md bg-[#ff002b] text-white flex items-center justify-center text-[9px] font-black shadow-sm" title="Formateur Principal">P</span>
                            <span class="text-xs font-bold text-gray-700 italic">
                                {{ $principal->name ?? 'Non assigné' }}
                            </span>
                        </div>

                        @if ($adjoints->isNotEmpty())
                        <div class="flex -space-x-2 mt-1">
                            @foreach ($adjoints as $adj)
                            <div class="inline-block h-6 w-6 rounded-full ring-2 ring-white bg-gray-100 flex items-center justify-center text-[8px] font-black text-gray-500 uppercase"
                                 title="Adjoint: {{ $adj->name }}">
                                 {{ substr($adj->name, 0, 1) }}
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </td>

                    <td class="px-8 py-6 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-xl text-[11px] font-black {{ $classe->etudiants_count >= 25 ? 'bg-orange-50 text-orange-600' : 'bg-blue-50 text-blue-600' }}">
                            {{ $classe->etudiants_count ?? 0 }} / 25
                        </span>
                    </td>

                    <td class="px-8 py-6 text-center">
                        @if ($classe->is_active)
                        <span class="inline-flex items-center px-3 py-1 rounded-xl bg-green-50 text-green-600 text-[11px] font-black">Active</span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 rounded-xl bg-red-50 text-red-600 text-[11px] font-black">Inactive</span>
                        @endif
                    </td>
                    <td class="px-8 py-6 text-center">
                        <span class="text-sm font-bold text-gray-700 italic">{{ $classe->anneDetudiant }}</span>
                    </td>
                        <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all"><i class="fas fa-edit text-xs"></i></button>
                            <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-[#ff002b] hover:bg-[#ff002b] hover:text-white transition-all"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal-classe" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-md z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] shadow-2xl max-w-md w-full p-10 animate-in zoom-in duration-200">
        <h2 class="text-2xl font-black text-gray-900 italic uppercase mb-8">Nouvelle Classe</h2>
        <form action="{{ route('classes.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Nom de la promo</label>
                <input type="text" name="name" required class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Année Étudiant</label>
                <input type="text" name="anne" required class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Formation</label>
                <select name="formation_id" class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#ff002b] font-bold text-sm">
                    @foreach ($formations as $f)
                    <option value="{{ $f->id }}">{{ $f->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-[#ff002b] text-white py-4 rounded-2xl font-black uppercase text-xs tracking-widest shadow-lg shadow-red-200 hover:bg-red-600 transition-all">
                Créer la classe
            </button>
            <button type="button" onclick="toggleModal('modal-classe')" class="w-full text-gray-400 font-bold text-xs uppercase mt-2">Annuler</button>
        </form>
    </div>
</div>

<script>
function toggleModal(id) {
    document.getElementById(id).classList.toggle('hidden');
}
</script>

@endsection
