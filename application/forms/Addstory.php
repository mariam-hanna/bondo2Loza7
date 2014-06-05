<?php

class Application_Form_Addstory extends Zend_Form
{

    public function init()
    {
        $level = new Zend_Form_Element_Text('level'); 
        $level->setRequired(); 
        $level->addValidator(new Zend_Validate_Digits());
        $level->setLabel('المستوي');
        $level->setAttribs(array('style' => 'width:300px;'));
        $level->setOptions(array('class'=>'form-control')); 
        
        
        $cat_id = new Zend_Form_Element_Text('cat_id'); 
        $cat_id->setRequired();
        $cat_id->addValidator(new Zend_Validate_Digits());
        $cat_id->setLabel("التصنيف"); 
        $cat_id->setAttribs(array('style' => 'width:300px;'));
        $cat_id->setOptions(array('class'=>'form-control'));
        
        
        $static = new Zend_Form_Element_Radio('static');
        $static->setLabel("صور متحركة"); 
        $static->addMultiOptions(array('صور متحركة','بدون صور متحركة')); 
        $static->setRequired();
        
        $name = new Zend_Form_Element_Text('name'); 
        $name->setRequired(); 
        $name->setLabel("اسم القصة"); 
        $name->setAttribs(array('style' => 'width:300px;'));
        $name->setOptions(array('class'=>'form-control'));
        
        $path =  new Zend_Form_Element_File('path');
        $path->setRequired();
        $path->setDestination("/var/www/bondo2Loza/public");
        $path->addValidator('Count', false, 1);
        $path->addValidator('Size', false, 102400);
        $path->addValidator('Extension', false, 'html');
        $path->setValueDisabled(true);
        $this->setAttrib('enctype', 'multipart/form-data');
        $path->setLabel('القصة');
        
        $submit = new Zend_Form_Element_Submit('اضف');//btn btn-warning 
        $submit->setOptions(array('class'=>'btn btn-success active btn-default'));
        
        $this->addElements(array($name,$cat_id,$level,$static,$path,$submit));
    }


}

