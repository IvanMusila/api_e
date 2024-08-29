<?php
    class Fnc{

        var $name;
        public $fname;
        public $yob;
        public $age;
        protected $username;
        private $pass;
        public function computer_user($fname){

            return $fname;

        }

        public function user_age($fname, $yob){
            $user = $this->computer_user($fname);
            $age = date('Y')-$yob;
            return $user . " is " . $age;

        }

        public function hash_pass($pass){
            return password_hash($pass,PASSWORD_DEFAULT);
        }


    }

    //$Obj = new Fnc();
    //print "Hi! My name is  " . $Obj->computer_user("Alex") . " and I am ". $Obj->user_age("Ivan",2004);
    //print $Obj->user_age("Alex",2004);
    //print '<br>';

    //print $Obj->hash_pass('123');

?>