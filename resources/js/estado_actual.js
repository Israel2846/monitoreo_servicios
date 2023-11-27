const etiquetas = [1, 2, 3, 4]
let datosGrafica;
let background;
let grafica;
let perdidas = new Array(15).fill(0);
let control_perdidas = new Array(15).fill(0);

// Ciclo repetitivo para monitorear el estado de servicios, crear y eliminar incidencias
function repeticiones() {
    // Petición a controlador para saber el ping con el que nos responden los servicios
    $.ajax({
        type: 'GET',
        url: 'estado',
        success: function (datos) {
            console.log(perdidas);
            // Recorrido de cada servicio
            for (let index = 0; index < datos.length; index++) {
                // asignación de grafica según el nombre del servicio
                grafica = document.getElementById(datos[index].nombre);
                // Control para saber si tiene incidencia en este momento
                let activo = datos[index].activo;

                // Asignación de color a gráfica
                if (datos[index].tiempos[0] >= 6 || datos[index].tiempos[1] >= 6 || datos[index].tiempos[2] >= 6 || datos[index].tiempos[3] >= 6) {
                    background = 'rgba(255, 0, 0,';
                } else {
                    background = 'rgba(0, 255, 0,';
                }

                // Función si es que el activo no tiene incidencia en este momento
                if (activo == 1) {
                    if (datos[index].tiempos[0] == null && datos[index].tiempos[1] == null && datos[index].tiempos[2] == null && datos[index].tiempos[3] == null && activo == 1) {
                        perdidas[index] += 1;
                    }

                    if (perdidas[index] < 4 && (datos[index].tiempos[0] != null && datos[index].tiempos[1] != null && datos[index].tiempos[2] != null && datos[index].tiempos[3] != null) && activo == 1) {
                        perdidas[index] = 0;
                    }

                    if (perdidas[index] == 4 && activo == 1) {
                        crearIncidencia(datos[index].id);
                    }
                }

                // Función si es que el servicio ya tiene incidencia en este momento
                if (activo == 0) {
                    if (control_perdidas[index] == 0) {
                        perdidas[index] = 4;
                        control_perdidas[index] = 1;
                    }

                    if (datos[index].tiempos[0] != null && datos[index].tiempos[1] != null && datos[index].tiempos[2] != null && datos[index].tiempos[3] != null) {
                        perdidas[index] -= 1;
                    }

                    if (perdidas[index] > 0 && (datos[index].tiempos[0] == null || datos[index].tiempos[1] == null || datos[index].tiempos[2] == null || datos[index].tiempos[3] == null)) {
                        control_perdidas[index] = 0;
                    }

                    if (perdidas[index] == 0) {
                        solucionIncidencia(datos[index].id);
                        control_perdidas[index] = 0;
                    }
                }

                // Datos para graficar
                datosGrafica = {
                    label: datos[index].nombre,
                    data: [datos[index].tiempos[0], datos[index].tiempos[1], datos[index].tiempos[2], datos[index].tiempos[3]],
                    backgroundColor: background + '0.1)',
                    borderColor: background + '1)',
                    borderWidth: 1,
                };

                // Función para graficar
                crearChart(etiquetas, datosGrafica);
            };
            // Recursividad, garantiza finalizar un ciclo completo antes de mandar a llamar al siguiente
            setTimeout(repeticiones, 1000);
        },
        error: function (error) {
            console.log(error);
            setTimeout(repeticiones, 1000);
        }
    });
}

// Función para crear gráficas
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

// Función para levantar incidencia, cambiar el estado del servicio a inactivo y avisar por correo
function crearIncidencia(id) {
    $.ajax({
        type: 'GET',
        url: 'incidencia/store/' + id,
        success: function () {
            console.log('Incidencia creada con exito');
        },
        error: function (error) {
            console.log(error);
        }
    })
}

// Función para corregir la incidencia, cambiar el estado del servicio a activo y avisar por correo
function solucionIncidencia(id) {
    $.ajax({
        type: 'GET',
        url: 'incidencia/solution/' + id,
        success: function () {
            console.log('Corrección creada con exito');
        },
        error: function (error) {
            console.log(error);
        }
    })
}

// Se manda a llamar la función que realiza todo el proceso
repeticiones();