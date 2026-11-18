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
        
        this.#volumen = value;
    }

    get Peso(){
        return this.#peso;
    }

    set Peso(value){
        if(value < 10) throw new Error("El peso introducido no es válido");
        this.#peso = value;
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
        
        this.#densidad = value;
    }
}

const Contenedores = [];
const ContenedoresAltaDensidad = [];

//Cuidado fallo clasico coger un texto distinto de lo que aparece en el id
const txtRef = document.getElementById("txt_referencia");
const numberPeso = document.getElementById("number_peso");
const numberVolumen = document.getElementById("number_volumen");
const msgDiv = document.getElementById("msg_div");

const btnAdd = document.getElementById("btn_add");
btnAdd.addEventListener("click",
    () => { //TODO validacion
        if(exists_reference(txtRef.value)) throw new Error("El contenedor ya existe en la base de datos");

        Contenedores.push(new Contenedor(txtRef.value, numberPeso.value, numberVolumen.value));
        if(numberPeso.value / numberVolumen.value >= 2.5){
            ContenedoresAltaDensidad.push(
                new ContenedorAltaDensidad (
                    txtRef.value, 
                    parseInt(numberPeso.value)/parseFloat(numberVolumen.value)
                ));
            msgDiv.innerHTML = `Se ha añadido el contenedor ${txtRef.value} a las listas de contenedores y de contenedores de alta densidad`;
        }else {
            msgDiv.innerHTML = `Se ha añadido el contenedor ${txtRef.value} a la lista de contenedores`;
        }
    }
);

const btnModify = document.getElementById("btn_modify");
btnModify.addEventListener("click",
    () => {
        //OJO find!!
        const containerMod = Contenedores.find(
            (c) => c.Referencia === txtRef.value
        );
        if(contenedorMod !== undefined){
            
           contenedor()

        }else{
            msgDiv.innerText=`El contenedor especificado no existe en la base de datos ${txtRef.value}`;
        }
    }
);

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

const btnMostrarAltaDensidad = document.getElementById("btn_mostrar_alta_densidad");
btnMostrarAltaDensidad.addEventListener("click",
    () => {
        
    }
);

function exists_reference(reference){
    Contenedores.forEach(container => {
        if(container.Referencia == reference)
            return true;
    });
    return false;
}