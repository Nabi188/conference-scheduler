<header class="w-full h-16 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md shadow-sm dark:shadow-none flex items-center justify-between px-8 ml-64 max-w-[calc(100%-16rem)]">
    <div class="flex-1 flex items-center max-w-xl">
        <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
            <input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary/20 transition-all font-body" placeholder="Search sessions, conferences, speakers..." type="text" />
        </div>
    </div>
    <div class="flex items-center gap-6 ml-8">
        <div class="flex items-center gap-4 text-slate-600 dark:text-slate-400">
            <button class="relative hover:text-slate-900 dark:hover:text-slate-100 transition-opacity duration-200">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full"></span>
            </button>
        </div>
        <div class="h-8 w-px bg-slate-200 dark:bg-slate-800"></div>
        <a href="<?= route('auth', 'logout') ?>" class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-opacity duration-200">
            Logout
        </a>
    </div>
</header>