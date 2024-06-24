<?php

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valide email address.';
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('select * from users where email = :email', [
  'email' => $email
])->find();

if ($user) {
  // if yes, redirect to the login page.
  header('Location: /login');
  exit();
} else {
  // if not, save one to the database and then log the user in and redirect.
  $db->query('insert into users(email, password) values(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
  ]);

  login($user);

  header('Location: /');
  exit();
}
