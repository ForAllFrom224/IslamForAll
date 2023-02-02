// recuperation des differents elements du dom
var div_quizz = document.querySelectorAll(".quizz")
// var q_quizz = document.querySelectorAll(".q-quizz")
var section_quizz = document.querySelector(".main-quizz")

// section.remove()    //pour supprimer le contenu de la section dans le html

// fonction qui creer les elements qui composent les differentes partie du quizz
function creeElementQuizz(){ 
    // document.getElementById("div-question").remove()
    // document.getElementById("div-reponse").remove()

    // creation de la zone div qui doit contenir l'ensemble des question
    let div_question = document.createElement("div")
    div_question.setAttribute("class","div-question")
    div_question.setAttribute("id","div-question")
    section_quizz.appendChild(div_question)

    // creation du paragraphe p de la div-question qui affichera les questions maintenant
    let p_question = document.createElement("p")
    p_question.setAttribute("class","p-question")
    div_question.appendChild(p_question)

    // creation de la zone où figurerons les reponses
    let div_reponse = document.createElement("div")
    div_reponse.setAttribute("class","div-reponse")
    div_reponse.setAttribute("id","div-reponse")
    section_quizz.appendChild(div_reponse)

    // creation des input pour afficher les reponses possible
    for (let index = 1; index <= 3; index++) {
        let input = document.createElement("input")
        input.setAttribute("class","input-reponse")
        input.setAttribute("type","radio")
        input.setAttribute("name","input")
        div_reponse.appendChild(input)
    }
}

// definiton de la fonction qui gere les bouttons pour lancer les quizz
var levelQuizz = (elements) =>{    
    for (let index = 0; index < elements.length; index++) {
        const element = elements[index];

        element.addEventListener("click",(e)=>{
            let  choix = element.textContent
            switch(choix){
                case "QUIZZ 1" :
                    creeElementQuizz()
                    alert("Je suis le quizz 1 du switch")
                    break
                case "QUIZZ 2" :
                    creeElementQuizz()
                    alert("Je suis le quizz 2 du switch")
                    break
                case "QUIZZ 3" :
                    creeElementQuizz()
                    alert("Je suis le quizz 3 du switch")
                    break
                case "QUIZZ 4" :
                    creeElementQuizz()
                    alert("Je suis le quizz 4 du switch")
                    break
                case "QUIZZ 5" :
                    creeElementQuizz()
                    alert("Je suis le quizz 5 du switch")
                    break
                case "QUIZZ 6" :
                    creeElementQuizz()
                    alert("Je suis le quizz 6 du switch")
                    break
                case "QUIZZ 7" :
                    creeElementQuizz()
                    alert("Je suis le quizz 7 du switch")
                    break
                case "QUIZZ 8" :
                    creeElementQuizz()
                    alert("Je suis le quizz 8 du switch")
                    break
                case "QUIZZ 9" :
                    creeElementQuizz()
                    alert("Je suis le quizz 9 du switch")
                    break
                case "QUIZZ 10" :
                    creeElementQuizz()
                    alert("Je suis le quizz 10 du switch")
                    break
                case "QUIZZ 11" :
                    creeElementQuizz()
                    alert("Je suis le quizz 11 du switch")
                    break
                case "QUIZZ 12" :
                    creeElementQuizz()
                    alert("Je suis le quizz 12 du switch")
                    break
                default:
                    alert("default en action")
                    break
            }
        })        
    }    
}

// creeElementQuizz()
levelQuizz(div_quizz)
