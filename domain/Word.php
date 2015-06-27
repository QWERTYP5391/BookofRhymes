
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Word
 *
 * @author etunk066
 */

    
class Word implements JsonSerializable{
    private $name;
    private $definition;
    private $synonym;
    
   function __construct($name, $definiiton, $synonym)
    {
       $this->name = $name;
       $this->definition = $definiiton;
       $this->synonym = $synonym; 
       
       
    }
    //put your code here
     public function jsonSerialize() {
        return array(
            'name'=>$this->name,
            'definition'=>$this->definition,
            'synonym'=>$this->synonym
        );
       
    }
    
   
}




?>
