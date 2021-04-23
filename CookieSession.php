<?php 
require_once "FunctionsAuth.php";
require_once "Token.php";

$auth = new FunctionsAuth();
$db_handle = new Controller();
$token = new Token();

$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);


$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60); 

$isLoggedIn = false;


if (! empty($_SESSION["member_id"])) {
    $isLoggedIn = true;
}

else if (! empty($_COOKIE["member_login"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
   
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    
    $userToken = $auth->getTokenByUsername($_COOKIE["member_login"],0);
    
    if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
        $isPasswordVerified = true;
    }

    if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
        $isSelectorVerified = true;
    }

    if($userToken[0]["expiry_date"] >= $current_date) {
        $isExpiryDareVerified = true;
    }
    
    if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDareVerified) {
        $isLoggedIn = true;
    } else {
        if(!empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
  
        $token->clearAuthCookie();
    }
}
?>