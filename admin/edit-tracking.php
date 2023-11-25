<?php 
include 'header.php';
	if (isset($_GET['num'])) {
		$tnumbs = $_GET['num'];
		$select = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$tnumbs' ");
		if (mysqli_num_rows($select) > 0) {
			$row = mysqli_fetch_assoc($select);
      $senders_name = $row['sender_name'];  
       $senders_contact = $row['sender_contact'];  
       $senders_mail = $row['sender_email'];  
       $senders_address = $row['sender_address'];
       $receivers_name = $row['receiver_name'];  
       $receivers_contact = $row['receiver_contact'];  
       $receivers_mail = $row['receiver_email'];  
       $receivers_address = $row['receiver_address'];
       $statuss = $row['status'];  
       $dispatch_l = $row['dispatch_location'];  
       $dispatchh = $row['dispatch_date'];  
       $deliveryy = $row['delivery_date'];
       $current_loc = $row['current_location'];
       $desc = $row['pdesc'];
		}else{
			echo "<script>window.location.href = 'dashboard.php'; </script>";
		}
	}else{
		echo "<script>window.location.href = 'dashboard.php'; </script>";
	}



	if (isset($_POST['update'])) {
       $current_lo = text_input($_POST['current_loc']);
       $date = text_input($_POST['date']);
       $time = text_input($_POST['time']);
       $status = text_input($_POST['status']);
       $note = text_input($_POST['note']);

	     if (empty($current_lo) && empty($date) && empty($time) && empty($status) && empty($note) ) {
	       echo "<script>alert('Check !!! Some fields are empty')</script>";
	     }else{
	     	 $update = mysqli_query($link, "INSERT INTO track_update (`track_num`, `status`, `date`, `time`, `note`, `current_location`) VALUES ('$tnumbs', '$status', '$date', '$time', '$note', '$current_lo') ");
         if ($update) {
            mysqli_query($link, "UPDATE tracking SET current_location = '$current_lo', status = '$status' WHERE tracking_number = '$tnumbs' ");
            if ($mail_track_update == "Yes") {
                $subject = "$sitename";
                $body = "<p>Dear $receivers_name</p> <p>We are pleased to inform you that your shipment has been updated to $status </p>  <center>Tracking Information</center> <p> <strong>Tracking Number - $tnumbs </strong> </p> <p> <strong>Status - $status </strong> </p>  <p> <strong>Current Location - $current_lo </strong> </p> <p> <strong>Note - $note </strong> </p> <p>We hope this meets with your approval. Please do not hesistate to get in touch with us if you need further assistance.</p> <p>For more information visit the <a href='$site_url/track.php'>Tracking Page</a> </p> ";
                sendMail($receivers_mail,$subject,$body);
            }
         }
	     	 echo "<script>
            alert('Updated Successfully');
	           window.location.href = 'edit-tracking.php?num=$tnumbs';
	          </script>";
	          exit();
	     }
	}

	function text_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
	}
?>



<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label style="font-weight: bold;font-size: 25px;">TRACKING NUMBER  - <?php echo $tnumbs ?></label>
				
			</div>
		</div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form method="post" action="edit-tracking.php?num=<?php echo $tnumbs ?>" class="forms-sample">
            <div class="form-group">
              <label for="exampleInputUsername1">Status</label>
              <select class="form-control" name="status">
                <option value="Pending">Pending</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Picked Up">Picked Up</option>
                <option value="Arrived">Arrived</option>
                <option value="Delivered">Delivered</option>
                <option value="Departed">Departed</option>
                <option value="On hold">On hold</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Current Location</label>
              <input type="text" class="form-control" value="" name="current_loc" id="exampleInputPassword1" placeholder="Current Location ">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Date</label>
              <input type="date" class="form-control" value="" name="date" id="" placeholder="Date">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Time</label>
              <input type="time" class="form-control" value="" name="time" id="" placeholder="">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Note</label>
              <textarea name="note" class="form-control"></textarea>
            </div>
        </div>
      </div>
    </div>
    
</div>
    <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            	<button class="btn btn-lg btn-success btn-block" name="update">Update</button>
            </div>
        </div>
        </form>
    </div>


<?php 
include 'footer.php';
?>