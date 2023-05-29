function onJson(json){
    console.log(json);
    const library = document.querySelector("#meal-view");
    library.innerHTML = '';

    const meal = document.createElement('div');
    meal.classList.add('meal');
    const caption = document.createElement('span');
    const caption2 = document.createElement('span');
    const caption3 = document.createElement('span');
    const img = document.createElement('img');
    const caption4 = document.createElement('p');
    caption.textContent = "NOME: " + json.meals[0].strMeal;
    caption2.textContent = "TIPO: " +json.meals[0].strCategory;
    caption3.textContent = "ORIGINE: " +json.meals[0].strArea;
    img.src = json.meals[0].strMealThumb;
    caption4.textContent = "PREPARZIONE: " + json.meals[0].strInstructions;

    meal.appendChild(caption);
    meal.appendChild(caption2);
    meal.appendChild(caption3);
    meal.appendChild(img);
    meal.appendChild(caption4);
    library.append(meal);
}

function onResponse(response){
    return response.json();
}

function ricerca(event){
    const ricerca= document.querySelector("#ricerca").value;
    console.log(ricerca);
    const form_data = new FormData(form);
    console.log(form_data);
    fetch("ricetta_curl.php", {method: 'post', body: form_data, ricerca}).then(onResponse).then(onJson);
    event.preventDefault();
}

const form = document.querySelector("form");
form.addEventListener('submit', ricerca);