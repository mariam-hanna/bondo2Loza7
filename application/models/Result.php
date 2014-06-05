<?php

class Application_Model_Result extends Zend_Db_Table_Abstract {

    protected $_name = 'result';
    

    function result($answers) {
        $result = "fail";
        
                
        if ($answers['ans1'] == $answers['correct_ans1']) {
            $result = "pass";

            $story = new Application_Model_Story();
            $storyLevel = $story->getStoryLevel();
            
            $levels = new Application_Model_Result();
            $userLevel = $levels->getUserLevel();
                     
            if ($userLevel == $storyLevel){
                $row = $this->fetchRow($this->select()->where('user_email = ?', $_SESSION['email'])->where('cat_id = ?', $_SESSION['cat_id']));
                $row->level += 1;
                $row->save();
            }
        }

        return $result;
        
    }
    
    
    function getUserLevel(){
        $userLevel = null;
        $select = $this->select()->from('result')->where('user_email = ?', $_SESSION['email'])->where("cat_id =?",$_SESSION['cat_id']);
            $levels = $this->fetchAll($select)->toArray();
            foreach ($levels as $level){
               $userLevel = $level['level'];   
            } 
            
        return $userLevel;
    }

    function signup($user_email) {
        $row = $this->createRow();
        $row->user_email = $user_email;
        $row->level = 1;
        $row->cat_id = 1;
        $row->save();

        $row = $this->createRow();
        $row->user_email = $user_email;
        $row->level = 1;
        $row->cat_id = 2;
        $row->save();
    }

}
