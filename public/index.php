<?php
define("WEBROOT", "http://localhost:8000");


?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= WEBROOT ?>/style/nav.css">
  <link rel="stylesheet" href="<?= WEBROOT ?>/style/lister.article.css">
  <link rel="stylesheet" href="<?= WEBROOT ?>/style/form.article.css">
  <!-- <link rel="stylesheet" href="<?= WEBROOT ?>/style/login.css"> -->
 
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>projet</title>



</head>

<body>

  <style>
    .mt-250 {
      margin-top: 80px;
    }
  </style>

  <header>
    <div class="container1 ">
      <div class="logo">
        <img src="images/logo.jpg" alt="" srcset="">

      </div>
      <nav>
        <ul>
          <li><a href="<?= WEBROOT ?>/?controller=article&action=liste-article">Article</a></li>
          <li><a href="#">Approvisionnements</a></li>

          

            <div class="relative inline-block text-left">
              <div>
                <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="false" aria-haspopup="true">
                  SUPPLEMENTAIRE
                  <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>

              <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                  <a href="<?= WEBROOT ?>/?controller=type&action=liste-type" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">TYPE</a>
                  <a href="<?= WEBROOT ?>/?controller=categorie&action=liste-categorie" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">CATEGORIE</a>


                </div>
              </div>
            </div>

            <script>
              document.addEventListener('click', function(event) {
                const menuButton = document.getElementById('menu-button');
                const dropdownMenu = document.getElementById('dropdown-menu');

                if (menuButton.contains(event.target)) {
                  // Toggle the dropdown menu when the button is clicked
                  dropdownMenu.classList.toggle('hidden');
                  menuButton.setAttribute('aria-expanded', dropdownMenu.classList.contains('hidden') ? 'false' : 'true');
                } else {
                  // Hide the dropdown menu if the click is outside
                  if (!dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.add('hidden');
                    menuButton.setAttribute('aria-expanded', 'false');
                  }
                }
              });
            </script>
          


          <li><a href="#">Se connecter</a></li>
        </ul>
      </nav>
    </div>
  </header>


  <main>
    <?php


   
    
    if(isset($_REQUEST['controller'])){
      if($_REQUEST['controller']=="article"){
        require_once("../controller/article.controller.php");
      }elseif($_REQUEST['controller']=="type"){
        require_once("../controller/type.controller.php");
      }elseif($_REQUEST['controller']=="categorie"){
        require_once("../controller/categorie.controller.php");
      }else{
        listerType();
      }
    }
    ?>


  </main>




</body>

</html>