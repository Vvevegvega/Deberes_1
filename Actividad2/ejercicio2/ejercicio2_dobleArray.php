<?php
    $alumnos = array(
        array('nombre'=> 'Martin', 'nota'=>7),
        array('nombre'=> 'Carmen', 'nota'=>8),
        array('nombre'=> 'Alan', 'nota'=>3),
        array('nombre'=> 'Bea', 'nota'=>10),
        array('nombre'=> 'Roberto', 'nota'=>5),
        array('nombre'=> 'Paula', 'nota'=>2)
    );

    $aprobados = array_filter($alumnos, fn($alumno) => $alumno['nota'] >= 5);
    uasort($alumnos, fn($alumno1, $alumno2) => $alumno2['nota'] <=> $alumno1['nota']);

    echo "<table>";
    echo "<tr>";
        echo "<th>Alumno</th>";
        echo "<th>Nota</th>";
    echo "</tr>";
        foreach($alumnos as $alumno){
            echo "<tr>";
                echo "<td> ". $alumno['nombre'] ."</td>";
                echo "<td> ". $alumno['nota'] ."</td>";
            echo "</tr>";
        }
    echo "</table>";

    echo "<table>";
    echo "<tr>";
        echo "<th>Nota media</td>";
        echo "<td>". array_reduce($alumnos, fn($carry, $alumno) => $carry += $alumno['nota']) ."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Numero aprobados</th>";
        echo "<td>". count($aprobados) ."</td>";
    echo "</tr>";
    echo "</table>";