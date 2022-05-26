<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
include './proc/conexion.php';

$DNI1=$_POST['log1DNI'];
$nombre1=$_POST['log1nombre'];
$apellido1=$_POST['log1apellido1'];
$apellido2=$_POST['log1apellido2'];
$email1=$_POST['log1email'];
$telf1=$_POST['log1telf'];
$dept1=$_POST['log1dept'];
$pass1=$_POST['log1pass'];
// $foto=$_POST['foto'];

$comprobar= "SELECT email_prof FROM tbl_professor;";
    $cons = mysqli_query($connection,$comprobar);
    $lista_emails=array();

    while ($fila = mysqli_fetch_assoc($cons)){
        $lista_emails[]=$fila['email_prof']; 
    }

if(!in_array($email1,$lista_emails)){
    $sql = "INSERT INTO tbl_professor (dni_prof, nom_prof, cognom1_prof,cognom2_prof, email_prof, telf, dept, passwd_prof) VALUES ('$DNI1','$nombre1', '$apellido1','$apellido2', '$email1', '$telf1','$dept1','$pass1');";
    $insert = mysqli_query($connection, $sql);
    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'Usuario repetido',
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
    <?php
    header("Location:./adminalu.php"); 
}else{
    ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario Repetido',
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
        aviso('./crear_prof.php.php');
    </script>
<?php
        header("Location:./crear_prof.php");
}

 ?>

<?php
    // header("Location: ./admin.php");
</body>
</html>
<?php



