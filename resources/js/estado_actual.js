// const $grafica = document.querySelector("#TELMEX");
const grafica = document.getElementById('TELMEX');
const etiquetas = [1, 2, 3, 4]
let datosTelmex;
let background;

setInterval(() => {
    $.ajax({
        type: 'GET',
        url: 'estado',
        success: function (datos) {
            if (datos.tiempos[0] >= 5 | datos.tiempos[1] >= 5 | datos.tiempos[2] >= 5 | datos.tiempos[3] >= 5) {
                background = 'rgba(255, 0, 0,';
            } else {
                background = 'rgba(0, 255, 0,';
            }

            datosTelmex = {
                label: datos.nombre,
                data: [datos.tiempos[0], datos.tiempos[1], datos.tiempos[2], datos.tiempos[3]],
                backgroundColor: background + '0.1)',
                borderColor: background + '1)',
                borderWidth: 1,
            };

            crearChart(etiquetas, datosTelmex);
        },
        error: function (error) {
            console.log(error);
        }
    })
}, 5000);

function crearChart(etiquetas, datos) {
    new Chart(grafica, {
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