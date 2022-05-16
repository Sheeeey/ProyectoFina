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
    if (isset($_POST['insesion'])|| $_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['logemail'];
        $pwd = sha1($_POST['logpass']);
            //Subir datos a la tabla correspondiente

            //Procederemos a hacer una consulta que buscara el correo del usuario
            $sesion = "SELECT * from tbl_alumne WHERE email_alu='$email' and passwd_alu='$pwd';";

            //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
            $resultado = $connection->query($sesion);

            //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
            //esta funcion nos regresa el numero de filas en el resultado
            $contador = mysqli_num_rows($resultado);

            $datos = mysqli_fetch_assoc($resultado);
            //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
            if($contador == 1) {
                $_SESSION['session'] = true;
                $_SESSION['id'] = $datos['id_alumne'];
                $_SESSION['nom'] = $datos['nom_alu'];
                $_SESSION['email'] = $datos['email_alu'];
                echo "<script> window.location.href='./../view/usuario.php'</script>";
            }else {
             echo "<script> window.location.href='./../login.php?msg=1'</script>";   
            }
    }
?>
</body>
</html>