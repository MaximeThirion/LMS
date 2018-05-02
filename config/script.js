
console.log("Script JS");

document.addEventListener("DOMContentLoaded", function(event) {

    const envoyer_formulaire = document.getElementById('envoyer_formulaire');
    const envoyer_formulaire_profil = document.getElementById('envoyer_formulaire_profil');
    const envoyer_forgot_password = document.getElementById('envoyer_forgot_password');

    // Est ce que le bouton du formulaire 'envoyer_formulaire' existe ?
    if (envoyer_formulaire) {

        // Si oui
        const mot_de_passe = document.getElementById('password_login');

        // Si le mot de passe n'est pas renseigné, je désactive le bouton d'envoi du formulaire
        if (mot_de_passe.value.length === 0) {
            envoyer_formulaire.setAttribute("disabled", "disabled");
        }

        // Je verifie a chaque relachée de touche du clavier
        mot_de_passe.addEventListener('keyup', function (ev) {

            // Si le mot de passe fait moins de 7 caractères, je désactive le bouton d'envoi du formulaire
            if (mot_de_passe.value.length <= 7) {
                envoyer_formulaire.setAttribute("disabled", "disabled");
            }
            // Sinon j'active le bouton du formulaire
            else {
                envoyer_formulaire.removeAttribute("disabled");
            }
        });
    }

    // Est ce que le bouton du formulaire 'envoyer_forgot_password' existe ?
    if (envoyer_forgot_password) {

        // Si oui
        const mot_de_passe = document.getElementById('password_forgot');

        // Si le mot de passe n'est pas renseigné, je désactive le bouton d'envoi du formulaire
        if (mot_de_passe.value.length === 0) {
            envoyer_forgot_password.setAttribute("disabled", "disabled");
        }

        // Je verifie a chaque relachée de touche du clavier
        mot_de_passe.addEventListener('keyup', function (ev) {

            // Si le mot de passe fait moins de 7 caractères, je désactive le bouton d'envoi du formulaire
            if (mot_de_passe.value.length <= 7) {
                envoyer_forgot_password.setAttribute("disabled", "disabled");
            }
            // Sinon j'active le bouton du formulaire
            else {
                envoyer_forgot_password.removeAttribute("disabled");
            }
        });
    }

    // Est ce que le bouton du formulaire 'envoyer_formulaire_profil' existe ?
    if (envoyer_formulaire_profil) {

        // Si oui
        const mot_de_passe = document.getElementById('password_profile');

        // Si le mot de passe n'est pas renseigné, je désactive le bouton d'envoi du formulaire et j'ajoute la class 'is-invalid' sur l'input du password
        if (mot_de_passe.value.length === 0) {
            envoyer_formulaire_profil.setAttribute("disabled", "disabled");
            mot_de_passe.classList.add('is-invalid');
            mot_de_passe.classList.remove('is-valid');
        }

        // Je verifie a chaque relachée de touche du clavier
        mot_de_passe.addEventListener('keyup', function (ev) {

            // Si le mot de passe fait moins de 7 caractères, je désactive le bouton d'envoi du formulaire et j'ajoute la class 'is-invalid' sur l'input du password
            if (mot_de_passe.value.length <= 7) {
                envoyer_formulaire_profil.setAttribute("disabled", "disabled");
                mot_de_passe.classList.add('is-invalid');
                mot_de_passe.classList.remove('is-valid');
            }
            // Sinon j'active le bouton du formulaire et j'ajoute la class 'is-valid' sur l'input du password
            else {
                envoyer_formulaire_profil.removeAttribute("disabled");
                mot_de_passe.classList.add('is-valid');
                mot_de_passe.classList.remove('is-invalid');
            }
        });

    }
});