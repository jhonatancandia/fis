<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="public/img/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Fiscalia Departamental de Cochabamba</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="public/img/logo.png" alt="Logo" class="img-fluid">
        </div>
    </div>
    <form method="POST" id="form-login">
        <div class="container"> 
            <div class="d-flex justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required>
                    </div>
                    <div id="alert-login"></div>
                    <button type="button" class="btn btn-primary btn-block" id="button-login" name="login">Iniciar sesión</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="public/js/auth.js"></script>
</body>
</html>