@extends('layoute')

@section('title', 'SimplonLine - Admin Dashboard')
@section('page_title', 'Accueil')

@section('sidebar')
    @include('partials.sidebar_admin')
@endsection

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <div class="mb-10">
        <h1 class="text-2xl font-black text-gray-900">Console d'administration</h1>
        <p class="text-sm text-gray-500">Gérez la structure pédagogique et suivez les progressions.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-[#ff002b] font-bold text-sm mb-4 uppercase tracking-wider">Ma structure</h3>
                    <p class="text-sm font-bold text-gray-900">Gérer les promotions et classes</p>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed pr-10">
                        Créez des classes, affectez des formateurs et gérez la liste des apprenants inscrits.
                    </p>
                </div>
                <button class="px-4 py-2 border border-gray-200 rounded-full text-[11px] font-bold text-blue-600 hover:bg-gray-50 transition uppercase">
                    Consulter <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            <div class="mt-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 font-black text-lg">
                    08
                </div>
                <span class="text-xs font-bold text-gray-400">Classes actives</span>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-[#ff002b] font-bold text-sm mb-4 uppercase tracking-wider">Organisation</h3>
                    <p class="text-sm font-bold text-gray-900">Scénarios & Sprints</p>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed pr-10">
                        Visualisez le déroulement des formations, créez des sprints et associez les briefs correspondants.
                    </p>
                </div>
                <button class="px-4 py-2 border border-gray-200 rounded-full text-[11px] font-bold text-blue-600 hover:bg-gray-50 transition uppercase">
                    Accéder <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            <div class="mt-6">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">S1</div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">S2</div>
                    <div class="w-8 h-8 rounded-full bg-gray-100 border-2 border-white flex items-center justify-center text-[10px] font-bold text-gray-400">+</div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-[#ff002b] font-bold text-sm mb-4 uppercase tracking-wider">Référentiels</h3>
                    <p class="text-sm font-bold text-gray-900">Compétences (C1 - C13)</p>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed pr-10">
                        Gérez les libellés des compétences et les niveaux de maîtrise obligatoires (Imiter, S'adapter, Transposer).
                    </p>
                </div>
                <button class="px-4 py-2 border border-gray-200 rounded-full text-[11px] font-bold text-blue-600 hover:bg-gray-50 transition uppercase">
                    Modifier
                </button>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-[#ff002b] font-bold text-sm mb-4 uppercase tracking-wider">Analyse</h3>
                    <p class="text-sm font-bold text-gray-900">Suivi des évaluations</p>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed pr-10">
                        Consultez l'historique des débriefings réalisés par les formateurs et analysez les progressions.
                    </p>
                </div>
                <button class="px-4 py-2 border border-gray-200 rounded-full text-[11px] font-bold text-blue-600 hover:bg-gray-50 transition uppercase">
                    Historique
                </button>
            </div>
        </div>

    </div>

    <div class="mt-12 flex gap-4">
        <button class="flex items-center gap-2 bg-[#ff002b] text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-lg shadow-red-100 hover:bg-red-600 transition">
            <i class="fas fa-plus"></i> Créer une nouvelle classe
        </button>
        <button class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-2xl font-bold text-sm hover:bg-gray-50 transition">
            <i class="fas fa-user-plus"></i> Ajouter un formateur
        </button>
    </div>
</div>
@endsection