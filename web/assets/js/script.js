function hideAdmin() {
    if (document.getElementById("body").onload) {
//  Masquer les champs facultatifs au chargement du formulaire (onload)
        //popups
        document.getElementById("shows-admin-menu").style.display = 'none';
        document.getElementById('events-admin-menu').style.display = 'none';
        document.getElementById('places-admin-menu').style.display = 'none';
        // Slider
        document.getElementById("slider").style.display = 'none';
        // Video
        document.getElementById("video").style.display = 'none';

    }
}




function ShowAdminPopup() {
    if (document.getElementById("popup-header-shows-open").onclick) {
        document.getElementById("shows-admin-menu").style.display = 'block';


    }
}

    function LeEventAdminPopup() {
        if (document.getElementById("popup-header-events-open").onclick) {
            document.getElementById("events-admin-menu").style.display = 'block';


        }
    }

    function PlaceAdminPopup() {
            if (document.getElementById("popup-header-places-open").onclick) {
                document.getElementById("places-admin-menu").style.display = 'block';

            }
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
        } else {
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
        } else {
            document.getElementById("video").style.display = 'none';
        }

    }

// Masquer accès rapide au spectacles (X admin)

    function hideAdminShowPopup() {

        if (document.getElementById("popup-header-shows-close").onclick) {
            document.getElementById("shows-admin-menu").style.display = 'none';

        }
    }
//Masquer accès rapide au évènements (X admin)

    function hideAdminLeEventPopup() {
        if (document.getElementById("popup-header-events-close").onclick) {
            document.getElementById("events-admin-menu").style.display = 'none';

        }

    }
//Masquer accès rapide au lieux (X admin)
        function hideAdminPlacePopup() {
            if (document.getElementById("popup-header-places-close").onclick) {
                document.getElementById("places-admin-menu").style.display = 'none';

            }
        }







