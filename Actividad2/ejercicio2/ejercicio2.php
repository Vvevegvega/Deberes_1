<?php
    $alumnos = array(
        "Martin" => 7,
        "Carmen" => 8,
        "Alan" => 3,
        "Bea" => 10,
        "Roberto" => 5,
        "Paula" => 2
    );

    $aprobados = array_filter($alumnos, fn($alumno) => $alumno >= 5);
    uasort($alumnos, fn($alumno1, $alumno2) => $alumno2 <=> $alumno1);

    echo "<table>";
    echo "<tr>";
        echo "<th>Alumno</th>";
        echo "<th>Nota</th>";
    echo "</tr>";
        foreach($alumnos as $alumno => $nota){
            echo "<tr>";
                echo "<td> ". $alumno ."</td>";
                echo "<td> ". $nota ."</td>";
            echo "</tr>";
        }
    echo "</table>";

    echo "<table>";
    echo "<tr>";
        echo "<th>Nota media</td>";
        echo "<td>". array_reduce($alumnos, fn($carry, $alumno) => $carry += $alumno) ."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Numero aprobados</th>";
        echo "<td>". count($aprobados) ."</td>";
    echo "</tr>";
    echo "</table>";