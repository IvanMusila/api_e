<?php 
function ClassAutoload($Classname){
    $directories = ["forms", "processes", "structure", "tables", "global","store"];

    foreach($directories as $dir){
        $Filename = dirname(__FILE__) . DIRECTORY_SEPARATOR .$dir. DIRECTORY_SEPARATOR. $Classname.'.php';   

        if(file_exists($Filename) && is_readable($Filename)){
            require $Filename;
            return;
        }
    }

}
spl_autoload_register('ClassAutoload');

$ObjLayouts= new layouts();

$ObjMenus= new menus();


