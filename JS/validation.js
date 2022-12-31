//recuperation des differents elements
var nom = document.getElementById('nom')
var prenom = document.getElementById('prenom')
var email = document.getElementById('email')
var mdp = document.getElementById('mdp')
var mdpConfirm = document.getElementById('mdp_confirm')

var valideIns = document.getElementById('valideIns')
var valideCon = document.getElementById('valideCon')
var ins = document.getElementById('inscription')
var con = document.getElementById('connexion')


// con.addEventListener('click',(e)=>{
//     if(email.value.length == 0 || mdp.value.value.length == 0)
// 	    valideCon.style.visibility = "visible"
// })

// ins.addEventListener('click',(e)=>{
// 	t.style.visibility = "visible"
// })


function valide(){
	valideCon.style.visibility = 'visible';
}