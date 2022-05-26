<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>CSV Alumno</title>
</head>
<body>
    

<?php

include './proc/conexion.php';

$comprobar= "SELECT id_alumne, dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, c.nom_classe as 'classe', passwd_alu
FROM tbl_alumne 
INNER JOIN tbl_classe c 
ON classe = c.id_classe;";
$cons = mysqli_query($connection,$comprobar);

if(!file_exists("bajarusuariosalu.csv")){
    file_put_contents("bajarusuariosalu.csv","DNI;Nombre;1r Apellido;2n Apellido;Correo;Clase:Telefono;Contrasena \n");
} 
foreach ($cons as $value) {

file_put_contents("bajarusuariosalu.csv","{$value['dni_alu']};{$value['nom_alu']};{$value['cognom1_alu']};{$value['cognom2_alu']};{$value['email_alu']};{$value['classe']};{$value['telf_alu']};{$value['passwd_alu']} \n",FILE_APPEND);

}
$servidor_ftp="172.24.16.214";
$usuario_ftp="usuarioftp";
$passwd_usuarioftp="qweQWE123";
$file = "bajarusuariosalu.csv";
$nombre_final = "alumnos.csv";


$conexion_ftp = ftp_connect($servidor_ftp);

$sesion_ftp = ftp_login($conexion_ftp, $usuario_ftp, $passwd_usuarioftp);


if (ftp_put($conexion_ftp, $nombre_final, $file, FTP_ASCII)) {
} else {
   echo "Hay un problema al subir el archivo $file\n";
   echo "<br><br><a href='adminalu.php'>Volver</a>";
   exit;
}

ftp_close($conexion_ftp);
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
</body>
</html>