<?php

function signupValidation($data)
{
    $isValid = true;
    //username >1 caractere
    $error_username = "";
    if (strlen($data['username']) < 2) {
        $isValid = false;
        $error_username = "Votre nom d'utilisateur est trop court. il doit faire plus d'un caractère.";
    }

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

function pwdLenghtValidation($pwd)
{
    # code...
    //minimum 8 max 16
    $length = strlen($pwd);
    $responses = [
        'isValid' => true,
        'msg' => ''
    ];
    if ($length < 8) {
        $responses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Doit être supérieur a 8 caractères'
        ];
    } elseif ($length > 16) {
        $reponses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Doit être inférieur a 16 caractères'
        ];
    }
    return $responses;
}
