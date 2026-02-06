@extends('layoute')

@section('content')
<div class="flex min-h-screen bg-gray-50">
    @include('partials.sidebar_admin')

    <div class="flex-1 ">

        <div class="px-8 mt-6">
            @if(session('success'))
                <div id="success-alert" class="flex items-center p-4 mb-4 text-green-800 rounded-2xl bg-green-50 border border-green-100 animate-fade-in absolute top-24 left-1/2 transform -translate-x-1/2">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div id="error-alert" class="flex items-center p-4 mb-4 text-red-800 rounded-2xl bg-red-50 border border-red-100 animate-fade-in absolute top-24 left-1/2 transform -translate-x-1/2" >
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-3 mb-2">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span class="text-sm font-bold">{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="p-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 italic uppercase tracking-tighter">
                        Gestion des Utilisateurs
                    </h1>
                    <p class="text-sm text-gray-500 font-medium">
                        Total : <span class="text-[#ff002b] font-bold">{{ $users->count() }}</span> comptes enregistrés
                    </p>
                </div>

                <button
                    onclick="document.getElementById('modal-user').classList.remove('hidden')"
                    class="bg-[#ff002b] text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-red-200 hover:bg-red-600 hover:-translate-y-1 transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-plus-circle"></i> Nouveau Compte
                </button>
            </div>

            {{-- TABLEAU DES UTILISATEURS --}}
            <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Identité</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Rôle</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Statut</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($users as $user)
                            <tr class="hover:bg-red-50/30 transition-colors duration-200 group">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-11 h-11 bg-gray-900 text-white rounded-2xl flex items-center justify-center font-bold shadow-lg shadow-gray-200 group-hover:scale-110 transition-transform">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-gray-800">{{ $user->name }}</p>
                                            <p class="text-[11px] text-gray-400 font-medium">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-8 py-5">
                                    <span class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-wider
                                    {{ $user->role === 'Formateur'
                                        ? 'bg-indigo-100 text-indigo-700'
                                        : 'bg-orange-100 text-orange-700' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-2">
                                        <span class="relative flex h-2 w-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                        </span>
                                        <span class="text-[11px] font-bold text-gray-600 uppercase tracking-tighter">Actif</span>
                                    </div>
                                </td>

                                <td class="px-8 py-5 text-right">
                                    <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                            <i class="fas fa-edit text-xs"></i>
                                        </button>
                                        <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-[#ff002b] hover:bg-[#ff002b] hover:text-white transition-all">
                                            <i class="fas fa-trash text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-20">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-users-slash text-4xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">Aucun utilisateur trouvé</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="modal-user" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-md z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] max-w-md w-full p-10 shadow-2xl transform transition-all animate-zoom-in">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black text-gray-900 italic uppercase tracking-tighter">
                Nouveau Compte
            </h2>
            <button onclick="document.getElementById('modal-user').classList.add('hidden')" class="text-gray-400 hover:text-red-500 transition">
                <i class="fas fa-times-circle text-xl"></i>
            </button>
        </div>

        <form action="{{ route('user.create') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Nom Complet</label>
                <input type="text" name="name" required placeholder="John Doe"
                       class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-[#ff002b] focus:bg-white outline-none transition-all text-sm font-bold">
            </div>

            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Email Professionnel</label>
                <input type="email" name="email" required placeholder="name@simplon.co"
                       class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-[#ff002b] focus:bg-white outline-none transition-all text-sm font-bold">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Mot de passe</label>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-[#ff002b] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••"
                           class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-[#ff002b] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>
            </div>
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-2 mb-1 block tracking-widest">Rôle</label>
                <select name="role" required
                        class="w-full px-5 py-3.5 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-[#ff002b] focus:bg-white outline-none transition-all text-sm font-bold">
                    <option value="" disabled selected>Choisissez un rôle</option>
                    <option value="Formateur">Formateur</option>
                    <option value="Etudiant">Étudiant</option>
                </select>
            </div>
            <div class="pt-6 flex gap-4">
                <button type="button" onclick="document.getElementById('modal-user').classList.add('hidden')"
                        class="flex-1 py-4 text-gray-400 font-black uppercase text-xs tracking-widest hover:text-gray-900 transition">
                    Fermer
                </button>
                <button type="submit"
                        class="flex-[2] py-4 bg-[#ff002b] text-white rounded-2xl font-black uppercase text-xs tracking-[0.2em] shadow-lg shadow-red-200 hover:bg-red-600 transition-all">
                    Créer l'accès
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes zoom-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-zoom-in { animation: zoom-in 0.3s ease-out; }
</style>

<script>
    // Auto-hide alerts
    setTimeout(() => {
        document.getElementById('success-alert')?.classList.add('opacity-0');
        document.getElementById('error-alert')?.classList.add('opacity-0');
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
            document.getElementById('error-alert')?.remove();
        }, 500);
    }, 4000);
</script>
@endsection
