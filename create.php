<?php
require_once 'clases/ControladorSesion.php';
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['usuario'], $_POST['nombre'], 
                          $_POST['apellido'], $_POST['clave'], $_POST['email']);
    if( $result[0] === true ) {
        $redirigir = 'home.php?mensaje='.$result[1];
    } else {
        $redirigir = 'create.php?mensaje='.$result[1];
    }
    header('Location: ' . $redirigir);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Stock hogar</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">

    <style>
        @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  
    <h1 class="h3 mb-3 fw-normal">Crear una cuenta nueva</h1><br> 
    
    <h2 class="h3 mb-3 fw-normal" style="color:gray">Ingrese los datos en los campos</h1>

<?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <form action="create.php" method="post">
    <div class="form-floating">
      <input name="usuario" class="form-control" id="floatingInput" placeholder="Usuario">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input name="clave" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Clave</label>
    </div>
    <div class="form-floating">
      <input name="nombre" class="form-control" id="floatingInput" placeholder="Nombre">
      <label for="floatingInput">Nombre</label>
    </div>
     <div class="form-floating">
      <input name="apellido" class="form-control" id="floatingInput" placeholder="Apellido">
      <label for="floatingInput">Apellido</label>
    </div>
    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="email">
      <label for="floatingInput">email</label>
    </div>

    <input type="submit" value="Registrarse" class="btn btn-primary" style="margin:15px">
  </form>
</main>


    
  </body>
</html>