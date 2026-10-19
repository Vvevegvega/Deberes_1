<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST' 
        && isset($_POST['colorApp'])){

        $colorVariable = $_POST['colorApp'];

        setcookie( "colorCookie", $colorVariable, [
                    'expires' => time() + 300000,
                    'path' => '/',
                    'domain' => 'localhost',
                    'secure' => false,
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
    }

    $colorForm = isset($_COOKIE['colorCookie']) 
        ? $_COOKIE['colorCookie'] 
        : "lightgrey";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?php echo $colorForm; ?> ">
    <form method="POST" action="" >
        Color aplicacion <input type="text" name="colorApp" value="<?php echo $colorForm; ?>">
        <input type="submit" value="Guardar Cookie">
    </form>
</body>
</html>