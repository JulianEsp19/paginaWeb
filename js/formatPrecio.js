function formatearPrecio(etiqueta){
    precio = parseInt(etiqueta.innerHTML)
    
    newPrecio = Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(precio)
    etiqueta.innerHTML = newPrecio

}

