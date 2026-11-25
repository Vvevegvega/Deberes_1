<?php
    const EMOJIS = array(
        '👽', 
        '🤖', 
        '😾', 
        '💕', 
        '🧙‍♂️', 
        '🤺', 
        '🍂', 
        '⚡', 
        '🌈', 
        '😆' 
    );

    function emojisDisponibles(int $num): array{
        return array_slice(EMOJIS, 0, $num);
    }

    function emojiAleatorio(array $emojis): string{
        return $emojis[array_rand($emojis)];
    }

    function validarContacto(array $contacto): array
    {
        $errores = [];

        if (trim($contacto['nombre'] ?? '') === '') {
            $errores['nombre'] = 'El nombre es obligatorio.';
        }

        if (trim($contacto['apellidos'] ?? '') === '') {
            $errores['apellidos'] = 'Los apellidos son obligatorios.';
        }

        if (trim($contacto['telefono'] ?? '') === '') {
            $errores['telefono'] = 'El teléfono es obligatorio.';
        } elseif (!ctype_digit(trim($contacto['telefono'])) || strlen(trim($contacto['telefono'])) !== 9) {
            $errores['telefono'] = 'El teléfono debe tener 9 dígitos.';
        }

        if (trim($contacto['email'] ?? '') === '') {
            $errores['email'] = 'El email es obligatorio.';
        } elseif (!filter_var(trim($contacto['email']), FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El email no es válido.';
        }

        return $errores;
    }

    function pintarFormularioContacto(int $i, string $emoji, array $valores, array $errores): string
    {
        $html  = '<div>';
        $html .=  $emoji ;

        $html .= '<label> Nombre :';
        $html .= '<input type="text" name="nombre_' . $i . '" value="' . $valores['nombre'] . '">';
        $html .= '</label>';
        if (isset($errores['nombre'])) {
            $html .= '<span style="color:red">' .$errores['nombre'] . '</span>';
        }

        $html .= '<label> Apellido: ';
        $html .= '<input type="text" name="apellidos_' . $i . '" value="' . $valores['apellidos'] . '">';
        $html .= '</label>';
        if (isset($errores['apellidos'])) {
            $html .= '<span style="color:red">' .$errores['apellidos'] . '</span>';
        }

        $html .= '<label> Teléfono: ';
        $html .= '<input type="tel" name="telefono_' . $i . '" value="' . $valores['telefono'] . '">';
        $html .= '</label>';
        if (isset($errores['telefono'])) {
            $html .= '<span style="color:red">' .$errores['telefono'] . '</span>';
        }

        $html .= '<label> Email: ';
        $html .= '<input type="email" name="email_' . $i . '" value="' . $valores['email'] . '">';
        $html .= '</label>';
        if (isset($errores['email'])) {
            $html .= '<span style="color:red">' .$errores['email'] . '</span>';
        }

        $html .= '<br><br></div>';

        return $html;
    }
?>