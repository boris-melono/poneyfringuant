<?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
 
            $dburl="mysql:host=localhost;dbname=inscription";
            $dbname = "inscription";
            $dbuser = "boris";
            $dbpass = "simplon";
    
            $membre = $_POST["membre"];
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];

            
           

            try{
                //On se connecte à la BDD
                $connexion = new PDO($dburl,$dbuser,$dbpass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                //On insère les données reçues si les champs sont remplis
                if(!empty($membre)  && !empty($email) && !empty($mdp)){
                    $statement = $connexion->prepare('
                        INSERT INTO membres (pseudo, email, mdp)
                        VALUES(":boris", ":melonoboris1995@hotmail.fr", ":melonoboris")');
                        $statement = $connexion->prepare(' 
                        INSERT INTO membres (membre, email, mdp)
                        VALUES(":clement", ":clementturpin@hotmail.fr", ":clementturpin")');
                    $statement->bindParam(':BORIS',$membre);
                    $statement->bindParam(':BORISain@gmail.com',$email);
                    $statement->bindParam(':privé',$mdp);
                    $statement->execute([]);
                }
                
                //On récupère les infos de la table 
                $statement = $connexion->prepare("SELECT membre, email, mdp FROM membres");
                $statement->execute([]);
                //On affiche les infos de la table
                $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);
                $keys = array_keys($resultat);
                for($i = 0; $i < count($resultat); $i++){
                    $n = $i + 1;
                    echo 'Membre n°' .$n. ' :<br>';
                    foreach($resultat[$keys[$i]] as $key => $value){
                        echo $key. ' : ' .$value. '<br>';
                    }
                    echo '<br>';
                }
            }   
            catch(Exception $exeption){
                echo 'Impossible de traiter les données. Erreur : '.$exeption->getMessage();
            }
        ?>
        