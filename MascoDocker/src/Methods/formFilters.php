<?php
    function test_text($string) : string{ 
        $toret = stripslashes($string);
        $toret = trim($toret);
        $toret = htmlspecialchars($toret);
        return $toret;
    }

    function test_email($email) : bool  {
      
    if(filter_var($email,FILTER_VALIDATE_EMAIL)!=false){ //Did this cuz filter var returns the email or false not true
            return true;
    }
    else{
        return false;
    }
    }

    function test_dni($idDocument) {
        // Remove any spaces and convert to uppercase
        $idDocument = test_text($idDocument);
        
        // Check if the length is correct
        if (strlen($idDocument) != 9) {
            return false;
        }
        
        // Extract the number and the letter
        $number = substr($idDocument, 0, 8);
        $lyric = substr($idDocument, -1);
        $lyric = strtoupper($lyric);
        
        // Calculate the letter corresponding to the number
        $valid_letters = "TRWAGMYFPDXBNJZSQVHLCKE";
        $index = $number % 23;
        $correct_lyric = $valid_letters[$index];
        
        // Check if the calculated letter matches the provided one
        if ($correct_lyric === $lyric) {
            return true;
        } else {
            return false;
        }
    }
    
   /*
   function password_hash($password): string{
    return password_hash($password);
   }
   */

   
?>