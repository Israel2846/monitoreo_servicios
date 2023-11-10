// const $grafica = document.querySelector("#TELMEX");
const etiquetas = [1, 2, 3, 4]
let datosGrafica;
let background;
let grafica

setInterval(() => {
    $.ajax({
        type: 'GET',
        url: 'estado',
        success: function (datos) {
            for (let index = 0; index < datos.length; index++) {
                grafica = document.getElementById(datos[index].nombre);

                if (datos[index].tiempos[0] >= 6 | datos[index].tiempos[1] >= 6 | datos[index].tiempos[2] >= 6 | datos[index].tiempos[3] >= 6) {
                    background = 'rgba(255, 0, 0,';
                } else {
                    background = 'rgba(0, 255, 0,';
                }

                datosGrafica = {
                    label: datos[index].nombre,
                    data: [datos[index].tiempos[0], datos[index].tiempos[1], datos[index].tiempos[2], datos[index].tiempos[3]],
                    backgroundColor: background + '0.1)',
                    borderColor: background + '1)',
                    borderWidth: 1,
                };

                crearChart(etiquetas, datosGrafica);
            }
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