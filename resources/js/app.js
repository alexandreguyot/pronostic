/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

/* Sidebar - Side navigation menu on mobile/responsive mode */
window.toggleNavbar = function (collapseID) {
  document.getElementById(collapseID).classList.toggle('hidden')
  document.getElementById(collapseID).classList.toggle('bg-white')
  document.getElementById(collapseID).classList.toggle('m-2')
  document.getElementById(collapseID).classList.toggle('py-3')
  document.getElementById(collapseID).classList.toggle('px-6')
}

/* Opens sidebar navigation that contains sub-items */
window.openSubNav = function (el) {
  el.nextElementSibling.classList.toggle('hidden')
}

window.initialSubNavLoad = function () {
  document.getElementsByClassName('has-sub sidebar-nav-active').forEach(function(el) {
    window.openSubNav(el)
  })
}

/* Opens sidebar navigation that contains sub-items */
initialSubNavLoad()

/* Function for dropdowns */
window.openDropdown = function openDropdown(event, dropdownID) {
  let element = event.target;
  while (element.nodeName !== "A") {
    element = element.parentNode;
  }
  Popper.createPopper(element, document.getElementById(dropdownID), {
    placement: "bottom-start",
  });
  document.getElementById(dropdownID).classList.toggle("hidden");
  document.getElementById(dropdownID).classList.toggle("block");

  if (dropdownID == 'nav-notification-dropdown') {
    fetch('/admin/user-alerts/seen')
  }
}

window.Dropzone.options.mydz = {
    dictDefaultMessage: "Déposer les fichiers ici pour les envoyer",
    dictDefaultMessage : "Déposer les fichiers ici pour les envoyer",
    dictFallbackMessage : "Votre navigateur ne prend pas en charge les téléchargements de fichiers par glisser-déposer.",
    dictFallbackText : "Veuillez utiliser le formulaire de secours ci-dessous pour télécharger vos fichiers comme au bon vieux temps.",
    dictFileTooBig : "Le fichier est trop volumineux ({{filesize}}MiB). Taille maximale des fichiers: {{maxFilesize}}MiB.",
    dictInvalidFileType : "Vous ne pouvez pas envoyer de fichiers de ce type.",
    dictResponseError : "Le serveur a répondu avec le code {{statusCode}}.",
    dictCancelUpload : "Annuler l'envoi",
    dictCancelUploadConfirmation : "Êtes-vous sûr de vouloir annuler cet envoi ?",
    dictRemoveFile : "Supprimer le fichier",
    dictMaxFilesExceeded : "Vous ne pouvez plus charger de fichiers.",
};

