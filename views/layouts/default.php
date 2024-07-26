<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal MVC</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/code-logo-favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous" />

    <!-- font awesome icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../assets/style.css">

    <script src="/assets/lib.js" defer></script>


</head>

<body>

    <header>
        <div id="menu-icon" class="">
            <span id="barra-1"></span>
            <span id="barra-2"></span>
            <span id="barra-3"></span>
        </div>
        <div id="menu" class="chiuso">
            <?php
            function isActive($menuItem, $currentPage)
            {
                return strtolower($menuItem) === strtolower($currentPage) ? 'active' : '';
            }

            // Variabile che contiene la pagina corrente

            ?>
            <nav>
                <ul>
                    <li><a href="/" class="<?= isActive('home', $page) ?>">Home</a></li>
                    <li><a href="/contatti" class="<?= isActive('contatti', $page) ?>">Contatti</a></li>
                    <li><a href="/portfolio" class="<?= isActive('portfolio', $page) ?>">Portfolio</a></li>
                    <li><a target="_blank" href="https://github.com/AndroLuix/" class="<?= isActive('github', $page) ?>">GitHub <i style="color: white;" class="fa fa-github" aria-hidden="true"></i></a> </li>
                </ul>
            </nav>
            <!-- Altri contenuti della pagina -->
        </div>
    </header>

    <main>
        {{page}}
    </main>

        @include('components.footer')
</body>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>
</html>