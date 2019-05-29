<?php
session_start();

if(empty($_POST['txtNombre']) || empty($_POST['txtusername']) || empty($_POST['rol']) || empty($_POST['txtpassword1']) || empty($_POST['txtpassword2'])){
    header('Location: registro.php?error_message2=Por favor llene todos los campos!'); 
}else{
    if(isset($_POST['txtNombre']) && isset($_POST['txtusername']) && isset($_POST['txtpassword1']) && isset($_POST['txtpassword2'])){
        if($_POST['txtpassword1'] == $_POST['txtpassword2']){
         $conn = new mysqli('localhost','root','','examen1');
                                    $usuario=$_POST['txtNombre'];
                                    $username=$_POST['txtusername'];
                                    $rol = $_POST['rol'];
                                    $password=$_POST['txtpassword1'];
    
        $sql_insert = "INSERT INTO usuarios (nombre, username, rol, password ) VALUES ('$usuario','$username','$rol',MD5('$password'))";
        $res=$conn->query($sql_insert);
    
        if($conn->error){
            echo $sql_insert;
            header('Location: registro.php?error_message2=Ocurrio un error: ' . $conn->error);
            exit;
        }else{
           header('Location: ../index.php?error_message=Usuario registrado correctamente, puede iniciar sesión.');
        }
       }else{
       header('Location: registro.php?error_message2=Las contraseñas no coinciden por favor intentelo de nuevo');
       exit;
       }
    }else{
        header('Location: registro.php');
        exit;
    }
}

?>