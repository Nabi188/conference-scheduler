<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Rooms Management - Conference Scheduler</title>
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-container": "#4a5167",
                        "on-tertiary": "#fbf7ff",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed": "#373851",
                        "secondary-fixed": "#e1e2e9",
                        "on-secondary-fixed-variant": "#595b61",
                        "background": "#f7f9fb",
                        "on-error": "#fff7f6",
                        "on-secondary-fixed": "#3d3f45",
                        "on-background": "#2a3439",
                        "on-primary-fixed": "#373f54",
                        "tertiary-fixed-dim": "#cbc9e9",
                        "surface-container-low": "#f0f4f7",
                        "primary-dim": "#4a5268",
                        "outline-variant": "#a9b4b9",
                        "surface-tint": "#565e74",
                        "tertiary-dim": "#51516c",
                        "on-surface": "#2a3439",
                        "surface-variant": "#d9e4ea",
                        "primary-fixed-dim": "#ccd4ee",
                        "surface-bright": "#f7f9fb",
                        "inverse-surface": "#0b0f10",
                        "tertiary-fixed": "#d9d7f8",
                        "tertiary-container": "#d9d7f8",
                        "inverse-primary": "#dae2fd",
                        "on-primary-fixed-variant": "#535b71",
                        "surface": "#f7f9fb",
                        "primary-container": "#dae2fd",
                        "secondary": "#5d5f65",
                        "on-tertiary-fixed-variant": "#54546f",
                        "on-error-container": "#752121",
                        "tertiary": "#5d5d78",
                        "error": "#9f403d",
                        "error-container": "#fe8983",
                        "surface-container-high": "#e1e9ee",
                        "on-surface-variant": "#566166",
                        "surface-dim": "#cfdce3",
                        "on-primary": "#f7f7ff",
                        "primary-fixed": "#dae2fd",
                        "on-secondary-container": "#505257",
                        "on-secondary": "#f8f8ff",
                        "surface-container-highest": "#d9e4ea",
                        "error-dim": "#4e0309",
                        "secondary-fixed-dim": "#d3d4db",
                        "secondary-container": "#e1e2e9",
                        "outline": "#717c82",
                        "primary": "#565e74",
                        "inverse-on-surface": "#9a9d9f",
                        "secondary-dim": "#515359",
                        "on-tertiary-container": "#4a4a65",
                        "surface-container": "#e8eff3"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .font-headline {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <?php require_once dirname(__DIR__) . '/layout/sidebar.php'; ?>
    <?php require_once dirname(__DIR__) . '/layout/header.php'; ?>

    <!-- Main Content -->
    <main class="ml-64 p-12 min-h-screen">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Page Header -->
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight text-on-surface font-headline">Room Management</h1>
                    <p class="text-on-surface-variant mt-2 font-body">Manage conference rooms and meeting spaces</p>
                </div>
                <a href="<?= route('room', 'create') ?>" class="px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dim transition-colors flex items-center gap-2 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined">add</span>
                    Add New Room
                </a>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">meeting_room</span>
                        </div>
                    </div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Total Rooms</h3>
                    <p class="text-3xl font-bold text-on-surface"><?= count($rooms) ?></p>
                </div>

                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-emerald-500/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-emerald-600 text-2xl">event_seat</span>
                        </div>
                    </div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Total Capacity</h3>
                    <p class="text-3xl font-bold text-on-surface">
                        <?= array_sum(array_column($rooms, 'capacity')) ?>
                    </p>
                </div>

                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-amber-500/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-600 text-2xl">location_on</span>
                        </div>
                    </div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Locations</h3>
                    <p class="text-3xl font-bold text-on-surface">
                        <?= count(array_unique(array_column($rooms, 'location'))) ?>
                    </p>
                </div>
            </div>

            <!-- Rooms Table -->
            <div class="bg-surface-container-lowest rounded-xl border border-surface-container-high shadow-sm overflow-hidden">
                <!-- Table Header -->
                <!-- <div class="bg-surface-container-low px-8 py-4 border-b border-surface-container-high">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-on-surface">All Rooms</h2>
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                                <input type="text" placeholder="Search rooms..." class="pl-9 pr-4 py-2 bg-surface-container border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 font-body" />
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-surface-container-high/30 border-b border-surface-container-high">
                                <th class="py-4 px-8 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">ID</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Room Name</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Location</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Capacity</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Created</th>
                                <th class="py-4 px-8 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-container-high">
                            <?php if (empty($rooms)): ?>
                                <tr>
                                    <td colspan="6" class="py-12 text-center">
                                        <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-20">meeting_room</span>
                                        <p class="text-on-surface-variant mt-4">No rooms found</p>
                                        <a href="<?= route('room', 'create') ?>" class="inline-block mt-4 text-primary hover:underline font-medium">Add your first room</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($rooms as $room): ?>
                                    <tr class="group hover:bg-surface-container-high transition-colors">
                                        <td class="py-6 px-8 text-sm font-label text-on-surface-variant">
                                            RM-<?= str_pad($room['id'], 3, '0', STR_PAD_LEFT) ?>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="font-headline font-bold text-on-surface">
                                                <?= htmlspecialchars($room['name']) ?>
                                            </span>
                                            <?php if (!empty($room['description'])): ?>
                                                <p class="text-xs text-on-surface-variant mt-1 line-clamp-1">
                                                    <?= htmlspecialchars($room['description']) ?>
                                                </p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-slate-400 text-sm">location_on</span>
                                                <span class="text-sm text-on-surface-variant">
                                                    <?= htmlspecialchars($room['location']) ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-slate-400 text-sm">group</span>
                                                <span class="font-semibold text-on-surface">
                                                    <?= $room['capacity'] ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6 font-body text-sm text-on-surface-variant">
                                            <?= date('M d, Y', strtotime($room['created_at'] ?? 'now')) ?>
                                        </td>
                                        <td class="py-6 px-8 text-right space-x-2">
                                            <a href="<?= route('room', 'edit', $room['id']) ?>"
                                                class="inline-block p-2 text-slate-400 hover:text-primary transition-colors rounded-lg hover:bg-white">
                                                <span class="material-symbols-outlined text-xl">edit</span>
                                            </a>
                                            <form method="POST" action="<?= route('room', 'delete', $room['id']) ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this room?')">
                                                <button type="submit" class="p-2 text-slate-400 hover:text-error transition-colors rounded-lg hover:bg-white">
                                                    <span class="material-symbols-outlined text-xl">delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Action Button -->
    <a href="<?= route('room', 'create') ?>" class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:scale-105 transition-transform group z-50">
        <span class="material-symbols-outlined text-3xl">add</span>
        <span class="absolute right-full mr-4 px-3 py-1 bg-on-surface text-surface text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Add Room</span>
    </a>
</body>

</html>