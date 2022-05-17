<?php
include './proc/conexion.php';


$nombre1=$_POST['log1nombre'];
$apellido1=$_POST['log1apellido1'];
$apellido2=$_POST['log1apellido2'];
$email1=$_POST['log1email'];
$telf1=$_POST['log1telf'];
$dept1=$_POST['log1dept'];
$pass1=$_POST['log1pass'];
// $foto=$_POST['foto'];
// var_dump($_FILES);


// echo $nombre1;
// echo "<br>";
// echo $edad1;
// echo "<br>";
// echo $correo1;
// echo "<br>";
// echo $telefono1;
// echo "<br>";
// echo $apellido1;
// echo "<br>";
// print_r($_FILES);
// echo "<br>";
// print_r($_SERVER);


// echo $foto1['type'];
// echo "<br>";
// echo ($foto1['size'])/1024;




$sql = "INSERT INTO tbl_professor (nom_prof, cognom1_prof,cognom2_prof, email_prof, telf, dept, passwd_prof) VALUES ('$nombre1', '$apellido1','$apellido2', '$email1', '$telf1','$dept1','$pass1');";
$insert = mysqli_query($connection, $sql);
header("Location: ./admin.php");
 ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Proceso terminado',
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

        aviso('./admin.php');
    </script>
    