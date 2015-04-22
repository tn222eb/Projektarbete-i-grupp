<?php

require_once("./View/LoginView.php");
require_once("./Model/LoginModel.php");
require_once("./Model/ImagesModel.php");
require_once("View/BaseView.php");
require_once('View/FeedView.php');

class LoggedInView extends BaseView 
{
    private $feedView;
    private $model;
    private $username;
    private $imagesModel;
    private $pic;

    public function __construct() {
        $this->model = new LoginModel();
        $this->imagesModel = new ImagesModel();
        $this->feedView = new FeedView();
    }
   
    public function showLoggedInPage() {
        $this->username = $this->model->getUsername();

        $html = "<!DOCTYPE html>
        <html>
        <head>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js' type='text/javascript'></script>
        <script src='js/CommentSlideButton.js' type='text/javascript'></script>
        <meta http-equiv='Content-Type'content='text/html; charset=utf-8' />
        <link rel='stylesheet' type='text/css' href='css/commentSlideStyle.css' /> 
        <title>LSN</title>
        </head>

        <body>
        <div class='container'>";
        $Images = glob("imgs/*.*");
            foreach ($Images as $value) {  

              $img = $this->imagesModel->getImgs($this->username);
              if ($img->getImg() == basename($value)) {
                
                $html .= '<div id="imgArea"><img src="'.$value.'"><strong>'.$this->username.' är inloggad</strong></div>';
                $this->pic = $value;
              }
            }
         
        if(basename($this->pic) === "") {
           $html .= '<div id="imgArea"><img src="img/default.jpg"><strong>'.$this->username.' är inloggad</strong></div>';
        }
        $html .= "
            <br><br>
            <nav class='navbar navbar-default' role='navigation'>
            <div class='navbar-header'>
              <button type='button' class='navbar-toggle' data-toggle='collapse' 
                 data-target='#example-navbar-collapse'>
                 <span class='sr-only'>Toggle navigation</span>
                 <span class='icon-bar'></span>
                 <span class='icon-bar'></span>
                 <span class='icon-bar'></span>
              </button>
           </div>
           <div class='collapse navbar-collapse' id='example-navbar-collapse'>
              <ul class='nav navbar-nav'>
                 <li><a name='MyProfile' href='?". $this->ProfileLocation . "'>Min profil</a></li>
                 <li><a name='changePassword' href='?" . $this->changePasswordLocation . "'>Change password</a></li>
                 <li><a name='logOut' href='?". $this->logOutLocation . "'>Log ut</a></li>
              </ul>
           </div>
        </nav>
        $this->message
        ";
        $html .= $this->feedView->GetFeedHTML();
        $html .= "</div>
        </body>
        </html>";

        return $html;
    }
 
    /**
     * @return bool true if user has pressed log out else false
     */
    public function didUserPressLogOut() {
        if (isset($_GET[$this->logOutLocation])) {
            return true;
        }
        return false;

    }

    public function didUserPressAdminPanel() {
        if (isset($_GET[$this->adminPanelLocation])) {
            return true;
        }
        return false;
    }

    /**
     * @param $message string containing feedback
     */
    public function setMessage($message) {
        $this->message = $message;
    }
}