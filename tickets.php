<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php
    
    	if(logged_in() === false) {
            header("location: /signin");
        }else{
                        
        }

        $tbl_name = "detail_tickets";       //your table name
        // How many adjacent pages should be shown on each side?
        $adjacents = 2;
        $query = "SELECT COUNT(*) as num FROM $tbl_name";
        $total_pages = mysql_fetch_array(mysql_query($query));
        $total_pages = $total_pages[0];
        
        /* Setup vars for query. */
        $targetpage = "tickets";   //your file name  (the name of this file)
        $limit = 8;                                 //how many items to show per page
        $page = $_GET['page'];
        if($page) 
            $start = ($page - 1) * $limit;          //first item to display on this page
        else
            $start = 0;                             //if no page var is given, set start to 0
        
        /* Get data. */
        $uid = $user_data['user_id'];
        $sql = "SELECT * FROM $tbl_name ORDER BY id DESC LIMIT $start, $limit";
        $result2 = mysql_query($sql);
        
        /* Setup page vars for display. */
        if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
        $prev = $page - 1;                          //previous page is page - 1
        $next = $page + 1;                          //next page is page + 1
        $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;                      //last page minus 1
        $pagination = "";
        if($lastpage > 1)
        {   
            $pagination .= "<ul class='pagination' style='margin: 0px;'>";
            //previous button
            if ($page > 1) 
                $pagination.= "<li><a href='$targetpage?page=$prev'><</a></li>";
            else
                $pagination.= "<li class='disabled'><a href='#'><</a></li>"; 
            
            //pages 
            if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
            {   
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                    else
                        $pagination.= "<li class='waves-effect'><a href='$targetpage?page=$counter'>$counter</a></li>";                 
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if($page < 1 + ($adjacents * 2))        
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $pagination.= "<li class='waves-effect'><a href='$targetpage?page=$counter'>$counter</a></li>";                 
                    }
                    $pagination.= "<li class='disabled'><a href='#'>...</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";       
                }
                //in middle; hide some front and some back
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=1\">1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=2\">2</a></li>";
                    $pagination.= "<li class='disabled'><a href='#'>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$counter\">$counter</a></li>";                 
                    }
                    $pagination.= "<li class='disabled'><a href='#'>...</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";       
                }
                //close to end; only hide early pages
                else
                {
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=1\">1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=2\">2</a></li>";
                    $pagination.= "<li class='disabled'><a href='#'>...</a></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$counter\">$counter</a></li>";                 
                    }
                }
            }
            
            //next button
            if ($page < $counter - 1) 
                $pagination.= "<li><a href='$targetpage?page=$next'>></a></li>";
            else
                $pagination.= "<li class='disabled'><a href='#'>></a></li>";
            $pagination.= "</ul>\n";       
        }
    
    ?>

	<div class="container">

		<a href="<?php echo $site; ?>/new"><div class="button-raised" style="width: auto;"><i class="fa fa-plus"></i> New Ticket</div></a>

		<div class="row">
			<div class="col-md-45">
				<div class="card">
					<div class="card-title">Recent Tickets</div>
					<div class="card-content">
						<table class="table" padding="10" style="text-align: center;">

							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Detail</th>
									<th>Completed</th>
								</tr>
							</thead>

							<tbody>

								<?php

								while($row = mysql_fetch_array($result2)) {
									$services = $row['services'];
									$options = $row['pre_paid_done'];

									if($services == 'wax'){
			                            $servicetitle = "Meguiar's Wax";
			                        }elseif($services == 1) {
			                            $servicetitle = "#1 Interior Only Detail";
			                        }
			                        elseif($services == 2) {
			                            $servicetitle = "#2 Exterior Only Detail";
			                        }
			                        elseif($services == 3) {
			                            $servicetitle = "#3 Complete Interior & Exterior";
			                        }
			                        elseif($services == 4) {
			                            $servicetitle = "#4 Engine Detail";
			                        }
			                        elseif($services == 5) {
			                            $servicetitle = "#5 Paint Restoration";
			                        }
			                        elseif($services == 6) {
			                            $servicetitle = "#6 Ultimate Interior & Exterior";
			                        }
			                        elseif($services == 7) {
			                            $servicetitle = "#7 Synthetic Sealer Special";
			                        }
			                        
			                        if($options == 'Paid') {
			                            $option = "<center><h6 style='color: #E14747; margin: 0px;'>X</h6></center>";
			                        }elseif($options == 'Prepaid') {
			                            $option = "<center><h6 style='color: #E14747; margin: 0px;'>X</h6></center>";
			                        }elseif($options == 'Completed') {
			                            $option = "<center><h6 style='color: #20B473; margin: 0px;'>&check;</h6></center>";
			                        }

			                        echo '<tr>';
			                        echo '<td><a href="'.$site.'/ticket?id='.$row['ticket_id'].'">'.$row['first_name'].' '.$row['last_name'].'</a></td>';
			                        echo '<td>'.$row['date'].'</td>';
			                        echo '<td>'.$servicetitle.'</td>';
			                        echo '<td>'.$option.'</td>';
			                        echo '</tr>';

								}

							?>

							</tbody>

							<!-- <tbody>
								<tr>
									<td><a href="#">John Smith</a></td>
									<td>9/23/2015</td>
									<td>#1</td>
									<td>No</td>
								</tr>
								<tr>
									<td><a href="#">John Hurt</a></td>
									<td>9/23/2015</td>
									<td>#6</td>
									<td>No</td>
								</tr>
								<tr>
									<td><a href="#">John Smith</a></td>
									<td>9/23/2015</td>
									<td>#1</td>
									<td>No</td>
								</tr>
								<tr>
									<td><a href="#">John Hurt</a></td>
									<td>9/23/2015</td>
									<td>#6</td>
									<td>No</td>
								</tr>
								<tr>
									<td><a href="#">John Smith</a></td>
									<td>9/23/2015</td>
									<td>#1</td>
									<td>No</td>
								</tr>
							</tbody> -->
						</table>
					</div>
					<div class="card-footer">
						<?=$pagination?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>