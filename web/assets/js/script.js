function showHideSlider() {
    if(document.getElementById('sl_boolean').checked) {
        document.getElementById('slider').style.display='block';
    } else {
        document.getElementById('slider').style.display='none';
    }
}

function showHideVideo() {
    if (document.getElementById('v_boolean').checked) {
        document.getElementById('video').style.display = 'block';
    } else {
        document.getElementById('video').style.display = 'none';
    }
}

function hideAdminShowFieldandPopup() {

        document.getElementById('shows-admin-menu').style.display ='none';
        document.getElementById('img4').style.display ='none';
        document.getElementById('img5').style.display ='none';
        document.getElementById('img6').style.display ='none';


}

function showAdminPopup() {
    if(document.getElementById('popup-header-show-open').click) {
        document.getElementById('shows-admin-menu').style.display = 'block';
    }
}
// Affichages conditionnels des champs "images slider"
function showHideImg4() {
    if(document.getElementById('img4-field').checked) {
        document.getElementById('img4').style.display ='block';
    } else {
        document.getElementById('img4').style.display ='none';
    }
}

function showHideImg5() {
    if(document.getElementById('img5-field').checked) {
        document.getElementById('img5').style.display ='block';
    } else {
        document.getElementById('img5').style.display ='none';
    }
}
function showHideImg6() {
    if(document.getElementById('img6-field').checked) {
        document.getElementById('img6').style.display ='block';
    } else {
        document.getElementById('img6').style.display ='none';
    }
}

