<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create Session - Conference Scheduler</title>
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
                        "on-primary-container": "#4a5167",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f7f9fb",
                        "surface-container-low": "#f0f4f7",
                        "on-surface": "#2a3439",
                        "surface-container": "#e8eff3",
                        "on-error-container": "#752121",
                        "on-background": "#2a3439",
                        "primary-container": "#dae2fd",
                        "tertiary": "#5d5d78",
                        "surface-dim": "#cfdce3",
                        "outline-variant": "#a9b4b9",
                        "secondary-container": "#e1e2e9",
                        "on-primary": "#f7f7ff",
                        "surface-bright": "#f7f9fb",
                        "inverse-primary": "#dae2fd",
                        "outline": "#717c82",
                        "surface-container-highest": "#d9e4ea",
                        "error": "#9f403d",
                        "on-secondary-container": "#505257",
                        "tertiary-container": "#d9d7f8",
                        "on-error": "#fff7f6",
                        "on-tertiary": "#fbf7ff",
                        "surface-container-high": "#e1e9ee",
                        "secondary": "#5d5f65",
                        "primary": "#565e74",
                        "surface-tint": "#565e74",
                        "on-surface-variant": "#566166",
                        "primary-dim": "#4a5268",
                        "surface": "#f7f9fb",
                        "error-container": "#fe8983",
                        "on-secondary": "#f8f8ff",
                        "on-tertiary-container": "#4a4a65",
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

    <main class="ml-64 p-12 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <a href="<?= route('session') ?>" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                    <h1 class="text-[3.5rem] font-extrabold tracking-tight text-on-surface font-headline leading-none">New Session</h1>
                </div>
                <p class="text-on-surface-variant font-body text-lg max-w-2xl">Schedule a new conference session with speaker, room, and timing details.</p>
            </div>

            <!-- Form -->
            <div class="bg-surface-container-lowest rounded-xl border border-surface-container-high shadow-sm">
                <div class="p-10">
                    <form method="POST" action="<?= route('session', 'store') ?>" class="space-y-10">
                        <!-- Session Title -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="title">
                                Session Title <span class="text-error">*</span>
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                required
                                placeholder="Enter session title..."
                                class="w-full bg-transparent border-0 border-b-2 border-surface-container text-2xl font-headline font-bold focus:ring-0 focus:border-primary transition-all py-4 placeholder:text-surface-container-highest" />
                        </div>

                        <!-- Conference & Speaker Row -->
                        <div class="grid grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="conference_id">
                                    Conference <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <select
                                        id="conference_id"
                                        name="conference_id"
                                        required
                                        class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="" disabled selected>Select conference</option>
                                        <?php foreach ($conferences as $conference): ?>
                                            <option value="<?= $conference['id'] ?>">
                                                <?= htmlspecialchars($conference['title']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-4 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="speaker_id">
                                    Speaker
                                </label>
                                <div class="relative">
                                    <select
                                        id="speaker_id"
                                        name="speaker_id"
                                        class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="">No speaker assigned</option>
                                        <?php foreach ($speakers as $speaker): ?>
                                            <option value="<?= $speaker['id'] ?>">
                                                <?= htmlspecialchars($speaker['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-4 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="description">
                                Description
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Describe the session objectives and key topics..."
                                class="w-full bg-surface-container-low border-0 rounded-xl p-6 font-body leading-relaxed focus:ring-2 focus:ring-primary resize-none"></textarea>
                        </div>

                        <!-- Room & Status Row -->
                        <div class="grid grid-cols-2 gap-8 pt-4">
                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="room_id">
                                    Room
                                </label>
                                <div class="relative">
                                    <select
                                        id="room_id"
                                        name="room_id"
                                        class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="">No room assigned</option>
                                        <?php foreach ($rooms as $room): ?>
                                            <option value="<?= $room['id'] ?>">
                                                <?= htmlspecialchars($room['name']) ?> (<?= $room['capacity'] ?> seats)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-4 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="status">
                                    Status <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <select
                                        id="status"
                                        name="status"
                                        required
                                        class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="scheduled" selected>Scheduled</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="done">Done</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-4 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>
                        </div>

                        <!-- Time Range -->
                        <div class="grid grid-cols-2 gap-8 pt-4">
                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="start_time">
                                    Start Time <span class="text-error">*</span>
                                </label>
                                <input
                                    type="datetime-local"
                                    id="start_time"
                                    name="start_time"
                                    required
                                    class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary" />
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant" for="end_time">
                                    End Time <span class="text-error">*</span>
                                </label>
                                <input
                                    type="datetime-local"
                                    id="end_time"
                                    name="end_time"
                                    required
                                    class="w-full bg-surface-container-low border-0 rounded-lg py-4 px-4 font-label focus:ring-2 focus:ring-primary" />
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end gap-6 pt-12 border-t border-surface-container-high">
                            <a href="<?= route('session') ?>" class="px-6 py-3 text-on-surface-variant hover:text-on-surface font-semibold rounded-lg hover:bg-surface-container-low transition-colors">
                                Cancel
                            </a>
                            <button type="submit" class="px-10 py-4 bg-primary text-white rounded-lg font-bold shadow-lg hover:bg-primary-dim transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined">add</span>
                                Create Session
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>