function hideAdmin() {
//  Masquer les champs facultatifs au chargement du formulaire (onload)
    // Slider
    document.getElementById("slider").style.display = 'none';
    // Video
    document.getElementById("video").style.display = 'none';
}
function ShowHideSlider() {
//  Si checkbox général est ok
    if (document.getElementById("sl_boolean").checked) {
        //afficher le slider
        document.getElementById("slider").style.display = 'block';
//      Si checkbox Image 2 est ok
        if (document.getElementById("img-field-2").checked) {
            // afficher champs Image 2
            document.getElementById("img-sl-2").style.display = 'block';
//          Sinon
        } else {
            //Masquer ChampImage 2
            document.getElementById("img-sl-2").style.display = 'none';
        }
//      Si checkbox Image 3 est ok
        if (document.getElementById("img-field-3").checked) {
            // afficher champs Image 3
            document.getElementById("img-sl-3").style.display = 'block';
//      Sinon
        } else {
            //Masquer ChampImage 3
            document.getElementById("img-sl-3").style.display = 'none';

        }
//      Si checkbox Image 4 est ok
        if (document.getElementById("img-field-4").checked) {
            // afficher champs Image 4
            document.getElementById("img-sl-4").style.display = 'block';
//      Sinon
        } else {
            //Masquer ChampImage 4
            document.getElementById("img-sl-4").style.display = 'none';
        }
// Sinon
    } else{
//      Masquer le slider
        document.getElementById("slider").style.display = 'none';
        // Et les champs images
        document.getElementById("img-sl-2").style.display = 'none';
        document.getElementById("img-sl-3").style.display = 'none';
        document.getElementById("img-sl-4").style.display = 'none';
    }

}

function ShowHideVideo() {

    if (document.getElementById("v_boolean").checked) {
        document.getElementById("video").style.display = 'block';
    } else{
        document.getElementById("video").style.display = 'none';
    }

}




// Menus d'édition rapide
// Show
// document.getElementById("shows-admin-menu").style.display = 'none';
// document.getElementById("posts-admin-menu").style.display ='none';
// document.getElementById("places-admin-menu").style.display ='none';
// document.getElementById("events-admin-menu").style.display ='none';
// Slider



