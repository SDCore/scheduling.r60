<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php

    $cdate = date("m/d/Y");

    if(empty($_POST['submitnewticket']) === false) {
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
        $ticketid = microtime() + floor(rand()*10000) + floor(rand()*314);
        $notes = $_POST['notes'];
        $tcreator = $_POST['ticket_creator'];
            
        $insertticket = "INSERT INTO detail_tickets 
                        (id, first_name, last_name, phone_number, date, vehicle_make, vehicle_model, vehicle_color, discount, services, pre_paid_done, user_id, ticket_id, notes, ticket_creator)
                        VALUES
                        ('', '$firstname', '$lastname', '$pnumber', '$date', '$vmake', '$vmodel', '$vcolor', '$discount', '$services', '$options', '$user_id', '$ticketid', '$notes', '$tcreator')";
            
        mysql_query($insertticket) or die(mysql_error());
        header("location: /ticket?id=".$ticketid."");
    }

?>

<div class="container">

	<div class="card">

		<div class="card-title">New Ticket</div>

			<form action="" method="POST" style="padding: 10px;">
				<div class="row">
					<div class="col-md-6">
						<input type="text" name="firstname" id="firstname" class="validate" required="required" placeholder="First Name" />
					</div>
			        <div class="col-md-6">
			        	<input type="text" name="lastname" id="lastname" class="validate" placeholder="Last Name" />
			        </div>
			        <div class="col-md-6">
			        	<input type="text" name="phonenum" id="phonenum" class="validate" required="required" placeholder="Phone Number" />
			        </div>
			        <div class="col-md-6">
			        	<input type="date" name="date" id="date" class="validate" required="required" value="<?php echo date('Y-m-d'); ?>" />
			        </div>
			    </div>
			    <div class="row">
			        <div class="col-md-4">
			        	<input type="text" name="vmake" id="vmake" class="validate" required="required" placeholder="Vehicle Make" />
			        </div>
			        <div class="col-md-4">
			        	<input type="text" name="vmodel" id="vmodel" class="validate" required="required" placeholder="Vehicle Model" />
			        </div>
			        <div class="col-md-4">
			        	<input type="text" name="vcolor" id="vcolor" class="validate" required="required" placeholder="Vehicle Color" />
			        </div>
			        <div class="col-md-4">
			        	<input type="text" name="discount" id="discount" class="validate discount-icon" required="required" placeholder="Discount" style="padding-left: 22px;" />
			        </div>
			        <div class="col-md-4">
			        	<select name="serviceselect" id="serviceselect">
			                <option value="wax">Wax Special</option>
			                <option value="1">#1 Interior</option>
			                <option value="2">#2 Exterior</option>
			                <option value="3">#3 Complete</option>
			                <option value="4">#4 Engine</option>
			                <option value="5">#5 Paint Restoration</option>
			                <option value="6">#6 Ultimate</option>
			                <option value="7">#7 Synthetic Sealer</option>
			            </select>
			        </div>
			        <div class="col-md-4">
			        	<select name="optionsselect" id="optionsselect">
			                <option value="Prepaid">Prepaid</option>
			                <option value="Paid">Paid</option>
			                <option value="Appointment">Appointment</option>
			                <option value="Completed">Completed</option>
			            </select>
			        </div>
			    </div>
			    <div class="row">
			        <div class="col-md-8">
						<input type="text" name="notes" id="notes" class="input" placeholder="Notes" />
			        </div>
			        <div class="col-md-4">
			        	<input type="text" name="ticket_creator" id="ticket_creator" class="input" placeholder="Ticket Creator Name" required="required" />
			        </div>
			        
			        <div class="col-md-12">
			        	<input type="submit" name="submitnewticket" id="submitnewticket" class="button-raised" value="Submit Ticket" style="width: 100%;" />
			         </div>
			    </div>
			</form>

		</div>

	</div>

</div>
