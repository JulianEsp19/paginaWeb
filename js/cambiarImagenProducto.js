imagenes = document.querySelectorAll(".imagenes")
imagenPrincipal = document.querySelector("#imagenVista")

imagenes.forEach(element => {
    element.addEventListener("click", ()=>{
        imagenPrincipal.src = element.style.backgroundImage.slice(5, -2)
    })
});