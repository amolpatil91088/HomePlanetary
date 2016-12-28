<?php
/*
 <div  id="verification-popup" style="display:none;">
		  <form method="post" name="frmverify" id="frmverify" class="form-validation" role="form">
			   <div class="b-close"></div>
			<div class="estate-form2">
					<h4>OTP Verfication</h4>
				<input type="hidden" name="muser_id" id="muser_id">
				<input type="hidden" name="mverification_type" id="mverification_type">
			<div class="form-group">
                <input type="text" class="form-control" id="vcode" name="vcode" maxlength="6" minlength="6" placeholder="Type Your Verification Code Here.."  required />
			</div>
            <input type="submit" id="verify" name="verify"  value="Submit OTP" class="price-btn">
			</div>
				<div class="clear"></div>
		</form>
   </div>
<div id="verification-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" id="listTitle" style="color: #109af7;">OTP Verfication</h2>
            </div>
            <form method="post" name="frmverify" id="frmverify" class="form-validation" role="form">
            <div class="modal-body">
                <input type="hidden" name="muser_id" id="muser_id">
				<input type="hidden" name="mverification_type" id="mverification_type">
			<div class="form-group">
                <input type="text" class="form-control" id="vcode" name="vcode" maxlength="6" minlength="6" placeholder="Type Your Verification Code Here.."  required />
			</div>
            <input type="submit" id="verify" name="verify"  value="Submit OTP" class="price-btn">
            </div>
           </form>
        </div>
    </div>
</div>
*/
?>
<?php
/*
function sendMessage($text,$mobile){
//   echo $text.$mobile;
    echo "<script>"
        ."$.ajax({"
        ."url : 'http://trans.smsfresh.co/api/sendmsg.php',"
        ."type : 'get',"
        ."data : {user:'magarsham', pass:'festivito5555', sender:'HOMPLN' ,phone:'".$mobile."', text:'".$text."', priority:'ndnd', stype:'normal'}"
        ."});"
        ."</script>";
}
if(isset($_POST['verify']))
{
    $verification_type = $_POST['mverification_type'];

    if($verification_type=="R")
    {
        $vcode=$_POST['vcode'];
        $user_id = $_POST['muser_id'];
        $result = $mysqli->query("SELECT mob,email FROM signup WHERE user_id=$user_id");
        while ($row = $result->fetch_array()) {
            $mobile = $row[0];
            $email = $row[1];
        }
        $query="SELECT user_id FROM signup WHERE user_id=$user_id AND verification_code=$vcode";
        $result = $mysqli->query($query);
        $count = $result->num_rows;
        if($count>0)
        {
            $mysqli->query("UPDATE signup SET verification_status='True' WHERE user_id=$user_id");
            $smsmsg = "Registration Successfully Done , Now You Can Login To Homeplanetary.com";
            sendMessage($smsmsg,$mobile);

            $to=$email;
            $subject="Registration Successful";
            // From
            $header="from: Homeplanetary";
            // Your message
            $message="Your Registration Process is Successfully Done.\r\n";
            $message.="Click Below Link To Login. \r\n";
            $message.="http://homeplanetary.com/Authentication/";
            // send email
            $sentmail = mail($to,$subject,$message,$header);
            echo '<script type="text/javascript">alert("Your Account Is Verified Now You Can Login.");window.location.href="Authentication/";</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("OTP Does Not Match");window.location.reload();</script>';
        }
    }
    else if($verification_type=="E")
    {
        $vcode=$_POST['vcode'];
        $enq_id=$_POST['muser_id'];
        $result = $mysqli->query("SELECT mob,email FROM enquiry WHERE enq_id=$enq_id");
        while ($row = $result->fetch_array()) {
            $mobile = $row[0];
            $email = $row[1];
        }
        $query="SELECT enq_id FROM enquiry WHERE enq_id=$enq_id AND verification_code=$vcode";
        $result = $mysqli->query($query);
        $count = $result->num_rows;
        if($count>0)
        {
            $mysqli->query("UPDATE enquiry SET verification_status='True' WHERE enq_id=$enq_id");
            $smsmsg = "Your Enquiry Sent Successfully , Thanks For Showing Interest In This Property.";
            sendMessage($smsmsg,$mobile);
            $to=$email;
            $subject="Enquiry Sent Successful";
            // From
            $header="from: Homeplanetary";
            // Your message
            $message="<h2>Thank you for showing interest in this property...</h2><h3>We will get back to you...</h3>\r\n";
            $sentmail = mail($to,$subject,$message,$header);
            echo '<script type="text/javascript">alert("Your enquiry has been submitted successfully.");window.location.href="Home/";</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("OTP Does Not Match");window.location.reload();</script>';
        }
    }
}

//javascript function
function showverify(type,user_id)
{
document.getElementById("mverification_type").value=type;
document.getElementById("muser_id").value=user_id;
$('#verification-popup').bPopup();
}
*/
?>



