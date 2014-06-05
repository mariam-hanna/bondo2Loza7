<?php

class StoryController extends Zend_Controller_Action
{

    private $sess = null;

    private $user_data = null;

    public function init()
    {
        $this->user_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->sess = new Zend_Session_Namespace("Zend_Auth");
        $authorization = Zend_Auth::getInstance();
        $action = $this->getRequest()->getActionName();
        if ($this->user_data->admin == 'false'){
           $this->redirect("/user/"); 
        }
        else if (!$authorization->hasIdentity()) {
            $this->redirect("/user/login");
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function addstoryAction()
    {
        $addStoryForm = new Application_Form_Addstory();
        $this->view->addStoryForm = $addStoryForm;
        
        if ($this->getRequest()->isPost()) {
            echo "<script> alert('hiiiiiiiii') </script>";
            if ($addStoryForm->isValid($this->getRequest()->getParams())) {
                
                $addStoryForm->path->receive();
                //$path = "/var/www/zendapp/images/".$user_data->u_id;
                //$name = $profile->img->getFilename();
                //rename($name,$path.substr($name,-4));
                //rename($name,$name.$user_data->u_id);
                
                //$filename = substr($path.substr($name,-4),8);

                $story = new Application_Model_Story();
                $story->addStory($this->getRequest()->getParams());
                
                echo "<script> alert('hello') </script>";
                echo $this->getRequest()->getParams('path');
                //$this->redirect("user/showprofile");
            }
        }
        
    }


}



