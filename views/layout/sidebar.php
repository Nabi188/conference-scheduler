<aside class="fixed left-0 top-0 h-full flex flex-col bg-slate-50 dark:bg-slate-900 h-screen w-64 border-none font-manrope tracking-tight font-medium z-50">
    <div class="px-6 py-10">
        <div class="text-xl font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2">
            <div class="w-8 h-8 rounded bg-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-lg">calendar_month</span>
            </div>
            Conference Scheduler
        </div>
        <p class="text-[10px] uppercase tracking-widest mt-1 text-slate-500">Conference Management</p>
    </div>
    <nav class="flex-1 px-4 space-y-1">
        <?php
        $currentController = $_GET['controller'] ?? 'dashboard';
        $activeClass = "flex items-center px-4 py-3 rounded-lg border-l-4 border-slate-600 dark:border-slate-400 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 font-semibold scale-95 duration-150 ease-in-out transition-all";
        $inactiveClass = "flex items-center px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-colors";
        ?>

        <a class="<?= $currentController === 'dashboard' ? $activeClass : $inactiveClass ?>" href="<?= route('dashboard') ?>">
            <span class="material-symbols-outlined mr-3">dashboard</span>
            Dashboard
        </a>

        <a class="<?= $currentController === 'conference' ? $activeClass : $inactiveClass ?>" href="<?= route('conference') ?>">
            <span class="material-symbols-outlined mr-3">event</span>
            Conferences
        </a>

        <a class="<?= $currentController === 'session' ? $activeClass : $inactiveClass ?>" href="<?= route('session') ?>">
            <span class="material-symbols-outlined mr-3">calendar_view_day</span>
            Sessions
        </a>

        <a class="<?= $currentController === 'room' ? $activeClass : $inactiveClass ?>" href="<?= route('room') ?>">
            <span class="material-symbols-outlined mr-3">meeting_room</span>
            Rooms
        </a>

        <a class="<?= $currentController === 'speaker' ? $activeClass : $inactiveClass ?>" href="<?= route('speaker') ?>">
            <span class="material-symbols-outlined mr-3">group</span>
            Speakers
        </a>
    </nav>
    <div class="mt-auto p-4 space-y-1 border-t border-slate-100 dark:border-slate-800">
        <a class="flex items-center px-4 py-2 rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-colors" href="#">
            <span class="material-symbols-outlined mr-3 text-sm">settings</span>
            Settings
        </a>
        <a class="flex items-center px-4 py-2 rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-colors" href="#">
            <span class="material-symbols-outlined mr-3 text-sm">help</span>
            Support
        </a>
        <div class="mt-4 pt-4 flex items-center px-4">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold text-sm">
                AD
            </div>
            <div class="ml-3 overflow-hidden">
                <p class="text-xs font-bold truncate text-on-surface">Admin User</p>
                <p class="text-[10px] text-slate-500 truncate">System Administrator</p>
            </div>
        </div>
    </div>
</aside>