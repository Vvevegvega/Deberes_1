class MiTarjeta extends HTMLElement{
    //Callback funcion que se ejecuta como 
    // respuesta a una llamada, son manejadores de eventos
    connectedCallback(){
        this.innerHTML = "Hola, mundo";

    }
}


window.customElements.define('mi-tarjeta', MiTarjeta);