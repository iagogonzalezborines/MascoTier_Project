<?php
    function test_text($string) : string{ 
        $toret = stripslashes($string);
        $toret = trim($toret);
        $toret = htmlspecialchars($toret);
        return $toret;
    }

    function test_email($email) : bool|string  {
      
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

   function password_hash($password): string{
    return password_hash($password);
   }

   
?>