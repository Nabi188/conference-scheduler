<?php
// Default avatar colors
$avatarColors = ['bg-primary', 'bg-tertiary', 'bg-secondary', 'bg-error'];
?>
<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Speaker Management - Conference Scheduler</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed": "#d9d7f8",
                        "on-secondary": "#f8f8ff",
                        "surface-container-highest": "#d9e4ea",
                        "primary-dim": "#4a5268",
                        "surface-variant": "#d9e4ea",
                        "on-secondary-fixed": "#3d3f45",
                        "surface-tint": "#565e74",
                        "tertiary-dim": "#51516c",
                        "primary": "#565e74",
                        "inverse-on-surface": "#9a9d9f",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#5d5f65",
                        "on-surface-variant": "#566166",
                        "secondary-container": "#e1e2e9",
                        "outline": "#717c82",
                        "on-tertiary": "#fbf7ff",
                        "primary-fixed": "#dae2fd",
                        "tertiary-fixed-dim": "#cbc9e9",
                        "secondary-dim": "#515359",
                        "on-tertiary-container": "#4a4a65",
                        "error-container": "#fe8983",
                        "on-error": "#fff7f6",
                        "on-tertiary-fixed-variant": "#54546f",
                        "inverse-primary": "#dae2fd",
                        "inverse-surface": "#0b0f10",
                        "error": "#9f403d",
                        "on-primary-fixed": "#373f54",
                        "on-primary-fixed-variant": "#535b71",
                        "tertiary-container": "#d9d7f8",
                        "on-surface": "#2a3439",
                        "error-dim": "#4e0309",
                        "surface-dim": "#cfdce3",
                        "on-primary-container": "#4a5167",
                        "secondary-fixed-dim": "#d3d4db",
                        "on-primary": "#f7f7ff",
                        "secondary-fixed": "#e1e2e9",
                        "on-secondary-container": "#505257",
                        "outline-variant": "#a9b4b9",
                        "surface-container-low": "#f0f4f7",
                        "surface-container": "#e8eff3",
                        "on-tertiary-fixed": "#373851",
                        "background": "#f7f9fb",
                        "surface": "#f7f9fb",
                        "primary-fixed-dim": "#ccd4ee",
                        "on-secondary-fixed-variant": "#595b61",
                        "primary-container": "#dae2fd",
                        "surface-bright": "#f7f9fb",
                        "on-error-container": "#752121",
                        "surface-container-high": "#e1e9ee",
                        "tertiary": "#5d5d78",
                        "on-background": "#2a3439"
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
        .font-manrope {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <?php require_once dirname(__DIR__) . '/layout/sidebar.php'; ?>
    <?php require_once dirname(__DIR__) . '/layout/header.php'; ?>

    <main class="pt-24 pb-12 px-12 container mx-auto">
        <!-- Header & Action Row -->
        <header class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div class="space-y-1">
                <p class="text-xs font-bold uppercase tracking-widest text-on-surface-variant font-label">The Digital Curator</p>
                <h1 class="text-4xl font-extrabold font-headline tracking-tighter text-on-surface">Speaker Roster</h1>
                <p class="text-on-surface-variant max-w-md text-sm leading-relaxed">
                    Manage your keynote speakers and panelists. Track their participation status and core areas of expertise.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <a href="<?= route('speaker', 'create') ?>" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-headline font-bold text-sm flex items-center gap-2 hover:bg-primary-dim transition-all shadow-md">
                    <span class="material-symbols-outlined text-lg">person_add</span>
                    Invite Speaker
                </a>
            </div>
        </header>

        <!-- Speaker Ledger -->
        <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm ring-1 ring-black/[0.02]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low">
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.15em] text-on-surface-variant font-label">Speaker Profile</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.15em] text-on-surface-variant font-label">Company</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.15em] text-on-surface-variant font-label">Job Title</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.15em] text-on-surface-variant font-label">Joined</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.15em] text-on-surface-variant font-label text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    <?php if (empty($speakers)): ?>
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-20">groups</span>
                                <p class="text-on-surface-variant mt-4">No speakers found</p>
                                <a href="<?= route('speaker', 'create') ?>" class="inline-block mt-4 text-primary hover:underline font-medium">Invite your first speaker</a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($speakers as $speaker): ?>
                            <?php
                            $initials = '';
                            $nameParts = explode(' ', $speaker['name']);
                            foreach ($nameParts as $part) {
                                if (!empty($part)) {
                                    $initials .= strtoupper($part[0]);
                                }
                            }
                            $initials = substr($initials, 0, 2);
                            $avatarColor = $avatarColors[$speaker['id'] % count($avatarColors)];
                            ?>
                            <tr class="group hover:bg-surface-container-low transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 ring-2 ring-primary/5 flex items-center justify-center <?= $avatarColor ?> text-white font-bold">
                                            <?php if (!empty($speaker['avatar_url'])): ?>
                                                <img class="w-full h-full object-cover" src="<?= htmlspecialchars($speaker['avatar_url']) ?>" alt="<?= htmlspecialchars($speaker['name']) ?>" />
                                            <?php else: ?>
                                                <?= $initials ?>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h4 class="font-headline font-bold text-on-surface"><?= htmlspecialchars($speaker['name']) ?></h4>
                                            <?php if (!empty($speaker['email'])): ?>
                                                <p class="text-xs text-on-surface-variant"><?= htmlspecialchars($speaker['email']) ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="text-sm text-on-surface font-medium">
                                        <?= htmlspecialchars($speaker['company'] ?? 'N/A') ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="text-sm text-on-surface">
                                        <?= htmlspecialchars($speaker['job_title'] ?? 'N/A') ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="text-sm text-on-surface-variant">
                                        <?= date('M d, Y', strtotime($speaker['created_at'])) ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="<?= route('speaker', 'edit', $speaker['id']) ?>" class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </a>
                                        <form method="POST" action="<?= route('speaker', 'delete', $speaker['id']) ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this speaker?')">
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

        </div>


    </main>
</body>

</html>