<?php

//   https://respect-validation.readthedocs.io/en/latest/rules/Unique/



//  https://github.com/rakit/validation
require __DIR__ . '/vendor/autoload.php';
use Rakit\Validation\Validator;


$validator = new Validator([
	'required' => ':attribute harus diisi',
	'email' => ':email tidak valid',
	// etc
]);


// make it
$validation = $validator->make($_POST + $_FILES, [
    'name'                  => 'required',
    'email'                 => 'required|email',
    'password'              => 'required|min:6',
    'confirm_password'      => 'required|same:password',
    'avatar'                => 'required|uploaded_file:0,500K,png,jpeg',
    'skills'                => 'array',
    'skills.*.id'           => 'required|numeric',
    'skills.*.percentage'   => 'required|numeric'
]);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();

    if ($emailError = $errors->first('confirm_password')) {
        echo $emailError;
    }

    //echo $errors->firstOfAll()['name'];

   // echo "<pre>";
  //  print_r($errors->firstOfAll());
   // echo "</pre>";
    exit;
} else {
    // validation passes
    echo "Success!";
}

?>