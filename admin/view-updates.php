<?php  
include 'header.php';

if (isset($_GET['num'])) {
	$tnumbs = $_GET['num'];
	$select = mysqli_query($link, "SELECT * FROM track_update WHERE track_num = '$tnumbs' ORDER BY id DESC ");
	if (mysqli_num_rows($select) > 0) {

	}else{
		echo "<script>alert('It has not been updated yet');window.location.href = 'dashboard.php'; </script>";
	}
}else{
	echo "<script>window.location.href = 'dashboard.php'; </script>";
}

?>


<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TRACK UPDATES</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Location</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Note</th>
                          <th>Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                        $i = 0;
                        	
                        	while ($row = mysqli_fetch_assoc($select)) {
                        			$i++
                         ?>

                         	<input type="hidden" name="tnumb" value="<?php echo $row['tracking_number'] ?>">
                         <tr>
                         	<td><?php echo $i; ?></td>
                         	
                          <td><b><?php echo $row['current_location'] ?></b></td>
                         	<td><b><?php echo $row['status'] ?></b></td>
                         	<td><b><?php echo $row['date'] ?></b></td>
                         	<td><b><?php echo $row['time'] ?></b></td>
                         	<td><b><?php echo $row['note'] ?></b></td>
                         	<td><b><?php echo $row['updated_at'] ?></b></td>
                         	

                            
                     <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>






<?php  
include 'footer.php';
?>