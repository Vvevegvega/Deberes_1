const elemento = document.getElementById("Ejemplo");
let valor = elemento.attributes.getNamedItem("id").nodeValue;
console.log({elemento});
console.log({valor});
elemento.setAttribute("id", "Ejemplo2");
console.log({elemento});