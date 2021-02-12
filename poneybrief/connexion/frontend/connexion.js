function start() {
document.getElementById("submit").addEventListener('click', () => {
    if(!document.getElementById("username").value){
        document.getElementById("username").focus();
        sweetAlert("PROBLEME!","Le mot de passe entré est vide!","erreur");
        return;
    }
    if(!document.getElementById("password").value){
        document.getElementById("password").focus();
        sweetAlert("PROBLEME!","Le mot de passe entré est vide!","erreur");
        return;
    }
  sweetAlert("SUPER!",`Bienvenu ${document.getElementById("username").value}`,"connexion Réussi");
})
}