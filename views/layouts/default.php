<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../assets/style.css">
    <script src="/assets/lib.js" defer></script>
    <title>Personal MVC with PHP 8</title>

   
</head>
<body>

    <header>
        <div id="menu-icon" class="">
            <span id="barra-1"></span>
            <span id="barra-2"></span>
            <span id="barra-3"></span>
        </div>
        <div id="menu" class="chiuso">
            <nav>
                <ul>
                 <?php foreach($menu as $href => $text ): ?>

                    <?php $active = $page === strtolower($text)? 'active':'' ?>
                    <li><a href="<?=$href?>" class="<?= $active  ?>"> <?= $text ?></a></li>


                <?php endforeach; ?>

                  
                   
                </ul>
            </nav>
        </div>
    </header>

    <main>
        {{page}} 
    </main>
    <footer>
        {{footer}}
    </footer>
</body>
</html>