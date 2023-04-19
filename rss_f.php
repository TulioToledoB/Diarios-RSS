<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <title>Diarios seleccionado</title>
    <style>
	.btn{
    background-color: yellow;
    display: block;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 900;
    padding: 1rem;
    margin:1rem;
    transition: background-color .3s ease-out;
    text-align: center;
    border:none;
}

.btn:hover{
    background-color: yellow;
    cursor:pointer;

}
    </style>
	<body>
<?php
$enlace = mysqli_connect('localhost','prova','prova', 'rss');
            if (!$enlace) {
                    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }
                
			echo "<form action ='rss_i.php'>";
			echo "<input type = 'submit' class ='btn btn-link' value='Volver'>";
			echo "</form>";
			
            $sql=mysqli_query($enlace, "SELECT * FROM rss WHERE Codi=".$_POST['rsse']."");
                
            $row = mysqli_fetch_array($sql);
            $URL=$row[2];
    
    $pagina_inicio = file_get_contents($URL);
    
	if (isset($_POST["elegir"])) {
    $elegir = $_POST["elegir"];
	
	$sql = mysqli_query($enlace, "SELECT URL FROM rss WHERE Codi=".$_POST['elegir']."");
    
    $URL = $row["URL"];
    
    $feed = simplexml_load_file($URL);
    
    switch ($elegir) {
        case 1:
            // Acción para la opción 1
            echo "<ul>";
            foreach ($feed->channel->item as $entry) {
                $title = $entry->title;
                echo "<li>$title</li>";
            }
            echo "</ul>";
            break;
        case 2:
            // Acción para la opción 2
            echo "<ul>";
            foreach ($feed->channel->item as $entry) {
                $image = $entry->enclosure['url'];
                if (!$image) {
                    $image = "default.jpg";
                }
                echo "<li><img src='$image'></li>";
            }
            echo "</ul>";
            break;
        case 3:
            // Acción para la opción 3
            echo "<table>";
            foreach ($feed->channel->item as $entry) {
                $title = $entry->title;
                $image = $entry->enclosure['url'];
                if (!$image) {
                    $image = "default.jpg";
                }
                echo "<tr>";
                echo "<td><img src='$image'></td>";
                echo "<td>$title</td>";
                echo "</tr>";
            }
            echo "</table>";
            break;
        default:
            // Acción para cualquier otra opción
            break;
    }
}
    
   

?>
</body>
</html>


