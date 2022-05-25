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
            $pwdprof = sha1($_POST['logpass']);
            $result = mysqli_query($connection,"SELECT COUNT(1) AS 'administradores' FROM tbl_admin WHERE email_admin = '$email' AND passwd_admin = '$pwd'");
            $resultp = mysqli_query($connection,"SELECT COUNT(1) AS 'profesores' FROM tbl_professor WHERE email_prof = '$email' AND passwd_prof = '$pwdprof'");
            $_SESSION['login']=false;
            $_SESSION['login2']=false;
    
            if (mysqli_fetch_assoc($result)['administradores'] > 0){
                $_SESSION['login']=true;
                
                echo "<script>alert('Bienvenido');</script>";
                echo "<script> window.location='../adminalu.php'</script>";
            }else{
               
            if (mysqli_fetch_assoc($resultp)['profesores'] > 0){
                    $_SESSION['login2']=true;
                    
                    echo "<script>alert('Bienvenido');</script>";
                    echo "<script> window.location='../adminalu.php'</script>";
            }else{
                    echo "<script>alert('Usuario incorrecto.');</script>";
                    echo "<script> window.location='../index.php'</script>";
    
                }

            }

    
        }

    }

    ?>
</body>
</html>