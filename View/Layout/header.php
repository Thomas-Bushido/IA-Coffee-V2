<header>

    <?php

    // var_dump();
    ?>
    <link href="/View/Public/Layout-Style/header.css" rel="stylesheet">
    <div class="container1">
        <div class="logo">
            <a class='link__logo' href="homepage"><img class='img__logo' src="/View/Public/Images/logo_centre2.PNG" alt="Logo"></a>
        </div>
        <div class="logoUser">
            <?php
            //    var_dump($events);
            if (!isset($_SESSION['user'])) { // Vérifie si l'utilisateur n'est pas connecté
            ?>
                <a class='link__user' href="authController">
                    <!-- <img class='img__user' src="/View/Public/Images/Logo3-user.png" alt="Logo"> -->
                    Connexion
                </a>
            <?php
            } else if ($_SESSION['user']['role'] == 0) { // Si l'utilisateur est connecté, vérifie son rôle

            ?>
                <a class='link__user' href="session">
                    Mon compte
                </a>
            <?php
            } else if ($_SESSION['user']['role'] == 1) { // Si l'utilisateur est connecté, vérifie son rôle

            ?>
                <a class='link__user' href="sessionAdmin">
                    Mon compte
                </a>
            <?php
            } else { ?>
                <a class='link__user' href="authController">
                    <img class='img__user' src="/View/Public/Images/Logo3-user.png" alt="Logo">
                </a>
            <?php
            }

            ?>


        </div>
        <div class="menuBurger">
            <nav class="navbar">
                <ul class="navbar__links">
                    <h1 class="menuTitle">MENU</h1>
                    <li class="navbar__link first"><a href="event">Événements</a></li>
                    <li class="navbar__link second"> <?php
                                                        //    var_dump($events);
                                                        if (!isset($_SESSION['user'])) { // Vérifie si l'utilisateur n'est pas connecté
                                                        ?>
                            <a href="authController">
                                <!-- <img class='img__user' src="/View/Public/Images/Logo3-user.png" alt="Logo"> -->
                                Connexion
                            </a>
                        <?php
                                                        } else if ($_SESSION['user']['role'] == 0) { // Si l'utilisateur est connecté, vérifie son rôle

                        ?>
                            <a href="session">
                                Mon compte
                            </a>
                        <?php
                                                        } else if ($_SESSION['user']['role'] == 1) { // Si l'utilisateur est connecté, vérifie son rôle

                        ?>
                            <a href="sessionAdmin">
                                Mon compte
                            </a>
                        <?php
                                                        } else { ?>
                            <a href="authController">
                                <img class='img__user' src="/View/Public/Images/Logo3-user.png" alt="Logo">
                            </a>
                        <?php
                                                        }

                        ?>
                    </li>

                    <li class="navbar__link fourth"><a href="/">Contact</a></li>
                    <!-- <li class="navbar__link fifth"><a href="/">A propos</a></li> -->
                </ul>
                <button class="burger">
                    <span class="bar"></span>
                </button>
            </nav>
        </div>
    </div>
    <div class="container2">
        <h1 id="headerTitle">IA CAFE</h1>
        <h2 id="headerTitle2">Réservez en ligne</h2>
    </div>
    </div>
    <div class="container3">
        <div class="searchBar">

            <input id="searchInput" type="text" placeholder="Recherchez un evenement, une date">
            <!-- <button class="loopButton">
     
      </button> -->

        </div>
    </div>
    <div class="container4">
    <div class="list">
<?php foreach ($eventSearch as $event): ?>
    <form class="searchBarList searchItem" method="POST" action="EventDetail">
    <div class="logoSearchBarList"></div>
    <?php 
    if (!isset($_SESSION['user'])) {
        ?>     <button class="buttonSearchBarList" name="idEvent" value="<?= htmlspecialchars($event['idEvent']); ?>" disabled>
               
<?php
     } else { ?>

<button class="buttonSearchBarList" type="submit" name="idEvent" value="<?= htmlspecialchars($event['idEvent']); ?>">
<?php 
     }?>
        <div><?= htmlspecialchars($event['Title']); ?></div>
            <div class="infosEvent">
                le <?= htmlspecialchars($event['Date']) ?><br> à <?= htmlspecialchars($event['Heure']) ?>
            </div>
        </button>
    </form>
<?php endforeach; ?>
</div>
    </div>
    <script src="/View/Public/burger.js"></script>
</header>