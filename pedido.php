<?php
// Recuperamos la información de la sesión
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
} else {
    $total = 0;
    echo "<h3>Carrito</h3>";
    if (isset($_SESSION['pedido'])) {
        //Imprime el arreglo asociativo
        foreach ($_SESSION["pedido"] as $indice => $arreglo) { //arreglo guarda la cantidad y el precio
            echo "<hr> Producto: <strong>" . $indice . "</strong><br>";
            $total += $arreglo["Cantidad"] * $arreglo["Precio"];
            foreach ($arreglo as $key => $value) { //Aquí partimos el arreglo en cantidad | precio
                echo $key . ": " . $value . "<br>";
            }
            echo "<a href='pedido.php?idp=$indice'>Eliminar</a>";

            echo "<h3>El total de la compra es de " . $total . "€ </h3>";
            echo "<a href='pedido.php?pagar=$indice'>Comprar</a>";
        }
        echo '<br><br><a href="productos.php">Volver al listado de productos</a><br>';
        ?>


        <?php
        //
    } else {
        echo "<script>alert('El carrito esta vacío');</script>";
        ?>
        <a href="productos.php">Volver al listado de productos</a>
        <?php
    }

    //Elimina un producto
    if (isset($_REQUEST["idp"])) {
        $producto = $_REQUEST["idp"];
        unset($_SESSION['pedido'][$producto]);
        header("Location:pedido.php");
    }

    //Elimina todos los productos
    if (isset($_REQUEST["pagar"])) {
        echo "<script>alert('Su compra se ha efectuado con éxito. Vuelva pronto');</script>";
        $producto = $_REQUEST["pagar"];
        unset($_SESSION['pedido'][$producto]);
        header("Location:pedido.php");
    }
}
?> 

