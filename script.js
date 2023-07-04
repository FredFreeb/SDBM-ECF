// Attacher un gestionnaire d'événement au clic sur le bouton "Modifier"
$('.btn-primary').click(function() {
    // Récupérer l'ID du modal à partir de l'attribut data-target du bouton
    let modalId = $(this).data('bs-target');
    
    // Afficher le modal correspondant en utilisant la méthode modal('show')
    $(modalId).modal('show');
});
