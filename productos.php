<?php
// Recuperamos la información de la sesión
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
} else {
    echo "Bienvenido : " . $_SESSION['usuario'];
    
    ?>

    <html>
        <head>
            <title>Listado de productos</title>
            <style type="text/css">
                table tr td input{text-align:center;}
            </style>
        </head>
        <body>

            <form action="salir.php" method="post">
                <input type="submit" value="Cerrar Sesion" name="salir">
            </form>

            <form action="productos.php" method="post"> 
                <input type="button" value="Ir al carrito" name="carrito" onclick="location.href = 'pedido.php'">
                <h1>Listado de productos</h1>

                <input type="hidden" name="agregar"> 
                <table border="2px">
                    <thead>
                        <th>ID</th>
                        <th>Producto </th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </thead>

                    <tr>
                        <td>1020</td>
                        <td>TV</td>
                        <td>31". Precio:200€</td>
        
                        <td>
                            <form action="productos.php" method="POST">
                                <input type="hidden" name="txtProducto" value="TV">
                                <input type="number" name="Cantidad" value="1"><br>
                                <input type="hidden" name="txtPrecio" value="200">
                                <input type="submit" value="Agregar" name="agregar">
                            </form>
                        </td> 
                    </tr>

                   <tr>
                        <td>1050</td>
                        <td>PC</td>
                        <td>Notebook Asus 8GB. Precio:700€</td>
        
                        <td>
                            <form action="productos.php" method="POST">
                                <input type="hidden" name="txtProducto" value="PC">
                                <input type="number" name="Cantidad" value="1"><br>
                                <input type="hidden" name="txtPrecio" value="700">
                                <input type="submit" value="Agregar" name="agregar">
                            </form>
                        </td> 
                    </tr>
                    <tr>
                        <td>1066</td>
                        <td>Tablet</td>
                        <td>6.5". Precio:50€</td>
        
                        <td>
                            <form action="productos.php" method="POST">
                                <input type="hidden" name="txtProducto" value="Tablet">
                                <input type="number" name="Cantidad" value="1"><br>
                                <input type="hidden" name="txtPrecio" value="50">
                                <input type="submit" value="Agregar" name="agregar">
                            </form>
                        </td> 
                    </tr>
                </table> 
            </form>
<?php
 
if(isset($_POST['agregar'])){
    
    //Recogemos los valores del formulario
    $producto = $_POST['txtProducto'];
    $cantidad = $_POST['Cantidad'];
    $precio = $_POST['txtPrecio'];
  
    $_SESSION['pedido']=array(); //Creamos un variable de ssión, que va a ser un array
    
    //Se lo asignamos a una variable de sesion
    //Para cada producto guardamos la cantidad y el precio
    $_SESSION['pedido'][$producto]["Cantidad"]=$cantidad;
    $_SESSION['pedido'][$producto]["Precio"]=$precio;
    
    //Comprobamos si existe el nombre y incrementamos la cantidad
//    if($_SESSION['pedido'][$_POST['producto']]. is_array($txtProducto)){
//       $_SESSION['pedido'][$_POST['producto']]['cantidad']++;
//    } else $_SESSION['pedido'][$_POST['producto']] = $producto;
    
}
?>
        </body>
    </html>

    <?php
}
?>