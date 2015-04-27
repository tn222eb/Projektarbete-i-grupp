<?php

require_once("Model/AdminModel.php");
require_once("Model/LoginModel.php");
require_once("View/CreateCourseView.php");

class AdminController 
{
    private $adminModel;
    private $loginModel;
    private $createCourseView;

    public function __construct() 
    {
        $this->adminModel = new AdminModel();
        $this->loginModel = new LoginModel();
        $this->createCourseView = new CreateCourseView();
    }

    public function CreateNewCourse() 
    {
    	if ($this->loginModel->isAdmin()) 
    	{
            $checkedBoxValues = $this->createCourseView->GetCheckedBoxes();
            $courseName = $this->createCourseView->GetCourseName();
            $courseCode = $this->createCourseView->GetCourseCode();

        	$this->adminModel->createNewCourse($checkedBoxValues, $courseName, $courseCode);
    	}
    }
}


    
        
    