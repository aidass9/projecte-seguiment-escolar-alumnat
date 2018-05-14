<table border="1">
    <?php
 foreach ($alumnos as $alumno) {
   echo "<tr>";
    echo "<td>".$alumno->apellido1."</td>";
     echo "<td>".$alumno->nombre."</td>";
     echo "<td>".$alumno->telefono1."</td>";
   echo "</tr>";
 }
 ?>
</table>
