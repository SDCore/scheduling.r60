<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php

		if(logged_in() === false) {
            header("location: /reports/signin");
        }else{
                        
        }

		$tbl_name = "report_profiles";       //your table name
        // How many adjacent pages should be shown on each side?
        $adjacents = 2;
        $query = "SELECT COUNT(*) as num FROM $tbl_name";
        $total_pages = mysql_fetch_array(mysql_query($query));
        $total_pages = $total_pages[0];
        
        /* Setup vars for query. */
        $targetpage = "people";   //your file name  (the name of this file)
        $limit = 15;                                 //how many items to show per page
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
                $pagination.= "<li class='left'><a href='$targetpage?page=$prev'><</a></li>";
            else
                $pagination.= "<li class='disabledpage left'><a href='#'><</a></li>"; 
            
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
                    $pagination.= "<li class='disabledpage'><a href='#'>...</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";       
                }
                //in middle; hide some front and some back
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=1\">1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=2\">2</a></li>";
                    $pagination.= "<li class='disabledpage'><a href='#'>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$counter\">$counter</a></li>";                 
                    }
                    $pagination.= "<li class='disabledpage'><a href='#'>...</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";       
                }
                //close to end; only hide early pages
                else
                {
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=1\">1</a></li>";
                    $pagination.= "<li class='waves-effect'><a href=\"$targetpage?page=2\">2</a></li>";
                    $pagination.= "<li class='disabledpage'><a href='#'>...</a></li>";
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
                $pagination.= "<li class='right'><a href='$targetpage?page=$next'>></a></li>";
            else
                $pagination.= "<li class='disabledpage right'><a href='#'>></a></li>";
            $pagination.= "</ul>\n";       
        }
    
    ?>

?>

	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-title">Profiles</div>
					<div class="card-content">
						<table class="table" padding="10" style="text-align: center;">
							<thead>
								<tr>
									<td>First / Last Name</td>
									<td>Store</td>
									<td>Average</td>
									<td>Strikes</td>
									<td>Rating</td>
									<td>Store ID</td>
									<td>Currently Hired</td>
								</tr>
							</thead>
							<tbody>
								<?php

									while($row = mysql_fetch_array($result2)) {

										$working = $row['working'];

										if($working == 1) {
								        	$workOut = "<h6 style='color: #20B473; margin: 0px; font-size: 20px;'>&check;</h6>";
								        }else{
								        	$workOut = "<h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6>";
								        }

										echo '<tr>';
										echo '<td>';
										echo "<a href='".$site."/profile?id=".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</a>";
										echo '</td>';
										echo '<td>';
										echo $row['store'];
										echo '</td>';
										echo '<td>';
										echo '$'.$row['average'];
										echo '</td>';
										echo '<td>';
										echo $row['strikes']."/3";
										echo '</td>';
										echo '<td>';
										echo $row['rating']."/5";
										echo '</td>';
										echo '<td>';
										echo $row['storeID'];
										echo '</td>';
										echo '<td>';
										echo $workOut;
										echo '</td>';
										echo '</tr>';
									}

								?>
							</tbody>
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
