<?php

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['tracker'])){
?>
<?php include 'header.php';?>

<!-- innerbanner -->
	<div class="agileits-inner-banner">

	</div>
<!-- //innerbanner -->

<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs"><a href="index.php"><i class="fa fa-home home_1"></i></a> / <span>Tickets</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->

	<!-- About-page -->
	   <div class="terms w3ls-about w3layouts-content">
		<div class="container"><div class="container-fluid">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
					 <h2>
					 	<center>PAYMENT INFO</center>
					 </h2>
					 <br />
					 <div class="panel panel-success">
					 	<div class="panel-heading">
					 		<h3 class="panel-title"><center>DEPARTURE</center></h3>
					 	</div>
					 	<div class="panel-body">
					 		<strong>
					 			<i>ONLINE RAILWAY'S TICKET SYSTEM</i>
					 			<h3>
					 			<?php require_once('data/depart_from_to.php');
					 				echo $origin['origin_desc'];
					 			?>
					 			 -
					 			 <?= $dest['dest_destination']; ?>
					 			 </h3>
					 			<p>Departure Date: <?= $_SESSION['departure_date']; ?> @9:00AM</p>
					 		</strong>
					 			<i>Estimated Arrival Time: The Next Day @3:00PM</i><br />
					 			<strong>
					 				COACH: <?php require_once('data/get_accomodation.php');
					 					echo $accomodation['acc_type'];
					 				?>
					 			</strong>
					 	</div>
					 </div>

					 <div class="panel panel-success">
					 	<div class="panel-heading">
					 		<h3 class="panel-title">CONTACT INFO</h3>
					 	</div>
					 	<div class="panel-body">
					 	<?php require_once('data/getBooked.php'); ?>
					 	<strong>Book By:</strong> <?= ucwords($bookByInfo['book_by']);  ?><br />
					 	<strong>Contact #:</strong> <?= $bookByInfo['book_contact']; ?><br />
					 	<strong>Address:</strong> <?= $bookByInfo['book_address']; ?><br />
					 	</div>
					 </div>
						<div class="container-fluid">
						<strong>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						PASSENGERS</strong>
							<table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
									    <tr>
									        <th>
									        	<center>
									       			Name
									        	</center>
									        </th>
									        <th>
									        	<center>
									        		Age
									        	</center>
								        	</th>
									        <th>
									        	<center>
									        		Gender
									        	</center>
								        	</th>
								        	 <th>
									        	<center>
									        		Departure Price
									        	</center>
								        	</th>
									    </tr>
									</thead>
								    <tbody>
								    <?php
								    	require_once('data/getBooked.php');
								    	$totalPayment = 0;
								    	$tracker = '';
								     foreach($bookPass as $bp):
								    	$name = $bp['book_name'];
								    	$name = ucwords($name);
								    	$price = $bp['acc_price'];
								    	$totalPayment += $price;
								    	$tracker = $bp['book_tracker'];
								    ?>
								    	<tr align="center">
								    		<td><?= $name; ?></td>
								    		<td><?= $bp['book_age']; ?></td>
								    		<td><?= $bp['book_gender']; ?></td>
								    		<td><?= $price; ?></td>
								    	</tr>
								    <?php endforeach; ?>
								    	<tr>
								    		<td></td>
								    		<td></td>
								    		<td align="right"><strong>TOTAL:</strong></td>
								    		<td align="center"><strong><?= $totalPayment; ?></strong></td>
								    	</tr>
								    </tbody>
								    <strong>- Booked ID: <?= $tracker; ?></strong>
								   </table>
								   <center>
									   <a href="index.php" class="btn btn-success">Return Home
										   <span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
									   </a>
								   </center>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
    <?php include 'footer.php';?>
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
						};
					*/

					$().UItoTop({ easingType: 'easeOutQuart' });

					});
			</script>
			<!-- start-smoth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
			</script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</body>
<!-- /body -->
</html>
<!-- /html -->

<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>
