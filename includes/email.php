<?php
require_once "Mail.php";

error_reporting(E_ERROR | E_WARNING | E_PARSE);

class PvaultEmail {
	var $from = 'no-reply@pvault.com';
	var $subject = "Verify Your Email";
	var $gmailUserName;
	var $gmailPassword;
	function __construct($gmailUserName, $gmailPassword) {
		$this->gmailUserName = $gmailUserName;
		$this->gmailPassword = $gmailPassword;
	}
	
	function sendEmail($to, $body) {

		$mailer = new Mail();
		$headers = array(
				'From' => $this->from,
				'To' => $to,
				'Subject' => $this->subject
		);

		$smtp = $mailer->factory('smtp', array(
				'host' => 'ssl://smtp.gmail.com',
				'port' => '465',
				'auth' => true,
				'username' => $this->gmailUserName,
				'password' => $this->gmailPassword
		));
		
		$mail = $smtp->send($to, $headers, $body);
		
// 		if (PEAR::isError($mail)) {
// 			var_dump( $mail->getMessage());
// 			throw  $mail->getMessage();
// 		}
	}
}
?>