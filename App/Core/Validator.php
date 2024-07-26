<?php
namespace App\Core;

class Validator
{
    protected $errors = [];

    public function __construct($errors = [])
    {
        $this->errors = $errors;
    }

    public static function validate(array $inputsAndRusels, array $RulesAndmessages)
    {
        $errors = [];
        foreach ($inputsAndRusels as $input => $rule) {
            if (!self::checkRule($input, $rule)) {
                $errors[] = $RulesAndmessages[$rule];
            }
        }
        return new self($errors);
    }

    protected static function checkRule($input, $rule)
    {
        switch ($rule) {
            case 'email':
                return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
            case 'string':
                return is_string($input);
            case 'length':
                return strlen($input) > 5; // esempio di validazione lunghezza
            default:
                return false;
        }
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        $errors = $this->errors;
       $errors =  array_map(fn($error) => "<li>".$error."</li>", $errors);
       $stringErrors =  implode(' ', $errors);
       $stringErrors = '<ul>' .$stringErrors. '</ul>';
       return  $stringErrors; 
    }

    public static function confirmedPassword($data)
    {
        return ($data['password'] === $data['confirmed']) ? true : false;
    }
}
