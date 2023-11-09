const $grafica = document.querySelector("#grafica");
const etiquetas = [1, 2, 3, 4]
let datosTelmex;

$.ajax({
    type: 'GET',
    url: 'estado',
    success: function (datos) {
        datosTelmex = {
            label: "Telmex",
            data: [datos[0], datos[1], datos[2], datos[3],],
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        };

        console.log(datosTelmex);
        crearChart(etiquetas, datosTelmex);
    },
    error: function (error) {
        console.log(error);
    }
})

function crearChart(etiquetas, datos) {
    new Chart($grafica, {
        type: 'line',
        data: {
            labels: etiquetas,
            datasets: [datos]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}


