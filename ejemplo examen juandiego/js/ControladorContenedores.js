const containers = [];
const containersAltaDensidad = [];

function mostrarContenedoresAltaDensidad(){
    limpiarRespuesta();
    
    containersAltaDensidad.forEach(element => {
        
    });
    document.getElementById("response") = "";
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


    escribirRespuesta("hola");
}


function limpiarRespuesta(){
    document.getElementById("response").textContent="";
} 

function escribirRespuesta(respuesta){
    document.getElementById("response").textContent=respuesta;
}