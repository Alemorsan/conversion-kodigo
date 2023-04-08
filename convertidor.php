<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="covertidos.php" method="post">
    <input type="number" name="valor" id="" placeholder="ingrese el valor">
        <select id="select-principal" name="unidad">
            <option value="">Seleccione una la unicad de medida</option>
            <option value="masa">Masa</option>
            <option value="longitud">Longitud</option>
            <option value="datos">Datos</option>
            <option value="moneda">Moneda</option>
            <option value="tiempo">Tiempo</option>
            <option value="volumen">Volumen</option>
        </select>

        <select id="unidad_actual" disabled name="unidad_actual">
            <option value="">Seleccione unidad actual</option>
        </select>

        <select id="unidad_a_convertir" disabled name="unidad_a_convertir">
            <option value="">Seleccione unidad a convertir</option>
        </select>
        <input type="submit" value="enviar"> 
    </form>

    <script>
        var selectPrincipal = document.getElementById("select-principal");
        var selectSecundario1 = document.getElementById("unidad_actual");
        var selectSecundario2 = document.getElementById("unidad_a_convertir");

        selectPrincipal.addEventListener("change", function() {
            // Obtener el valor seleccionado en el select principal
            var valorSeleccionado = selectPrincipal.value;

            function mappedSelectsByElement(values) {
                const mappedValues = values.map(value => {
                    const name = value.replaceAll('_', ' ');
                    return `<option value="${value}">${name.charAt(0).toUpperCase()}${name.substring(1)}</option>`;
                })
                const stringItems = mappedValues.join("\n");
                return stringItems;
            }

            function updateSelects(itemValue) {
                selectSecundario1.disabled = false;
                selectSecundario2.disabled = false;
                const mappedMasaUnits = mappedSelectsByElement(itemValue);
                selectSecundario1.innerHTML = `
                <option value="" disabled selected>Seleccione unidad actual</option>
        ${mappedMasaUnits}
      `;
                selectSecundario2.innerHTML = `
                <option value="" disabled selected>Seleccione unidad a convertir</option>
        ${mappedMasaUnits}
      `;
            }
            // Habilitar los otros dos selects y agregar las opciones correspondientes
            const longitudValues = ['centimetro', 'pie', 'yarda', 'metro', 'kilometro', 'milla'];
            const volumeValues = ['metro_cubico', 'litro', 'galon', 'pinta'];
            const masaValues = ['kilogramo', 'gramo', 'libra', 'onza'];
            const datosValues = ['byte', 'kilobyte', 'megabyte', 'gigabyte', 'terabyte'];
            const monedaValues = ['dolar', 'euro', 'libra_esterlina', 'yen', 'quetzal'];
            const tiempoValues = ['segundo', 'minuto', 'hora', 'dia', 'semana', 'mes', 'año'];

            if (valorSeleccionado === "masa") {
                updateSelects(masaValues);
            } else if (valorSeleccionado === "volumen") {
                updateSelects(volumeValues);
            } else if (valorSeleccionado === 'longitud') {
                updateSelects(longitudValues);
            } else if (valorSeleccionado === 'datos') {
                updateSelects(datosValues);
            } else if (valorSeleccionado === 'moneda') {
                updateSelects(monedaValues);
            } else if (valorSeleccionado === 'tiempo') {
                updateSelects(tiempoValues);
            }
        });
    </script>

</body>

</html>