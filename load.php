<?php 
session_start();
require "includes/constants.php";
require "includes/dbConnection.php";
require "lang/en.php";
function ClassAutoload($Classname){
    $directories = ["forms", "processes", "structure", "tables", "globals","store","includes", "plugins","lang"];

    foreach($directories as $dir){
        $Filename = dirname(__FILE__) . DIRECTORY_SEPARATOR .$dir. DIRECTORY_SEPARATOR. $Classname.'.php';   

        if(file_exists($Filename) && is_readable($Filename)){
            require $Filename;
            return;
        }
    }

}
spl_autoload_register('ClassAutoload');

$ObjGlob = new fncs();
$ObjSendMail = new SendMail();

$ObjLayouts= new layouts();
$ObjMenus= new menus();
$ObjContents= new contents();
$Objforms = new forms();



//$conn = new dbConnection(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);

$conn = new dbConnection(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);
// Creating process intances
$ObjAuth = new auth();
$ObjAuth->signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf);
$ObjAuth->verify_code($conn, $ObjGlob, $ObjSendMail, $lang, $conf);

