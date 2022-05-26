<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Modificar Alumnos</title>
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!$_SESSION['login']){
        echo "<script> window.location='./index.php'</script>";    
}
include './proc/conexion.php';
?>
    <?php

        include './proc/conexion.php';
        $dni = $_POST['dni_alu'];
        $nom = $_POST['nom_alu'];
        $cog1 = $_POST['cognom1_alu'];
        $cog2 = $_POST['cognom2_alu'];
        $telf = $_POST['telf_alu'];
        $email = $_POST['email_alu'];
        $clase = $_POST['classe'];
        $id = $_POST['id'];

        $sql = "UPDATE `tbl_alumne` SET `dni_alu` = '$dni', `nom_alu` = '$nom', `cognom1_alu` = '$cog1', `cognom2_alu` = '$cog2', `telf_alu` = '$telf', `email_alu` = '$email', `classe` = '$clase' WHERE `id_alumne`= $id";
        mysqli_query($connection, $sql);

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Registro modificado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('./adminalu.php');
    </script>

</body>
</html>