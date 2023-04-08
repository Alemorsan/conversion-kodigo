<?php

class ConversorUnidades {
    private $factores;
  // medidas   
    public function __construct() {
        $this->factores = array(
            "longitud" => array(
                "metro" => 1,
                "centimetro" => 100,
                "pulgada" => 39.3701,
                "pie" => 0.3048,
                "yarda" => 0.9144,
                "milla" => 1609.344,
                "kilometro" => 1000,
                "milimetro" => 0.001,
            ),
            "masa" => array(
                "kilogramo" => 1,
                "gramo" => 0.001,
                "libra" => 0.453592,
                "onzas" => 0.0283495,
            ),
            "volumen" => array(
                "metro_cubico" => 1,
                "litro" => 0.001,
                "galon" => 0.00378541,
                "pinta" => 0.000473176,
            ),
            "datos" => array(
                "byte" => 1,
                "kilobyte" => 1024,
                "megabyte" => 1048576,
                "gigabyte" => 1073741824,
                "terabyte" => 1099511627776
            ),
            "moneda" => array(
                "dolar" => 1,
                "euro" => 1.18288,
                "libra_esterlina" => 1.38649,
                "yen" => 0.00907292,
                "quetzal" => 0.1282
            ),
            "tiempo" => array(
                "segundo" => 1,
                "minuto" => 60,
                "hora" => 3600,
                "dia" => 86400,
                "semana" => 604800,
                "mes" => 2628000,
                "año" => 31536000,
            )
        );
    }
    
    public function convertirUnidades($cantidad, $unidad_actual, $unidad_a_convertir, $unidad) {
        // Comprobar que las unidades son válidas
        if (!array_key_exists($unidad_actual, $this->factores[$unidad]) || !array_key_exists($unidad_a_convertir, $this->factores[$unidad])) {
            return "Unidades no válidas";
        }

        // Realizar la conversión
        $resultado = $cantidad * $this->factores[$unidad][$unidad_a_convertir];
        return number_format($resultado, 2); // Mostrar el resultado con dos decimales
    }
    
    public function mostrarTabla($cantidad, $de, $unidad_a_convertir, $resultado) {
        echo "<table>";
        echo "<tr><th colspan='2'>Resultado</th></tr>";
        echo "<tr><td>$cantidad $de</td><td>$resultado $unidad_a_convertir</td></tr>";
        echo "</table>";
    }
}

$valor= $_REQUEST["valor"];
$unidad_actual= $_REQUEST["unidad_actual"];
$unidad_a_convertir= $_REQUEST["unidad_a_convertir"];
$unidad=$_REQUEST["unidad"];

$unidades= new ConversorUnidades();
$resultado=$unidades->convertirUnidades($valor, $unidad_actual,$unidad_a_convertir,$unidad);
$unidades->mostrarTabla($valor, $unidad_actual,$unidad_a_convertir,$resultado);


?>
