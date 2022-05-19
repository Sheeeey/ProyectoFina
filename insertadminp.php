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


$sql = "INSERT INTO tbl_professor (dni_prof, nom_prof, cognom1_prof,cognom2_prof, email_prof, telf, dept, passwd_prof) VALUES ('$DNI1','$nombre1', '$apellido1','$apellido2', '$email1', '$telf1','$dept1','$pass1');";
$insert = mysqli_query($connection, $sql);
echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre1' agregado correctamente\");</script>";
header("Location:./admin.php"); 

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
        aviso('./crear_prof.php');
    </script>
<?php
    header("Location: ./admin.php");
?>
   