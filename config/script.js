
console.log("Script JS");

document.addEventListener("DOMContentLoaded", function(event) {

    const envoyer_formulaire = document.getElementById('envoyer_formulaire');
    const mot_de_passe = document.getElementById('exampleInputPassword1');

    mot_de_passe.addEventListener('keyup', function (ev) {

        if (mot_de_passe.value.length <= 7) {
            envoyer_formulaire.setAttribute("disabled", "disabled");
        }
        else {
            envoyer_formulaire.removeAttribute("disabled");
        }
    });
});