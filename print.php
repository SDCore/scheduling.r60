<?php require_once("./assets/core/init.php"); ?>
    
    <title>Route 60 Detailing</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
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
            $notes = $row['notes'];
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
            $serviceprice = "135.00";
            $servicedetails = "
                <ol>
                    <li>Full Service Wash</li>
                    <li>Claybar Treatment</li>
                    <li>Hand Wash</li>
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
        
        if($options == 'Paid') {
            $option = "<span style='color: #E14747; font-weight: bold;'>Paid</span>";
        }elseif($options == 'Prepaid') {
            $option = "<span style='color: #E14747; font-weight: bold;'>Prepaid</span>";
        }elseif($options == 'Completed') {
            $option = "<span style='color: #20B473; font-weight: bold;'>Completed</span>";
        }elseif($options == 'Appointment') {
            $option = "<span style='color: #FFC017; font-weight: bold;'>Appointment</span>";
        }
        
        $totalprice = $serviceprice - $discount;
        
    ?>

    <div class="print-container">
        <div class="print-card">
            <div class="card-title">
                <b><?php echo $firstname." ".$lastname."</b><div style='margin-left: 25%; display: inline-block;'>".$option."</div><span style='float: right;'>Invoice #".$tid." - ".$tcreator."<br /><span style='color: #FF0000;'>Route 60 Auto Wash and Detail</span></span>"; ?>
            </div>
            <hr>
            <div class="card-content">
                <div class="print-30">
                    <b>Phone Number:</b> <?php echo $pnumber; ?>
                    <br />
                    <b>Date:</b> <?php echo $date; ?>
                    <hr>
                    <b>Vehicle Make:</b> <?php echo $vmake; ?>
                    <br />
                    <b>Vehicle Model:</b> <?php echo $vmodel; ?>
                    <br />
                    <b>Vehicle Color:</b> <?php echo $vcolor; ?>
                    <br />
                    <b>Notes:</b> <?php echo $notes; ?>
                </div>
                <div class="print-30">
                    <b><?php echo $servicetitle; ?></b>
                    <hr style="margin: 0px; padding: 0px;">
                    <small>
                        <?php echo $servicedetails; ?>
                    </small>
                </div>
                <div class="print-30">
                    <div style="float: right;">
                        Original Price: <b>$<?php echo $serviceprice; ?></b>
                        <br />
                        Discount: <b>-$<?php echo $discount; ?></b>
                        <hr style="margin: 1px; padding: 1px;">
                        Total: <b>$<?php echo $totalprice; ?></b>
                    </div>
                </div>
            </div>
            <div class="print-footer">
                
            </div>
        </div>
    </div>
    <div class="print-container">
        <div class="print-card">
            <div class="card-title">
                <b><?php echo $firstname." ".$lastname."</b><div style='margin-left: 25%; display: inline-block;'>".$option."</div><span style='float: right;'>Invoice #".$tid." - ".$tcreator."<br /><span style='color: #FF0000;'>Route 60 Auto Wash and Detail</span></span>"; ?>
            </div>
            <hr>
            <div class="card-content">
                <div class="print-30">
                    <b>Phone Number:</b> <?php echo $pnumber; ?>
                    <br />
                    <b>Date:</b> <?php echo $date; ?>
                    <hr>
                    <b>Vehicle Make:</b> <?php echo $vmake; ?>
                    <br />
                    <b>Vehicle Model:</b> <?php echo $vmodel; ?>
                    <br />
                    <b>Vehicle Color:</b> <?php echo $vcolor; ?>
                    <br />
                    <b>Notes:</b> <?php echo $notes; ?>
                </div>
                <div class="print-30">
                    <b><?php echo $servicetitle; ?></b>
                    <hr style="margin: 0px; padding: 0px;">
                    <small>
                        <?php echo $servicedetails; ?>
                    </small>
                </div>
                <div class="print-30">
                    <div style="float: right;">
                        Original Price: <b>$<?php echo $serviceprice; ?></b>
                        <br />
                        Discount: <b>-$<?php echo $discount; ?></b>
                        <hr style="margin: 1px; padding: 1px;">
                        Total: <b>$<?php echo $totalprice; ?></b>
                    </div>
                </div>
            </div>
            <div class="print-footer">
                
            </div>
        </div>
    </div>
    <div class="print-container">
        <div class="print-card">
            <div class="card-title">
                <b><?php echo $firstname." ".$lastname."</b><div style='margin-left: 25%; display: inline-block;'>".$option."</div><span style='float: right;'>Invoice #".$tid." - ".$tcreator."<br /><span style='color: #FF0000;'>Route 60 Auto Wash and Detail</span></span>"; ?>
            </div>
            <hr>
            <div class="card-content">
                <div class="print-30">
                    <b>Phone Number:</b> <?php echo $pnumber; ?>
                    <br />
                    <b>Date:</b> <?php echo $date; ?>
                    <hr>
                    <b>Vehicle Make:</b> <?php echo $vmake; ?>
                    <br />
                    <b>Vehicle Model:</b> <?php echo $vmodel; ?>
                    <br />
                    <b>Vehicle Color:</b> <?php echo $vcolor; ?>
                    <br />
                    <b>Notes:</b> <?php echo $notes; ?>
                </div>
                <div class="print-30">
                    <b><?php echo $servicetitle; ?></b>
                    <hr style="margin: 0px; padding: 0px;">
                    <small>
                        <?php echo $servicedetails; ?>
                    </small>
                </div>
                <div class="print-30">
                    <div style="float: right;">
                        Original Price: <b>$<?php echo $serviceprice; ?></b>
                        <br />
                        Discount: <b>-$<?php echo $discount; ?></b>
                        <hr style="margin: 1px; padding: 1px;">
                        Total: <b>$<?php echo $totalprice; ?></b>
                    </div>
                </div>
            </div>
            <div class="print-footer">
                
            </div>
        </div>
    </div>
    <!-- <div class="print-container">
        <div class="row">
            <div class="col-md-12">
                <div class="print-card">
                    <div class="card-title">
                        <?php echo $firstname." ".$lastname."<div style='margin-left: 15%; display: inline-block;'>".$option."</div><span style='float: right;'>Invoice #".$tid." - ".$tcreator."</span>"; ?>
                    </div>
                    <hr>
                    <div class="card-content">
                            <div class="col-md-4">
                                <b>Phone Number:</b> <?php echo $pnumber; ?>
                                <br />
                                <b>Date:</b> <?php echo $date; ?>
                                <hr>
                                <b>Vehicle Make:</b> <?php echo $vmake; ?>
                                <br />
                                <b>Vehicle Model:</b> <?php echo $vmodel; ?>
                                <br />
                                <b>Vehicle Color:</b> <?php echo $vcolor; ?>
                                <br />
                                <b>Notes: </b> <?php echo $notes; ?>
                            </div>
                            <div class="col-md-8">
                                <b><?php echo $servicetitle; ?></b>
                                <br />
                                <b><?php echo $servicedetails; ?></b>
                                <hr>
                                <b>Original Price:</b> $<?php echo $serviceprice; ?>
                            </div>
                    </div>
                    <div class="card-footer">
                        asiodnasdasiodaiojdasiojdasiojdasioj
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
<?php require_once("./include/footer.php"); ?>
