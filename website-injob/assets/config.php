<?php
    // require_once('adm/inc/conn.php');
    // require_once( 'assets/class.db.php' );
    // $database   = new DB(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    // date_default_timezone_set('America/Sao_Paulo');


      
    require "assets/class/urlfr.php";
    function valida_campos($campo,$conn){return mysqli_real_escape_string($conn,htmlspecialchars($campo));}
    function soNumero($str) {return preg_replace("/[^0-9]/", "", $str);}
    function mes($m) {
        switch ($m) {
            case '1': $mm = "Jan"; break;
            case '2': $mm = "Fev"; break;
            case '3': $mm = "Mar"; break;
            case '4': $mm = "Abr"; break;
            case '5': $mm = "Mai"; break;
            case '6': $mm = "Jun"; break;
            case '7': $mm = "Jul"; break;
            case '8': $mm = "Ago"; break;
            case '9': $mm = "Set"; break;
            case '10': $mm = "Out"; break;
            case '11': $mm = "Nov"; break;
            case '12': $mm = "Dez"; break;
            default: $mm = "";break;
        }
        return $mm;
    }
?>