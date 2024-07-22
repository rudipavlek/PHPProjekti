<?php


$pwdSignup = 'Rudi';

$options = [
    'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "Rudi";

echo "<br>";
echo "sifra: " . $pwdLogin;
echo "<br>";
echo "hash: " . $hashedPwd;
echo "<br>";
if(password_verify($pwdLogin, $hashedPwd)){
    echo "Password je dobar";
}
else{
    echo "Password nije dobar";
}















// $sensitiveData = 'Rudi';
// $salt = bin2hex(random_bytes(16));
// $pepper = "ASecretPepperString";


// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash);

//ispod je primjer vadenja iz baze

// $sensitiveData = "Rudi2";

// $storedSalt = $salt;
// $storedHash = $hash;

// $pepper = "ASecretPepperString";

// $dataToHash = $sensitiveData . $salt . $pepper;


// $verification = hash("sha256", $dataToHash);

// if($verification === $storedHash){
//     echo "The data are the same";
// }
// else{
//     echo "The data are not the same";
// }