
console.log("Script JS");

document.addEventListener("DOMContentLoaded", function(event) {

    const envoyer_formulaire = document.getElementById('envoyer_formulaire');
    const envoyer_formulaire_profil = document.getElementById('envoyer_formulaire_profil');
    const envoyer_forgot_password = document.getElementById('envoyer_forgot_password');

    if (envoyer_formulaire) {

        const mot_de_passe = document.getElementById('password_login');

        if (mot_de_passe.value.length === 0) {
            envoyer_formulaire.setAttribute("disabled", "disabled");
        }

        mot_de_passe.addEventListener('keyup', function (ev) {

            if (mot_de_passe.value.length <= 7) {
                envoyer_formulaire.setAttribute("disabled", "disabled");
            }
            else {
                envoyer_formulaire.removeAttribute("disabled");
            }
        });
    }

    if (envoyer_forgot_password) {

        const mot_de_passe = document.getElementById('password_forgot');

        if (mot_de_passe.value.length === 0) {
            envoyer_forgot_password.setAttribute("disabled", "disabled");
        }

        mot_de_passe.addEventListener('keyup', function (ev) {

            if (mot_de_passe.value.length <= 7) {
                envoyer_forgot_password.setAttribute("disabled", "disabled");
            }
            else {
                envoyer_forgot_password.removeAttribute("disabled");
            }
        });
    }

    if (envoyer_formulaire_profil) {

        const mot_de_passe = document.getElementById('password_profile');

        if (mot_de_passe.value.length === 0) {
            envoyer_formulaire_profil.setAttribute("disabled", "disabled");
            mot_de_passe.classList.add('is-invalid');
            mot_de_passe.classList.remove('is-valid');
        }

        mot_de_passe.addEventListener('keyup', function (ev) {

            if (mot_de_passe.value.length <= 7) {
                envoyer_formulaire_profil.setAttribute("disabled", "disabled");
                mot_de_passe.classList.add('is-invalid');
                mot_de_passe.classList.remove('is-valid');
            }
            else {
                envoyer_formulaire_profil.removeAttribute("disabled");
                mot_de_passe.classList.add('is-valid');
                mot_de_passe.classList.remove('is-invalid');
            }
        });

    }
});