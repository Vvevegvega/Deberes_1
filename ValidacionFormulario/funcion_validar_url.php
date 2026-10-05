<?php

    function validar_url($websiteErr):bool{
        $websiteErr="Web incorrecta correcto";

        if (empty($websiteErr)) {
            $websiteErr = "La website no puede estar vacía";
            return false;
        } else {
            if (!filter_var($websiteErr, FILTER_VALIDATE_URL)) {
                $websiteErr = "Fomato de web invalido";
                return false;
            }
    
        }
        return true;
    }