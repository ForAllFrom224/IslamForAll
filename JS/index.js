// definition de quelques variables 
var TIME = 3200
var img = document.querySelectorAll('.img')
var taille = img.length
var index_courant = 0

// gestion de l'affichage automatiquement des images sliders de la page index
/**
 * @author MTB
 * @param {*} a 
 * @param {*} b 
 * @description elle permet de masque le premier element et d'afficher le deuxième
 */ 
function visible(a,b){
    a.style.display = "none"
    b.style.display = "block" 
}

var element_a_affiche = 0
var automatic = () =>{     
    voirElement(element_a_affiche)
    element_a_affiche++
}
setInterval(automatic,TIME)

// gestion des bouttons pour l'affichage de l'image
/**
 * @author MTB
 * @description definition de la fonction qui gere l'affichage regulier des differents elements
 * @param {*} index_element 
 */
var voirElement = (index_element) =>{
    let dernier_element = index_courant

    index_courant = Math.abs(index_element) % taille

    visible(img[dernier_element],img[index_courant])
}
/**
 * @author MTB
 * @param {*} listes 
 * @description definition de la fonction qui gère dynamiquement l'affichage des button radio
 */
var pagination = (listes)  =>{
    for (let index = 0; index < taille; index++) {
        var input = document.createElement("input")
        input.onclick = () => voirElement(index)
        input.setAttribute("type","radio")
        input.setAttribute("name","radio")
        input.setAttribute("class","radio")

        document.querySelector(".pagination-index").appendChild(input)
        
    }
}
pagination(img)

// definiton du js pour l'instersection observer
const ratio =  .5
let option = {
    root: null, //des que visible sur la fenetre
    rootMargin: '0px',
    threshold: ratio //le pourcentage de l'element à avoir pour declencher l'action
}

const callback = function(entries,observer){
    entries.forEach(function(entry){
        if(entry.intersectionRatio > ratio){            
            entry.target.classList.add("is-visible")
            observer.unobserve(entry.target)
        }
    })
}
const observer = new IntersectionObserver(callback,option)
var section = document.querySelectorAll(".section").forEach(function(element){
    observer.observe(element)
})
// observer.disconnect() // pour deconnecter tous les elements observer et non les supprimer