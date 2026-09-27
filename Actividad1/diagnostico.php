<?php

    /*4.1 
        He tenido que meterme dentro de la carpeta de XAMPP php porque si no, el ordenador no
        me detectaba php. Se ve que XAMPP no lo añade al PATH de windows y o bien lo añades
        manualmente o bien inicias el cmd desde la propia carpeta. Lo he añadido al path

        He iniciado el servidor en el puerto 8000 desde la carpeta donde tengo el proyecto
    */

    /*4.2
        He creado este archivo y vamos a usar el comando phpinfo() y vamos a acceder a el usando
        http://localhost:8000/diagnostico.php

        OJO => la carpeta desde donde hacemos el comando php -S localhost:8000 es la carpeta raiz 
        del servidor, por eso la url es asi

        La carpeta de configuracion nos sale en C:\xampp\php\php.ini
    */

    /*4.3
        La carpeta de configuracion nos sale en C:\xampp\php\php.ini

        He abierto el fichero con vs code y usando Ctrl + F he buscado los valores y sustituido por
        los que se pedia en el ejercicio.

        Es importante que durante los entornos de produccion real este apagada la directiva de
        display error porque se mostraria informacion interna del servidor y podria ser usada
        para ataques. 

        Mientras desarrollamos toda informacion es util, pero hay que tener cuidado de no dejar que
        esa misma informacion llegue a manos equivocadas.
    */


    phpinfo();

?>