<?php

class Validator {
    public static function string($data, $min = 0, $max = INF) {
        $data=trim($data);

        return
        is_string($data)
        && strlen($data) >= $min 
        &&strlen($data) <= $max;
    }
    static public function number($data, $min = 0, $max = INF) {
        $data = trim($data);
     
         return  is_numeric($data)
                 && $data >= $min
                 && $data <= $max;
       }


       public static function email($data) {

        return filter_var($data, FILTER_VALIDATE_EMAIL);

       }
    static public function password($data) {
        $minLenght = 8;

        $uppercaseRegex = '/[A-Z]/';
        $lowercaseRegex = '/a-z/';
        $numberRegex = '/[0-9]/';
        $specialcharRegex = '/[!@#$%^&*()\-_=+{};:,<.>]/';
     
        return strlen($data) >= $minLenght &&
            preg_match($uppercaseRegex, $data)&&
            //preg_match($lowercaseRegex, $data);
            preg_match($numberRegex, $data) &&
            preg_match($specialcharRegex, $data);
       }
}