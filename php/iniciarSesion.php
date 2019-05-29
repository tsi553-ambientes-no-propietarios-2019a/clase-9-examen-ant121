<?php
session_start();

if(empty($_POST['username']) || empty($_POST['password'])){
    header('Location: ../index.php?error_message=Llene todos los campos!');
}else{
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
   
       $conn = new mysqli('localhost','root','','examen1');
   
       $sql_insert = "SELECT * FROM usuarios WHERE username = '$username' AND password=MD5('$password')";
       $res=$conn->query($sql_insert);
   
       if($conn->error){
           echo $sql_insert;
           header('Location: ../index.php?error_message=Ocurrio un error: ' . $conn->error);
           exit;
       }
       
       if($res->num_rows > 0){
           while($row = $res-> fetch_assoc()){
               session_start();
               $_SESSION['user'] = ['username' =>$row['username'], 'id'=>$row['id'], 'nombre'=>$row['nombre'], 'rol'=>$row['rol']];

               if($_SESSION['user']['rol'] == 'Administrador'){
                header('Location: ../paginas/admin.php');
                exit;
               }elseif($_SESSION['user']['rol'] == 'Cliente'){
                header('Location: ../paginas/cliente.php');
                exit;
               }
           } 
       }else{
           header('Location: ../index.php?error_message=Usuario o contraseña incorrectos.!');
           exit;
       }
    }else{
       header('Location: ../index.php');
       exit;
    }
}

?>