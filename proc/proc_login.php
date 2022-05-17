<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
<?php
    session_start();
    include 'conexion.php';
    if (isset($_POST['insesion'])){
        if (isset($_POST['logemail']) && isset($_POST['logpass'])){
            $email = $_POST['logemail'];
            $pwd = sha1($_POST['logpass']);
            $result = mysqli_query($connection,"SELECT COUNT(1) AS 'administradores' FROM tbl_admin WHERE email_admin = '$email' AND passwd_admin = '$pwd'");
    
            session_start();
            $_SESSION['login']=false;
    
            if (mysqli_fetch_assoc($result)['administradores'] > 0){
                $_SESSION['login']=true;
    
                echo "<script>alert('Bienvenido');</script>";
                echo "<script> window.location='../admin.php'</script>";
            }else{
                echo "<script>alert('Usuario incorrecto.');</script>";
                echo "<script> window.location='../login.php'</script>";

            }
    
    
        // }else{
        //     echo "<script> window.location='./login.php'</script>";
    
        }
        
    // }else{
    //     echo "<script> window.location='./login.php'</script>";
    }
    ?>
    <!-- // if (isset($_POST['insesion'])|| $_SERVER["REQUEST_METHOD"] == "POST") {
    //     $email = $_POST['logemail'];
    //     $pwd = sha1($_POST['logpass']);
    //         //Subir datos a la tabla correspondiente

    //         //Procederemos a hacer una consulta que buscara el correo del usuario
    //         $sesion = "SELECT * from tbl_admin WHERE email_admin='$email' and passwd_admin='$pwd';";

    //         //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
    //         $resultado = $connection->query($sesion);

    //         //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
    //         //esta funcion nos regresa el numero de filas en el resultado
    //         $contador = mysqli_num_rows($resultado);

    //         $datos = mysqli_fetch_assoc($resultado);
    //         //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
    //         if($contador == 1) {
    //             $_SESSION['session'] = true;
    //             $_SESSION['id'] = $datos['id_admin'];
    //             $_SESSION['email'] = $datos['email_admin'];
    //             echo "<script> window.location.href='admin.php'</script>";
    //         }else {
    //          echo "<script> window.location.href='proc_login.php?msg=1'</script>";   
    //         }
    // } -->
</body>
</html>