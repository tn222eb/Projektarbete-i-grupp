<?php

class LoginMessage {
    private $messageId;
    private $messages = array('Användarnamn saknas', 'Lösenordet saknas', "Felaktig användarnamn och/eller lösenord ",
                              "Felaktig information i cookies", 'Användarnamn har otillåtet tecken',
                              'användarnamn är upptagen', 'Lösenordet matchar ej', 'Lösenordet måste vara minst 6 tecken',
                              'Användarnamn måste vara minst 3 tecken',
                              "Inloggning lyckades, vi kommer ihåg dig nästa gång", "Inloggning lyckades", "Utloggning lyckades",
                              'Registering lyckades', "Du är inloggad med cookies", "ReCaptcha text är fel", "Du är nu IP blockad", "Nuvarande Lösenord är fel",
                              "Lösenordet har ändrats, du måste logga in igen på nytt", "Nytt lösenord måste vara minst 6 tecken", "Nytt lösenordet kan inte ändras till samma nuvarande lösenord",
                              "Threads topic is too long", "Threads topic cannot be empty", "Thread has been created", "Lösenordet har otillåtet tecken","Lösenordet har återskapat ");    

    public function __construct($messageId) {
        $this->messageId = $messageId;
    }

    /**
     * @return string html with feedback
     */
    public function getMessage() {
        $message = $this->messages[$this->messageId];

        if($this->messageId < 9 || $this->messageId == 14 || $this->messageId == 15 || $this->messageId == 16 
          || $this->messageId == 18 || $this->messageId == 19 || $this->messageId == 20 || $this->messageId == 21 || $this->messageId == 23 || $this->messageId == 24 || $this->messageId == 25 || $this->messageId == 28 || $this->messageId == 29 || $this->messageId == 30) {
            $alert = "<div class='alert alert-danger alert-error'>";
        }   
        else{
            $alert = "<div class='alert alert-success'>";
        }
        if(!empty($message)) {
          $ret = "
          $alert
          <a href='#' class='close' data-dismiss='alert'>&times;</a>        
					<p>$message</p>
					</div>";
        }
        else {
            $ret = "<p>$message</p>";
        }
        return $ret;
    }
}