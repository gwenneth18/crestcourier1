<?php  

include 'db.php';

$sql = mysqli_query($link, "SELECT * FROM settings WHERE id = 1 ");
if (mysqli_num_rows($sql) > 0) {
	$data = mysqli_fetch_assoc($sql);
	$track_prefix = $data['track_prefix'];
	$track_num = $data['track_num'];
	$invoice_terms = $data['invoice_terms'];
	$allow_print = $data['allow_print'];
	$show_map = $data['show_map'];

	$email_name = $data['email_name'];
	$email_address = $data['email_address'];
	$mail_track_update = $data['mail_track_update'];
	$mail_track_save = $data['mail_track_save'];

	$sitename = $data['sitename'];
	$site_title = $data['site_title'];
	$site_url = $data['site_url'];
}

function sendMail($email, $subject, $body){
	global $email_address, $email_name;
	$message = "$body";
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$email_name.'<'.$email_address.'>' . "\r\n";
    return mail($email,$subject,$message,$headers);
}

?>