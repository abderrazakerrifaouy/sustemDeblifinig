@extends('layoute')

@section('content')
@include('partials.sidebar_admin')

<div class="p-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-2xl font-black text-gray-900 italic uppercase">Gestion des Utilisateurs</h1>
            <p class="text-sm text-gray-500">Créez et gérez les accès pour les formateurs et les apprenants.</p>
        </div>
        <button onclick="document.getElementById('modal-user').classList.remove('hidden')"
                class="bg-[#ff002b] text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-lg shadow-red-100 hover:bg-red-600 transition flex items-center gap-2">
            <i class="fas fa-user-plus"></i> Nouveau Compte
        </button>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Utilisateur</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Rôle</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Status</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">{{ $user['name'] }}</p>
                                <p class="text-[10px] text-gray-400">{{ $user['email'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $user['role'] == 'formateur' ? 'bg-indigo-50 text-indigo-600' : 'bg-blue-50 text-blue-600' }}">
                            {{ $user['role'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full {{ $user['status'] == 'actif' ? 'bg-green-500' : 'bg-orange-500' }}"></span>
                            <span class="text-xs font-medium text-gray-600 capitalize">{{ $user['status'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-2 text-gray-400 hover:text-blue-500"><i class="fas fa-edit text-xs"></i></button>
                            <button class="p-2 text-gray-400 hover:text-red-500"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal-user" class="hidden fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-[2.5rem] max-w-md w-full p-10 shadow-2xl">
        <h2 class="text-2xl font-black text-gray-900 mb-6 italic uppercase">Nouveau Compte</h2>
        <form action="process_user.php" method="POST" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="firstname" placeholder="Prénom" class="w-full px-5 py-3 bg-gray-50 rounded-xl outline-none focus:ring-2 focus:ring-[#ff002b] text-sm">
                <input type="text" name="lastname" placeholder="Nom" class="w-full px-5 py-3 bg-gray-50 rounded-xl outline-none focus:ring-2 focus:ring-[#ff002b] text-sm">
            </div>
            <input type="email" name="email" placeholder="Email Simplon" class="w-full px-5 py-3 bg-gray-50 rounded-xl outline-none focus:ring-2 focus:ring-[#ff002b] text-sm">

            <select name="role" class="w-full px-5 py-3 bg-gray-50 rounded-xl outline-none focus:ring-2 focus:ring-[#ff002b] text-sm font-bold text-gray-500">
                <option value="etudiant">Apprenant (Étudiant)</option>
                <option value="formateur">Formateur</option>
            </select>

            <div class="pt-4 flex gap-3">
                <button type="button" onclick="document.getElementById('modal-user').classList.add('hidden')" class="flex-1 py-3 text-gray-400 font-bold">Annuler</button>
                <button type="submit" class="flex-[2] py-3 bg-[#ff002b] text-white rounded-xl font-bold shadow-lg shadow-red-100">Créer l'accès</button>
            </div>
        </form>
    </div>
</div>
@endsection
