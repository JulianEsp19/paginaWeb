let tarjeta = document.querySelectorAll(".tarjeta")
let link = document.querySelectorAll(".getProducto")

console.log(tarjeta)
console.log(link)

for(let i = 0; i<tarjeta.length; i++){
    tarjeta[i].addEventListener("click", ()=>{
        window.location.href = 'producto.php'+link[i].value;
        console.log("click")
    })
}
