<?php 
include 'db.php';
include 'config.php';
$msg = '';
	if (isset($_POST['submit'])) {
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$message = trim($_POST['message']);

		if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
		    $subj = "Contact Form";
			 $body = "<table>
		    	<tr> Name - </tr>
		    	<tr> ".$name." </tr><br><br>
		    	<tr> Email - </tr>
		    	<tr> ".$email." </tr><br><br>
		    	<tr> Phone Number - </tr>
		    	<tr> ".$phone." </tr><br><br>
		    	<tr> Message - </tr>
		    	<tr> ".$message." </tr><br><br>
		     </table>";
		    $send = sendMail($email_name, $subj, $body);
		    if ($send) {
		    	
		    	echo "<script>alert('Message Sent');
		    	window.location.href = 'contact.html' 
		    	</script>";
		    	
		    }
		}
		
	}else{
	    echo "<script>
		    	window.location.href = 'contact.html' 
		    	</script>";
	}
?>
