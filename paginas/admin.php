<?php
session_start();

if($_GET){
    if(isset($_GET['error_message'])){
        $error_message = $_GET ['error_message'];
    }
}
$idUsuario=$_SESSION['user']['id'];
$conn = new mysqli('localhost','root','','examen1');

$sql_insert = "SELECT * FROM productos where idusuario='$idUsuario'";
$res=$conn->query($sql_insert);

$sql_insert = "SELECT * FROM pedidos where idAdmin='$idUsuario'";
$res2=$conn->query($sql_insert);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
             <div class="jumbotron">
                <center>
                    <h1 class="display-6 titulos">Bienvenido</h1>
                </center>
                <hr class="my-4">
                <form action="registroAdmin.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="formGroupExampleInput">Nombre del producto:</label>
                            <input type="text" class="form-control" name="txtProducto" 
                            placeholder="Ingrese el nombre del producto" required>
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput">Precio Unitario: </label>
                            <input type="number" class="form-control" name="txtPrecio" 
                            placeholder="Ingrese el precio unitario del producto" required>
                    </div>
                <center>
                    <button type="submit" class="btn btn-primary">Ingresar el producto</button>
                    <br>
                    <br>
                    <?php
                    if(isset($error_message)){
                        echo $error_message;
                    }
                    ?>
                </center>
                </form>
                <hr class="my-4">
                <h2 class="display-6 titulos">Productos registrados</h1>
                <table class="table table-hover">
                        <tr>
                            <td><b>Producto</b></td>
                            <td><b>Precio</b></td>
                        </tr>
                        <?php
                        while($mostrar = $res-> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['nombreProducto'] ?> </td>
                            <td><?php echo $mostrar['precio'];?> </td>
                        </tr>
                        <?php
                        }?>

                </table>
                <hr class="my-4">
                <h2 class="display-6 titulos">Pedidos de Clientes</h1>
                <table class="table table-hover">
                        <tr>
                            <td><b>Cliente</b></td>
                            <td><b>Producto</b></td>
                            <td><b>Cantidad Pedida</b></td>
                            <td><b>Total a pagar</b></td>
                        </tr>
                        <?php
                        while($mostrar = $res2-> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['cliente'] ?> </td>
                            <td><?php echo $mostrar['producto'];?> </td>
                            <td><?php echo $mostrar['cantidadPedida'] ?> </td>
                            <td><?php echo $mostrar['totalPagar'];?> </td>
                        </tr>
                        <?php
                        }?>

                </table>
                <hr class="my-4">
                <center>
                <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesion</a>
                <center>
             </div>
            </div>
        </div>
    </div> 
</body>
</html>