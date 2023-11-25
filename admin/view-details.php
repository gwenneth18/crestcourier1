<?php 
include 'header.php';

include '../db.php';
	
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
         $carrier = $row['carrier'];
         $carrier_ref = $row['carrier_ref'];
         $weight = $row['weight'];
         $payment_mode = $row['payment_mode'];
         $ship_mode = $row['ship_mode'];
         $quantity = $row['quantity'];
         $delivery_time = $row['delivery_time'];
         $image = $row['image'];
         $destination = $row['destination'];

    }else{
      echo "<script>window.location.href = 'dashboard.php'; </script>";
    }
  }else{
    echo "<script>window.location.href = 'dashboard.php'; </script>";
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
    <center>
        <img height="200" width="250" src="../uploads/<?php echo $image ?>" >
    </center>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sender's Info</h4>
          
          <form method="post" action="" enctype="multipart/form-data" class="forms-sample">
            <div class="form-group">
              <label for="exampleInputUsername1">Sender's Name</label>
              <input type="text" class="form-control" name="sname" value="<?php echo $senders_name ?>" id="exampleInputUsername1" placeholder="Sender's Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sender's Contact</label>
              <input type="number" class="form-control" value="<?php echo $senders_contact ?>" name="scontact" id="exampleInputEmail1" placeholder="Sender's Contact">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sender's Email</label>
              <input type="text" class="form-control" name="smail" value="<?php echo $senders_mail ?>" id="exampleInputPassword1" placeholder="Sender's Email">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Sender's Address</label>
              <textarea class="form-control" placeholder="Sender's Address" name="saddress"><?php echo $senders_address ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Status</label>
              <select class="form-control" name="status">
                <option><?php echo $statuss ?></option>
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
              <input type="text" class="form-control" value="<?php echo $dispatch_l ?>" name="dispatchl" id="exampleInputPassword1" placeholder="Origin Port">
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
              <label for="exampleInputPassword1">Weight</label>
              <input type="text" class="form-control" value="<?php echo $weight ?>" name="weight" id="exampleInputPassword1" placeholder="Weight">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Payment Mode</label>
              <input type="text" class="form-control" value="<?php echo $payment_mode ?>" name="payment_mode" id="exampleInputPassword1" placeholder="Payment Mode">
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Current Location</label>
              <input type="text" class="form-control" value="<?php echo $current_loc ?>" name="" id="exampleInputPassword1" placeholder="Current Location">
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
              <input type="text" class="form-control" value="<?php echo $receivers_name ?>" name="rname" id="exampleInputUsername1" placeholder="Receiver's Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Receiver's Contact</label>
              <input type="number" class="form-control" value="<?php echo $receivers_contact ?>" name="rcontact" id="exampleInputEmail1" placeholder="Receiver's Contact">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Receiver's Email</label>
              <input type="text" name="rmail" class="form-control" value="<?php echo $receivers_mail ?>" id="exampleInputPassword1" placeholder="Receiver's Email">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Receiver's Address</label>
              <textarea class="form-control" name="raddress" placeholder="Receiver Address"><?php echo $receivers_address ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Destination</label>
              <input type="text" class="form-control" name="desc" value="<?php echo $destination ?>" id="exampleInputPassword1" placeholder="Package Description">
            </div>
           <div class="form-group">
              <label for="exampleInputPassword1">Package description</label>
              <input type="text" class="form-control" name="desc" value="<?php echo $desc ?>" id="exampleInputPassword1" placeholder="Package Description">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dispatch Date</label>
              <input type="date" class="form-control" name="dispatch" value="<?php echo $dispatchh ?>" id="exampleInputPassword1" placeholder="Origin PortS">
            </div>
          	<div class="form-group">
              <label for="exampleInputPassword1">Estimated Delivery Date</label>
              <input type="date" class="form-control" value="<?php echo $deliveryy ?>" name="delivery" id="exampleInputPassword1" placeholder="Origin PortS">
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
            
        </div>
        </form>
    </div>



 <?php 
include 'footer.php';
 ?>