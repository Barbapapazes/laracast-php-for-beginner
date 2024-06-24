<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function __construct(public array $attributs)
  {
    if (!Validator::email($attributs['email'])) {
      $this->errors['email'] = 'Please provide a valide email address.';
    }

    if (!Validator::string($attributs['password'])) {
      $this->errors['password'] = 'Please provide a valid password.';
    }
  }

  public static function validate($attributs)
  {

    $instance = new static($attributs);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->errors, $this->attributs);
  }

  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;

    return $this;
  }
}
