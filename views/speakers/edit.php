<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Speaker - Conference Scheduler</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#5d5d78",
                        "secondary-fixed": "#e1e2e9",
                        "surface-container-high": "#e1e9ee",
                        "tertiary-fixed-dim": "#cbc9e9",
                        "on-tertiary-fixed": "#373851",
                        "on-surface-variant": "#566166",
                        "secondary-container": "#e1e2e9",
                        "on-surface": "#2a3439",
                        "primary-dim": "#4a5268",
                        "primary-fixed-dim": "#ccd4ee",
                        "surface-variant": "#d9e4ea",
                        "inverse-primary": "#dae2fd",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#a9b4b9",
                        "on-primary-container": "#4a5167",
                        "surface-container-low": "#f0f4f7",
                        "surface-container-highest": "#d9e4ea",
                        "primary": "#565e74",
                        "on-tertiary-container": "#4a4a65",
                        "surface-tint": "#565e74",
                        "secondary-fixed-dim": "#d3d4db",
                        "inverse-on-surface": "#9a9d9f",
                        "on-primary": "#f7f7ff",
                        "on-background": "#2a3439",
                        "inverse-surface": "#0b0f10",
                        "on-tertiary-fixed-variant": "#54546f",
                        "on-error": "#fff7f6",
                        "primary-fixed": "#dae2fd",
                        "error-container": "#fe8983",
                        "surface-bright": "#f7f9fb",
                        "on-secondary": "#f8f8ff",
                        "on-tertiary": "#fbf7ff",
                        "error": "#9f403d",
                        "primary-container": "#dae2fd",
                        "surface-container": "#e8eff3",
                        "secondary-dim": "#515359",
                        "error-dim": "#4e0309",
                        "on-error-container": "#752121",
                        "tertiary-dim": "#51516c",
                        "secondary": "#5d5f65",
                        "on-secondary-container": "#505257",
                        "on-secondary-fixed-variant": "#595b61",
                        "tertiary-fixed": "#d9d7f8",
                        "on-secondary-fixed": "#3d3f45",
                        "background": "#f7f9fb",
                        "outline": "#717c82",
                        "tertiary-container": "#d9d7f8",
                        "on-primary-fixed-variant": "#535b71",
                        "surface": "#f7f9fb",
                        "on-primary-fixed": "#373f54",
                        "surface-dim": "#cfdce3"
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

    <main class="container mx-auto">
        <div class="p-12">
            <div class="mb-12">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <a href="<?= route('speaker') ?>" class="text-on-surface-variant hover:text-on-surface transition-colors">
                                <span class="material-symbols-outlined">arrow_back</span>
                            </a>
                            <h1 class="text-4xl font-manrope font-extrabold text-on-surface tracking-tight">Edit Speaker</h1>
                        </div>
                        <p class="text-on-surface-variant font-body">Update the professional profile and details.</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-on-surface-variant">Speaker ID</p>
                        <p class="text-sm font-bold text-on-surface">#<?= str_pad($speaker['id'], 4, '0', STR_PAD_LEFT) ?></p>
                    </div>
                </div>
            </div>

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

            <div class="grid grid-cols-12 gap-10">
                <!-- Left Column: Avatar Preview -->
                <div class="col-span-12 lg:col-span-4">
                    <div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col items-center text-center sticky top-24">
                        <div class="relative group mb-6">
                            <div class="w-48 h-48 rounded-full overflow-hidden p-1 border-2 border-primary/10">
                                <?php if (!empty($speaker['avatar_url'])): ?>
                                    <img class="w-full h-full object-cover rounded-full" src="<?= htmlspecialchars($speaker['avatar_url']) ?>" alt="<?= htmlspecialchars($speaker['name']) ?>" />
                                <?php else: ?>
                                    <div class="w-full h-full bg-surface-container rounded-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-6xl text-on-surface-variant">person</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold font-manrope text-on-surface"><?= htmlspecialchars($speaker['name']) ?></h3>
                        <p class="text-sm text-on-surface-variant mb-6"><?= htmlspecialchars($speaker['job_title'] ?? 'No title') ?></p>
                        <div class="w-full pt-6 border-t border-surface-container-high space-y-4">
                            <div class="flex justify-between text-xs">
                                <span class="text-on-surface-variant uppercase font-bold tracking-widest">Joined</span>
                                <span class="text-on-surface font-bold"><?= !empty($speaker['created_at']) ? date('M d, Y', strtotime($speaker['created_at'])) : 'N/A' ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Form -->
                <div class="col-span-12 lg:col-span-8">
                    <form method="POST" action="<?= route('speaker', 'update', $speaker['id']) ?>" class="space-y-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                    Full Name <span class="text-error">*</span>
                                </label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                                    type="text"
                                    name="name"
                                    value="<?= htmlspecialchars($speaker['name']) ?>"
                                    required />
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                    Email Address
                                </label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                                    type="email"
                                    name="email"
                                    value="<?= htmlspecialchars($speaker['email'] ?? '') ?>" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                    Company / Institution
                                </label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                                    type="text"
                                    name="company"
                                    value="<?= htmlspecialchars($speaker['company'] ?? '') ?>" />
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                    Job Title
                                </label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                                    type="text"
                                    name="job_title"
                                    value="<?= htmlspecialchars($speaker['job_title'] ?? '') ?>" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                Avatar URL
                            </label>
                            <input
                                class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                                type="url"
                                name="avatar_url"
                                value="<?= htmlspecialchars($speaker['avatar_url'] ?? '') ?>" />
                            <p class="mt-2 text-xs text-on-surface-variant italic">
                                Direct link to a high-resolution professional portrait.
                            </p>
                        </div>

                        <div>
                            <label class="block text-[0.875rem] font-medium text-on-surface-variant mb-2">
                                Biography
                            </label>
                            <textarea
                                class="w-full px-4 py-3 bg-surface-container-lowest border-none rounded-xl text-on-surface focus:ring-2 focus:ring-primary/20 transition-all shadow-sm leading-relaxed"
                                name="bio"
                                rows="6"><?= htmlspecialchars($speaker['bio'] ?? '') ?></textarea>
                        </div>

                        <div class="pt-8 flex items-center justify-end gap-4 border-t border-surface-container-high">
                            <a href="<?= route('speaker') ?>" class="px-8 py-3 text-on-surface-variant font-bold hover:text-on-surface transition-colors">
                                Cancel
                            </a>
                            <button
                                class="px-10 py-3 bg-primary text-on-primary font-bold rounded-xl shadow-lg hover:shadow-xl active:scale-95 transition-all bg-gradient-to-br from-primary to-primary-dim"
                                type="submit">
                                Update Speaker
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Metadata -->
            <div class="mt-16 p-6 bg-surface-container-low rounded-xl">
                <div class="grid grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Created</p>
                        <p class="text-on-surface font-medium"><?= !empty($speaker['created_at']) ? date('M d, Y g:i A', strtotime($speaker['created_at'])) : 'N/A' ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Last Updated</p>
                        <p class="text-on-surface font-medium"><?= !empty($speaker['updated_at']) ? date('M d, Y g:i A', strtotime($speaker['updated_at'])) : 'N/A' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>