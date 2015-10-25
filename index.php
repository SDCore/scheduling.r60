<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

	<div class="container">
		<h2 class="welcome">Welcome, Route 60!</h2>

		<div class="row">
			<div class="col-md-8">
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
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<a class="button-flat right">View All</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-title">Notifications</div>
					<div class="card-content">
						<div class="notification">
							A thing has been updated.
						</div>
						<div class="notification">
							A thing has been updated.
						</div>
					</div>
					<div class="card-footer">
						<a class="button-flat right">View All</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
