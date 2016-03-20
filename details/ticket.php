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
            $notes = $row['notes'];
            $tcreator = $row['ticket_creator'];
            $lock = $row['locked'];
            $engine = $row['engine'];
            $wax = $row['wax'];
            $mat = $row['mat'];
        }

        if($engine == "1") {
            $extra1 = "Engine Cleaning";
        }

        if($wax == "1") {
            $extra2 = "Wax";
        }

        if($mat == "1") {
            $extra3 = "Mat Set";
        }

        if($lock == 0) {
            $cdisabled = '';
        }elseif($lock == 1) {
            $cdisabled = 'disabled="disabled" class="disabled"';
        }
        
        if($services == 'wax'){
            $servicetitle = "Meguiar's Wax";
            $serviceprice = "35.00";
            $servicedetails = "
                <ol>
                    <li>Wax Special</li>
                </ol>
            ";
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
        }
        elseif($services == 7) {
            $servicetitle = "#7 Synthetic Sealer Special";
            $serviceprice = "140.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                </ol>
            ";
        }
        elseif($services == "hw") {
            $servicetitle = "Hand Wash - Car";
            $serviceprice = "25";
            $servicedetails = "
                <ol>
                    <li>Hand Wash</li>
                </ol>
            ";
        }
        elseif($services == "hwfs") {
            $servicetitle = "Hand Wash - Car w/ Full Service";
            $serviceprice = "35";
            $servicedetails = "
                <ol>
                    <li>Hand Wash</li>
                    <li>Full Service Wash</li>
                </ol>
            ";
        }
        elseif($services == "hwsuv") {
            $servicetitle = "Hand Wash - SUV";
            $serviceprice = "35";
            $servicedetails = "
                <ol>
                    <li>Hand Wash</li>
                </ol>
            ";
        }
        elseif($services == "hwsuvfs") {
            $servicetitle = "Hand Wash - SUV w/ Full Service";
            $serviceprice = "45";
            $servicedetails = "
                <ol>
                    <li>Hand Wash</li>
                    <li>Full Service Wash</li>
                </ol>
            ";
        }
        
        if($options == 'Prepaid') {
            $option = "<center><h3 style='color: #E14747;'>Prepaid</h3></center>";
        }elseif($options == 'Paid/Completed') {
            $ccompleted = "ccompleted";
            $option = "<center><h3 style='color: #20B473;'>Paid/Completed</h3></center>";
        }elseif($options == 'Appointment') {
            $option = "<center><h3 style='color: #FFC017;'>Appointment</h3></center>";
        }
        
        $totalprice = $serviceprice - $discount;
        
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><?php echo $firstname." ".$lastname." <span style='float: right;'>Invoice #".$tid." - ".$tcreator."</span>"; ?></div>
                    <div class="card-content">
                        <p><b>Phone Number:</b> <?php echo $pnumber; ?>
                        <br />
                        <b>Date:</b> <?php echo $date; ?>
                        <br />
                        <b>Vehicle Make:</b> <?php echo $vmake; ?>
                        <br />
                        <b>Vehicle Model:</b> <?php echo $vmodel; ?>
                        <br />
                        <b>Vehicle Color:</b> <?php echo $vcolor; ?>
                        <br />
                        <b>Notes:</b> <?php echo $notes; ?></p>
                        <p><?php echo $option; ?></p>
                        <p>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo $site; ?>/print?id=<?php echo $ticket_id; ?>" target="_blank" class="button-raised print el-2"><i class="fa fa-print"></i> Print</a>
                                </div>
                                <div class="col-md-4">
                                    <a <?php echo $cdisabled; ?> href="<?php echo $site; ?>/edit?id=<?php echo $ticket_id; ?>" class="button-raised el-2"><i class="fa fa-pencil"></i> Edit</a>
                                </div>
                                <div class="col-md-4">
                                    <a <?php echo $cdisabled; ?> href="<?php echo $site; ?>/deleteticket?id=<?php echo $ticket_id; ?>" class="button-raised delete el-2"><i class="fa fa-trash-o"></i> Delete</a>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><?php echo $servicetitle; ?></div>
                    <div class="card-content">
                        <p><?php echo $servicedetails; ?></p>
                        <hr>
                        <ul>
                            <?php if(isset($extra1)) {
                                echo '<li>'.$extra1.'';
                            } ?>
                            <?php if(isset($extra2)) {
                                echo '<li>'.$extra2.'';
                            } ?>
                            <?php if(isset($extra3)) {
                                echo '<li>'.$extra3.'';
                            } ?>
                        </ul>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float: right;">Sub Total - $<?php echo $serviceprice; ?></div>
                            </div>
                            <br />
                            <div class="col-md-12">
                                <div style="float: right;">Discount - $<?php echo $discount; ?></div>
                            </div>
                            <hr style="border-bottom: 1px solid #666666;">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <div style="float: right;"><b>Total - $<?php echo $totalprice; ?></b></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require_once("./include/footer.php"); ?>
