class Contenedor{
    #referencia;
    #peso;
    #volumen;

    constructor(referencia, peso, volumen){
        this.Peso = peso;
        this.Volumen = volumen;
        this.Referencia = referencia;
    }

    get Referencia(){
        return this.#referencia;
    }

    set Referencia(value){
        this.#referencia = value;
    }

    get Volumen(){
        return this.#volumen;
    }

    set Volumen(value){
        this.#volumen = parseFloat(value);
    }

    get Peso(){
        return this.#peso;
    }

    set Peso(value){
        this.#peso = parseInt(value);
    }
}

class ContenedorAltaDensidad{
    #referencia;
    #densidad;

    constructor(referencia, densidad){
        //Los constructores utilizan la cosa de la clase
        this.Densidad = densidad;
        this.Referencia = referencia;
    }

    get Referencia(){
        return this.#referencia;
    }

    set Referencia(value){
        this.#referencia = value;
    }

    get Densidad(){
        return this.#densidad;
    }

    set Densidad(value){
        this.#densidad = parseFloat(value);
    }
}

const Contenedores = [];
const ContenedoresAltaDensidad = [];

//Cuidado fallo clasico coger un texto distinto de lo que aparece en el id
const txtRef = document.getElementById("txt_referencia");
const numberPeso = document.getElementById("number_peso");
const numberVolumen = document.getElementById("number_volumen");
const msgDiv = document.getElementById("msg_div");

//Hacen falta todos los campos
const btnAdd = document.getElementById("btn_add");
btnAdd.addEventListener("click",
    () => {
        if(exists_reference(txtRef.value)){
            msgDiv.innerText=`El contenedor especificado ya existe en la base de datos`;
        }else{
            
            let peso = parseFloat(numberPeso.value);
            let volumen = parseFloat(numberVolumen.value);

            Contenedores.push(new Contenedor(txtRef.value, peso, volumen));
            if(peso / volumen >= 2.5){
                ContenedoresAltaDensidad.push(
                    new ContenedorAltaDensidad (
                        txtRef.value, 
                        peso/volumen
                    ));
                msgDiv.innerHTML = `Se ha añadido el contenedor ${txtRef.value} a las listas de contenedores y de contenedores de alta densidad`;
            }else {
                msgDiv.innerHTML = `Se ha añadido el contenedor ${txtRef.value} a la lista de contenedores`;
            }

            console.log(Contenedores);
            console.log(ContenedoresAltaDensidad);
        }

    }
);

//Hacen falta todos los parametros
const btnModify = document.getElementById("btn_modify");
btnModify.addEventListener("click",
    () => {
        //Pillamos el contenedor
        const contenedorMod = Contenedores.find(
            (c) => c.Referencia === txtRef.value
        );
        if(contenedorMod !== undefined){
            //Cambiar los valores
            let peso = parseInt(numberPeso.value);
            let volumen = parseFloat(numberVolumen.value);

            contenedorMod.Peso= peso;
            contenedorMod.Volumen = volumen;

            //Buscar si esta en la lista de los de alta densidad, repetir
            const contenedorAltaDensidadMod = ContenedoresAltaDensidad.find(
                (c) => c.Referencia === txtRef.value
            );
             //El contenedor esta en la lista de alta densidad
            if(contenedorAltaDensidadMod !== undefined){
                // se sale de la lista de densidad
                if(peso/volumen < 2.5){ 
                    ContenedoresAltaDensidad
                    .splice(ContenedoresAltaDensidad
                    .findIndex( (c) => { c.Referencia === contenedorAltaDensidadMod.Reference}),1);

                // Se queda en la lista de densidad
                }else{ 
                    contenedorAltaDensidadMod.Densidad=peso/volumen;
                }
            // El contenedor no esta en la lista de alta densidad
            }else{
                // Se mete en la lista de alta densidad
                if(peso/volumen >= 2.5){ 
                    ContenedoresAltaDensidad.push(
                        new ContenedorAltaDensidad (
                        txtRef.value, 
                        peso/volumen
                    ));
                }
            }
            
            msgDiv.innerText=`El contenedor con id: ${contenedorMod.Referencia} ha sodo modificado correctamente`;
        }else{
            msgDiv.innerText=`El contenedor especificado no existe en la base de datos ${txtRef.value}`;
        }
    }
);

//Hacen falta peso y volumen
const btnCalculate = document.getElementById("btn_calculate");
btnCalculate.addEventListener("click",
    () => {
        if(numberPeso.value >= 10){
            let density = parseInt(numberPeso.value) / parseFloat(numberVolumen.value);

            if(density >= 1){
                if(density >= 2.5 ){
                    density = `Alta densidad: ${density}Kg/m3`;
                }else{
                    density = `Densidad normal: ${density}Kg/m3`;
                }
            }else {
                density = `Baja densidad: ${density}Kg/m3`;
            }

            msgDiv.innerText=`La densidad del contenedor es ${density}`;
        }
    }
);

//No hace falta nada
const btnMostrarAltaDensidad = document.getElementById("btn_mostrar_alta_densidad");
btnMostrarAltaDensidad.addEventListener("click",
    () => {
        if(ContenedoresAltaDensidad.length == 0){
            msgDiv.innerText=`No hay registros de contenedores de alta densidad en la base de datos`;
        }else{
            let contendores_toString = 
                `<h2>Listado de contenedores de alta capacidad:</h2>
                <table border=1>
                    <tr><th>Referencia</th>
                        <th>Peso</th>
                        <th>Volumen</th>
                        <th>Densidad</th>
                    </tr>`;
            ContenedoresAltaDensidad.forEach( contenedor => {
                let contenedorInfo = Contenedores.find(
                    (c) => c.Referencia === contenedor.Referencia
                );

                contendores_toString += 
                `<tr>
                    <td>${contenedorInfo.Referencia}</td>
                    <td>${contenedorInfo.Peso.toFixed(2)}Kg</td>
                    <td>${contenedorInfo.Volumen.toFixed(2)}m3</td>
                    <td>${contenedor.Densidad.toFixed(2)}Kg/m3</td>
                </tr>`;
            });
            contendores_toString += `</table>`;
            msgDiv.innerHTML= contendores_toString;
        }

    }
);

function exists_reference(reference){
    const contenedorMod = Contenedores.find(
            (c) => c.Referencia === reference
        );
        if(contenedorMod !== undefined){
           return true;
        }else{
            return false;
        }
}