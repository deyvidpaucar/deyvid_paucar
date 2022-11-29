<?php
session_start();

//se valida que exista una sesion iniciada
if($_SESSION["nombre"]=="" || $_SESSION["nombre"]== null){
    header("Location:loggin_index.php");
}

$idioma= "es";
if(isset($_GET['lang'])){
    setcookie("lang",$_GET['lang'],time()+(60*60*24*30));
    $idioma = $_GET['lang'];
}else{
    if(isset($_COOKIE['lang'])){
        $idioma = $_COOKIE['lang'];
    }
}

?>
<!Doctype html>
<html>
    <head>
    </head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h3>Bienvenido Usuario: <?php echo $_SESSION["nombre"];  ?></h3>
        <p><a href="menu_principal.php?lang=es">ES (Español)</a>|<a href="menu_principal.php?lang=en"> EN (English)</a></p>
        <p><a href="cerrar_sesion.php">Cerrar Sesion</a></p>
    

        <?php 
        #abrimos los ficheros con las categorias
            $fichero_categorias = null;
            if($idioma=="es"){
                $fichero_categorias ="categorias_es.txt"; 
                echo "<h2>Lista de Productos</h2>";

            }else{
                $fichero_categorias ="categorias_en.txt";
                echo "<h2>Product List</h2>"; 
            }
            
            $fichero = fopen($fichero_categorias, "r");
            while (!feof($fichero)){
                $linea = fgets($fichero);
                echo $linea."<br>";
            }
            fclose ($fichero);
        ?>
    </body>
</html>