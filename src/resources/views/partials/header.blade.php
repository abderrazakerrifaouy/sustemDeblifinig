<header class="bg-white h-16 border-b border-gray-100 flex items-center justify-between px-8 sticky top-0 z-10">
    <div>
        <h2 class="text-lg font-bold text-gray-800 tracking-tight">@yield('page_title', 'Accueil')</h2>
    </div>

    <div class="flex items-center gap-4">
        <button class="p-2 text-gray-400 hover:text-[#ff002b] transition-colors">
            <i class="fas fa-bell"></i>
        </button>

        <div class="flex items-center gap-4 pl-6 border-l border-gray-100">
            <div class="text-right">
                <p class="text-xs font-black text-gray-900 leading-none">{{ $userName ?? 'Admin' }}</p>
                <p class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $role ?? 'Administrateur' }}</p>
            </div>

            <div class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center border border-gray-200">
                <i class="fas fa-user text-gray-400 text-sm"></i>
            </div>
        </div>
    </div>
</header>

