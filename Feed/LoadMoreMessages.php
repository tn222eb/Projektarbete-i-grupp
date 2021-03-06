<?php

require_once('helper/time.php');
require_once('Model/Dao/MessagesRepository.php');
require_once('View/HTMLView.php');

$messagesRepository = new MessagesRepository();
$htmlView = new HTMLView();

if (isset($_POST["last_id"]) && strlen($_POST['last_id']) > 0 && is_numeric($_POST['last_id'])
    && isset($_POST["user_id"]) && strlen($_POST['user_id']) > 0 && is_numeric($_POST['user_id']))
{
    // Hämtar ut sista id som har postats från Ajax anropet
    $last_id = $_POST['last_id'];
    $user_id = $_POST['user_id'];

    $messages = $messagesRepository->GetMoreMessages($last_id, $user_id);

      $html = 
    '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <link rel="icon" href="../../favicon.ico">

        ';

        

        $html .= '<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/customCss.css" rel="stylesheet">
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      </head>

      <body>';

    foreach ($messages as $message) {
                        
                            # code...
                            if ($message->getOpen() == 0) {

                            $open = '<img src="View/DefaultImages/msg.png" alt="NotOpened" title="NotOpened" />';
                            }
                            else {
                                $open ='<img src="View/DefaultImages/new.png" alt="Opened" title="Opened" />';
                            }
                        
                            $html .= 
                                '<div id="msg'.$message->getMsgId().'" class="msg">'.
                           '<div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 class="panel-title"><a href="?msg&id='.$message->getMsgId().'">'.$open.'</a></h3>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class=" col-md-9 col-lg-9 "> 
                                  <table class="table table-user-information">
                                    <tbody>'.
                                 '<tr><td><strong>From: </strong> '.$message->getFromName().'</td>'.
                                '<td><strong>Subject: </strong> '.$message->getSubject().'</td>'.
                                '<td><strong>Date: </strong> '.$message->getDate().'</td>'.
                                '<td><strong>Time: </strong> '.time_passed($message->getTime()).'</td>'.
                                '</tr>
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                              </div>
                            </div>'.
                        '</div>';
                        }



                $html .= '  <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/ie10-viewport-bug-workaround.js"></script>
      </body>
    </html>';

    $htmlView->EchoHTML($html);
}


