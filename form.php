<?php
//validamos datos del servidor
$host = "localhost";
$user = "root";
$pass = "";


//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);


//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "dha";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        //$instruccion_SQL = "INSERT INTO tabla_form (nombre, apellido, correo, telefono, mensaje)
                            // VALUES ('$nombre','$apellido','$correo','$telefono','$mensaje')";

        $instruccion_SQL = "INSERT INTO tabla_form (nombre, apellido, correo, telefono, mensaje) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$mensaje')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM tabla_form";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>nombre</th></h1>";
echo "<th><h1>apellido</th></h1>";
echo "<th><h1>correo</th></h1>";
echo "<th><h1>telefono</th></h1>";
echo "<th><h1>mensaje</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['apellido']. "</td></h2>";
    echo "<td><h2>" . $colum['correo'] . "</td></h2>";
    echo "<td><h2>" . $colum['telefono'] . "</td></h2>";
    echo "<td><h2>" . $colum['mensaje'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="contacto.html"> Volver Atrás</a>';


?>