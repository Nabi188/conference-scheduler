<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create Conference - Conference Scheduler</title>
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
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <?php require_once dirname(__DIR__) . '/layout/sidebar.php'; ?>
    <?php require_once dirname(__DIR__) . '/layout/header.php'; ?>

    <main class="ml-64 min-h-screen">
        <div class="max-w-5xl mx-auto py-16 px-12">
            <!-- Header Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <a href="<?= route('conference') ?>" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                    <h2 class="text-4xl font-extrabold text-on-surface tracking-tight">Create Conference</h2>
                </div>
                <p class="text-on-surface-variant max-w-xl leading-relaxed">Design a new curated experience. Fill in the architectural details of your event to begin the curation process.</p>
            </div>

            <!-- Form Grid (Editorial Layout) -->
            <form method="POST" action="<?= route('conference', 'store') ?>" class="space-y-12">
                <!-- Main Form Section (The Bento Layout) -->
                <div class="grid grid-cols-12 gap-8">
                    <!-- Title & Identity -->
                    <div class="col-span-12 lg:col-span-8 space-y-8">
                        <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0px_12px_32px_rgba(42,52,57,0.04)]">
                            <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="title">
                                Conference Title <span class="text-error">*</span>
                            </label>
                            <input
                                class="w-full bg-surface-container-lowest border-0 border-b-2 border-surface-container py-3 px-0 focus:ring-0 focus:border-primary text-xl font-headline font-semibold text-on-surface placeholder:text-outline-variant transition-colors"
                                id="title"
                                name="title"
                                placeholder="e.g. International Design Symposium 2024"
                                type="text"
                                required />
                        </div>

                        <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0px_12px_32px_rgba(42,52,57,0.04)]">
                            <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="description">
                                Description
                            </label>
                            <textarea
                                class="w-full bg-surface-container-lowest border-0 border-b-2 border-surface-container py-3 px-0 focus:ring-0 focus:border-primary text-body-md text-on-surface placeholder:text-outline-variant resize-none"
                                id="description"
                                name="description"
                                placeholder="Define the vision and editorial scope of this event..."
                                rows="6"></textarea>
                        </div>
                    </div>

                    <!-- Logistics Side Panel -->
                    <div class="col-span-12 lg:col-span-4 space-y-8">
                        <!-- Status Selection -->
                        <div class="bg-surface-container-low p-8 rounded-xl">
                            <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="status">
                                Current Status <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full bg-white border-0 rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary/20 text-sm font-medium text-on-surface appearance-none"
                                    id="status"
                                    name="status"
                                    required>
                                    <option value="upcoming" selected>Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="finished">Finished</option>
                                </select>
                                <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400 pointer-events-none">expand_more</span>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="bg-surface-container-low p-8 rounded-xl">
                            <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="location">
                                Location
                            </label>
                            <div class="flex items-center bg-white rounded-lg px-4 focus-within:ring-2 focus-within:ring-primary/20">
                                <span class="material-symbols-outlined text-slate-400 text-lg mr-2">location_on</span>
                                <input
                                    class="w-full bg-transparent border-0 py-3 px-0 focus:ring-0 text-sm font-medium text-on-surface placeholder:text-outline-variant"
                                    id="location"
                                    name="location"
                                    placeholder="City or Venue"
                                    type="text" />
                            </div>
                        </div>

                        <!-- Date Window -->
                        <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0px_12px_32px_rgba(42,52,57,0.04)] space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="start_date">
                                    Start Date <span class="text-error">*</span>
                                </label>
                                <input
                                    class="w-full border-0 border-b-2 border-surface-container py-2 px-0 focus:ring-0 focus:border-primary text-sm font-medium text-on-surface"
                                    id="start_date"
                                    name="start_date"
                                    type="date"
                                    required />
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3" for="end_date">
                                    End Date <span class="text-error">*</span>
                                </label>
                                <input
                                    class="w-full border-0 border-b-2 border-surface-container py-2 px-0 focus:ring-0 focus:border-primary text-sm font-medium text-on-surface"
                                    id="end_date"
                                    name="end_date"
                                    type="date"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-end gap-6 pt-8 border-t border-surface-container-highest">
                    <a href="<?= route('conference') ?>" class="text-primary font-semibold text-sm hover:translate-y-[-1px] transition-transform active:scale-95 px-6 py-3">
                        Cancel
                    </a>
                    <button
                        class="bg-primary text-on-primary px-10 py-4 rounded-lg font-bold text-sm shadow-xl shadow-primary/20 bg-gradient-to-br from-primary to-primary-dim hover:brightness-110 active:scale-95 transition-all"
                        type="submit">
                        Save Conference
                    </button>
                </div>
            </form>

            <!-- Secondary Decorative Info Card -->
            <div class="mt-24 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-tertiary-container/30 border border-tertiary-container p-8 rounded-2xl flex flex-col justify-center">
                    <span class="material-symbols-outlined text-tertiary text-4xl mb-4">lightbulb</span>
                    <h3 class="text-on-tertiary-container font-bold text-lg mb-2">Planning Tip</h3>
                    <p class="text-on-tertiary-container text-sm leading-relaxed opacity-80">
                        Define clear start and end dates to help attendees plan their schedules effectively.
                    </p>
                </div>
                <div class="bg-primary-container/30 border border-primary-container p-8 rounded-2xl flex flex-col justify-center">
                    <span class="material-symbols-outlined text-primary text-4xl mb-4">info</span>
                    <h3 class="text-on-primary-container font-bold text-lg mb-2">Status Guide</h3>
                    <p class="text-on-primary-container text-sm leading-relaxed opacity-80">
                        Set status to "Upcoming" for future events, "Ongoing" during the conference, and "Finished" when completed.
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>