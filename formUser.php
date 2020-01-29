<?php 
/* 
    Programme d'authentification d'un utilisateur
    Variable de travail:
    * login : pour le login unique
    * mdp : pour le motde passe
    * msg : pour retourner un message d'erreur ou de bienvenue
    
    Algorithme: 
    1. Récupérer les données (login, mdp) postées par le form
    2. Vérifier la validité des données
    3. Si pas d'erreur de validité, alors passez à l'étape 5
    4. si il y a des de validité alors retourner le message des erreurs rencontrées
    5. Authentifier le login/mdp : login et mdp existent et identifie une personne
    6. Si utilisateur connu alors envoyer le message de bienvenue
    7. Sinon envoyer le message d'erreur : compte inconnu
*/

//Etape 1
$login = isset($_POST['login']) ? $_POST['login'] : null; // cela veut dire que j'affecte à la valeur login soit la valeur avnt ou apres les ':'
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;

//Etape 2
//RG(Règle de Gestion): login et mdp doivent être non vides
if ( empty($login) || empty($mdp) ) {
    // Etape 4
   $msg = 'Veuillez remplir les champs obligatoires !';
}
//Etape 3 et 5
else {
    //Authentification
    if (userExist($login, $mdp)) {  //la condition vérifiera si, par exemple, $login ='sadeq' && $mdp = '123'
        //$msg = 'Bienvenue, '.$login;
        //Enregistrer les données utilisateurs dans une session
        session_start();
        $_SESSION['user'] = array(
            'login' => $login, 
            'nom' => 'sadeq',
            'email' => 'sadeq@mail.com',
            'photo' => 'sadeq.jpg',
        );

        //Redirection vers la page profile user
        header('Location: ./profileUser.php');
        exit; // fin du programme formUser.php

    }else {
        $msg = 'Désolé, compte inconnu !';
    }
}

// fonctions utiles
function userExist($login, $mdp) {
    if ($login == 'sadeq' && $mdp == '123'){
        return true;
    }
    return false;
}


?>

<div id="form_user">
    <form action="formUser.php" method="post"> <!---->
        <h1>Connectez-vous</h1>
        <p>
            <label for="">Login*</label>
            <input type="text" required name="login" value="<?=$login ?>">
        </p>
        <p>
            <label for="">Mot de passe*</label>
            <input type="password" required name="mdp" value="<?=$mdp ?>">
        </p>   
        <p>
            <button type="submit" name="connecter">Validez</button>
        </p>    
        <p>
            <div id="message"><?=$msg ?></div>
        </p> 
    </form>

</div>