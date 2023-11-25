<?php 
include 'header.php';
	
$tnumbs = "1234567890";
$tnumbs = str_shuffle($tnumbs);
$tnumbs = substr($tnumbs, 0, $track_num);
$tnumbs = $track_prefix."-".date('m')."-".$tnumbs;

$msg = "";

$sendersname = $senderscontact = $sendersmail = $sendersaddress = $receiversname = $receiverscontact = $receiverscontact = $receiversmail =  $receiversaddress = $status = $dispatchl = $dispatch = $delivery = $desc = "";

$carrier = $carrier_ref = $weight = $payment_mode = $ship_mode = $quantity = $delivery_time = $err = $dest = "";

	if (isset($_POST['submit'])) {
	   $sendersname = text_input($_POST['sname']);	
     $senderscontact = text_input($_POST['scontact']);  
     $sendersmail = text_input($_POST['smail']);  
     $sendersaddress = text_input($_POST['saddress']);
     $receiversname = text_input($_POST['rname']);  
     $receiverscontact = text_input($_POST['rcontact']);  
     $receiversmail = text_input($_POST['rmail']);  
     $receiversaddress = text_input($_POST['raddress']);
     $status = text_input($_POST['status']);  
     $dispatchl = text_input($_POST['dispatchl']);  
     $dispatch = text_input($_POST['dispatch']);  
     $delivery = text_input($_POST['delivery']);  
     $desc = text_input($_POST['desc']); 

     $carrier = text_input($_POST['carrier']);  
     $carrier_ref = text_input($_POST['carrier_ref']);  
     $weight = text_input($_POST['weight']);  
     $payment_mode = text_input($_POST['payment_mode']);  
     $ship_mode = text_input($_POST['ship_mode']);  
     $quantity = text_input($_POST['quantity']);  
     $delivery_time = text_input($_POST['delivery_time']);  
     $dest = text_input($_POST['dest']);  

     if (isset($_FILES['image'])) {
        $tmp = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $imgname = $tnumbs.".png";
        $dir = "../uploads/".$imgname;
        $check = @getimagesize($tmp);
      
     }
      
    if (empty($sendersname) || empty($senderscontact) || empty($sendersmail) || empty($sendersaddress) || empty($receiversname) || empty($receiverscontact) || empty($receiversmail) || empty($receiversaddress) || empty($status) || empty($dispatchl) || empty($dispatch) || empty($delivery) || empty($carrier) || empty($carrier_ref) || empty($weight) || empty($payment_mode) || empty($ship_mode) || empty($quantity) || empty($delivery_time) || empty($dest) ) {
       echo "<script>alert('Check !!! Some fields are empty')</script>";
     }elseif($check === false){
       echo "<script>alert('You didnt select an image')</script>";
     }else{
       $insert = mysqli_query($link, " INSERT INTO tracking (tracking_number, sender_name, sender_contact, sender_email, sender_address, status, dispatch_location, receiver_email, receiver_name, receiver_contact, receiver_address, dispatch_date, delivery_date, pdesc, carrier, carrier_ref, weight, payment_mode, ship_mode, quantity, delivery_time, image, destination) VALUES ('$tnumbs', '$sendersname', '$senderscontact', '$sendersmail', '$sendersaddress', '$status', '$dispatchl', '$receiversmail', '$receiversname', '$receiverscontact', '$receiversaddress', '$dispatch', '$delivery', '$desc', '$carrier', '$carrier_ref', '$weight', '$payment_mode', '$ship_mode', '$quantity', '$delivery_time', '$imgname', '$dest' ) ");
       if ($insert) {
          move_uploaded_file($tmp, $dir);

          //send mail
          if ($mail_track_save == "Yes") {
              $subject = "$sitename";
              $body = "<p>Dear $receiversname</p> <p>We are pleased to inform you that your shipment has been registered with us at <strong>$sitename</strong>.</p>  <center>Tracking Information</center> <p> <strong>Tracking Number - $tnumbs </strong> </p> <p> <strong>Status - $status </strong> </p> <p> <strong>Package - $desc </strong> </p> <p> <strong>Dispatch Location - $dispatchl </strong> </p> <p> <strong>Estimated Delivery Date - $delivery </strong> </p> <p>For more information visit the <a href='$site_url/track.php'>Tracking Page</a> </p> ";
              sendMail($receiversmail,$subject,$body);
          }

          echo "<script>
            alert('New Tracking Added Successfully');
            window.location.href = 'dashboard.php';
          </script>";
       }else{
        echo mysqli_error($link);
       }
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
				<label style="font-weight: bold;font-size: 25px;">TRACKING NUMBER</label>
				<input type="text" readonly="" value="<?php echo $tnumbs ?>" name="tracking_number" class="form-control" id="exampleInputUsername1" placeholder="Username">
			</div>
		</div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sender's Info</h4>
          <p class="card-description">
            
          </p>
          <form method="post" action="add-tracking.php" enctype="multipart/form-data" class="forms-sample">
            <div class="form-group">
              <label for="exampleInputUsername1">Sender's Name</label>
              <input type="text" class="form-control" name="sname" value="<?php echo $sendersname ?>" id="exampleInputUsername1" placeholder="Sender's Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sender's Contact</label>
              <input type="number" class="form-control" value="<?php echo $senderscontact ?>" name="scontact" id="exampleInputEmail1" placeholder="Sender's Contact">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sender's Email</label>
              <input type="text" class="form-control" name="smail" value="<?php echo $sendersmail ?>" id="exampleInputPassword1" placeholder="Sender's Email">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Sender's Address</label>
              <textarea class="form-control" placeholder="Sender's Address" name="saddress"><?php echo $sendersaddress ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Status</label>
              <select class="form-control" name="status">
              	<option value="Pending">Pending</option>
                <option value="Active">Active</option>
              	<option value="Inactive">Inactive</option>
              	<option value="Picked Up">Picked Up</option>
              	<option value="Arrived">Arrived</option>
              	<option value="Delivered">Delivered</option>
              	<option value="On hold">On hold</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dispatch Location</label>
              <input type="text" class="form-control" value="<?php echo $dispatchl ?>" name="dispatchl" id="exampleInputPassword1" placeholder="Origin Port">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Carrier</label>
              <input type="text" class="form-control" value="<?php echo $carrier ?>" name="carrier" id="exampleInputPassword1" placeholder="Carrier Ex- DHL">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Carrier reference number</label>
              <input type="text" class="form-control" value="<?php echo $carrier_ref ?>" name="carrier_ref" id="exampleInputPassword1" placeholder="Carrier reference number Ex- 32423">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Weight(Add unit e.g KG)</label>
              <input type="text" class="form-control" value="<?php echo $weight ?>" name="weight" id="exampleInputPassword1" placeholder="Weight">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Payment Mode</label>
              <input type="text" class="form-control" value="<?php echo $payment_mode ?>" name="payment_mode" id="exampleInputPassword1" placeholder="Payment Mode">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Package Image</label>
              <input type="file" class="form-control" name="image" required id="exampleInputPassword1" >
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Receiver's Info</h4>
          <p class="card-description">
          </p>
      
            <div class="form-group">
              <label for="exampleInputUsername1">Receiver's Name</label>
              <input type="text" class="form-control" value="<?php echo $receiversname ?>" name="rname" id="exampleInputUsername1" placeholder="Receiver's Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Receiver's Contact</label>
              <input type="number" class="form-control" value="<?php echo $receiverscontact ?>" name="rcontact" id="exampleInputEmail1" placeholder="Receiver's Contact">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Receiver's Email</label>
              <input type="text" name="rmail" class="form-control" value="<?php echo $receiversmail ?>" id="exampleInputPassword1" placeholder="Receiver's Email">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Receiver's Address</label>
              <textarea class="form-control" name="raddress" placeholder="Receiver Address"><?php echo $receiversaddress ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Destination</label>
              <input type="text" class="form-control" name="dest" value="<?php echo $dest ?>" id="exampleInputPassword1" placeholder="Destination">
            </div>
           <div class="form-group">
              <label for="exampleInputPassword1">Package description</label>
              <input type="text" class="form-control" name="desc" value="<?php echo $desc ?>" id="exampleInputPassword1" placeholder="Package Description">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dispatch Date</label>
              <input type="date" class="form-control" name="dispatch" value="<?php echo $dispatch ?>" id="exampleInputPassword1" placeholder="Origin PortS">
            </div>
          	<div class="form-group">
              <label for="exampleInputPassword1">Estimated Delivery Date</label>
              <input type="date" class="form-control" value="<?php echo $delivery ?>" name="delivery" id="exampleInputPassword1" placeholder="Origin PortS">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Shipment mode</label>
              <input type="text" class="form-control" value="<?php echo $ship_mode ?>" name="ship_mode" id="exampleInputPassword1" placeholder="Shipment mode">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Quantity</label>
              <input type="text" class="form-control" value="<?php echo $quantity ?>" name="quantity" id="exampleInputPassword1" placeholder="Quantity">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Delivery Time</label>
              <input type="time" class="form-control" value="<?php echo $delivery_time ?>" name="delivery_time" id="exampleInputPassword1" placeholder="Delivery time">
            </div>
        </div>
      </div>
    </div>
</div>
    <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            	<button class="btn btn-primary btn-block" name="submit">Add</button>
            </div>
        </div>
        </form>
    </div>



 <?php 
include 'footer.php';
 ?>