<?php
session_start();

declare(strict_types=1);


require_once ('./layout-structure.php');
require_once ('./functions-structure.php');
  

myHeader();
myMenu();



echo "Bienvenido al ejercicio 1 .<br>";
echo "Tu nombre es  " . $_SESSION["nombre"] . ".<br>";
echo "Tu color favorito es " . $_SESSION["favColor"] . ".<br>";
echo "Tu animal favorito es " . $_SESSION["favAnimal"] . ".<br>";

if(isset($_SESSION["contador"])) {
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}

echo ($_SESSION["contador"]);


?>


<body>

<div>
    <h1> Ejercicio 1 </h1>

    <?php

        //declaramos array vacío
        $icons = array();

        //random size
        $size_array = rand(1,20);

        //Cargando icons
        cargarIconos($size_array, $icons);

        //mostrando Icons
        echo "<h1> ---- Cargando Icons ---- </h1>";
        // echo "<hr>";
        mostrarArrayIcons($icons);


        //eliminar icons
        echo "<hr>";
        echo "<h1> ---- Eliminando el primero ---- </h1>";
        eliminarPrimero($icons);
        mostrarArrayIcons($icons);


        //añadir al ultimo del array
        echo "<hr>";
        echo "<h1> ---- Añadiendo al ultimo ---- </h1>";
        addUltimo($icons);
        mostrarArrayIcons($icons);
        
    ?>
</div>

</body>