<?php require_once("./assets/core/init.php"); require_once("./include/navbar.php"); ?>
    
    <?php
    
        if(logged_in() === false) {
            header("location: /details/signin");
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
            $tcreator = $row['ticket_creator'];
            $engine = $row['engine'];
            $wax = $row['wax'];
            $mat = $row['mat'];
        }

        if($engine == "1") {
            $extra1 = "Engine Cleaning";
            $check1 = "checked";
        }

        if($wax == "1") {
            $extra2 = "Wax";
            $check2 = "checked";
        }

        if($mat == "1") {
            $extra3 = "Mat Set";
            $check3 = "checked";
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
                    <li>Hand Wash</li>
                </ol>
            ";
            $active7 = "selected";
        }
        elseif($services == "hw") {
            $servicetitle = "Hand Wash - Car";
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                    <li>Hand Wash</li>
                </ol>
            ";
            $active8 = "selected";
        }
        elseif($services == "hwfs") {
            $servicetitle = "Hand Wash - Car w/ Full Service";
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                    <li>Hand Wash</li>
                </ol>
            ";
            $active9 = "selected";
        }
        elseif($services == "hwsuv") {
            $servicetitle = "Hand Wash - SUV";
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                    <li>Hand Wash</li>
                </ol>
            ";
            $active10 = "selected";
        }
        elseif($services == "hwsuvfs") {
            $servicetitle = "Hand Wash - SUV w/ Full Service";
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                    <li>Hand Wash</li>
                </ol>
            ";
            $active11 = "selected";
        }
        
        if($options == 'Prepaid') {
            $option = "<center><h3 style='color: #E14747;'>Prepaid</h3></center>";
            $oa2 = "selected";
        }elseif($options == 'Paid/Completed') {
            $option = "<center><h3 style='color: #20B473;'>Completed</h3></center>";
            $oa3 = "selected";
        }elseif($options == 'Appointment') {
            $option = "<center><h3 style='color: #FFC017;'>Appointment</h3></center>";
            $oa4 = "selected";
        }
        
        $totalprice = $serviceprice - $discount;
        
        if(empty($_POST['updateticket']) === false) {
            $firstname = htmlentities($_POST['firstname'], ENT_QUOTES, 'UTF-8');
            $lastname = htmlentities($_POST['lastname'], ENT_QUOTES, 'UTF-8');
            $pnumber = htmlentities($_POST['phonenum'], ENT_QUOTES, 'UTF-8');
            $date = $_POST['date'];
            $vmake = htmlentities($_POST['vmake'], ENT_QUOTES, 'UTF-8');
            $vmodel = htmlentities($_POST['vmodel'], ENT_QUOTES, 'UTF-8');
            $vcolor = htmlentities($_POST['vcolor'], ENT_QUOTES, 'UTF-8');
            $discount = htmlentities($_POST['discount'], ENT_QUOTES, 'UTF-8');
            $options = $_POST['optionsselect'];
            $user_id = $user_data['user_id'];
            $services = $_POST['serviceselect'];
            $notes = htmlentities($_POST['notes'], ENT_QUOTES, 'UTF-8');

            if(isset($_POST['engine']) && 
               $_POST['engine'] == 'ETrue') {
                $enginepost = "1";
            }else{
                $enginepost = "0";
            } 

            if(isset($_POST['wax']) && 
               $_POST['wax'] == 'WTrue') {
                $waxpost = "1";
            }else{
                $waxpost = "0";
            } 

            if(isset($_POST['mat']) && 
               $_POST['mat'] == 'MTrue') {
                $matpost = "1";
            }else{
                $matpost = "0";
            }
                
            $insertticket = "UPDATE detail_tickets
                            SET 
                            first_name = '$firstname', last_name = '$lastname', phone_number = '$pnumber', date = '$date', vehicle_make = '$vmake', vehicle_model = '$vmodel', vehicle_color = '$vcolor', discount = '$discount', services = '$services', pre_paid_done = '$options', notes = '$notes', engine = '$enginepost', wax = '$waxpost', mat = '$matpost'
                            WHERE
                            ticket_id=".$ticket_id."";
                
            mysql_query($insertticket) or die(mysql_error());
            header("location: /details/ticket?id=".$ticketid."");
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
	                            <input type="text" name="lastname" id="lastname" class="validate" value="<?php echo $lastname; ?>" placeholder="Last Name" />
	                        </div>
	                        <div class="col-md-6">
	                            <input type="number" name="phonenum" id="phonenum" class="validate" required="required" value="<?php echo $pnumber; ?>" />
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
	                            <input type="number" name="discount" id="discount" class="validate discount-icon" required="required" value="<?php echo $discount; ?>" placeholder="Discount" style="padding-left: 22px;" />
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
	                                <option value="hw" <?php if(isset($active8)) {echo $active8; } ?>>Hand Wash - Car</option>
					                <option value="hwfs" <?php if(isset($active9)) {echo $active9; } ?>>Hand Wash - Car w/ Full Service</option>
					                <option value="hwsuv" <?php if(isset($active10)) {echo $active10; } ?>>Hand Wash - SUV</option>
					                <option value="hwsuvfs" <?php if(isset($active11)) {echo $active11; } ?>>Hand Wash - SUV w/ Full Service</option>
	                            </select>
	                        </div>
	                        <div class="col-md-4">
	                            <select name="optionsselect" id="optionsselect">
	                                <option value="Prepaid" <?php if(isset($oa2)) {echo $oa2; } ?>>Prepaid</option>
                                    <option value="Appointment" <?php if(isset($oa4)) { echo $oa4; } ?>>Appointment</option>
	                                <option value="Paid/Completed" <?php if(isset($oa3)) { echo $oa3; } ?>>Paid/Completed</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-8">
								<input type="text" name="notes" id="notes" value="<?php echo $note; ?>" placeholder="Notes" />
	                        </div>
	                        <div class="col-md-4">
	                        	<input type="text" name="ticket_creator" id="ticket_creator" value="<?php echo $tcreator; ?>" disabled="disabled" />
	                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <input type="checkbox" name="engine" id="engine" value="ETrue" <?php if(isset($check1)){ echo $check1; } ?> /> <label for="engine">Engine Cleaning</label>
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox" name="wax" id="wax" value="WTrue" <?php if(isset($check2)){ echo $check2; } ?> /> <label for="wax">Wax</label>
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox" name="mat" id="mat" value="MTrue" <?php if(isset($check3)){ echo $check3; } ?> /> <label for="mat">Mat Set</label>
                            </div>
                        </div>

                        <div class="row">
	                        <div class="col-md-12">
	                            <input type="submit" name="updateticket" id="updateticket" class="button-raised el-2" value="Update Ticket" />
	                        </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
<?php require_once("./include/footer.php"); ?>
