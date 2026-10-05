<?php
    function validar_email($email):bool{
        $emailErr="Email correcto";

        if (empty($email)) {
            $emailErr = "El email no puede estar vacío";
            return false;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Fomato de Email invalido";
                return false;
            }
    
        }
        return true;
    }
?>
