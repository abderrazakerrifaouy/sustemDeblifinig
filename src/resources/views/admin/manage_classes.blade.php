@extends('layoute')

@section('title', 'SimplonLine - Gestion des Classes')
@section('page_title', 'Gestion des Classes')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-black text-gray-900">Promotions & Classes</h1>
            <p class="text-sm text-gray-500">Créez et gérez les classes de votre établissement.</p>
        </div>
        <button onclick="toggleModal('modal-classe')" class="bg-[#ff002b] text-white px-5 py-2.5 rounded-2xl font-bold text-sm shadow-lg shadow-red-100 hover:bg-red-600 transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Nouvelle Classe
        </button>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nom de la Classe</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Formateur Référent</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Effectif</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Sprints</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($classes as $classe)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center font-bold text-xs">
                                {{ substr($classe['name'], 0, 2) }}
                            </div>
                            <span class="text-sm font-bold text-gray-800">{{ $classe['name'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-medium text-gray-600">{{ $classe['teacher_name'] }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600">
                            {{ $classe['student_count'] }} apprenants
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs text-gray-500 font-medium italic">{{ $classe['active_sprint'] }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button title="Modifier" class="p-2 text-gray-400 hover:text-blue-500 transition"><i class="fas fa-edit text-xs"></i></button>
                            <button title="Supprimer" class="p-2 text-gray-400 hover:text-[#ff002b] transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal-classe" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-black text-gray-900">Créer une classe</h3>
            <button onclick="toggleModal('modal-classe')" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
        </div>
        <form action="process_class.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Nom de la promotion</label>
                <input type="text" name="name" placeholder="ex: DWWM 2024" class="w-full px-4 py-3 rounded-xl border border-gray-100 focus:ring-2 focus:ring-red-500 outline-none text-sm font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Assigner un formateur</label>
                <select name="teacher_id" class="w-full px-4 py-3 rounded-xl border border-gray-100 focus:ring-2 focus:ring-red-500 outline-none text-sm font-medium appearance-none">
                    <option value="">Sélectionner un formateur</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-[#ff002b] text-white py-3 rounded-xl font-bold text-sm shadow-lg shadow-red-100 mt-4">
                Enregistrer la classe
            </button>
        </form>
    </div>
</div>

<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
    }
</script>
@endsection