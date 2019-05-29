<?php
session_start();

if(empty($_POST['txtProducto']) || empty($_POST['txtPrecio'] )){
    header('Location: admin.php?error_message=Por favor llene todos los campos!'); 
}else{
    if(is_numeric ($_POST['txtPrecio'] )){
        if(isset($_POST['txtProducto']) && isset($_POST['txtPrecio']) ){
             $conn = new mysqli('localhost','root','','examen1');
                                        session_start();
                                        $producto=$_POST['txtProducto'];
                                        $precio=$_POST['txtPrecio'];
                                        $iduser =$_SESSION['user']['id'];
                                        
            $sql_insert = "INSERT INTO productos (nombreProducto, precio, idUsuario) VALUES ('$producto','$precio','$iduser')";
            $res=$conn->query($sql_insert);
        
            if($conn->error){
                echo $sql_insert;
                header('Location: admin.php?error_message=Ocurrio un error: ' . $conn->error);
                exit;
            }else{
               header('Location: admin.php?error_message=Producto registrado corectamente');
            }
        
        }else{
            header('Location: admin.php');
            exit;
        }
    }else{
        header('Location: registro.php?error_message=El precio no es un numero!'); 
    }
}