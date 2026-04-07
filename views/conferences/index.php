<?php
// Calculate stats
$stats = [
    'total' => count($conferences),
    'ongoing' => 0,
    'upcoming' => 0,
    'finished' => 0
];

foreach ($conferences as $conf) {
    if ($conf['status'] === 'ongoing') $stats['ongoing']++;
    elseif ($conf['status'] === 'upcoming') $stats['upcoming']++;
    elseif ($conf['status'] === 'finished') $stats['finished']++;
}
?>
<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Conferences Management - Conference Scheduler</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed": "#e1e2e9",
                        "error-dim": "#4e0309",
                        "inverse-on-surface": "#9a9d9f",
                        "surface-container-low": "#f0f4f7",
                        "on-surface": "#2a3439",
                        "background": "#f7f9fb",
                        "surface-container": "#e8eff3",
                        "secondary-dim": "#515359",
                        "on-error-container": "#752121",
                        "tertiary-dim": "#51516c",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#0b0f10",
                        "primary-container": "#dae2fd",
                        "tertiary": "#5d5d78",
                        "surface-dim": "#cfdce3",
                        "outline-variant": "#a9b4b9",
                        "secondary-container": "#e1e2e9",
                        "on-background": "#2a3439",
                        "primary-fixed": "#dae2fd",
                        "on-secondary-fixed": "#3d3f45",
                        "on-primary": "#f7f7ff",
                        "surface-bright": "#f7f9fb",
                        "primary-fixed-dim": "#ccd4ee",
                        "inverse-primary": "#dae2fd",
                        "on-primary-container": "#4a5167",
                        "tertiary-fixed-dim": "#cbc9e9",
                        "outline": "#717c82",
                        "surface-container-highest": "#d9e4ea",
                        "error": "#9f403d",
                        "on-secondary-container": "#505257",
                        "tertiary-container": "#d9d7f8",
                        "on-tertiary-fixed": "#373851",
                        "on-error": "#fff7f6",
                        "on-tertiary": "#fbf7ff",
                        "tertiary-fixed": "#d9d7f8",
                        "secondary-fixed-dim": "#d3d4db",
                        "surface-container-high": "#e1e9ee",
                        "secondary": "#5d5f65",
                        "primary": "#565e74",
                        "surface-tint": "#565e74",
                        "on-secondary-fixed-variant": "#595b61",
                        "on-surface-variant": "#566166",
                        "on-tertiary-fixed-variant": "#54546f",
                        "on-primary-fixed-variant": "#535b71",
                        "primary-dim": "#4a5268",
                        "surface": "#f7f9fb",
                        "error-container": "#fe8983",
                        "on-secondary": "#f8f8ff",
                        "on-tertiary-container": "#4a4a65",
                        "on-primary-fixed": "#373f54",
                        "surface-variant": "#d9e4ea"
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
                }
            }
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

