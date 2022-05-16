<?php
include './proc/conexion.php';

$DNI1=$_POST['logDNI'];
$nombre1=$_POST['lognombre'];
$apellido1=$_POST['logapellido1'];
$apellido2=$_POST['logapellido2'];
$email1=$_POST['logemail'];
$telf1=$_POST['logtelf'];
$clase1=$_POST['logclase'];
$pass1=$_POST['logpass'];
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




$sql = "INSERT INTO tbl_alumne (dni_alu, nom_alu, cognom1_alu,cognom2_alu, email_alu, telf_alu, classe, passwd_alu) VALUES ('$DNI1', '$nombre1', '$apellido1','$apellido2', '$email1', '$telf1','$clase1','$pass1');";
 $insert = mysqli_query($connection, $sql);

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

    