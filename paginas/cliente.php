<?php
session_start();

if(isset($_GET['error_message'])){
        
    $error_message = $_GET ['error_message'];
}
$conn = new mysqli('localhost','root','','examen1');
$sql_insert = "SELECT * FROM productos";
$res=$conn->query($sql_insert);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cliente</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
             <div class="jumbotron">
                <center>
                    <h1 class="display-6 titulos">Productos disponibles</h1>
                </center>
                <hr class="my-4">
                <table class="table table-hover">
                        <tr>
                            <td><b>Producto</b></td>
                            <td><b>Precio</b></td>
                            <td><b>Accion</b></td>
                        </tr>
                        <?php
                        while($mostrar = $res-> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['nombreProducto'] ?> </td>
                            <td><?php echo $mostrar['precio'];?> </td>
                            <td><a href="hacerpedido.php?producto=<?php echo $mostrar['nombreProducto']?>&idadmin=<?php echo $mostrar['idusuario'] ?>&precio=<?php echo $mostrar['precio'] ?>" class="btn btn-success">Seleccionar</a> </td>
                        </tr>
                        <?php
                        }?>

                </table>
                <center>
                    <br>
                    <br>
                    <?php
                    if(isset($error_message)){
                        echo $error_message;
                    }
                    ?>
                    <hr class="my-4">
                    <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesion</a>
                </center>
             </div>
            </div>
        </div>
    </div> 
</body>
</html>