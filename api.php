<?php

class Calculadora
{
    public function calcular($operacion)
    {
        $operadores = ['+', '-', '*', '/'];
        $resultado = null;//?aca almacenamos el resultado

        foreach ($operadores as $operador) {//?iteramos cada operador
            if (strpos($operacion, $operador) !== false) {//!verifica si un operador específico está presente 
                $partes = explode($operador, $operacion);//?aca usamos explode para separar antes y desps del operador 

                if (count($partes) !== 2) {
                    echo $operacion;
                    return;//!validamos que al menos sean dos numeros para poder realizar la operacion
                }

                $num1 = floatval($partes[0]);//?con floatval obtenemos el valor float de los valores en las posiciones deseada del array
                $num2 = floatval($partes[1]);//?cada vez que agregamos un operador, los valores de los nums cambian, num1 seria la operacion ya resuelta y num2 el nuevo numero

                switch ($operador) {
                    case '+':
                        $resultado = ($resultado === null) ? $num1 + $num2 : $resultado + $num2;// TODO: el operador ternario nos dice que si resultado es nulo , el resultado seria la resolucion de la operacion,pero si esta lleno seria el resultado anterior mas el nuevo
                        break;
                    case '-':
                        $resultado = ($resultado === null) ? $num1 - $num2 : $resultado - $num2;
                        break;
                    case '*':
                        $resultado = ($resultado === null) ? $num1 * $num2 : $resultado * $num2;
                        break;
                    case '/':
                        if ($num2 != 0) {
                            $resultado = ($resultado === null) ? $num1 / $num2 : $resultado / $num2;
                        } else {
                            echo "La división por cero no es valida";
                            return;
                        }
                        break;
                }
            }
        }

        if ($resultado !== null) {
            echo $resultado;
        } else {
            echo $operacion;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['num'])) {
        $operacion = $_POST['num'][0];
        
        $calculadora = new Calculadora();
        $calculadora->calcular($operacion);
    }
}

?>