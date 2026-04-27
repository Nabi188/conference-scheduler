<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | Conference Scheduler</title>
    <!-- Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
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
            display: inline-block;
            vertical-align: middle;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
    </style>
</head>

<body class="bg-background font-body text-on-surface min-h-screen flex items-center justify-center p-6 selection:bg-primary-container selection:text-primary">
    <!-- Ambient Texture Layer -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-primary/5 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-tertiary/5 blur-[120px]"></div>
    </div>

    <!-- Login Container -->
    <main class="relative z-10 w-full max-w-[440px]">
        <!-- Branding Anchor -->
        <div class="flex flex-col items-center mb-10 space-y-2">
            <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/10 mb-4">
                <span class="material-symbols-outlined text-surface text-2xl">event</span>
            </div>
            <h1 class="font-headline text-2xl font-extrabold tracking-tight text-on-surface">Conference Scheduler</h1>
            <p class="font-label text-sm text-on-surface-variant">Conference Management Portal</p>
        </div>

        <!-- Login Card -->
        <div class="bg-surface-container-lowest rounded-xl shadow-[0px_12px_32px_rgba(42,52,57,0.06)] overflow-hidden">
            <div class="p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="font-headline text-xl font-bold text-on-surface">Secure Access</h2>
                    <p class="font-body text-sm text-on-surface-variant mt-1">Please enter your credentials to manage conferences and sessions.</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="mb-6 p-4 bg-error-container/20 border border-error/20 rounded-lg flex items-start space-x-3">
                        <span class="material-symbols-outlined text-error text-lg mt-0.5">error</span>
                        <p class="font-body text-sm text-on-error-container flex-1"><?= htmlspecialchars($error) ?></p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/login" class="space-y-6">
                    <!-- Username Field -->
                    <div class="space-y-2">
                        <label class="font-label text-xs font-semibold uppercase tracking-wider text-on-surface-variant block ml-1" for="username">Username</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant text-lg">person</span>
                            <input
                                class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg font-body text-sm focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline-variant"
                                id="username"
                                name="username"
                                placeholder="Enter your username"
                                required
                                autofocus
                                type="text"
                                value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between ml-1">
                            <label class="font-label text-xs font-semibold uppercase tracking-wider text-on-surface-variant block" for="password">Password</label>
                        </div>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant text-lg">lock</span>
                            <input
                                class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg font-body text-sm focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline-variant"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                type="password" />
                        </div>
                    </div>

                    <!-- Action -->
                    <button class="w-full bg-gradient-to-br from-primary to-primary-dim text-surface font-headline font-bold py-4 rounded-lg shadow-md shadow-primary/20 hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center space-x-2" type="submit">
                        <span>Login to Dashboard</span>
                        <span class="material-symbols-outlined text-lg">login</span>
                    </button>
                </form>
            </div>

        </div>

    </main>
</body>

</html>