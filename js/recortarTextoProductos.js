
infoProductoCarrito = document.querySelectorAll(".tituloProducto")

for(let i=0; i<infoProductoCarrito.length; i++){
    if(infoProductoCarrito[i].innerHTML.length >= 60){
        infoProductoCarrito[i].innerHTML = infoProductoCarrito[i].innerHTML.slice(0,60)
        infoProductoCarrito[i].innerHTML += "..."
    }
}