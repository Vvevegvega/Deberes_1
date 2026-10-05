<?php
    $familias = array(
        'Simpson' => 
            array('padre' => 'Homer','madre' => 'Marge','hijos' => 
                array('Bart', 'Lisa', 'Maggie')),

       'Griffyth' => 
            array('padre' => 'Peter','Lois' => 'Marge','hijos' => 
                array('Christ', 'Meg', 'Stewie'))
    );

    echo "<ul>";
    foreach(array_keys($familias) as $familia){
        echo "<li> Familia: " . $familia . "</li>";  
        foreach(array_keys($familias[$familia]) as $miembro){
            if(is_array($familias[$familia][$miembro] )){
                echo "<li>" . $miembro.": </li>"; 
                echo "<ul>";
                foreach($familias[$familia][$miembro] as $hijo){
                    echo "<li>" . $hijo."</li>";  
                }
                echo "</ul>";
            }else{
                echo "<li>" . $miembro . ": " .$familias[$familia][$miembro]."</li>";  
            }
            
        }
    }
    echo "</ul>";