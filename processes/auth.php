<?php
class auth{
    
    public function bind_to_template($replacements, $template) {
        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }
    public function signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf){
    if(isset($_POST["signup"])){
        $errors = array();
        $fullname = $_SESSION["fullname"] = $conn->escape_values(ucwords(strtolower($_POST["fullname"])));
        $email_address = $_SESSION["email_address"] = $conn->escape_values(strtolower($_POST["email_address"]));
        $username = $_SESSION["username"] = $conn->escape_values(strtolower($_POST["username"]));

// Implement input validation and error handling
//=================================================
// verify that the full name contains letters and spaces only
if(ctype_alpha(str_replace(" ", "", str_replace("\'", "", $fullname))) === FALSE){
    $errors['nameLetters_err'] = "Invalid name format: Full name must contain letters and spaces only etc " . $fullname;
}

if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
    $errors['email_format_err'] = 'Wrong email format';
}

// verify that the new email address does not exist already in the database

$arr_email_address = explode("@", $email_address);
$spot_dom = end($arr_email_address);
$spot_user = reset($arr_email_address);

// Implement 2FA (email == PHP-Mailer).
//=====================================

if(!in_array($spot_dom, $conf['valid_domains'])){
    $errors['mailDomain_err'] = "Invalid email address domain. Use only: " . implode(", ", $conf['valid_domains']);
}
$exist_count = 0;
// Verify Email Already Exists
$spot_email_address_res = $conn->count_results(sprintf("SELECT email FROM users WHERE email = '%s' LIMIT 1", $email_address));
if ($spot_email_address_res > $exist_count){
    $errors['mailExists_err'] = "Email Already Exists";
}



// Verify Username Already Exists
$spot_username_res = $conn->count_results(sprintf("SELECT username FROM users WHERE username = '%s' LIMIT 1", $username));
if ($spot_username_res > $exist_count){
    $errors['usernameExists_err'] = "Username Already Exists";
}

// Verify if username contain letters only
if (!ctype_alpha($username)) {
    $errors['usernameLetters_err'] = "Invalid username format. 
        Username must contain letters only without space";
}


if(!count($errors)){
    
    
    $cols = ['fullname', 'email', 'username'];
    $vals = [$fullname, $email_address, $username];
    $data = array_combine($cols, $vals);
    $insert = $conn->insert('users', $data);
    if($insert === TRUE){
        $replacements = array('fullname' => $fullname, 'email_address' =>
        $email_address, 'verification_code' => $conf['verification_code'], 'site_full_name' => strtoupper($conf['site_initials']));

        $ObjSendMail->SendMail([
            'to_name' => $fullname,
            'to_email' => $email_address,
            'subject' => $this->bind_to_template($replacements, $lang["AccountVerification"]),
            'message' => $this->bind_to_template($replacements, $lang["AccRegVer_template"])
        ]);
        
        header('Location: signup.php');
        unset($_SESSION["fullname"], $_SESSION["email_address"], $_SESSION["username"]);
        exit();
    }else{
        $ObjGlob->setMsg('msg', 'Error(s)', 'invalid');
        $ObjGlob->setMsg('errors', $errors, 'invalid');
    }
        
   }
   }
 }
}