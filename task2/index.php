<?php
function sum($a)
{
   return function ($b) use ($a){
       return $a+$b;
   };
}

?>