<head>
  <meta charset="utf-8">
  <title><?php
    if(isset($title)) echo $title;
    else echo "Little Ulises Pizza&trade;";
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <!-- favicon -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/styles.css">
    <?php if(isset($css)) echo '<link rel="stylesheet" href="'.$css.'">'?>
</head>

<body>
    <header>
        <div class="nav-bar">
            <div class="container">
                <ul class="nav">
                    <?php if(isset($_SESSION['email'])): ?>
                        <li><a href="/usr/resumen.php">¡Hola <?php echo $_SESSION["nombre"];?>!</a></li>';
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/sucursales.php">Sucursales</a></li>
                        <li><a href="/usr/carrito.php">Carrito</a></li>
                        <li><a href="/usr/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/sucursales.php">Sucursales</a></li>
                        <li><a href="/usr/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>
