switchElement = document.querySelector("#switch")
productos = document.querySelectorAll(".diferencia-1")
usuarios = document.querySelectorAll(".diferencia-0")

usuarios.forEach(element => {
    element.style.display = "none"
});

switchElement.addEventListener("click", ()=>{
    if(switchElement.checked){
        productos.forEach(element => {
            element.style.display = "none"
        });
        usuarios.forEach(element => {
            element.style.display = ""
        });
    }else{
        productos.forEach(element => {
            element.style.display = ""
        });
        usuarios.forEach(element => {
            element.style.display = "none"
        });
    }
})