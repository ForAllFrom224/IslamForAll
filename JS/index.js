const TIME = 5000
var img = document.getElementsByTagName('img')
taille = img.length


var index_next = 0
var index_prev = -1

function visible(a,b){
    a.style.display = "none"
    b.style.display = "block" 
}

var automatic = () =>{
    index_next++
    index_prev++

    next = img[index_next]
    prev = img[index_prev]

    if(index_next == taille - 1){
        visible(prev,next)
        index_next = -1   
    }else if(index_prev == taille - 1){
        visible(prev,next)
        index_prev = -1     
    }else{
        visible(prev,next)
    }   
}

setInterval(automatic,TIME)