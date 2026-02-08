@extends('layoute')

@section('title', 'SimplonLine - Détails Classe')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')
    <div class="p-6 lg:p-10 max-w-7xl mx-auto bg-gray-50 min-h-screen">

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
            <div>
                <nav class="flex items-center text-sm text-gray-500 mb-2 space-x-2">
                    <span class="hover:text-indigo-600 transition cursor-pointer">Tableau de bord</span>
                    <span>/</span>
                    <span class="text-indigo-600 font-semibold italic">Détails de la Classe</span>
                </nav>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight flex items-center">
                    {{ $classe->name }}
                    <span class="ml-3 px-3 py-1 bg-indigo-100 text-indigo-700 text-xs rounded-md uppercase tracking-widest">
                        {{ $classe->formation->title ?? 'Sans Formation' }}
                    </span>
                </h1>
            </div>

            <div class="flex gap-3 mt-4 md:mt-0">
                @if (!$classe->formateurs->firstWhere('pivot.is_principal', true))
                    <button onclick="openFormateurModal(true)"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-indigo-200">
                        Ajouter Principal
                    </button>
                @endif
                <button onclick="openFormateurModal(false)"
                    class="inline-flex items-center px-4 py-2 bg-white border-2 border-slate-200 hover:border-indigo-400 text-slate-700 text-sm font-bold rounded-xl transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Ajouter Adjoint
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-indigo-600 rounded-full mr-3"></span>
                        Équipe d'encadrement
                    </h3>

                    @php
                        $principal = $classe->formateurs->firstWhere('pivot.is_principal', true);
                        $adjoints = $classe->formateurs->where('pivot.is_principal', false);
                    @endphp

                    <div
                        class="mb-6 p-4 rounded-xl bg-slate-50 border border-slate-100 group transition-all hover:bg-white hover:shadow-md">
                        <label
                            class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-500 mb-1 block">Principal</label>
                        <div class="font-bold text-slate-800 flex items-center">
                            @if ($principal)
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs mr-3">
                                    {{ substr($principal->name, 0, 1) }}
                                </div>
                                {{ $principal->name }}
                            @else
                                <span class="text-slate-400 italic font-medium">Aucun formateur principal</span>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label
                            class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-1 block">Adjoints</label>
                        @forelse ($adjoints as $adj)
                            <div
                                class="flex items-center justify-between p-3 rounded-lg border border-slate-50 hover:border-indigo-100">
                                <span class="text-sm font-semibold text-slate-700">{{ $adj->name }}</span>
                                <button class="text-slate-300 hover:text-red-500 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        @empty
                            <p class="text-xs text-slate-400 italic">Aucun adjoint assigné</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-indigo-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-2xl">
                    <div class="relative z-10">
                        <div class="text-5xl font-black mb-1 leading-none">{{ $classe->etudiants_count ?? 0 }}</div>
                        <div class="text-indigo-300 font-bold uppercase tracking-widest text-xs mb-6">Apprenants inscrits
                        </div>

                        @php $percentage = min((($classe->etudiants_count ?? 0) / 25) * 100, 100); @endphp
                        <div class="w-full bg-indigo-950 rounded-full h-2 mb-2">
                            <div class="bg-indigo-400 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] font-bold text-indigo-300">
                            <span>CAPACITÉ</span>
                            <span>{{ $percentage }}% (25 MAX)</span>
                        </div>
                    </div>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-indigo-800 rounded-full opacity-20"></div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-800 flex items-center">
                            <span class="w-2 h-6 bg-slate-800 rounded-full mr-3"></span>
                            Liste des Apprenants
                        </h3>
                        <button class="text-indigo-600 text-sm font-bold hover:underline">Tout voir</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50">
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Nom &
                                        Prénom</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Date
                                        d'inscription</th>
                                    <th
                                        class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($classe->etudiants ?? [] as $etudiant)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-600 mr-3">
                                                    {{ substr($etudiant->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-slate-800">{{ $etudiant->name }}
                                                    </div>
                                                    <div class="text-[10px] text-slate-400">
                                                        {{ $etudiant->email ?? 'no-email@simplon.co' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-500 font-medium">
                                            {{ $etudiant->created_at->format('d M, Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button
                                                class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center text-slate-400 italic text-sm">
                                            Aucun apprenant trouvé dans cette classe.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formateurModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-md p-6 relative animate-fade-in">
            <button onclick="closeFormateurModal()" class="absolute top-4 right-4 text-slate-400 hover:text-red-500">
                ✕
            </button>

            <h2 id="modalTitle" class="text-xl font-black text-slate-800 mb-6">
                Ajouter Formateur
            </h2>

            <form method="POST" action="{{ route('admin.classes.formateurs.store', $classe->id) }}" class="space-y-5">
                @csrf

                <input type="hidden" name="is_principal" id="is_principal">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">
                        Formateur
                    </label>
                    <select name="formateur_id" required
                        class="w-full rounded-xl border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <option value="">-- Choisir un formateur --</option>
                        @foreach ($formateurs as $formateur)
                            <option value="{{ $formateur->id }}">{{ $formateur->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeFormateurModal()"
                        class="px-4 py-2 text-sm font-bold text-slate-500 hover:text-slate-700">
                        Annuler
                    </button>
                    <input type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow"
                        value="Confirmer"
                    />
                </div>
            </form>
        </div>
    </div>





@endsection

