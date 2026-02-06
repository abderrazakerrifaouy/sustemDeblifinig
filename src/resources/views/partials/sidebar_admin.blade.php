<aside class="w-64 bg-white h-screen border-r border-gray-100 fixed left-0 top-0 overflow-y-auto z-20">
    <div class="p-6 h-full flex flex-col">

        <div class="flex items-center gap-2 mb-10">
            <div class="w-8 h-8 bg-[#ff002b] rounded-full flex items-center justify-center shadow-md shadow-red-100">
                <i class="fas fa-shield-alt text-white text-[10px]"></i>
            </div>
            <h1 class="text-xl font-black text-gray-900 tracking-tighter italic">
                simplon<span class="text-gray-400">line</span>
            </h1>
        </div>

        <nav class="flex-1 space-y-1">

            <a href="admin_dash.php" class="flex items-center gap-3 px-4 py-3 bg-[#fff0f2] text-[#ff002b] rounded-xl font-bold text-sm transition-all">
                <i class="fas fa-home text-sm"></i>
                <span>Accueil</span>
            </a>

            <div class="pt-4">
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Utilisateurs</p>
                <div class="space-y-1">
                    <a href="/manage_users" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-user-plus w-5 text-center"></i>
                        <span>Créer comptes</span> </a>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-50 mt-4">
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Structure</p>
                <div class="space-y-1">
                    <a href="/manage_formations" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-graduation-cap w-5 text-center"></i>
                        <span>Gérer formations</span> </a>
                    <a href="/manage_classes" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-school w-5 text-center"></i>
                        <span>Gérer classes</span> </a>
                    <a href="/assign_teachers" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-user-tie w-5 text-center"></i>
                        <span>Affecter formateurs</span> </a>
                    <a href="/manage_sprints" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-redo w-5 text-center"></i>
                        <span>Gérer Sprints</span> </a>
                    <a href="/manage_competences" class="flex items-center gap-3 px-4 py-2.5 text-gray-500 hover:text-[#ff002b] hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                        <i class="fas fa-award w-5 text-center"></i>
                        <span>Gérer Compétences</span> </a>
                </div>
            </div>
        </nav>
        <div class="pt-6 border-t border-gray-100">
            <a href="/logout" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition text-sm font-bold">
                <i class="fas fa-power-off"></i>
                <span>Log out</span> </a>
        </div>
    </div>
</aside>
