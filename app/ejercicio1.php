
<?php
/*
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.

SILVA CECILIA
*/
    $suma=0;
    $cantidad=0;
    for($i = 0 ; $suma+$i<=1000 ; $i++)
    {
        $suma = $suma+$i;
        $cantidad = $i;
    }

    printf("<br>numero sumado: ".$suma);
    printf("<br>cantidad numeros: ".$cantidad);
    
?>
