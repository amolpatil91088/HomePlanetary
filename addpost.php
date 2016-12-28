<?php
include 'login.php'; // Includes Login Script
if(isset($_SESSION['login_user'])){
include('header.php');
include_once("analyticstracking.php");
$user_type=$_SESSION['user_type'];
$user_name=$_SESSION['user_name'];
$user_email=$_SESSION['user_email'];
$user_id=$_SESSION['user_id'];
?>
<link rel="stylesheet" href="admin/plugins/select2/select2.min.css">
<!-- header start -->
<div class="top_bg">
	<div class="container">
		<div class="logo">
		 	<a href="Home/"><img src="images/logo1.png" alt=""/></a>			 
		 </div>
		<div class="header_top-sec">
			<div class="header_right" style="background-color:#17101b"; >	
		        <?php
					if(isset($_SESSION['logged'])){
						if($_SESSION['logged'] == "true")
								{
								 $name=$_SESSION['login_user'];
								 echo "<div class='witlogin1'>";
								 echo "<div class='prmenu_container' id='click1' onclick='toggle_visibility('DivMenu1');' >Welcome ".$name;
								 echo "<img id='click1' onClick='toggle_visibility('DivMenu1');' src='images/down-arrow-circle-hi.png'>";
								 echo "</div>";
								 echo "<div class=\"withlogin\" id=\"DivMenu1\" style=\"display: none;\">\n";
								 echo "<ul  style=\"width: 100%; \">\n";
								 echo "<li>\n";
								 echo "<a href=\"Dashboard/\">Dashboard</a>\n";
								 if($_SESSION['user_type']!='Customer')
								 {
									 echo "<li>\n";
									 echo "<a href=\"MyAds/\">My Ads</a>\n";
									 echo "</li>\n";
								 }
								 echo "<li>\n";
								 echo "<a href=\"MyEnquiries/\">My Enquiries</a>\n";
								 echo "</li>\n";
								 echo "<li>\n";
								 echo "<a href=\"MyProfile/\">My Profile</a>\n";
								 echo "</li>\n";
								 echo "<li>\n";
								 echo "<a href=\"logout.php\" >Sign out</a>\n";
								 echo "</li>\n";
								 echo "</ul>\n";
								 echo "</div>\n";
 								 echo "</div>";
								}
								else
                                           {
												echo "<div class='sign-in'><a href='SignUp/'>Sign Up</a></div>";
												echo "<div class='top_left' id='login'><a href='Authentication/'>Login</a></div>";
											}
								}
								else
                                            {
                                                echo "<div class='top_left'><ul><li><a href='SignUp/'>Sign Up</a></li></ul></div>";
                                                echo "<div class='top_left' id='login'><ul><li><a href='Authentication/'>Login</a></li></ul></div>";
                                            }
					 ?>
		            </div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div id="sticky-anchor"></div>
<!--header end-->
<div>
<marquee><h4><font color="red">Post Your Properties Here & Upload Property Images using Your Account....</font></h4></marquee>
</div>
<div class="clearfix"></div>
<!---->
<div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc;  margin-top: 5px;" >
<form id="frmpost" name="frmpost" method="post" class="form-validation" enctype="multipart/form-data">
	<input type="hidden" id="user_id"  name="user_id" value="<?php echo $user_id;?>"/>
	 <div class="col-md-12" style="border-bottom:1px solid #ccc;    padding-top: 40px;  padding-bottom:10px; margin-bottom:10px;">
		<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">PROPERTY NAME<span style="color:red">*</span></label>
					<div class="col-xs-4">
					  <input type="text" class="form-control-realestate" id="property_name" name="property_name" placeholder="Property Name" required />
					</div>
				 </div>
		</div>
		<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">CITY<span style="color:red">*</span></label>
					<div class="col-xs-4">
					  <input type="text" class="form-control-realestate" id="city" name="city" placeholder="City" required />
					</div>
				 </div>
		</div>
	    <div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">LOCALITY<span style="color:red">*</span></label>
					<div class="col-xs-4">
					  <input type="text" class="form-control-realestate" id="locality" name="locality" placeholder="Locality" required />
					</div>
				 </div>
		</div>
		<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">ADDRESS<span style="color:red"></span></label>
					<div class="col-xs-4">
					<input type="text" class="form-control-realestate" id="address" name="address" placeholder="Address"/>
					</div>
             </div>
		</div>
		<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">LANDMARK<span style="color:red"></span></label>
					<div class="col-xs-4">
					  <input type="text" class="form-control-realestate" id="landmark" name="landmark" placeholder="Landmark"/>
					</div>
				 </div>
		</div>
	 </div>
      <div class="col-md-12">
	    <div class="row">
	        <div class="form-group realestateform has-feedback">
				<label for="title" class="col-sm-3 control-label">PROPERTY TYPE<span style="color:red">*</span></label>
				<div class="col-xs-4">
					<select id="property_type" name="property_type" class="form-control-realestate" onchange="setsubProperty()" required>
						<option value="">SELECT</option>
                        <option value="Residential">Residential</option>
						<option value="Commercial">Commercial</option>
                        <option value="Other">Other</option>
					</select>
				</div>
			</div>
		</div>

          <div class="row" id="subPropertyDiv" style="display: none;">

          </div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
				<label for="title" class="col-sm-3 control-label">TRANSACTION TYPE<span style="color:red">*</span></label>
				<div class="col-xs-4">
					<select id="transaction_type" name="transaction_type" class="form-control-realestate" required>
						<option value="">SELECT</option>
                        <option value="New">New</option>
                        <option value="Resale">Resale</option>
					</select>
				</div>
			</div>
		</div>
        <div class="row">
              <div class="form-group realestateform has-feedback">
                  <label for="title" class="col-sm-3 control-label">PRICE<span style="color:red">*</span></label>
                  <div class="col-xs-4">

                          <select id="price" name="price" class="form-control-realestate"  required>
                              <option value="">&nbsp;&nbsp;SELECT</option>
                              <option value="5 to 10 Lakh">&nbsp;&nbsp;5 to 10 Lakh</option>
                              <option value="11 to 15 Lakh">&nbsp;&nbsp;11 to 15 Lakh</option>
                              <option value="15 to 20 Lakh">&nbsp;&nbsp;15 to 20 Lakh</option>
                              <option value="21 to 25 Lakh">&nbsp;&nbsp;21 to 25 Lakh</option>
                              <option value="25 to 30 Lakh">&nbsp;&nbsp;25 to 30 Lakh</option>
                              <option value="31 to 35 Lakh">&nbsp;&nbsp;31 to 35 Lakh</option>
                              <option value="35 to 40 Lakh">&nbsp;&nbsp;35 to 40 Lakh</option>
                              <option value="41 to 45 Lakh">&nbsp;&nbsp;41 to 45 Lakh</option>
                              <option value="45 to 50 Lakh">&nbsp;&nbsp;45 to 50 Lakh</option>
                              <option value="51 to 55 Lakh">&nbsp;&nbsp;51 to 55 Lakh</option>
                              <option value="55 to 60 Lakh">&nbsp;&nbsp;55 to 60 Lakh</option>
                              <option value="61 to 65 Lakh">&nbsp;&nbsp;61 to 65 Lakh</option>
                              <option value="65 to 70 Lakh">&nbsp;&nbsp;65 to 70 Lakh</option>
                              <option value="71 to 75 Lakh">&nbsp;&nbsp;71 to 75 Lakh</option>
                              <option value="75 to 80 Lakh">&nbsp;&nbsp;75 to 80 Lakh</option>
                              <option value="81 to 85 Lakh">&nbsp;&nbsp;81 to 85 Lakh</option>
                              <option value="85 to 90 Lakh">&nbsp;&nbsp;85 to 90 Lakh</option>
                              <option value="91 to 95 Lakh">&nbsp;&nbsp;91 to 95 Lakh</option>
                              <option value="95 to 99 lakh">&nbsp;&nbsp;95 to 99 lakh</option>
                              <option value="1 to 2 Cr">&nbsp;&nbsp;1 to 2 Cr</option>
                              <option value="2 to 3 Cr">&nbsp;&nbsp;2 to 3 Cr</option>
                              <option value="3 to 4 Cr">&nbsp;&nbsp;3 to 4 Cr</option>
                              <option value="4 to 5 Cr">&nbsp;&nbsp;4 to 5 Cr</option>
                          </select>
                  </div>
              </div>
          </div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">POSSESSION DATE<span style="color:red">*</span></label>
					<div class="col-xs-4">
                    		 <input type="text" class="form-control-realestate" id="possession" name="possession" placeholder="Possession Date" required />
					</div>
			</div>
		</div>

     <div class="clearfix"></div>
		<div class="form-group realestateform has-feedback">
                <label for="Price" class="col-sm-3 control-label">AREA SIZE<span style="color:red;">*</span></label>
			<div class="col-xs-8">
				<div class="col-xs-12" style="margin-left: -12px;">
					<input type="text" class="form-control-realestate" placeholder="Enter Size" id="area" name="area" required />
				</div>
					<div class="col-xs-1" style="margin-left: -230px;">
					<select style="height: 31px;width: 62px;">
						<option>Sq.feet</option>
						<option>Sq.mtr</option>
					</select>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">RATE/SQ.FT<span style="color:red">*</span></label>
					<div class="col-xs-4">
						 <input type="text" class="form-control-realestate" id="rate_sqft" name="rate_sqft" placeholder="Rate Sq.Ft" required />
					</div>
			</div>
		</div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">NO OF FLOOR<span style="color:red"></span></label>
					<div class="col-xs-4">
						 <input type="text" class="form-control-realestate" id="floor_no" name="floor_no" placeholder="No Of Floor"/>
					</div>
			</div>
		</div>
     <div class="clearfix"></div>
     </div>
	  <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		<div class="row">
	        <div class="form-group realestateform has-feedback">
				<label for="title" class="col-sm-3 control-label">AMENITIES<span style="color:red">*</span></label>
				<div class="col-md-8">
					    <div class="col-xs-2">
                             <div class="radio">
                                <label class="checkbox-inline">
			                	  <input type="checkbox" name="amenities[]" class="checkbox" value="Power backup" >Power backup
								</label>
                             </div>
                        </div>
						<div class="col-xs-2">
 						    <div class="radio">
                                <label class="checkbox-inline">
								  <input type="checkbox" name="amenities[]" class="checkbox" value="Intercom Facility" >Intercom Facility
								</label>
                            </div>
						</div>
						 <div class="col-xs-2">
 						    <div class="radio">
                                <label class="checkbox-inline">
								  <input type="checkbox" name="amenities[]" class="checkbox" value="Fire Alarm" >Fire Alarm
								</label>
                            </div>
						</div>
					    <div class="col-xs-2">
                             <div class="radio">
                                <label class="checkbox-inline">
				                      <input type="checkbox" name="amenities[]" class="checkbox" value="Lift" >Lift
								</label>
                             </div>
                        </div>
						<div class="col-xs-2">
 						    <div class="radio">
                                <label class="checkbox-inline">
								  <input type="checkbox" name="amenities[]" class="checkbox" value="Service Lift" >Service Lift
								</label>
                            </div>
						</div>
						 <div class="col-xs-2">
 						    <div class="radio">
                                <label class="checkbox-inline">
	                                <input type="checkbox" name="amenities[]" class="checkbox" value="Reserved parking" >Reserved parking
								</label>
                            </div>
						</div>
					    <div class="col-xs-2">
                             <div class="radio">
                                <label class="checkbox-inline">
								  <input type="checkbox" name="amenities[]" class="checkbox" value="Conference Room" >Conference Room
								</label>
                             </div>
                        </div>
						<div class="col-xs-2">
 						    <div class="radio">
                                <label class="checkbox-inline">
								  <input type="checkbox" name="amenities[]" class="checkbox" value="Security Personal" >Security Personal
								</label>
                            </div>
						</div>
						 <div class="col-xs-3">
 						    <div class="radio">
                                <label class="checkbox-inline">
		                            <input type="checkbox" name="amenities[]" class="checkbox" value="High Speed Internet" >High Speed Internet
								</label>
                            </div>
						</div>
				</div>
			</div>
		</div>
	  </div>
		<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	      <div class="row">
	         <div class="form-group realestateform has-feedback">
                <label for="title" class="col-sm-3 control-label">NEARBY SERVICES<span style="color:red">*</span></label>
                  <div class="col-md-8">
					<div class="col-md-12">
							      <table class="table table-bordered">
                                     <tbody>
                                      <tr class="">
                                        <td>Airport</td>
                                         <td> Airport</td>
                                         <td><input type="text" id="airport" name="airport" placeholder="Airport"/></td>
                                         <td>KM</td>
                                      </tr>
                                      <tr>
                                        <td>Railway station</td>
                                        <td> Railway station</td>
                                        <td><input type="text" name="train" id="train" placeholder="Railway Station"/></td>
                                        <td>KM</td>
                                     </tr>
                                     <tr class="">
                                        <td>Bustop.</td>
                                        <td>multiple</td>
                                        <td><input type="text" name="bustop" id="bustop" placeholder="Bustop"/></td>
                                        <td>KM</td>
                                     </tr>
                                      <tr>
                                       <td>Nearest School</td>
                                       <td>multiple</td>
                                       <td><input type="text" name="school" id="school" placeholder="Nearest School"/></td>
                                       <td>KM</td>
                                     </tr>
                                      <tr class="">
                                        <td>Nearest Hospital</td>
                                        <td>multiple</td>
                                        <td><input type="text" name="hospital" id="hospital" placeholder="Nearest Hospital"/></td>
                                        <td>KM</td>
                                     </tr>
                                      <tr>
                                       <td>Nearest Restaurant</td>
                                       <td>multiple</td>
                                       <td><input type="text" name="resto" id="resto" placeholder="Nearest Restaurant"/></td>
                                       <td>KM</td>
                                     </tr>
                                     <tr>
                                       <td>Nearest Bank/ ATM</td>
                                       <td>multiple</td>
                                       <td><input type="text" name="bank" id="bank" placeholder="Nearest Bank/ATM"/></td>
                                       <td>KM</td>
                                     </tr>
                                      </tbody>
                                  </table>
                         </div>
                     </div>
				 </div>
	    	</div>
	  </div>
	  <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	    <div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">PROPERTY DETAIL<span style="color:red">*</span></label>
					<div class="col-xs-8">
					<textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc" id="property_details" name="property_details" placeholder="Property Details"></textarea>
					</div>
			</div>
		</div>
        <div class="form-group realestateform has-feedback">
                <label for="photo" class="col-sm-3 control-label">PHOTO</label>
					<div class="col-md-3">
					    <input type="file" id="exampleInputFile" name="photos" required  class="form-control-realestate2">
					</div>
		</div>
	  </div>
	 <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
     <div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label"><?php echo strtoupper($user_type);?>&nbsp;NAME <span style="color:red">*</span></label>
					<div class="col-xs-3">
					  <input type="text" class="form-control-realestate2" id="name" name="name" readonly placeholder="Builder/Owner Name" value="<?php echo $user_name;?>" required />
					</div>
				 </div>
    </div>
	<div class="row">	
		<div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">
                        ARE YOU A<span style="color:red">*</span></label>
					<div class="col-xs-3">
							<select name="type" id="type" class="form-control-realestate" required>
                                <?php
                                if($user_type=="")
                                {
                                    echo "<option value=''>Select</option>";
                                }
                                else
                                {
                                    echo "<option value='".$user_type."'>".$user_type."</option>";
                                }
                                echo "<option value='Builder'>Builder</option>";
                                echo "<option value='Agent'>Agent</option>";
                                echo "<option value='Owner'>Owner</option>";
                                ?>
							</select>
	  			</div>
		</div>
	</div>
		 <div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">E-MAIL ID<span style="color:red">*</span></label>
					<div class="col-xs-3">
					  <input type="text" class="form-control-realestate2" id="email" name="email" placeholder="E-mail Id" value="<?php echo $user_email;?>" required />
					</div>
				 </div>
		</div>
    	<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">MOBILE NUMBER<span style="color:red">*</span></label>
					<?php if(!empty($_SESSION['s_phno'])) { ?>
					<div class="col-xs-3">
					  <input type="text" class="form-control-realestate2" id="mob" readonly name="mob" minlength="10" maxlength="10" placeholder="Mobile Number" value="<?php echo $_SESSION['s_phno'];?>" required />
					</div>
					<?php }?>
				 </div>
		</div>
		<div class="row">
	         <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">LANDLINE NUMBER<span style="color:red">*</span></label>
					<div class="col-xs-3">
					  <input type="text" class="form-control-realestate2" minlength="6" maxlength="12" id="landline" name="landline" placeholder="Landline Number"/>
					</div>
				 </div>
		</div>
		 <div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-3 control-label">ABOUT BUILDER<span style="color:red">*</span></label>
					<div class="col-xs-3">
					<textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc" name="about_builder" id="about_builder" placeholder="About Builder"></textarea>
					</div>
			</div>
		</div>
		 <div class="form-group realestateform has-feedback">
					<label for="photo" class="col-sm-3 control-label">BUILDER LOGO</label>
					<div class="col-md-3">
					 <input type="file" id="logo" name="logo" required  class="form-control-realestate2">
					</div>
		</div>	
			</br>	
			</br>
        	 <div class="col-md-12" style="border-top:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
				 <div class="form-group pstAd">	
					<div class="controls sbt">
						By clicking the "Submit" you agree the <a href="" target="_blank">Terms &amp; Condition</a>, <a href="">Privacy Policy</a> and <a href="#" target="_blank">Prohibited Goods</a> terms of Homeplanetary.com
					</div>
			</div>
			<div class="form-group pstAd">
					<div class="controls sbt">
                        <input type="submit" class="btn btn-small btn-primary" id="cmdSubmit" value="Submit" name="save" onclick="validations()"/>
                    </div>
			</div>
			</div>
		</div>
	</form>
	 </div>
</div>
<!-- end registration -->
<?php  include('footer.php');  ?>
<script type="text/javascript" src="admin/plugins/select2/select2.min.js"></script>
<?php
if(isset($_POST['save']))
{
$property_name=$_POST['property_name'];
$city=$_POST['city'];
$locality=$_POST['locality'];
$address=$_POST['address'];
$landmark=$_POST['landmark'];
$property_type=$_POST['property_type'];
$transaction_type=$_POST['transaction_type'];
$bed = implode(", ",$_POST['bedroom']);
$possession=$_POST['possession'];
$possession=date('Y-m-d', strtotime($possession));
$price=$_POST['price'];
$area=$_POST['area'];
$rate_sqft=$_POST['rate_sqft'];
$floor_no=$_POST['floor_no'];
$ameny = implode(", ",$_POST['amenities']);
$airport=$_POST['airport'];
$train=$_POST['train'];
$bustop=$_POST['bustop'];
$school=$_POST['school'];
$hospital=$_POST['hospital'];
$resto=$_POST['resto'];
$bank=$_POST['bank'];
$property_details=$_POST['property_details'];
$file = $_FILES['photos'];
$name = $file['name'];
$target = "image/".basename($name);
$uname=$_POST['name'];
$type=$_POST['type'];
$email=$_POST['email'];
$mob=$_POST['mob'];
$landline=$_POST['landline'];
$about_builder=$_POST['about_builder'];
$user_id=$_POST['user_id'];
$file1 = $_FILES['logo'];
$name1 = $file1['name'];
$target1 = "image/".basename($name1);
// Random confirmation code
$confirm_code=md5(uniqid(rand()));

$query="INSERT INTO `temp_members_db` (`confirm_code`, `property_name`, `city`, `locality`, `address`, `landmark`, `property_type`, `transaction_type`,
 `bedroom`, `possession`, `price`, `area_sqft`, `rate_sqft`, `floor_no`, `amenities`, `airport`, `train`, `bustop`, `school`, `hospital`, `resto`, 
 `bank`, `property_details`, `photos`, `name`, `owner_type`, `email`, `mob`, `landline`, `about_builder`, `logo`, `date`, `user_id`) VALUES('$confirm_code','$property_name','$city','$locality','$address',
 '$landmark','$property_type','$transaction_type','$bed','$possession','$price','$area','$rate_sqft','$floor_no','$ameny','$airport','$train','$bustop',
 '$school','$hospital','$resto','$bank','$property_details','$target','$uname','$type','$email','$mob','$landline','$about_builder','$target1',now(),'$user_id')";
        if(move_uploaded_file($_FILES['photos']['tmp_name'], $target)){
		//Tells you if its all ok
		echo "The file ". basename( $_FILES['photos']['name']). " has been uploaded, and your information has been added to the directory"; 
		}
		else { 
		echo "Sorry, there was a problem uploading your file."; 
		} 
        if(move_uploaded_file($_FILES['logo']['tmp_name'], $target1)){
		//Tells you if its all ok
		echo "The file ". basename( $_FILES['logo']['name']). " has been uploaded, and your information has been added to the directory"; 
		}
		else { 
		echo "Sorry, there was a problem uploading your file."; 
		}
        $insert = $mysqli->query($query);
        if ( $insert ) {
            echo '<script type="text/javascript"> showmessage("success","Property posted successfully");</script>';
          } else {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
          }
        // if suceesfully inserted data into database, send confirmation link to email 
        if( $insert )
        {
        $to=$_POST['email'];
        // Your subject
        $subject="Your confirmation link here";
        // From
        $header="from: Homeplanetary";
        // Your message
        $message="Your Comfirmation link \r\n";
        $message.="Click on this link to activate your Property \r\n";
        $message.="http://homeplanetary.com/confirmation.php?passkey=$confirm_code \r\n";
        // send email
        $sentmail = mail($to,$subject,$message,$header);
      }// if not found 
      else 
      {
		echo '<script type="text/javascript">showmessage("warning","Not found your email in our database");</script>';
      }
        // if your email succesfully sent
      if (isset($sentmail)) 
      {
		echo '<script type="text/javascript">showmessage("success","Your Confirmation link Has Been Sent To Your Email Address.");window.location.href="Home/";</script>';
      }
      else 
      {
		echo '<script type="text/javascript">showmessage("Error","Cannot send Confirmation link to your e-mail address");</script>';
      }
    // Close our connection
      $mysqli->close();
    }

    ?>
