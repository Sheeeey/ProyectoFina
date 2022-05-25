<?php
    $mysqli = new mysqli("localhost","root","","bd_escuela")

    $salida = "";
    $query = "SELECT * FROM tbl_alumne ORDER BY id_alumne";

    if(isset($_POST['consulta'])){
        $q = $mysqli-> real_escape_string($_POST['consulta']);
        $query = "SELECT id_alumne, dni_alumne, nom_alu, cognom1_alu,cognom2_alu,telf_alu,email_alu,classe FROM tbl_alumne
        WHERE dni_alu LIKE '%".$q."%' OR nom_alu LIKE '%".$q."%' OR cognom1_alu_alu LIKE '%".$q."%' OR cognom2_alu LIKE '%".$q."%' OR telf_alu LIKE '%".$q."%' OR email_alu LIKE '%".$q."%' OR classe LIKE '%".$q."%'";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        echo '<table>';
echo '<tr>';
echo '<th>DNI</th>';
echo '<th>Nombre</th>';
echo '<th>1r Apellido</th>';
echo '<th>2n Apellido</th>';
echo '<th>Correo</th>';
echo '<th>Clase</th>';
echo '<th>Telefono</th>';
echo '<th>Contraseña</th>';
if (!$_SESSION['login2']){
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';
}
    
while($fila = $resultado->fetch_assoc()){
    $salida.="<tr>
            <td>".$fila['dni_alu']."</td>
            <td>".$fila['nom_alu']."</td>
            <td>".$fila['cognom1_alu']."</td>
            <td>".$fila['cognom2_alu']."</td>
            <td>".$fila['telf_alu']."</td>
            <td>".$fila['email_alu']."</td>
            <td>".$fila['classe']."</td>
        </tr>";
}

$salida.="</tr></table>";
    }else{
        $salida.="No hay datos :(";
    }

    echo $salida;

    $mysqli->close();

