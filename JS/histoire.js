
var h2 = document.getElementsByTagName("h2");
var ul = document.getElementsByTagName("ul");
var conteneur = document.getElementById("conteneur")

var input = document.getElementsByTagName("input")

for (let index = 0; index < input.length; index++) {
    const element = input[index];
    element.addEventListener("click",(e)=>{
        element.style.background = "white";
    })
    
}


for (let index = 0; index < h2.length; index++) {
    let element = h2[index];
    element.addEventListener("click",(e)=>{
        ul[index].style.visibility = "visible";
        element.addEventListener("click",(e)=>{
            ul[index].style.visibility = "hidden";
        })
    })
}
