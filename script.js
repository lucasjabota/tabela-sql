var exibe = document.getElementById("exibe")

if(document.cookie.indexOf(['atualizado'])>=0) {
    exibe.innerHTML = "Atualizado com Sucesso!"
    exibe.style.backgroundColor = "orange"
    exibe.style.color = "white"
    exibe.style.textAlign = "center"
    exibe.className = "show"
    setTimeout(()=> {
        exibe.style.display = 'none'
    }, 3000)

    document.cookie = "atualizado=; expires=thu, 01 Jan 1970 00:00:00 UTC; path=/sql"
}

var exibe = document.getElementById("exibe")

if(document.cookie.indexOf(['deletado'])>=0) {
    exibe.innerHTML = "deletado com Sucesso!"
    exibe.style.backgroundColor = "red"
    exibe.style.color = "white"
    exibe.style.textAlign = "center"
    exibe.className = "show"
    setTimeout(()=> {
        exibe.style.display = 'none'
    }, 3000)

    document.cookie = "atualizado=; expires=thu, 01 Jan 1970 00:00:00 UTC; path=/sql"
}

var exibe = document.getElementById("exibe")

if(document.cookie.indexOf(['adicionado'])>=0) {
    exibe.innerHTML = "adicionado com Sucesso!"
    exibe.style.backgroundColor = "green"
    exibe.style.color = "white"
    exibe.style.textAlign = "center"
    exibe.className = "show"
    setTimeout(()=> {
        exibe.style.display = 'none'
    }, 3000)

    document.cookie = "atualizado=; expires=thu, 01 Jan 1970 00:00:00 UTC; path=/sql"
}