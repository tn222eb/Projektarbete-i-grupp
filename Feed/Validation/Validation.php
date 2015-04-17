<?php

/**
* 
*/
class Validation 
{

//Message for Contact function.
  	private static $ErrorMsgAndEmail = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 		    <button type="button" class="close" data-dismiss="alert">
  									    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  								        <strong>Eposten och meddelandet kan inte vara tom!</strong></div>';										          
	private static $ErrorNameMessage = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 		    <button type="button" class="close" data-dismiss="alert">
  									    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  								        <strong>Namnet var fel formlerat!</strong></div>';
	private static $ErrorEmailMessage = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 	         <button type="button" class="close" data-dismiss="alert">
  							   	         <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  								         <strong>Eposten var fel formlerat!</strong></div>';
	private static $ErrorEmptyMessage = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 			<button type="button" class="close" data-dismiss="alert">
  									    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  							            <strong>Du kan inte skicka en tom meddelande!</strong></div>';
	private static $ErrorEmptyName = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 		 <button type="button" class="close" data-dismiss="alert">
  									 <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  									<strong>Namnet måste anges!</strong></div>';
	private static $ErrorEmptyEmail = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 		   <button type="button" class="close" data-dismiss="alert">
  								       <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  								       <strong>Eposten måste anges!</strong></div>';
	private static $ERRORInput = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 	  <button type="button" class="close" data-dismiss="alert">
  								  <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  							      <strong>Namnet måste anges!<br> Eposten måste anges! <br> Meddelandet kan inte vara tom!</strong></div>';
	private static $ErrorMiniName = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 		 <button type="button" class="close" data-dismiss="alert">
  								     <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  							         <strong>Namet kan inte vara mindre än 3 tecken!</strong></div>';
	private static $ErrorMiniMsg = '<div class="alert alert-danger alert-dismissible" role="alert">
  							 	    <button type="button" class="close" data-dismiss="alert">
  								    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  								    <strong>Meddelandet kan inte vara mindre än tre tecken!</strong></div>';

//Regex validation.
	private $emailExp;
	private $Exp;

	function __construct()
	{
		# code...
		//Regx took from http://www.phpportalen.net/.
		$this->emailExp = "/^[a-z0-9\å\ä\ö._-]+@[a-z0-9\å\ä\ö.-]+\.[a-z]{2,6}$/i";
		$this->Exp = "/^([a-zA-ZÅÄÖåäö]{2,10})([- ]{1})?([a-zA-ZÅÄÖåäö]{2,10})?$/";
	}



	//Validation for contact form.
		public function ContactFormValidation($Name,$Email,$Message) {
			if ($Name == null && $Email == null && $Message == null) {
				return self::$ERRORInput;
			}
		   else if ($Name == null) {
				return self::$ErrorEmptyName;
			}
			else if (mb_strlen($Name) < 3) {
				return self::$ErrorMiniName;
			}
			else if($Email == null && $Message == null) {
				return self::$ErrorMsgAndEmail;
			}
			else if ($Email == null) {
				return self::$ErrorEmptyEmail;
			}
			else if ($Message == null) {
				return self::$ErrorEmptyMessage;
			}
			else if (mb_strlen($Message) < 3) {
				return self::$ErrorMiniMsg;
			}
			else if(!preg_match($this->Exp, $Name)) {
				return self::$ErrorNameMessage;
			}
			else if(!preg_match($this->emailExp, $Email)) {
				return self::$ErrorEmailMessage;
			}	
				
				return true;
		}
}