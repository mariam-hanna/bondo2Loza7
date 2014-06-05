<?php

class Application_Model_Quiz extends Zend_Db_Table_Abstract 
{
    protected $_name = 'quiz';
    
    function diplayquiz($story) { 
        $select = $this->select()->from('quiz')->where("story_path='$story'");
        return $this->fetchAll($select)->toArray();
        
    }
    
    
    

}

