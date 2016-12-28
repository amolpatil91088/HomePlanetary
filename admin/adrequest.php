<?php
include 'header.php';
?>
<div class="content-wrapper">
<section class="content-header">
  <h1>
   Advertise Request
  </h1>    
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">  Advertise Request</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">				
				<form method="post" name="delete_action_form" enctype="multipart/form-data">
                    <section class="content">
                       <div class="clear"></div>
                         <br/>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-body">
                                 <?php
                                  $qr="SELECT * FROM advertise_req";
                                  $result = $mysqli->query($qr);
                                  ?>
                                 <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                      <tr style="text-align:center;">
                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">
                                            <input type="checkbox" name="select_all" id="select_all" value=""/>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Name</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Email</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Mobile</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Message</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Advertise</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Date</th>
                                              <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="show">
                                        <?php
                                                while( $row =  $result->fetch_array()) :
                                        ?>
                                        <tr>
                                            <td bgcolor="#FFFFFF">
                                              <input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['a_id']; ?>"/></td>
                                                   <td><?php echo $row['nm']; ?></td>
                                                   <td><?php echo $row['email']; ?></td>
                                                   <td><?php echo $row['mob']; ?></td>
                                                   <td><?php echo $row['msg']; ?></td>
                                                   <td><?php echo basename ($row['photo']); ?></td>
                                                   <td><?php echo $row['date']; ?></td>
                                                   <td><a href="<?php echo $row['photo'];?>">Download</a></td>
                                        </tr>
                                       <?php endwhile; ?>
                                    </tbody>
                                  </table>
                                  <div class="modal-footer">
                                    <input type="submit" onsubmit="return deleteConfirm();" name="delete_submit" value="Delete"/>
                                  </div>
                            </div>
                          </div>
                        </div>
                    </div>
                 </div>
            </section>
	    	</form>
        </div>
		</div>
	</div>
</section>

<?php
include 'footer.php';
if ( ! empty( $_POST ) ) {
    if(isset($_POST['delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $user_id){
            $qry="DELETE FROM advertise_req WHERE a_id=$user_id";
	         $insert = $mysqli->query($qry);
			echo '<META HTTP-EQUIV="Refresh" Content="0;adrequest.php">'; 
        }
    }
}
?>