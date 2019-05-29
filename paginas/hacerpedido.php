<?php
session_start();

if($_GET){
    if(isset($_GET['producto']) && isset($_GET['idadmin'])){
        $producto = $_GET ['producto'];
        $idadmin = $_GET ['idadmin'];
        $precio = $_GET ['precio'];

    }
    if(isset($_GET['error_message'])){
        
        $error_message = $_GET ['error_message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pedido</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
             <div class="jumbotron">
                <center>
                    <h1 class="display-6 titulos">Pedido</h1>
                </center>
                <hr class="my-4">
                <form action="registropedido.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idadmin" value="<?php echo $idadmin?>" />
                <input type="hidden" name="producto" value="<?php echo $producto?>" />
                <input type="hidden" name="precio" value="<?php echo $precio?>" />
                <div class="form-group">
                            <label for="formGroupExampleInput"><b>Nombre del producto:</b> <?php echo $producto?></label>
                </div>
                <div class="form-group">
                            <label for="formGroupExampleInput">Cantidad:</label>
                            <input type="number" class="form-control" name="txtCantidad" 
                            placeholder="Ingrese la cantidad del producto" required>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary">Registrar pedido</button>
                    <br>
                    <br>
                    <?php
                    if(isset($error_message)){
                        echo $error_message;
                    }
                    ?>
                </center>
                </form>
             </div>
            </div>
        </div>
    </div> 
</body>
</html>