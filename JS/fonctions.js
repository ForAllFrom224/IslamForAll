//recuperation des elements
var $p = document.getElementsByTagName('p')
var btn_next = document.getElementById('next')
var btn_prev = document.getElementById('prev')
var reponses = document.getElementsByTagName('label')
var $input = document.getElementsByTagName('input')

//constante qui gere le delai pour l'affichage automatic des questions
const TIME = 10000

var reponsesQuestion = [
	['Radwan & Rayan','Malik Al-Mawt & Jalal','Nakir & Munkar'],
	[86,35,99],
	['En 634 à 67 ans','En 646 à 57 ans','En 632 à 63 ans'],
	['La descente du coran','La niassance du prophète'],
	['Le Qur\'an','L\'Injil','La Thora'],
	['Muhamed (PSL)','Ibrahim (Alayhissalam)','Youssouf (Alayhissalam)'],
	[60,30,114],
	['Les 5 prières par jour','Le pèlerinage','Le mariage'],
	['La Prière','Le Ramadan','Le Pèlerinage'],
	['2 fois','3 fois','6 fois'],
	['Adam','Issa','Muhamed'],
	[10,30,50],
	['Yaassin','Moursalaat','Al-Taubah'],
	['Al-Taubah','Al-Naml','Al-Fatiha'],
	['Al-Alimraan','Al-Maidah','Al-Baqarah'],
	['Al-Asr','Al-Kaousar','Al-Ikhlass'],
	[114,214,60],
	['40 ans','45 ans','25 ans'],
	['Al-Moudathir','Al-Alaq','Al-Fatiha'],
	['Al-Tînn','Al-Naba','Al-Nisa'],
	['Masjid-e-Haram (2:150)','Masjid-e-Aqsa (17:1)','Masjid-e-Zara (9:107)']


]

var index = 0 //variable qui prend la position de la $p à afficher

//fonction qui affiche juste la premiere $p et bloque les autres
function listeQuestion() {
	for(var i = 0; i < $p.length; i++){
		const elem = $p[i]
		elem.style.display = "none"
	}
	for (var i = 0; i < $input.length; i++) {
		const inputs = $input[i]
		inputs.style.display = "none"
	}
}
var soumettre = (i) =>{
	var soumettres = document.getElementById('soumettre')
	if(i < 21) {
		btn_next.style.display = "block"
		soumettres.style.display = "none"
	}else{
		soumettres.style.display = "block"
		btn_next.style.display = "none"
	}

	if (i == 0) {
		$p[++i].style.display = 'block'
		btn_prev.style.display = 'none'
	}else{
		btn_prev.style.display = 'block'
	}
}
//fonction qui increment la valeur de l'index et gere l'affichage suivante


function next(){
	index++
	if (index < $p.length) {
		let q_courante = $p[index]
		for(let input of $input){
			input.style.display = "block"
		}
		q_courante.style.display = "block"
		let q_prev = index - 1
		$p[q_prev].style.display = "none"
	 }else{
		alert("Fin du Quizz")
	}
	traitement(index)
	soumettre(index)
}
//fonction qui decremente l'index et gere l'affichage precedente
function prev(){
	index--
	let q_courante = $p[index]
	q_courante.style.display = "block"
	let q_prev = index + 1
	$p[q_prev].style.display = "none"

	traitement(index)
	soumettre(index)
}

// utilisation de l'affichage automatique

// cette fonction gère l'affichage des réponses contenue dans le tableau
// à deux dimensions ci dessus
var traitement = (index) =>{
	if (index == 1){
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
			rep.style.background = 'white'
		}
	}else if (index == 2) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 3) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 4) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 5) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 6) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 7) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 8) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 9) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 10) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 11) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 12) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 13) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 14) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 15) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 16) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 17) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 18) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 19) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 20) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}else if (index == 21) {
		let j = index
		var reponse = reponsesQuestion[--j]
		for (var i = 0; i < reponse.length; i++) {
			var rep = reponses[i]
			rep.innerText=reponse[i]
		}
	}
}