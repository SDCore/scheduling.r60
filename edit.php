<?php require_once("./assets/core/init.php"); require_once("./include/navbar.php"); ?>
    
    <?php
    
        if(logged_in() === false) {
            header("location: /signin");
        }else{
                        
        }
        
        $ticketid = $_GET['id'];
        
        $getticketinfo = mysql_query("SELECT * FROM detail_tickets WHERE ticket_id = '$ticketid'");
        
        while($row = mysql_fetch_array($getticketinfo)) {
            $tid = $row['id'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $pnumber = $row['phone_number'];
            $date = $row['date'];
            $vmake = $row['vehicle_make'];
            $vmodel = $row['vehicle_model'];
            $vcolor = $row['vehicle_color'];
            $discount = $row['discount'];
            $services = $row['services'];
            $options = $row['pre_paid_done'];
            $uid = $row['user_id'];
            $ticket_id = $row['ticket_id'];
            $note = $row['notes'];
        }
        
        if($services == 'wax'){
            $servicetitle = "Meguiar's Wax";
            $serviceprice = "35.00";
            $servicedetails = "
                <ol>
                    <li>Wax Special</li>
                </ol>
            ";
            $active = "selected";
        }elseif($services == 1) {
            $servicetitle = "#1 Interior Only Detail";
            $serviceprice = "99.00";
            $servicedetails = "
                <ol>
                    <li>Shampoo all carpeting</li>
                    <li>Shampoo all door panels</li>
                    <li>Seats cleaned and conditioned</li>
                    <li>Dashboard cleaned and conditioned</li>
                    <li>All glass cleaned and polished</li>
                </ol>
            ";
            $active1 = "selected";
        }
        elseif($services == 2) {
            $servicetitle = "#2 Exterior Only Detail";
            $serviceprice = "79.00";
            $servicedetails = "
                <ol>
                    <li>Full Service car wash</li>
                    <li>Wheels and tires detailed</li>
                    <li>Bug & tar removal</li>
                    <li>Hand Applied Miguiar's Wax</li>
                    <li>Carnuba Wax</li>
                </ol>
            ";
            $active2 = "selected";
        }
        elseif($services == 3) {
            $servicetitle = "#3 Complete Interior & Exterior";
            $serviceprice = "159.00";
            $servicedetails = "
                <ol>
                    <li>Full Service car wash</li>
                    <li>Wheels and tires detailed</li>
                    <li>Lite duty buff</li>
                    <li>Hand Applied Miguiar's Wax</li>
                    <li>Carnuba Wax</li>
                    <li>Shampoo all carpeting</li>
                    <li>Shampoo all door panels</li>
                    <li>Seats cleaned and conditioned</li>
                    <li>Dashboard cleaned and conditioned</li>
                    <li>All glass cleaned and polished</li>
                </ol>
            ";
            $active3 = "selected";
        }
        elseif($services == 4) {
            $servicetitle = "#4 Engine Detail";
            $serviceprice = "39.00";
            $servicedetails = "
                <ol>
                    <li>Clean entire engine</li>
                    <li>Degrease entire engine</li>
                    <li>Clean engine compartment</li>
                    <li>Degrease engine compartment</li>
                    <li>Apply dressing</li>
                </ol>
            ";
            $active4 = "selected";
        }
        elseif($services == 5) {
            $servicetitle = "#5 Paint Restoration";
            $serviceprice = "199.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Wheels & tires detailed</li>
                    <li>Bug & tar removal</li>
                    <li>High speed paint polish for light scratch & oxidation removal</li>
                    <li>Meguiar's Polymer Synthetic Sealant applied</li>
                </ol>
            ";
            $active5 = "selected";
        }
        elseif($services == 6) {
            $servicetitle = "#6 Ultimate Interior & Exterior";
            $serviceprice = "299.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Wheels & tires detailed</li>
                    <li>Bug & tar removal</li>
                    <li>Meguiar's Polymer Synthetic Sealant applied</li>
                    <li>Complete surface contaminant removal by hand with claybar</li>
                    <li>Shampoo all carpeting</li>
                    <li>Shampoo all door panels</li>
                    <li>Seats cleaned & conditioned</li>
                    <li>Dashboard cleaned & conditioned</li>
                    <li>All glass cleaned and polished</li>
                </ol>
            ";
            $active6 = "selected";
        }
        elseif($services == 7) {
            $servicetitle = "#7 Synthetic Sealer Special";
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                </ol>
            ";
            $active7 = "selected";
        }
        
        if($options == 'Paid') {
            $option = "<center><h3 style='color: #E14747;'>Paid</h3></center>";
            $oa1 = "selected";
        }elseif($options == 'Prepaid') {
            $option = "<center><h3 style='color: #E14747;'>Prepaid</h3></center>";
            $oa2 = "selected";
        }elseif($options == 'Completed') {
            $option = "<center><h3 style='color: #20B473;'>Completed</h3></center>";
            $oa3 = "selected";
        }
        
        $totalprice = $serviceprice - $discount;
        
        if(empty($_POST['updateticket']) === false) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $pnumber = $_POST['phonenum'];
            $date = $_POST['date'];
            $vmake = $_POST['vmake'];
            $vmodel = $_POST['vmodel'];
            $vcolor = $_POST['vcolor'];
            $discount = $_POST['discount'];
            $options = $_POST['optionsselect'];
            $user_id = $user_data['user_id'];
            $services = $_POST['serviceselect'];
            $notes = $_POST['notes'];
                
            $insertticket = "UPDATE detail_tickets
                            SET 
                            first_name = '$firstname', last_name = '$lastname', phone_number = '$pnumber', date = '$date', vehicle_make = '$vmake', vehicle_model = '$vmodel', vehicle_color = '$vcolor', discount = '$discount', services = '$services', pre_paid_done = '$options', notes = '$notes'
                            WHERE
                            ticket_id=".$ticket_id."";
                
            mysql_query($insertticket) or die(mysql_error());
            header("location: /ticket?id=".$ticketid."");
        }
        
    ?>
    
    <div class="container">

    	<div class="card">

    		<div class="card-title">Edit Ticket</div>
                    <form action="" method="POST" style="padding: 10px;">
                    	<div class="row">
	                        <div class="col-md-6">
	                        	<input type="text" name="firstname" id="firstname" class="validate" required="required" value="<?php echo $firstname; ?>" placeholder="First Name" />
	                        </div>
	                        <div class="col-md-6">
	                            <input type="text" name="lastname" id="lastname" class="validate" required="required" value="<?php echo $lastname; ?>" placeholder="Last Name" />
	                        </div>
	                        <div class="col-md-6">
	                            <input type="text" name="phonenum" id="phonenum" class="validate" required="required" value="<?php echo $pnumber; ?>" />
	                        </div>
	                        <div class="col-md-6">
	                            <input type="date" name="date" id="date" class="validate" required="required" value="<?php echo $date; ?>" />
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-4">
	                            <input type="text" name="vmake" id="vmake" class="validate" required="required" value="<?php echo $vmake; ?>" placeholder="Vehicle Make" />
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" name="vmodel" id="vmodel" class="validate" required="required" value="<?php echo $vmodel; ?>" placeholder="Vehicle Model" />
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" name="vcolor" id="vcolor" class="validate" required="required" value="<?php echo $vcolor; ?>" placeholder="Vehicle Color" />
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" name="discount" id="discount" class="validate" required="required" value="<?php echo $discount; ?>" placeholder="Discount" />
	                        </div>
	                        <div class="col-md-4">
	                            <select name="serviceselect" id="serviceselect">
	                                <option value="wax" <?php if(isset($active)) {echo $active; } ?>>Wax Special</option>
	                                <option value="1" <?php if(isset($active1)) {echo $active1; } ?>>#1 Interior</option>
	                                <option value="2" <?php if(isset($active2)) {echo $active2; } ?>>#2 Exterior</option>
	                                <option value="3" <?php if(isset($active3)) {echo $active3; } ?>>#3 Complete</option>
	                                <option value="4" <?php if(isset($active4)) {echo $active4; } ?>>#4 Engine</option>
	                                <option value="5" <?php if(isset($active5)) {echo $active5; } ?>>#5 Paint Restoration</option>
	                                <option value="6" <?php if(isset($active6)) {echo $active6; } ?>>#6 Ultimate</option>
	                                <option value="7" <?php if(isset($active7)) {echo $active7; } ?>>#7 Synthetic Sealer</option>
	                            </select>
	                        </div>
	                        <div class="col-md-4">
	                            <select name="optionsselect" id="optionsselect">
	                                <option value="Prepaid" <?php if(isset($oa1)) {echo $oa1; } ?>>Prepaid</option>
	                                <option value="Paid" <?php if(isset($oa2)) {echo $oa2; } ?>>Paid</option>
	                                <option value="Completed" <?php if(isset($oa3)) { echo $oa3; } ?>>Completed</option>
	                            </select>
	                        </div>
	                        <div class="col-md-12">
								<input type="text" name="notes" id="notes" value="<?php echo $note; ?>" placeholder="Notes" />
	                        </div>
	                        <div class="col-md-12">
	                            <input type="submit" name="updateticket" id="updateticket" class="button-raised" value="Update Ticket" />
	                        </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
<?php require_once("./include/footer.php"); ?>
