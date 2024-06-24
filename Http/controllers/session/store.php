<?php

// Log in the user if the credentials match

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributs = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
]);

$auth = new Authenticator();

$signedIn = $auth->attempt($attributs['email'], $attributs['password']);

if (!$signedIn) {
  $form->error('email', 'Nothing matched the provided credentials.')->throw();
}

redirect('/');
