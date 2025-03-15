
<header>

<link href="/View/Public/Layout-Style/header.css" rel="stylesheet">
 <div class="container1">
   <div class="logo">
       <a class='link__logo' href="homepage"><img class='img__logo' src="/View/Public/Images/LOGO.png" alt="Logo"></a>  
    </div>
   <div class="logoUser"> 
   <?php 
if (!isset($_SESSION['user'])) { // Vérifie si l'utilisateur n'est pas connecté
   ?>  
       <a class='link__user' href="authController">
           <img class='img__user' src="/View/Public/Images/Logo3-user.png" alt="Logo">
       </a>
   <?php
   } else if ($_SESSION['user']['role'] == 0) { // Si l'utilisateur est connecté, vérifie son rôle
       
   ?>  
           <a class='link__user' href="session">
               <img class='img__user'src="/View/Public/Images/Logo3-user.png" alt="Logo">
           </a>
   <?php
       } else if ($_SESSION['user']['role'] == 1) { // Si l'utilisateur est connecté, vérifie son rôle
       
        ?>  
                <a class='link__user' href="sessionAdmin">
                    <img class='img__user'src="/View/Public/Images/Logo3-user.png" alt="Logo">
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
         <li class="navbar__link second"><a href="authController">Me connecter</a></li>
         <li class="navbar__link third"><a href="../../Controller/session.php">Mes réservations</a></li>
         <li class="navbar__link fourth"><a href="/">Contact & Adresse</a></li>
         <li class="navbar__link fifth"><a href="/">A propos</a></li>
      </ul>
      <button class="burger">
      <span class="bar"></span>  
    </button>   
   </nav>
   </div>
   </div>
   <div class="container2">
      <div class="searchBar">
         
      <input   type="text" placeholder="Recherchez un evenement, une date">
      <button class="loopButton">
      <img class="imgLoop"  src="/View/Public/Images/loop.png" alt="Rechercher">
      </button>
      
      </div>
   </div>  
   <script src="/View/Public/burger.js"></script>  
</header>