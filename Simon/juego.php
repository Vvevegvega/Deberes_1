<?php

    require("pintar-circulos.php");

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8){
            pintar_circulos(generar_colores($_POST["numBotones"]));
        }else{
            //Avisar en el formulario
        }
    }
?>