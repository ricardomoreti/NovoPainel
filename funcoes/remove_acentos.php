<?php 
  function removeAcentos($string){
      //$string = strtoupper($string);
      $string = str_replace("Á", "A", $string);
      $string = str_replace("À", "A", $string);
      $string = str_replace("Ã", "A", $string);
      $string = str_replace("Â", "A", $string);
      $string = str_replace("Ä", "A", $string);
      $string = str_replace("á", "A", $string);
      $string = str_replace("à", "A", $string);
      $string = str_replace("ã", "A", $string);
      $string = str_replace("â", "A", $string);
      $string = str_replace("ä", "A", $string);
      
      $string = str_replace("É", "E", $string);
      $string = str_replace("È", "E", $string);
      $string = str_replace("Ê", "E", $string);
      $string = str_replace("Ë", "E", $string);
      $string = str_replace("é", "E", $string);
      $string = str_replace("è", "E", $string);
      $string = str_replace("ê", "E", $string);
      $string = str_replace("ë", "E", $string);
      
      $string = str_replace("Í", "I", $string);
      $string = str_replace("Ì", "I", $string);
      $string = str_replace("Î", "I", $string);
      $string = str_replace("Ï", "I", $string);
      $string = str_replace("í", "I", $string);
      $string = str_replace("ì", "I", $string);
      $string = str_replace("î", "I", $string);
      $string = str_replace("ï", "I", $string);
      
      $string = str_replace("Ó", "O", $string);
      $string = str_replace("Ò", "O", $string);
      $string = str_replace("Õ", "O", $string);
      $string = str_replace("Ô", "O", $string);
      $string = str_replace("Ö", "O", $string);
      $string = str_replace("ó", "O", $string);
      $string = str_replace("ò", "O", $string);
      $string = str_replace("õ", "O", $string);
      $string = str_replace("ô", "O", $string);
      $string = str_replace("ö", "O", $string);
      
      $string = str_replace("Ú", "U", $string);
      $string = str_replace("Ù", "U", $string);
      $string = str_replace("Û", "U", $string);
      $string = str_replace("Ü", "U", $string);
      $string = str_replace("ú", "U", $string);
      $string = str_replace("ù", "U", $string);
      $string = str_replace("û", "U", $string);
      $string = str_replace("ü", "U", $string);
      
      $string = str_replace("Ñ", "N", $string);
      $string = str_replace("ñ", "N", $string);

      $string = str_replace("Ç", "C", $string);
      $string = str_replace("ç", "C", $string);
                              
      return $string;
  }
?>