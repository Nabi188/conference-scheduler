<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Room - Conference Scheduler</title>
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
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Page Header -->
            <header class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <a href="<?= route('room') ?>" class="text-on-surface-variant hover:text-on-surface transition-colors">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </a>
                        <h1 class="text-4xl font-extrabold tracking-tight text-on-surface font-headline">Edit Room</h1>
                    </div>
                    <p class="text-on-surface-variant font-body">Update room information and settings</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-on-surface-variant">Room ID</p>
                    <p class="text-sm font-bold text-on-surface">RM-<?= str_pad($room['id'], 3, '0', STR_PAD_LEFT) ?></p>
                </div>
            </header>

            <!-- Form Card -->
            <?php if (!empty($errors)): ?>
                <div class="mb-8 p-6 bg-error-container/20 border border-error/20 rounded-xl">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="material-symbols-outlined text-error">error</span>
                        <h3 class="text-error font-bold">Please fix the following errors:</h3>
                    </div>
                    <ul class="list-disc ml-9 text-sm text-error/80 space-y-1">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="bg-surface-container-lowest rounded-xl border border-surface-container-high shadow-sm">
                <div class="p-8">
                    <form method="POST" action="<?= route('room', 'update', $room['id']) ?>" class="space-y-8">
                        <!-- Basic Information Section -->
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-4 border-b border-surface-container-high">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">info</span>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-on-surface">Basic Information</h2>
                                    <p class="text-sm text-on-surface-variant">Room identification and details</p>
                                </div>
                            </div>

                            <!-- Room Name -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-on-surface" for="name">
                                    Room Name <span class="text-error">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    value="<?= htmlspecialchars($room['name']) ?>"
                                    placeholder="e.g., Grand Ballroom A"
                                    class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all font-body" />
                                <p class="text-xs text-on-surface-variant">A descriptive name for the room</p>
                            </div>

                            <!-- Location -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-on-surface" for="location">
                                    Location <span class="text-error">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    required
                                    value="<?= htmlspecialchars($room['location']) ?>"
                                    placeholder="e.g., Building A, Floor 3"
                                    class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all font-body" />
                                <p class="text-xs text-on-surface-variant">Physical location of the room</p>
                            </div>

                            <!-- Capacity -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-on-surface" for="capacity">
                                    Capacity <span class="text-error">*</span>
                                </label>
                                <input
                                    type="number"
                                    id="capacity"
                                    name="capacity"
                                    required
                                    min="1"
                                    value="<?= htmlspecialchars($room['capacity']) ?>"
                                    placeholder="e.g., 150"
                                    class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all font-body" />
                                <p class="text-xs text-on-surface-variant">Maximum number of attendees</p>
                            </div>

                            <!-- Description -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-on-surface" for="description">
                                    Description
                                </label>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    placeholder="Describe the room amenities, layout, or special features..."
                                    class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all font-body resize-none"><?= htmlspecialchars($room['description'] ?? '') ?></textarea>
                                <p class="text-xs text-on-surface-variant">Optional details about the room</p>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="bg-tertiary-container/20 border border-tertiary/20 rounded-lg p-4">
                            <div class="flex gap-3">
                                <span class="material-symbols-outlined text-tertiary">lightbulb</span>
                                <div>
                                    <p class="text-sm font-bold mb-1">Capacity Policy</p>
                                    <p class="text-xs leading-relaxed opacity-80">
                                        Reducing capacity may affect existing session assignments. Review scheduled sessions before making significant changes.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-surface-container-high">
                            <a href="<?= route('room') ?>" class="px-6 py-3 text-on-surface-variant hover:text-on-surface font-semibold rounded-lg hover:bg-surface-container-low transition-colors">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dim transition-colors flex items-center gap-2 shadow-lg shadow-primary/20">
                                <span class="material-symbols-outlined">save</span>
                                Update Room
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>