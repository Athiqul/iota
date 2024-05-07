
<?php


function inputStringValidate($str)
{
    //Maping valid string characters
    $validStrings=[
        "("=>")",
        "{"=>"}",
        "["=>"]",
        ];
       
       //Loop through over the input string
    for($i=0;$i<strlen($str);$i+=2)//Odd number index always follow opening bracket thats +2 increments
    {
        //store every characters in a temp variables 
        $character=$str[$i];
        $check=true;
      
        //Check input character exist in a validstring array which is all opening brackets
        if(array_key_exists($character,$validStrings)){
            
            
            // last index is opening bracket 
            if($i==strlen($str)-1)
            {
                return false;
            }
            //Check after opening bracket closing bracket value matching next string value
            if($validStrings[$character]!=$str[$i+1])
            {
                //Closing brackets failed
                $check=false;
                
            }
        }else {
            
            //Opening brackets does not exist
            $check=false;
        }
          
        
    }
    //its validate strings
    return $check;
  
}


?>

