import "Contenedor.js";
import "ContenedorAltaDensidad.js";

const containers = [];
const containersAltaDensidad = [];

function mostrarContenedoresAltaDensidad(){
    limpiarRespuesta();
    let respuesta;
    containersAltaDensidad.forEach(container => {
        respuesta += (" - " + container.toString() + "\n");
    });
    document.getElementById("response") = respuesta;
}

function addContainer(){
    limpiarRespuesta();

    escribirRespuesta();
}

function modifyContainer(){
    limpiarRespuesta();
}

function calcularDensidad(){
    limpiarRespuesta();
    //Get the values from the
    escribirRespuesta("hola");
}

function limpiarRespuesta(){
    document.getElementById("response").textContent="";
} 

function escribirRespuesta(respuesta){
    document.getElementById("response").textContent=respuesta;
}