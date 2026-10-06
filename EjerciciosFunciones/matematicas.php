<?php

    function solve($a, $b, $c){
        if($a == 0){
            return false;
        }

        $delta = ($b*$b) - (4*$a*$c);
        
        //NO real solutions
        if($delta < 0){
            return false;
        }

        $delta = sqrt($delta);

        //Real solutions
        if( $delta == 0){
            //1 real solution 2 times
           return (-$b + $delta) / 2*$a;
        }else {
            //2 real solutions 1 time each
            $alpha = (-$b + $delta) / (2*$a);
            $beta = (-$b - $delta) / (2*$a);

            $soluciones = array("alpha" => $alpha, "beta"=> $beta);
            return $soluciones;
        }
    }