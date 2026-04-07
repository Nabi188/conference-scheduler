<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sessions Management - Conference Scheduler</title>
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
                    <h1 class="text-4xl font-extrabold tracking-tight text-on-surface font-headline">Sessions Management</h1>
                    <p class="text-on-surface-variant mt-2 font-body">Schedule and manage conference sessions</p>
                </div>
                <a href="<?= route('session', 'create') ?>" class="px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dim transition-colors flex items-center gap-2 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined">add</span>
                    Schedule Session
                </a>
            </header>

            <!-- Stats Cards -->
            <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-surface-container-low p-6 rounded-xl border border-transparent hover:border-outline-variant/10 transition-all">
                    <span class="material-symbols-outlined text-primary mb-3">calendar_view_day</span>
                    <h4 class="text-[11px] font-bold text-on-surface-variant uppercase tracking-widest">Total Sessions</h4>
                    <p class="text-2xl font-bold mt-1 text-on-surface"><?= $stats['total'] ?></p>
                </div>

                <div class="bg-surface-container-low p-6 rounded-xl border border-transparent hover:border-outline-variant/10 transition-all">
                    <span class="material-symbols-outlined text-emerald-600 mb-3">play_circle</span>
                    <h4 class="text-[11px] font-bold text-on-surface-variant uppercase tracking-widest">Live Now</h4>
                    <p class="text-2xl font-bold mt-1 text-on-surface"><?= $stats['ongoing'] ?>
                        <span class="text-xs font-normal text-on-surface-variant">Active</span>
                    </p>
                </div>

                <div class="bg-surface-container-low p-6 rounded-xl border border-transparent hover:border-outline-variant/10 transition-all">
                    <span class="material-symbols-outlined text-primary mb-3">timer</span>
                    <h4 class="text-[11px] font-bold text-on-surface-variant uppercase tracking-widest">Upcoming Today</h4>
                    <p class="text-2xl font-bold mt-1 text-on-surface"><?= $stats['today'] ?> Sessions</p>
                </div>

                <div class="bg-surface-container-low p-6 rounded-xl border border-transparent hover:border-outline-variant/10 transition-all">
                    <span class="material-symbols-outlined text-primary mb-3">event_upcoming</span>
                    <h4 class="text-[11px] font-bold text-on-surface-variant uppercase tracking-widest">This Week</h4>
                    <p class="text-2xl font-bold mt-1 text-on-surface"><?= $stats['week'] ?>
                        <span class="text-xs font-normal text-on-surface-variant">Scheduled</span>
                    </p>
                </div>
            </section>

            <!-- Sessions Table -->
            <div class="bg-surface-container-lowest rounded-xl border border-surface-container-high shadow-sm overflow-hidden">
                <!-- Table Header -->
                <div class="bg-surface-container-low px-8 py-4 border-b border-surface-container-high">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-on-surface">All Sessions</h2>
                        <div class="flex items-center gap-4">
                            <!-- Filter Dropdown -->
                            <select class="px-4 py-2 bg-surface-container border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 font-body">
                                <option>All Status</option>
                                <option>Upcoming</option>
                                <option>Ongoing</option>
                                <option>Completed</option>
                            </select>
                            <!-- Search -->
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                                <input type="text" placeholder="Search sessions..." class="pl-9 pr-4 py-2 bg-surface-container border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 font-body" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-surface-container-high/30 border-b border-surface-container-high">
                                <th class="py-4 px-8 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Session</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Conference</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Date & Time</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Speaker</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Room</th>
                                <th class="py-4 px-6 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</th>
                                <th class="py-4 px-8 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-container-high">
                            <?php if (empty($sessions)): ?>
                                <tr>
                                    <td colspan="7" class="py-12 text-center">
                                        <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-20">calendar_view_day</span>
                                        <p class="text-on-surface-variant mt-4">No sessions found</p>
                                        <a href="<?= route('session', 'create') ?>" class="inline-block mt-4 text-primary hover:underline font-medium">Schedule your first session</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($sessions as $session): ?>
                                    <?php
                                    $now = new DateTime();
                                    $startTime = new DateTime($session['start_time']);
                                    $endTime = new DateTime($session['end_time']);

                                    if ($now >= $startTime && $now <= $endTime) {
                                        $status = 'ongoing';
                                        $statusClass = 'bg-emerald-100 text-emerald-700';
                                        $statusIcon = 'play_circle';
                                    } elseif ($now < $startTime) {
                                        $status = 'upcoming';
                                        $statusClass = 'bg-blue-100 text-blue-700';
                                        $statusIcon = 'schedule';
                                    } else {
                                        $status = 'completed';
                                        $statusClass = 'bg-slate-100 text-slate-600';
                                        $statusIcon = 'check_circle';
                                    }

                                    $duration = round(($endTime->getTimestamp() - $startTime->getTimestamp()) / 60);
                                    ?>
                                    <tr class="group hover:bg-surface-container-high transition-colors">
                                        <td class="py-6 px-8">
                                            <div class="font-headline font-bold text-on-surface text-sm">
                                                <?= htmlspecialchars($session['title']) ?>
                                            </div>
                                            <?php if (!empty($session['description'])): ?>
                                                <p class="text-xs text-on-surface-variant mt-1 line-clamp-1">
                                                    <?= htmlspecialchars($session['description']) ?>
                                                </p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-sm text-on-surface-variant">
                                                <?= htmlspecialchars($session['conference_title'] ?? 'N/A') ?>
                                            </span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="text-sm font-medium text-on-surface">
                                                <?= $startTime->format('M d, Y') ?>
                                            </div>
                                            <div class="text-xs text-on-surface-variant mt-1">
                                                <?= $startTime->format('g:i A') ?> - <?= $endTime->format('g:i A') ?>
                                                <span class="text-[10px]">(<?= $duration ?>m)</span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-2">
                                                <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">
                                                    <?= strtoupper(substr($session['speaker_name'] ?? 'N', 0, 1)) ?>
                                                </div>
                                                <span class="text-sm text-on-surface">
                                                    <?= htmlspecialchars($session['speaker_name'] ?? 'TBA') ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-slate-400 text-sm">meeting_room</span>
                                                <span class="text-sm text-on-surface-variant">
                                                    <?= htmlspecialchars($session['room_name'] ?? 'TBA') ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 <?= $statusClass ?> rounded-full text-[10px] font-bold uppercase">
                                                <span class="material-symbols-outlined text-xs"><?= $statusIcon ?></span>
                                                <?= $status ?>
                                            </span>
                                        </td>
                                        <td class="py-6 px-8 text-right space-x-2">
                                            <a href="<?= route('session', 'edit', $session['id']) ?>"
                                                class="inline-block p-2 text-slate-400 hover:text-primary transition-colors rounded-lg hover:bg-white">
                                                <span class="material-symbols-outlined text-xl">edit</span>
                                            </a>
                                            <form method="POST" action="<?= route('session', 'delete', $session['id']) ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this session?')">
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
    <a href="<?= route('session', 'create') ?>" class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:scale-105 transition-transform group z-50">
        <span class="material-symbols-outlined text-3xl">add</span>
        <span class="absolute right-full mr-4 px-3 py-1 bg-on-surface text-surface text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Schedule Session</span>
    </a>
</body>

</html>