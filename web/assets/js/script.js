// Afficher ou cacher les champs pour la création d'un slider
function showHideSlider() {
    if(document.getElementById('sl_boolean').checked) {
        document.getElementById('slider').style.display='block';
    } else {
        document.getElementById('slider').style.display='none';
    }
}
// Afficher ou cacher les champs pour l'intégration d'une video
function showHideVideo() {
    if (document.getElementById('v_boolean').checked) {
        document.getElementById('video').style.display = 'block';
    } else {
        document.getElementById('video').style.display = 'none';
    }
}
// Mettre les popups en display none au chargement de la page (s'applique sur le body)
function hideAdminShowFieldandPopup() {
    // Menus d'édition rapide
    // Show
    document.getElementById('shows-admin-menu').style.display ='none';
    // Formulaire Show (images slider)
    document.getElementById('img4').style.display ='none';
    document.getElementById('img5').style.display ='none';
    document.getElementById('img6').style.display ='none';
}

//Affichage Popups: Menus admin pour accès rapide (header admin)
// Afficher la liste des spectacles avec droits d'édition (create edit et trash) en accès rapide (popup): au clic
function showAdminPopup() {
    if(document.getElementById('popup-header-show-open').click) {
        document.getElementById('shows-admin-menu').style.display = 'block';
    }
}

// Afficher la liste des représentations avec droits d'édition (create edit et trash) en accès rapide (popup): au clic
function eventAdminPopup() {
    if (document.getElementById('popup-header-event-open').click) {
        document.getElementById('events-admin-menu').style.display = 'block';
    }
}
// Afficher la liste des articles avec droits d'édition (edit et trash) en accès rapide (popup): au clic
function postAdminPopup() {
    if (document.getElementById('popup-header-post-open').click) {
        document.getElementById('posts-admin-menu').style.display = 'block';
    }
}

// Afficher la liste des salles avec droits d'édition ( create edit et trash) en accès rapide (popup): au clic
function placeAdminPopup() {
    if (document.getElementById('popup-header-place-open').click) {
        document.getElementById('places-admin-menu').style.display = 'block';
    }
}

// Afficher la liste des références (dates passées avec droits d'édition (create edit et trash) en accès rapide (popup): au clic
function referenciesAdminPopup() {
    if (document.getElementById('popup-header-place-open').click) {
        document.getElementById('referencies-admin-menu').style.display = 'block';
    }
}

// Affichage conditionnels des champs "images slider"

    function showHideImg4() {
        if (document.getElementById('img4-field').checked) {
            document.getElementById('img4').style.display = 'block';
        } else {
            document.getElementById('img4').style.display = 'none';
        }
    }

    function showHideImg5() {
        if (document.getElementById('img5-field').checked) {
            document.getElementById('img5').style.display = 'block';
        } else {
            document.getElementById('img5').style.display = 'none';
        }
    }

    function showHideImg6() {
        if (document.getElementById('img6-field').checked) {
            document.getElementById('img6').style.display = 'block';
        } else {
            document.getElementById('img6').style.display = 'none';
        }
    }


