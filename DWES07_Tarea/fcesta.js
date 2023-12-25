// función para añadir productos a la cesta
function anadeCesta() {
    // recogemos el valor introducido en el campo 'cod' del formulario
    let producto = document.getElementById("cod").value;
    // recuperamos el número aleatorio de esta sesión
    let micod = document.getElementById("numAle").value;
    // llamamos a la función php 'anadirCesta' pasándole el valor recogido anteriormente y la sesión actual
    xajax.request({ xjxfun: "anadirCesta" }, { mode: "asynchronous", parameters: [producto, micod] });
    // puedes manejar la respuesta o realizar acciones adicionales si es necesario
}

// función para vaciar la cesta
function vaciaCesta() {
    // llamamos a la función php 'vaciarCesta' sin enviarle ningún parámetro
    xajax.request({ xjxfun: "vaciarCesta" }, { mode: "asynchronous" });
    // puedes manejar la respuesta o realizar acciones adicionales si es necesario
}

// función que nos muestra los artículos existentes en la cesta
function muestraCesta() {
    // llamamos a la función php 'mostrarCesta' sin enviarle ningún parámetro
    xajax.request({ xjxfun: "mostrarCesta" }, { mode: "asynchronous" });
    // puedes manejar la respuesta o realizar acciones adicionales si es necesario
}
