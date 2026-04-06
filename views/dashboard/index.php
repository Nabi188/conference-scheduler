<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Conference Scheduler - Admin Dashboard</title>
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

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <?php require_once dirname(__DIR__) . '/layout/sidebar.php'; ?>
    <?php require_once dirname(__DIR__) . '/layout/header.php'; ?>

    <!-- Main Content Canvas -->
    <main class="ml-64 p-12 min-h-screen">
        <div class="max-w-7xl mx-auto space-y-12">
            <!-- Hero Header Section -->
            <header class="space-y-2">
                <h1 class="text-[3.5rem] leading-none font-extrabold tracking-tight text-on-surface">Seamless Coordination.</h1>
                <p class="text-on-surface-variant max-w-2xl text-lg font-body">Orchestrate your global events. Monitor live sessions, manage speaker engagement, and optimize room utilization.</p>
            </header>

            <!-- 1. Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stat Card: Total Conferences -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high hover:border-primary/30 transition-all shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined">language</span>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-600 flex items-center">
                            <span class="material-symbols-outlined text-xs mr-0.5">trending_up</span> +<?= $conferenceStats['upcoming'] ?>
                        </span>
                    </div>
                    <h3 class="text-on-surface-variant font-label text-[10px] uppercase tracking-widest">Total Conferences</h3>
                    <p class="text-3xl font-bold text-on-surface mt-1"><?= $conferenceStats['total'] ?></p>
                </div>

                <!-- Stat Card: Total Sessions -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high hover:border-primary/30 transition-all shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined">video_chat</span>
                        </div>
                        <?php if ($sessionStats['ongoing'] > 0): ?>
                            <span class="text-[10px] font-bold text-primary flex items-center">LIVE NOW</span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-on-surface-variant font-label text-[10px] uppercase tracking-widest">Total Sessions</h3>
                    <p class="text-3xl font-bold text-on-surface mt-1"><?= $sessionStats['total'] ?></p>
                </div>

                <!-- Stat Card: Total Speakers -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high hover:border-primary/30 transition-all shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined">record_voice_over</span>
                        </div>
                    </div>
                    <h3 class="text-on-surface-variant font-label text-[10px] uppercase tracking-widest">Total Speakers</h3>
                    <p class="text-3xl font-bold text-on-surface mt-1"><?= $totalSpeakers ?></p>
                </div>

                <!-- Stat Card: Total Rooms -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high hover:border-primary/30 transition-all shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined">meeting_room</span>
                        </div>
                        <?php
                        $utilization = $totalRooms > 0 ? round(($sessionStats['ongoing'] / $totalRooms) * 100) : 0;
                        ?>
                        <span class="text-[10px] font-bold text-on-surface-variant"><?= $utilization ?>% UTILIZED</span>
                    </div>
                    <h3 class="text-on-surface-variant font-label text-[10px] uppercase tracking-widest">Total Rooms</h3>
                    <p class="text-3xl font-bold text-on-surface mt-1"><?= str_pad($totalRooms, 2, '0', STR_PAD_LEFT) ?></p>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-8">
                <!-- 2. Upcoming Sessions -->
                <div class="col-span-12 lg:col-span-8 space-y-6">
                    <div class="flex justify-between items-end">
                        <div>
                            <h2 class="text-2xl font-bold text-on-surface tracking-tight">Today's Sessions</h2>
                            <p class="text-on-surface-variant text-sm">Scheduled for today</p>
                        </div>
                        <a href="/public/index.php?controller=session&action=index" class="text-xs font-bold text-primary hover:underline uppercase tracking-widest">View All Sessions</a>
                    </div>
                    <div class="bg-surface-container-low rounded-xl overflow-hidden border border-surface-container-high">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-high/30">
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Session Name</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Time</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Speaker</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant text-right">Room</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-surface-container-high">
                                <?php if (empty($todaySessions)): ?>
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-on-surface-variant">
                                            <span class="material-symbols-outlined text-4xl mb-2 opacity-30">event_busy</span>
                                            <p class="text-sm">No sessions scheduled for today</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($todaySessions as $session): ?>
                                        <tr class="hover:bg-surface-container-high/20 transition-colors group cursor-pointer">
                                            <td class="px-6 py-5">
                                                <div class="text-sm font-bold text-on-surface"><?= htmlspecialchars($session['title']) ?></div>
                                                <div class="text-[10px] text-on-surface-variant uppercase mt-0.5 tracking-tighter"><?= htmlspecialchars($session['conference_title'] ?? 'N/A') ?></div>
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="text-sm text-on-surface font-medium"><?= date('g:i A', strtotime($session['start_time'])) ?></div>
                                                <div class="text-[10px] text-on-surface-variant italic">
                                                    Duration: <?= round((strtotime($session['end_time']) - strtotime($session['start_time'])) / 60) ?>m
                                                </div>
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">
                                                        <?= strtoupper(substr($session['speaker_name'] ?? 'N', 0, 1)) ?>
                                                    </div>
                                                    <span class="text-sm text-on-surface"><?= htmlspecialchars($session['speaker_name'] ?? 'TBA') ?></span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 text-right">
                                                <span class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-bold text-on-surface-variant">
                                                    <?= htmlspecialchars($session['room_name'] ?? 'TBA') ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3. Ongoing Conferences -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <div>
                        <h2 class="text-xl font-bold text-on-surface tracking-tight">Upcoming Events</h2>
                        <p class="text-on-surface-variant text-sm">Conferences starting soon</p>
                    </div>
                    <div class="space-y-4">
                        <?php if (empty($upcomingConferences)): ?>
                            <div class="bg-surface-container-lowest p-6 rounded-xl border border-surface-container-high text-center">
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">event_available</span>
                                <p class="text-sm text-on-surface-variant mt-2">No upcoming conferences</p>
                            </div>
                        <?php else: ?>
                            <?php foreach (array_slice($upcomingConferences, 0, 3) as $index => $conference): ?>
                                <?php
                                $statusClass = $conference['status'] === 'ongoing' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500';
                                $statusText = ucfirst($conference['status']);
                                $borderClass = $index === 0 ? 'border-l-4 border-primary shadow-md' : 'border border-surface-container-high';
                                ?>
                                <div class="bg-surface-container-lowest p-4 rounded-xl <?= $borderClass ?> shadow-sm hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="px-2 py-0.5 <?= $statusClass ?> text-[10px] font-bold rounded uppercase"><?= $statusText ?></span>
                                        <span class="text-[10px] font-medium text-on-surface-variant italic">
                                            <?= date('M d', strtotime($conference['start_date'])) ?> - <?= date('M d', strtotime($conference['end_date'])) ?>
                                        </span>
                                    </div>
                                    <h3 class="text-sm font-bold text-on-surface"><?= htmlspecialchars($conference['title']) ?></h3>
                                    <p class="text-xs text-on-surface-variant mt-1 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-xs">location_on</span>
                                        <?= htmlspecialchars($conference['location']) ?>
                                    </p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="text-[10px] text-on-surface-variant">
                                            <?php
                                            $days = round((strtotime($conference['end_date']) - strtotime($conference['start_date'])) / 86400) + 1;
                                            echo $days . ' day' . ($days > 1 ? 's' : '');
                                            ?>
                                        </div>
                                        <a href="/public/index.php?controller=conference&action=edit&id=<?= $conference['id'] ?>" class="text-xs font-bold text-primary hover:underline">View Details</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- 4. Recent Activity -->
            <section class="space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-on-surface tracking-tight">Recent Activity</h2>
                        <p class="text-on-surface-variant text-sm">Latest sessions created</p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest rounded-xl border border-surface-container-high overflow-hidden shadow-sm p-6">
                    <?php if (empty($recentSessions)): ?>
                        <div class="text-center py-8">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">history</span>
                            <p class="text-sm text-on-surface-variant mt-2">No recent activity</p>
                        </div>
                    <?php else: ?>
                        <div class="space-y-4">
                            <?php foreach ($recentSessions as $session): ?>
                                <div class="flex items-start gap-4 p-4 rounded-lg hover:bg-surface-container-low transition-colors">
                                    <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
                                        <span class="material-symbols-outlined">event_note</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-on-surface truncate"><?= htmlspecialchars($session['title']) ?></h4>
                                        <p class="text-xs text-on-surface-variant mt-1">
                                            <?= htmlspecialchars($session['conference_title'] ?? 'N/A') ?> •
                                            <?= htmlspecialchars($session['speaker_name'] ?? 'TBA') ?>
                                        </p>
                                    </div>
                                    <span class="text-[10px] text-on-surface-variant whitespace-nowrap">
                                        <?= date('M d, Y', strtotime($session['created_at'] ?? 'now')) ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <!-- Floating Action Button (FAB) -->
    <a href="/public/index.php?controller=session&action=create" class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:scale-105 transition-transform group z-50">
        <span class="material-symbols-outlined text-3xl">add</span>
        <span class="absolute right-full mr-4 px-3 py-1 bg-on-surface text-surface text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Schedule Session</span>
    </a>
</body>

</html>