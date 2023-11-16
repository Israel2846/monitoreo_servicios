const etiquetas = [1, 2, 3, 4]
let datosGrafica;
let background;
let grafica;
let perdidas = 0;
let bandera = 0;

repeticiones();

setInterval(() => {
    repeticiones();
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

function repeticiones() {
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

                if (datos[index].tiempos[0] == null && datos[index].tiempos[1] == null && datos[index].tiempos[2] == null && datos[index].tiempos[3] == null && bandera == 0) {
                    perdidas += 1;
                }

                if (perdidas >= 4 && bandera == 0) {
                    crearIncidencia();
                    bandera = 1;
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
}

function crearIncidencia() {
    $.ajax({
        type: 'GET',
        url: 'incidencia/store',

        success: function () {
            console.log('Incidencia creada con exito');
        },

        error: function (error) {
            console.log(error);
        }
    })
}