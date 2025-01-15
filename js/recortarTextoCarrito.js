

infoProductoCarrito = document.querySelectorAll(".infoProductoCarrito")

for(let i=0; i<infoProductoCarrito.length; i++){
    if(infoProductoCarrito[i].innerHTML.length >= 200){
        infoProductoCarrito[i].innerHTML = infoProductoCarrito[i].innerHTML.slice(0,200)
        infoProductoCarrito[i].innerHTML += "..."
    }
}