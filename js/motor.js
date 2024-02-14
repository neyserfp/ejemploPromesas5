const data1 = { nombre: "Velazquez", localidad: "Sevilla" };

// Llamada a la promesa (sintaxis 2)
async function postJSON(data1, url1, control1)
{
    try
    {
        // Envío de datos al Servidor
        const response = await fetch(url1, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data1),
        });

        // Devolución de datos del Servidor
        const result = await response.json();
        // Opción 1: Recepción de los datos provenientes de una Array Indexada
        //control1.innerHTML = result[0] + "<br>" + result[1];
        // Opción 2: Recepción de los datos provenientes de una Array Asociativa
        control1.innerHTML = result.nom01 + "<br>" + result.loc01;

        console.log("Success:", result);

    }
    catch(error)
    {
        console.log(error);
    }
}


window.addEventListener("load", function(event){

    const b1 = document.getElementById("b1");

    if (b1) {

        const url1 = "servidor.php";
        const control1 = document.getElementById("d1");

        b1.addEventListener("click", function (event) {
            // Pertmite una petición asíncrona
            event.preventDefault();
            // Llamada al método que realiza la petición al servidor
            postJSON(data1, url1, control1);

    });
    }

});

