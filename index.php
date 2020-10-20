<!DOCTYPE html>
<!-- Crear tienda básica con sesion, las paginas a crear son: login,listado de productos,cesta de la compra,pagar.
Pagina principal LOGIN
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- FORMULARIO LOGIN -->
        <form action="index.php" method="post" name="form">
            <h3>Identificate</h3>
            Nombre de usuario:  <input type="text" name="nombre"/>
            Contraseña: <input type="password" name="clave"/>
            <input type="submit" value="enviar" name="Enviar"/>
        </form>

        <?php
        /******* VALIDA FORMULARIO LOGIN  *********/
        if (isset($_POST['Enviar'])) { //Si pulso el botón enviar
            if ((isset($_POST['nombre']) && $_POST['nombre'] != "") && (isset($_POST['clave']) && $_POST['clave'] != "")) { //Y los campos no están vacíos
                $usuario = $_POST['nombre'];
                $clave = $_POST['clave'];
                if (($usuario == 'alumno1') && ($clave == 'alumno1') || ($usuario == 'alumno2') && ($clave == 'alumno2')) { //Si el usuario y clave es alumno1 o alumno2
                    session_start(); //Se crea la sesión
                    $_SESSION['usuario'] = $usuario; //Asigno el nombre del usuario a la variable $_SESSION
                    header("location:productos.php"); //Redirijo a la página del listado de productos
                    exit;
                }
            } else {
                echo'<script type="text/javascript">
               alert("Error, campo vacío");
           </script>';
            }
        }
        ?>
    </body>
</html>


<?php
//        
//        
//        
//        if (isset($_SERVER['PHP_AUTH_USER'])) {
//            if (($_SERVER['PHP_AUTH_USER'] == 'alumno1' && $_SERVER['PHP_AUTH_PW'] == 'alumno1') ||
//                    ($_SERVER['PHP_AUTH_USER'] == 'alumno2' && $_SERVER['PHP_AUTH_PW'] == 'alumno2')) {
//
//                session_start();
//                $usuario = $_SERVER['PHP_AUTH_USER'];
//                $_SESSION['usuario'] = $usuario;
//               
//                header("location:productos.php");
//                exit;
//            } else {
//                header('WWW-Authenticate: Basic Realm="Autenticación PHP"');
//                header('HTTP/1.0 401 Unauthorized');
//                echo "Usuario no reconocido!";
//                exit;
//            }
//        } else{
//             header('WWW-Authenticate: Basic Realm="Autenticación PHP"');
//                header('HTTP/1.0 401 Unauthorized');
//                echo "Usuario no reconocido!";
//                exit;
//        }
?>
