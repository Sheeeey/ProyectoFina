
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
    <?php
    header("Location:./adminalu.php"); 
}else{
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
        aviso('./adminalu.php');
    </script>
<?php
        header("Location:./crear_prof.php");
}

 ?>

<?php
    // header("Location: ./admin.php");

