<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diarios</title>
    <style>
html{
    box-sizing: border-box;
	
}

body{
    font-family: fantasy;
    font-size: 1,6rem;
	background-image: url('https://t1.uc.ltmcdn.com/es/posts/9/0/3/diferencia_entre_mar_y_oceano_44309_orig.jpg');
	
}
.nombre{
    margin-top: 50px;
    margin-bottom: 50px;
    text-align: center;
	background-color: yellow;
}



    .formulario{
        max-width: 40rem;
        margin: 0 auto;

    }
    .formulario fieldset{
        border: 6px double #157B99;
        margin-bottom: 2rem;
    }

   

    .secciones{
        display: flex;
        margin-bottom: 1rem;
    }

    .secciones label{
        flex-basis: 10rem;
    }
    .secciones select {
        flex: 1;
        border: 1px solid #e1e1e1;
        padding: 1rem;
    }
    .btn{
    background-color: yellow;
    display: block;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 900;
    padding: 1rem;
    margin-left: 32rem;
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
    <header>
        <h1 class="nombre">RSS de los mejores Diarios</h1> 
    </header>
    <main >
        <form class ="formulario" action="rss_f.php" method="POST">
            <fieldset>
              
                <div class="secciones">
                    <label for="diarios">Diarios</label>

            <?php
                        $enlace = mysqli_connect('localhost','prova','prova', 'rss', );
                        if (!$enlace) {
                                echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                                echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                                echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                                exit;
                            }
                            
                        echo "<SELECT name='rsse' id='rsse'>";
                        $sql=mysqli_query($enlace, "SELECT * FROM rss ORDER BY Nombre");
                            
                                    while ($row = mysqli_fetch_array($sql)){
                
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                }
                        echo "</SELECT>"
						
						
                       
                        
            ?>
                    </div>
					<div class="secciones">
                    <label for="elegir">Opciones</label>
					<select name="elegir" id="elegir" class="form-select" action="rss_f.php" method="POST">
						<option value="1">Titulares</option>
						<option value="2">Fotos</option>
						<option value="3">Titulares y fotos</option>
		
					</select>

           
                    </div>
                </fieldset>  
            <input type="submit" class="btn btn-dark" value="Mostrar">
            </form>
    </main>
</body>
</html>


