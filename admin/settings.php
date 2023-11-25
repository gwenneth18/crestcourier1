<?php  
include 'header.php';

if (isset($_POST['save-ship'])) {
	$prefix = trim($_POST['prefix']);
	$trace = trim($_POST['trace']);
	$print = trim($_POST['print']);
	$map = trim($_POST['show_map']);
	$terms = trim($_POST['terms']);

	if (!empty($prefix) && !empty($trace) && !empty($print) && !empty($show_map) && !empty($terms)) {
		$sql = mysqli_query($link, "UPDATE settings SET `track_prefix`='$prefix',`track_num`='$trace',`invoice_terms`='$terms',`allow_print`='$print',`show_map`='$map' WHERE id = 1 ");
		if ($sql) {
			echo "<script>
			alert('Settings saved');
			window.location.href = 'settings.php';
			</script>";
		}
	}
}

if (isset($_POST['save-mail'])) {
	$mail_name = trim($_POST['mail_name']);
	$mail_add = trim($_POST['mail_add']);
	$mail_track = trim($_POST['mail_track']);
	$mail_update = trim($_POST['mail_update']);

	if (!empty($mail_name) && !empty($mail_add) && !empty($mail_track) && !empty($mail_update) ) {
		$sql = mysqli_query($link, "UPDATE settings SET `email_name`='$mail_name',`email_address`='$mail_add',`mail_track_update`='$mail_update',`mail_track_save`='$mail_track' WHERE id = 1 ");
		if ($sql) {
			echo "<script>
			alert('Settings saved');
			window.location.href = 'settings.php';
			</script>";
		}
	}
}

if (isset($_POST['save-general'])) {
	$site_name = trim($_POST['site_name']);
	$sitetitle = trim($_POST['sitetitle']);
	$siteurl = trim($_POST['siteurl']);

	if (!empty($site_name) && !empty($sitetitle)) {
		$sql = mysqli_query($link, "UPDATE settings SET `site_url` = '$siteurl', `sitename`='$site_name',`site_title`='$sitetitle' WHERE id = 1 ");
		if ($sql) {
			echo "<script>
			alert('Settings saved');
			window.location.href = 'settings.php';
			</script>";
		}
	}
}
?>



<div class="row">
    <div class="col-lg-12">
      	<div class="accordion" id="accordionExample">
      		<div class="accordion-item">
			    <h2 class="accordion-header" id="headingThree">
			      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			        General Settings
			      </button>
			    </h2>
			    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
			      <div class="accordion-body">
			        	<form method="post" action="settings.php" class="forms-sample">
				            <div class="form-group">
				              <label for="exampleInputUsername1">Site Name</label>
				              <input type="text" class="form-control" name="site_name" value="<?php echo $sitename ?>" required>
				            </div>

				            <div class="form-group">
				              <label for="exampleInputUsername1">Site Title</label>
				              <input type="text" class="form-control" name="sitetitle" value="<?php echo $site_title ?>" required>
				            </div>

				            <div class="form-group">
				              <label for="exampleInputUsername1">Site URL</label>
				              <input type="text" class="form-control" name="siteurl" value="<?php echo $site_url ?>" required>
				            </div>


				            
				            <div class="text-center">
				              <button type="submit" name="save-general" class="btn btn-block btn-success">Save</button>
				            </div>  
				        </form>
			      </div>
			    </div>
			  </div>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="headingOne">
		      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
		        Shipping Settings
		      </button>
		    </h2>
		    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		      <div class="accordion-body">
		      		<form method="post" action="settings.php" class="forms-sample">
			            <div class="form-group">
			              <label for="exampleInputUsername1">Delivery Prefix</label>
			              <input type="text" class="form-control" name="prefix" minlength="4" value="<?php echo $track_prefix ?>" required>
			            </div>
			            <div class="form-group">
			              <label for="exampleInputEmail1">Number of digits in the trace: EXAMPLE: 0000001</label>
			              <input type="number" class="form-control" value="<?php echo $track_num ?>" name="trace" id="" required>
			            </div>
			            <div class="form-group">
			              <label for="exampleInputEmail1">Allow Print Invoice</label>
			              <select name="print" class="form-control" required="">
			              	<option value="Yes" <?php echo $allow_print == "Yes" ? "selected" : "" ?>>Yes</option>
			              	<option value="No" <?php echo $allow_print == "No" ? "selected" : "" ?>>No</option>
			              </select>
			            </div>
			            <div class="form-group">
			              <label for="exampleInputEmail1">Show Map</label>
			              <select name="show_map" class="form-control" required="">
			              	<option value="Yes" <?php echo $show_map == "Yes" ? "selected" : "" ?>>Yes</option>
			              	<option value="No" <?php echo $show_map == "No" ? "selected" : "" ?>>No</option>
			              </select>
			            </div>
			            <div class="form-group">
			              <label for="exampleInputEmail1">Invoice Terms</label>
			              <textarea name="terms" class="form-control"><?php echo $invoice_terms ?></textarea>
			            </div>
			            <div class="text-center">
			              <button type="submit" name="save-ship" class="btn btn-block btn-success">Save</button>
			            </div>  
			        </form>
		      </div>
		    </div>
		  </div>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="headingTwo">
		      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		        E-Mail Settings
		      </button>
		    </h2>
		    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
		      <div class="accordion-body">
		        <form method="post" action="settings.php" class="forms-sample">
		            <div class="form-group">
		              <label for="exampleInputUsername1">Email Name</label>
		              <input type="text" class="form-control" name="mail_name" value="<?php echo $email_name ?>" required>
		            </div>

		            <div class="form-group">
		              <label for="exampleInputUsername1">Email Address</label>
		              <input type="text" class="form-control" name="mail_add" value="<?php echo $email_address ?>" required>
		            </div>

		            <div class="form-group">
		              <label for="exampleInputUsername1">Send Mail When For New Tracking</label>
		              <select name="mail_track" class="form-control" required="">
		              	<option value="Yes" <?php echo $mail_track_save == "Yes" ? "selected" : "" ?>>Yes</option>
		              	<option value="No" <?php echo $mail_track_save == "No" ? "selected" : "" ?>>No</option>
		              </select>
		            </div>

		            <div class="form-group">
		              <label for="exampleInputUsername1">Send Mail When Tracking's Update</label>
		              <select name="mail_update" class="form-control" required="">
		              	<option value="Yes" <?php echo $mail_track_update == "Yes" ? "selected" : "" ?>>Yes</option>
		              	<option value="No" <?php echo $mail_track_update == "No" ? "selected" : "" ?>>No</option>
		              </select>
		            </div>
		            
		            <div class="text-center">
		              <button type="submit" name="save-mail" class="btn btn-block btn-success">Save</button>
		            </div>  
		        </form>
		    </div>
		  </div>
		  
		</div>
    </div>
</div>


</div>




<?php  
include 'footer.php';
?>