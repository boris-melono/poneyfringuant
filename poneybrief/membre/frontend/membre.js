var profileStates = {
    editProfile: false,
    changePassword: false,
    showDetails:true
  }
  
  $('.tabs').on('click', function(evenement) {
    evenement.stopPropagation();
    tabHandler(evenement.currentTarget);
  })
  
  $('.cancel').on('click', function(evenement) {
    evenement.stopPropagation();
    evenement.preventDefault();
    pageReset();
  });
  
  function tabHandler(tab){
    var editProfileTab = $(tab).hasClass('edit-profile');
    var changePassTab = $(tab).hasClass('change-password');
    
    switch (true) {
  
      // si l'onglet est Modifier le profil s'affiche
      case (editProfileTab && !isEditProfileShowing()):
        // Vérifiez si les détails du profil s'affichent
        if (isDetailsShowing()) {
          profileStates.showDetails = false;
          $('.student-details').removeClass('expanded');
        }
  
        // Supprimer le dépliant de tous les wrappers de contenu
        $('.tab-content').removeClass('expanded');
  
        // Ajouter un wrapper de contenu de profil développé pour modifier
        $('.edit-profile-form-wrap').addClass('expanded');
        
        profileStates.editProfile = true;
        profileStates.changePassword = false;
        break;
  
      // si l'onglet est Modifié le mot de passe ainsi que les détails sont affichés
      case (changePassTab && !isChangePasswordShowing()):
        // Vérifiez si les détails du profil s'affichent.
        if (isDetailsShowing()) {
          profileStates.showDetails = false;
          $('.student-details').removeClass('expanded');
        }
  
        // Supprimer le dépliant de tous les wrappers de contenu
        $('.tab-content').removeClass('expanded');
  
        // Ajouter un wrapper de contenu de profil développé pour modifier
        $('.change-password-form-wrap').addClass('expanded');
        profileStates.editProfile = false;
        profileStates.changePassword = true;
        break;
  
      // isi l'onglet profil est édité  alors on montre le profil édité 
      case (editProfileTab && isEditProfileShowing()):
        pageReset();
        break;
      // si l'onglet est Changer de Password est edité alors on montre le mdp
      case (changePassTab && isChangePasswordShowing()):
        pageReset();
        break;
    }
  }
  
  //Réinitialiser la page à son état par défaut
  function pageReset() {
    $('.tab-content').removeClass('expanded');
    $('.student-details').addClass('expanded');
    profileStates.showDetails = true;
    profileStates.editProfile = false;
    profileStates.changePassword = false;
  }
  
  // Vérifiez si les détails des membres sont affichés
  function isDetailsShowing() {
    return profileStates.showDetails;
  }
  
  // Vérifiez si le formulaire Modifier le mdp s'affiche
  function isChangePasswordShowing() {
    return profileStates.changePassword;
  }
  
  // Vérifiez si le formulaire Modifier le profil s'affiche
  function isEditProfileShowing() {
    return profileStates.editProfile;
  }
  