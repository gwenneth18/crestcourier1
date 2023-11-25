<?php 
	include 'header.php';

	if (isset($_POST['delete'])) {
		$image = $_POST['image'];
		$tnumb = $_POST['tnumb'];
		$delete = mysqli_query($link, "DELETE FROM tracking WHERE tracking_number = '$tnumb' ");
		if ($tnumb) {
      mysqli_query($link, "DELETE FROM track_update WHERE track_num = '$tnumb' ");
      unlink("../uploads/".$image);
			echo "<script>alert('Deleted Successfully');window.location.href = 'dashboard.php' </script>";
			
		}
	}
?>


<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TRACKERS</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Tracking Number</th>
                          <th>Status</th>
                          <th>Date Added</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Copy</th>
                          <th>View Details</th>
                          <th>View Updates</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                        $i = 0;
                        	$tr = mysqli_query($link, "SELECT * FROM tracking ");
                        	if (mysqli_num_rows($tr) > 0 ) {
                        		while ($row = mysqli_fetch_assoc($tr)) {
                        			$i++
                         ?>
                         <form method="post" action="dashboard.php">
                         	<input type="hidden" name="tnumb" value="<?php echo $row['tracking_number'] ?>">
                         <tr>
                         	<td><?php echo $i; ?></td>
                         	<td><img style="height: 90px;width: 90px;" src="../uploads/<?php echo $row['image'] ?>" ></td>
                          <td><b><?php echo $row['tracking_number'] ?></b></td>
                         	<td><b><?php echo $row['status'] ?></b></td>
                         	<td><b><?php echo $row['date'] ?></b></td>
                         	<td><a href="edit-tracking.php?num=<?php echo $row['tracking_number'] ?>" class="btn btn-primary">Update</a></td>
                         	<td><button type="submit" name="delete" onclick="return confirm('Do you really want to delete this ?')" class="btn btn-danger">Delete</button></td>
                          <td><button type="button" onclick="copyContent()" class="btn btn-info">Copy Tracking Number</button></td>
                          <td><a class="btn btn-secondary" href="view-details.php?num=<?php echo $row['tracking_number'] ?>">View Details</a></td>
                          <td><a class="btn btn-warning" href="view-updates.php?num=<?php echo $row['tracking_number'] ?>">View Updates</a></td>
                         </tr>
                         <input type="hidden" id="tn<?php echo $row['id'] ?>" value="<?php echo $row['tracking_number'] ?>">
                         <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
                         </form>
                            <script>
                              let text = document.getElementById('tn<?php echo $row['id'] ?>').value;
                              const copyContent = async () => {
                                try {
                                  await navigator.clipboard.writeText(text);
                                  alert("Copied the tracking number: " + text);
                                } catch (err) {
                                  // console.error('Failed to copy: ', err);
                                }
                              }
                            </script>
                     <?php }} ?>

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