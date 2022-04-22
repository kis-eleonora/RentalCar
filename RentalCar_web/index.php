
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="rentalcar.css" rel="stylesheet" type="text/css"/>
        <title>Tisza-Kis Eleonóra</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Autókölcsönző</h1>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=autok">Autók</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=kolcsonzes">Befizetés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.dszcberegszaszi.hu/" target="_blank">Az iskola honlapja</a>
                </li>
            </ul>
            <div>
                <?php
                $menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
                switch ($menu) {
                    case "kolcsonzes":
                        require_once 'kolcsonzes.php';
                        break;
                    default:
                        require_once 'autok.php';
                        break;
                }
                ?>
            </div>
        </div>
        <footer>
            <p>© Tisza-Kis Eleonóra, 2022</p>
        </footer>
    </body>
</html>
