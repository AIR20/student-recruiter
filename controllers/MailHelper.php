<?php 
class MailHelper {

	public static function send_email($name, $email, $subject, $text) {  
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 
			'https://api.mailgun.net/v2/'.MAILGUN_DOMAIN.'/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, 
			array(
				'from' => 'Student Recruiter <student-recruiter@example.com>',
				'to' => "$name <$email>",
				'subject' => $subject,
				'text' => $text
			)
		);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

}