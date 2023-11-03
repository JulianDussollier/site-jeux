<?php

function signupValidation($data)
{
    $isValid = true;
    //username >1 caractere
    $usernameIsValidData = usernameIsValid($data['username']);
    $error_username = $usernameIsValidData['msg'];


    //email voir regex
    $error_email = "";
    //pwd
    $error_pwd = '';
    $validationData = pwdLenghtValidation($data['password']);
    if (!$validationData['isValid']) {
        $error_pwd = $validationData['msg'];
        $isValid = $validationData['isValid'];
    }


    return [
        "isValid" => $isValid,
        "error_username" => $error_username,
        "error_email" => $error_email,
        "error_pwd" => $error_pwd,
    ];
}

function usernameIsValid($username)
{
    if (strlen($username) < 2) {

        return [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur est trop court. il doit faire plus d'un caractère."
        ];
    } 
    //get user by username
    $userInDB = getUserByUsername($username);
    echo '<h2>Mon userInDB</h2>';
    var_dump($userInDB);
    
    if ($userInDB) {
        //error exist déja 
        return [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur est déjà utilisé."
        ];
    }

    return [
        'isValid' => true,
        'msg' => ''
    ];
}

function pwdLenghtValidation($pwd)
{
    # code...
    //minimum 8 max 16
    $length = strlen($pwd);
    $isValidData = [
        'isValid' => true,
        'msg' => ''
    ];
    if ($length < 8) {
        $isValidData = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Doit être supérieur a 8 caractères'
        ];
    } elseif ($length > 16) {
        $isValidData = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Doit être inférieur a 16 caractères'
        ];
    }
    return $isValidData;
}
