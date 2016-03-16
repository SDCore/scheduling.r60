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
        
    ?>
    
    <div class="container">

    	<div class="card">
    		<div class="card-title">Delete Ticket?</div>
    		<div class="card-content">
    			<p>
    				Are you sure you want to delete this ticket?
    				<br /><br />
    				Name: <?php echo $firstname; ?> <?php echo $lastname; ?>
    				<br />
    				Date: <?php echo $date; ?>
    				<br />
    				Service: <?php echo $servicetitle; ?>
    				<br /><br />
    				<div class="row">
    					<div class="col-md-6">
    						<a href="<?php echo $site; ?>/deleteconfirm?id=<?php echo $ticket_id; ?>" class="button-raised el-2">Yes</a>
    					</div>
    					<div class="col-md-6">
    						<a href="<?php echo $site; ?>/ticket?id=<?php echo $ticket_id; ?>" class="button-raised el-2">No</a>
    					</div>
    				</div>
    			</p>
    		</div>
    	</div>

    </div>
    
<?php require_once("./include/footer.php"); ?>
