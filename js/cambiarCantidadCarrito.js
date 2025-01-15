//Script para hacer un cambio en la cantidad que se tiene
//en el carrito

let contador = 0;

while(document.getElementById("agregarCarrito"+contador) != null){

    let botonAgregar = document.getElementById("agregarCarrito"+contador)
    let botonCancelar = document.getElementById("cancelarModificacion"+contador)

    let formCambiarCantidad = document.getElementById("formCambiarCantidad"+contador)
    let formEliminarProducto = document.getElementById("formEliminarProducto"+contador)

    //diferentes formas de ver la cantidad 
    let cantidadParrafo = document.getElementById("cantidadParrafo"+contador)
    let cantidadInput = document.getElementById("cantidadInput"+contador)
    let cantidadForm = document.getElementById("cantidadForm"+contador)

    //eventos
    botonAgregar.addEventListener("click", ()=>{
        cantidadParrafo.setAttribute("style", "display:none;")
        botonAgregar.setAttribute("style", "display: none;")
        formEliminarProducto.setAttribute("style", "display:none")

        cantidadInput.setAttribute("style", "")
        formCambiarCantidad.setAttribute("style", "")
        botonCancelar.setAttribute("style", "")
    })
    cantidadInput.addEventListener("change", ()=>{
        if(cantidadInput.value === "") cantidadInput.value = 1;
        if(cantidadInput.value == 0) cantidadInput.value = 1;
    
        cantidad = cantidadInput.value
    
        cantidadForm.setAttribute("value", cantidad)
    
        console.log(cantidad)
    })
    botonCancelar.addEventListener("click", ()=>{
        cantidadParrafo.setAttribute("style", "")
        botonAgregar.setAttribute("style", "")
        formEliminarProducto.setAttribute("style", "")

        cantidadInput.setAttribute("style", "display:none;")
        formCambiarCantidad.setAttribute("style", "display:none;")
        botonCancelar.setAttribute("style", "display:none;")
    })

    contador++
    console.log(contador)
    console.log(botonAgregar)
}