<body class="bg-background text-on-surface">
    <?php require_once dirname(__DIR__) . '/layout/sidebar.php'; ?>
    <?php require_once dirname(__DIR__) . '/layout/header.php'; ?>

    <main class="ml-64 min-h-screen">
        <div class="p-12 container mx-auto">
            <!-- Page Header -->
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-sm font-semibold text-primary uppercase tracking-widest mb-2 block">Management Center</span>
                    <h2 class="text-4xl font-extrabold text-on-surface tracking-tight leading-none">Conferences</h2>
                </div>
                <a href="<?= route('conference', 'create') ?>" class="bg-primary hover:bg-primary-dim text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-sm">add</span>
                    <span class="font-semibold text-sm">Create Conference</span>
                </a>
            </div>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-4 gap-6 mb-12">
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs text-on-surface-variant font-medium uppercase tracking-wider mb-2">Total Events</p>
                    <p class="text-3xl font-bold font-headline"><?= $stats['total'] ?></p>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs text-on-surface-variant font-medium uppercase tracking-wider mb-2">Ongoing</p>
                    <p class="text-3xl font-bold font-headline text-primary"><?= str_pad($stats['ongoing'], 1, '0', STR_PAD_LEFT) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs text-on-surface-variant font-medium uppercase tracking-wider mb-2">Upcoming</p>
                    <p class="text-3xl font-bold font-headline"><?= $stats['upcoming'] ?></p>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs text-on-surface-variant font-medium uppercase tracking-wider mb-2">Finished</p>
                    <p class="text-3xl font-bold font-headline"><?= $stats['finished'] ?></p>
                </div>
            </div>

            <!-- Data Table -->
            <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden border border-outline-variant/5">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low">
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">ID</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Conference Title</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Location</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Start Date</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">End Date</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Status</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-low">
                        <?php if (empty($conferences)): ?>
                            <tr>
                                <td colspan="7" class="px-8 py-12 text-center">
                                    <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-20">event</span>
                                    <p class="text-on-surface-variant mt-4">No conferences found</p>
                                    <a href="<?= route('conference', 'create') ?>" class="inline-block mt-4 text-primary hover:underline font-medium">Create your first conference</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($conferences as $conference): ?>
                                <?php
                                $statusColors = [
                                    'upcoming' => 'bg-surface-container-highest text-on-surface-variant',
                                    'ongoing' => 'bg-primary-container text-primary',
                                    'finished' => 'bg-surface-container-low text-outline'
                                ];
                                $statusIcons = [
                                    'upcoming' => 'schedule',
                                    'ongoing' => 'play_circle',
                                    'finished' => 'check_circle'
                                ];
                                $statusClass = $statusColors[$conference['status']] ?? 'bg-surface-container text-on-surface-variant';
                                $statusIcon = $statusIcons[$conference['status']] ?? 'info';

                                ?>
                                <tr class="hover:bg-surface-container-high transition-colors">
                                    <td class="px-8 py-6 text-sm font-mono text-on-surface-variant">
                                        #CONF-<?= date('Y', strtotime($conference['start_date'])) ?>-<?= str_pad($conference['id'], 3, '0', STR_PAD_LEFT) ?>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">

                                            <div>
                                                <p class="text-sm font-bold text-on-surface"><?= htmlspecialchars($conference['title']) ?></p>
                                                <?php if (!empty($conference['description'])): ?>
                                                    <p class="text-xs text-on-surface-variant line-clamp-1">
                                                        <?= htmlspecialchars(substr($conference['description'], 0, 50)) ?>...
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-sm text-on-surface-variant">
                                        <?= htmlspecialchars($conference['location'] ?? 'TBA') ?>
                                    </td>
                                    <td class="px-8 py-6 text-sm text-on-surface">
                                        <?= date('M d, Y', strtotime($conference['start_date'])) ?>
                                    </td>
                                    <td class="px-8 py-6 text-sm text-on-surface">
                                        <?= date('M d, Y', strtotime($conference['end_date'])) ?>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="inline-flex items-center gap-1 px-3 py-1 <?= $statusClass ?> font-bold text-[10px] uppercase rounded-full tracking-wider">
                                            <span class="material-symbols-outlined text-xs"><?= $statusIcon ?></span>
                                            <?= ucfirst($conference['status']) ?>
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="<?= route('conference', 'edit', $conference['id']) ?>" class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-xl">edit</span>
                                            </a>
                                            <form method="POST" action="<?= route('conference', 'delete', $conference['id']) ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this conference?')">
                                                <button type="submit" class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                                    <span class="material-symbols-outlined text-xl">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination Footer -->
                <?php if (!empty($conferences)): ?>
                    <div class="px-8 py-5 border-t border-surface-container-low flex items-center justify-between">
                        <p class="text-xs text-on-surface-variant">
                            Showing <?= count($conferences) ?> of <?= $stats['total'] ?> results
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Decorative Element -->
            <div class="mt-24 grid grid-cols-2 gap-12 opacity-50 pointer-events-none">
                <div class="space-y-4">
                    <div class="h-1 w-24 bg-primary/20"></div>
                    <p class="text-sm font-headline italic text-on-surface-variant">
                        "The conference space is not just about rooms and chairs, but about the flow of knowledge and architectural rhythm."
                    </p>
                </div>
                <div class="flex justify-end">
                    <div class="w-64 h-64 bg-surface-container-highest rounded-full blur-3xl opacity-30"></div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>