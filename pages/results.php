<h2>Page de résultat</h2>
<?php
require_once"../functions/crud.php";
require_once"../functions/functions.php";
var_dump($_POST);

if (isset($_POST)&& $_POST["action"]=="signup") {
    # code...

    //validation
$validationData = signupValidation($_POST);
    // si ma validation est ok je passe à la suite 
    //sinon j'affiche les messages d'erreur

    //vérifier si déjà dans la base


    //enregistrer mon utilisateur
if ($validationData['isValid']) {
    $data = [
        'email'=>$_POST['email'],
        'password'=>$_POST['password'],
        'username'=>$_POST['username'],
    ];
    $result = createUser($data);
}
    



    //si l'enregistrement a fonctionné : rediriger vers index.php
}
//Votre enregistre,ment s'est bien effectué
//Vous etes bien connecté
?>
