<?php
session_start();

if(empty($_POST['txtCantidad']) ){
    header('Location: hacerpedido.php?error_message=Por favor llene todos los campos!'); 
}else{
    if(is_numeric ($_POST['txtCantidad'] )){
        if(isset($_POST['txtCantidad']) ){
             $conn = new mysqli('localhost','root','','examen1');
                                        session_start();
                                        $iduser = $_SESSION['user']['id'];
                                        $idadmin = $_POST['idadmin'];
                                        $cliente = $_SESSION['user']['nombre'];
                                        $producto = $_POST['producto'];
                                        $cantidad = $_POST['txtCantidad'];
                                        $total = $_POST['precio']*$cantidad;


                                       
                                        
            $sql_insert = "INSERT INTO pedidos (idCliente, idAdmin, cliente, producto, cantidadPedida, totalPagar) VALUES ('$iduser','$idadmin','$cliente','$producto', '$cantidad', '$total')";
            $res=$conn->query($sql_insert);
        
            if($conn->error){
                echo $sql_insert;
                header('Location: hacerpedido.php?error_message=Ocurrio un error: ' . $conn->error);
                exit;
            }else{
               header('Location: cliente.php?error_message=Producto registrado corectamente');
            }
        
        }else{
            header('Location: hacerpedido.php');
            exit;
        }
    }else{
        header('Location: hacerpedido.php?error_message=El precio no es un numero!'); 
    }
}