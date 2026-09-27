<?php

    $metodo = $_SERVER['REQUEST_METHOD'];

    echo "El método de la petición es: " . $metodo;


/*
    2.1
        Request Header POST
            accept
            text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,* /*;q=0.8,application/signed-exchange;v=b3;q=0.7
            accept-encoding
            gzip, deflate, br, zstd
            accept-language
            es-ES,es;q=0.9
            cache-control
            max-age=0
            connection
            keep-alive
            content-length
            13
            content-type
            application/x-www-form-urlencoded
            host
            localhost
            origin
            http://localhost
            referer
            http://localhost/Deberes_1/Actividad1/ejercicio2.html
            sec-ch-ua
            "Chromium";v="148", "Google Chrome";v="148", "Not/A)Brand";v="99"
            sec-ch-ua-mobile
            ?0
            sec-ch-ua-platform
            "Windows"
            sec-fetch-dest
            document
            sec-fetch-mode
            navigate
            sec-fetch-site
            same-origin
            sec-fetch-user
            ?1
            upgrade-insecure-requests
            1
            user-agent
            Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36
        
        Response Header POST
            connection
            Keep-Alive

            content-length
            35
            content-type
            text/html; charset=UTF-8
            date
            Sun, 27 Sep 2026 13:31:45 GMT
            keep-alive
            timeout=5, max=98
            server
            Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
            x-powered-by
            PHP/8.2.12


        Request Header GET
            accept
            text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,* /*;q=0.8,application/signed-exchange;v=b3;q=0.7
            accept-encoding
            gzip, deflate, br, zstd
            accept-language
            es-ES,es;q=0.9
            connection
            keep-alive
            host
            localhost
            referer
            http://localhost/Deberes_1/Actividad1/ejercicio2.html
            sec-ch-ua
            "Chromium";v="148", "Google Chrome";v="148", "Not/A)Brand";v="99"
            sec-ch-ua-mobile
            ?0
            sec-ch-ua-platform
            "Windows"
            sec-fetch-dest
            document
            sec-fetch-mode
            navigate
            sec-fetch-site
            same-origin
            sec-fetch-user
            ?1
            upgrade-insecure-requests
            1
            user-agent
            Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36

        Response Header GET
            connection
            Keep-Alive
            content-length
            34
            content-type
            text/html; charset=UTF-8
            date
            Sun, 27 Sep 2026 13:36:52 GMT

            keep-alive
            timeout=5, max=94
            server
            Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
            x-powered-by
            PHP/8.2.12

            /*
    2.2
        Quitando un punto y coma, la pagina no se veia correctamente 
        y me anunciaba el error, pero la respuesta seguia siendo 200, 
        se ve que depende de la confguracion del servidor y el navegador.

        No he conseguido que me de ningun error 500. pero en general cuando hay un error de
        la familia de los 500 quiere decir que ha habido un error dentro del codigo del 
        servidor, no es cosa tuya

        Por el contrario, un error de cliente como el famosos 404 tiene que ver con que el cliente
        no ha funcionado correctamente, ya bien sea porque el recurso que busca no existe o porque el tiempo
        de espera fue demasiado largo. Son errores que no tienen que ver con el codigo que existe en el servidor
*/