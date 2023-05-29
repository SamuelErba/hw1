function onJson(json){
    console.log(json);
    let sezione = undefined;
    sezione = document.querySelector("div.negozio")
    const divRiga = document.querySelector("div.newdiv")
    divRiga.innerHTML="";
    for(box in json){ 

    //crea immagine
    const image = document.createElement("img");
    image.src=json[box].immagine;
    image.classList.add("immagine");
    
    //crea titolo
    const titolo = document.createElement("h3");
    titolo.textContent=json[box].nome;

    const bottoneRimuovi = document.createElement("button");
    bottoneRimuovi.classList.add("rimuovi");
    bottoneRimuovi.textContent="Rimuovi dal carrello";
    bottoneRimuovi.setAttribute("data-ind",json[box].idvendita);
    bottoneRimuovi.addEventListener("click", eliminaProdotto);

    divRiga.appendChild(titolo);
    divRiga.appendChild(image);
    divRiga.appendChild(bottoneRimuovi);
       
    sezione.appendChild(divRiga);
    }
}

function eliminaProdotto(event){
    const id_vendita = event.currentTarget.dataset.ind;
    console.log(id_vendita);
    fetch("eliminadacarrello.php?idvendita="+id_vendita).then(onResponse).then(pippo);
}
function pippo(json){
    console.log(json);
    carrello();
}

function onResponse(response){
    return response.json();
}

function carrello(){
    fetch("fetch2-carrello.php").then(onResponse).then(onJson);
}


carrello();
let ind = null;