<script>
    $(document).ready(function () {
        $("#possession").datepicker({autoclose:true});
        $("#price").select2();
        $("#property_type").select2();
        $("#transaction_type").select2();
        $("#type").select2();
        var usedNames = {};
        $("select[name='type'] > option").each(function () {
            if(usedNames[this.text]) {
                $(this).remove();
            } else {
                usedNames[this.text] = this.value;
            }
        });
    });
    function setsubProperty()
    {
        var property_type=$("#property_type").val();
        var str1 = "<div class='form-group realestateform has-feedback'><label for='title' class='col-sm-3 control-label' style='margin-right: 14px;'>PROPERTY SUB TYPE<span style='color:red'>*</span></label><div id='subProperty'>";
        var str2 = "</div></div>";
        if(property_type != "") {
            if (property_type == "Residential") {
                var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px;' required><option value=''>SELECT</option><option value='1RK'>1RK</option><option value='1BHK'>1BHK</option><option value='2BHK'>2BHK</option><option value='3BHK'>3BHK</option><option value='4BHK'>4BHK</option><option value='5BHK'>5BHK</option><option value='House/Villa'>House/Villa</option><option value='Plot/Land'>Plot/Land</option></select>";
            }
            else if (property_type == "Commercial") {
                var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px' required><option value=''>SELECT</option><option value='Office Space'>Office Space</option><option value='Shop/Showroom'>Shop/Showroom</option><option value='Commercial Land'>Commercial Land</option><option value='Warehouse/Godown'>Warehouse/Godown</option><option value='Industrial Building'>Industrial Building</option><option value='Industrial Shed'>Industrial Shed</option></select>";
            }
            else if (property_type == "Other") {
                var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px;' required><option value=''>SELECT</option><option value='Agriculture Land'>Agriculture Land</option><option value='Farm House'>Farm House</option></select>";
            }
            var str3= str1+str+str2;
            $("#subPropertyDiv").html("");
            $("#subPropertyDiv").append(str3);
            $("#bedroom").select2();
            document.getElementById("subPropertyDiv").style.display = "block";
        }
    }
    function validations()
    {
        $("#frmpost").valid();
    }
</script>
<?php
}
else
{
	header('location:'.$base.'Home/');
}
?>