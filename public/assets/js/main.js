//************** LIKE ****************



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
    if (this.src != undefined){
        table = "gallery"
       
    }else {
        (table = "blog_article")
      
    };

    // On incremente le nombre de like 
    // let nbLike = +parseInt(like) + 1;

   // on remplace galerie ou article par ajax
    const dossier = window.location.href.lastIndexOf("/");
    const domaine = window.location.href.slice(0, dossier);
    const url_ =domaine+"/ajax"

    // test AJAX
    $.ajax({
      url: url_,
      method: "get",
      data: { table: table, id: indexId}
    })
      .done(function() {
        // console.log("Succes");
      })
      .catch(() => {
        console.log("KO");
      });
    
}


/********** LIGHTBOX *************/

lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
})



/************* BACK to TOP  *********** */

window.setInterval(() => {
  
    if (window.pageYOffset > 100) {
      
        $(".back-to-top").fadeIn();

    }

    else
  
        $(".back-to-top").fadeOut();

}, 100)

// Smooth scroll
$(document).ready(function () {

    $(".smooth-scroll").on('click', function (event) {
        // console.log(this.hash)

        if (this.hash !== "") {

            event.preventDefault();


            var hash = this.hash;


            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function () {


                window.location.hash = hash;
            });
        }
    });
});