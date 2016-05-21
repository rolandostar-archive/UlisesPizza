<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Little Ulises Pizza&trade; - Iniciar sesi&oacute;</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">

        <!-- icons -->
        <link rel="shortcut icon" href="/favicon.ico">

        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/login.css">
        <style>
            .small {
                padding: 0;
                margin: 0;
            }
        </style>
    </head>

    <body>
        <header>
            <div class="nav-bar">
                <div class="container">
                    <ul class="nav">
                        <li><a href="/">Regresar a Inicio</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="container-narrow">
            <form method="post" action="./login.php">
                <div class="login">
                    <div class="form-white-background">
                        <div class="form-title-row">
                            <h1>Staff Login</h1>
                        </div>
                        <div class="form-row">
                            <label>
                                <span>Llave</span>
                                <input type="text" name="email" autocomplete="off" autofocus>
                                <img src="usb-icon.png" style="position: fixed;">
                            </label>
                        </div>
                        <div class="form-row">
                            <label>
                                <span>Password</span>
                                <input type="password" name="password">
                            </label>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn">Log in</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>

</html>
