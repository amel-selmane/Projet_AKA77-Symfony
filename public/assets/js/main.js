// On choisit les selecteur
premierSelecteur = "img"
deuxiemeSelecteur = "p"

// On ajoute les event listener

document.querySelectorAll(premierSelecteur).forEach(e => {
    e.addEventListener("click", like);
});

document.querySelectorAll(deuxiemeSelecteur).forEach(e => {
    e.addEventListener("click", like);
});

// On créé l'url pour le GET
function like() {
    event.preventDefault(event);
    // On recupere l'id 
    let indexId = this.dataset.indexId;
    // On recupere le nombre de like 
    let like = this.dataset.indexLike;
    // On recupere le type de selecteur (img ou p)
    this.src != undefined ? (table = "gallery") : (table = "article");

    // On incremente le nombre de like 
    let nbLike = +parseInt(like) + 1;
    // On crée l'url
    let urlFiltree =
        window.location.href.search("table") == -1
            ? window.location.href
            : window.location.href.slice(0, window.location.href.search("table") - 1);
    let _url =
        urlFiltree + "?table=" + table + "&id=" + indexId + "&like=" + nbLike;

    window.location.href = _url;
}