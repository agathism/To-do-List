<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/To-do-List/templates/styles/styleTwo.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="m-0">
    <div class="container flex">
        <nav class="nav pl-6">
            <span>
                <a href="http://localhost/To-do-List/index.php?action=homePage"><svg width="120px" height="110px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" fill="none">
                        <rect x="0" y="20" width="60" height="60" rx="15" fill="#f03ea9" />
                        <circle cx="15" cy="35" r="4" fill="white" />
                        <line x1="25" y1="35" x2="50" y2="35" stroke="white" stroke-width="2" />
                        <circle cx="15" cy="50" r="4" fill="white" />
                        <line x1="25" y1="50" x2="50" y2="50" stroke="white" stroke-width="2" />
                        <circle cx="15" cy="65" r="4" fill="white" />
                        <line x1="25" y1="65" x2="50" y2="65" stroke="white" stroke-width="2" />
                        <text x="80" y="55" dominant-baseline="middle" text-anchor="start" font-size="40" fill="#f03ea9" font-family="Arial, sans-serif">Listly</text>
                    </svg>
                </a>
            </span>
            <span>
                <button type="submit" class="button-confirm">Se déconnecter→</button>
                <?php if (isset($errors["logout"])) { ?>
                    <p class="text-danger">
                        <?= $errors["logout"] ?>
                    </p>
                <?php } ?>
            </span>
        </nav>
        <main>
            <div class="tasks bg-slate-900 pl-6 py-10">
                <hgroup>
                    <h1 class="text-3xl font-medium">Tâches</h1>
                    <a type="button" class="button my-6" href="index.php?action=add">
                        <span class="button__text">Ajouter une tâche</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                <line y2="19" y1="5" x2="12" x1="12"></line>
                                <line y2="12" y1="12" x2="19" x1="5"></line>
                            </svg></span>
                    </a>
                </hgroup>
                <div class="flex flex-row gap-12">
                    <div class="pending my-8">
                        <?php foreach ($pends as $pend): ?>
                            <hgroup class="m-6 border bg-slate-600 border-slate-600 w-20 h-8 text-center rounded-sm">
                                <h2 class="font-base text-lg ">À faire</h2>
                            </hgroup>
                            <div class="flex flex-wrap justify-center ">
                                <div class="card_work">
                                    <div class="card-desc">
                                        <div class="card-header">
                                            <div class="card-title">Date</div>
                                            <div class="card-menu">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                        </div>
                                        <div class="card-time"><?= $pend->getTitle() ?></div>
                                        <p class="recent"><?= $pend->getPriority() ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="in_progress my-8">
                        <?php foreach ($progs as $prog): ?>
                            <hgroup class="m-6 border bg-slate-600 border-slate-600 w-20 h-8 text-center rounded-sm">
                                <h2 class="font-base text-lg ">En Cours</h2>
                            </hgroup>
                            <div class="flex flex-wrap justify-center ">
                                <div class="card_work">
                                    <div class="card-desc">
                                        <div class="card-header">
                                            <div class="card-title">Date</div>
                                            <div class="card-menu">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                        </div>
                                        <div class="card-time"><?= $prog->getTitle() ?></div>
                                        <p class="recent"><?= $prog->getPriority() ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="completed my-8">
                        <?php foreach ($comps as $comp): ?>
                            <hgroup class="m-6 border bg-slate-600 border-slate-600 w-20 h-8 text-center rounded-sm">
                                <h2 class="font-base text-lg ">Complété</h2>
                            </hgroup>
                            <div class="flex flex-wrap justify-center ">
                                <div class="card_work">
                                    <div class="card-desc">
                                        <div class="card-header">
                                            <div class="card-title">Date</div>
                                            <div class="card-menu">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                        </div>
                                        <div class="card-time"><?= $comp->getTitle() ?></div>
                                        <p class="recent"><?= $comp->getPriority() ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>