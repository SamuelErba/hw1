function onJson(json){
    console.log(json);
    let sezione = undefined;
    sezione = document.querySelector("div.negozio")
    for(i in json){
    //crea div e aggiungi classe
    const divRiga = document.createElement("div");
    divRiga.classList.add("newdiv");
    divRiga.dataset.i=json[i].id_box;
    ind=divRiga.dataset.i

 
    //crea immagine
    const image = document.createElement("img");
    image.src=json[i].immagine;
    image.classList.add("immagine");
 
    //crea titolo
    const divElemento = document.createElement("div");
    const titolo = document.createElement("h3");
    titolo.textContent=json[i].nome;
    divElemento.appendChild(titolo);
    divRiga.appendChild(image);
    divRiga.appendChild(divElemento);
 
    const prezzo = document.createElement("h4")
    prezzo.classList.add("prezzo")
    console.log(json[i].prezzo);
    prezzo.textContent = "€"+json[i].prezzo;

    divElemento.appendChild(prezzo);

    //crea descrizione
    const description = document.createElement("p");
    description.textContent = json[i].descrizione;
    description.classList.add("descrizione");
    description.classList.add("hidden");
    divElemento.appendChild(description);

    const bottoneDescrizione = document.createElement("img");
    bottoneDescrizione.classList.add("pulsante");
    bottoneDescrizione.src="./images/info.png";
    divElemento.appendChild(bottoneDescrizione);
    bottoneDescrizione.addEventListener('click',Scopridescrizione);

    const compraprodotto=document.createElement("img");
    compraprodotto.classList.add("pulsante_compra_prodotto")
    compraprodotto.src="./images/carrello.png";
    divElemento.appendChild(compraprodotto)
    compraprodotto.addEventListener('click', acquista);

    const scritta = document.createElement("span");
    scritta.classList.add("hidden");
    scritta.textContent=("Aggiunto al carrello!")
    divElemento.appendChild(scritta);
 
    sezione.appendChild(divRiga);
    }
}

function onResponse(response){
    return response.json();
}
function jsona(json){
    console.log(json);
}
function acquista(event){
    const box = event.currentTarget.parentNode.parentNode;
    const id = box.dataset.i;
    console.log(box);

    const scritta = box.querySelector("span");
    scritta.classList.remove("hidden");

    fetch("fetch-carrello.php?id="+id).then(onResponse).then(jsona);
    event.preventDefault();
}


function Scopridescrizione(e) {
    const divPadre =e.target.parentNode;
    const descr = divPadre.getElementsByTagName("p")[0];
    descr.classList.toggle("hidden");
 
}

function boxs(){
    fetch("fetch-shop.php").then(onResponse).then(onJson);
}

boxs();
let ind=null;