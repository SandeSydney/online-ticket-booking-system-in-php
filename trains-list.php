<?php

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['departure_date'])){
?>
<?php include 'header.php';?>

    <!-- innerbanner -->
    <div class="agileits-inner-banner">

    </div>
    <!-- //innerbanner -->

    <!-- breadcrumbs -->
    <div class="w3layouts-breadcrumbs text-center">
        <div class="container">
            <span class="agile-breadcrumbs"><a href="index.php"><i class="fa fa-home home_1"></i></a> / <span>Accomodation</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- Trains-list -->
    <div class="agile-trains-list w3layouts-content">
        <div class="container">
            <!--bus-single -->
            <div class="w3agile single-bus">
                <h3 class="w3-head">Trains list</h3>
                <!-- train-routes -->
                <div class="bus-tp">
                    <div class="bus-tp-inner">
                        <h3>Trains from City1 to City2</h3>
                        <form class="" id="form-acc" method="post">
                        <div class="row">
                          <div class="col-sm-6">
                            <table class="table table-bordered agileinfo" >
                                <thead>
                                    <tr>
                                        <th>Number of Passengers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td class="price us">Total No. of Passenger
                                        <input type="number" min="1" class="form-control" name="totalPass" plactreholder="Total No. of Passenger" autocomplete="off">
                          					  </td>
                                        </tr>

                                </tbody>
                            </table>
                          </div>
                          <div class="col-sm-6">
                            <table class="table table-bordered agileinfo" >
                                <thead>
                                    <tr>
                                        <th>Fare</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                           <td class="price us">Price here <br>
                                             <button type="submit" name="button">Book Now</button></td>
                                        </tr>

                                </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- /train-routes -->
                <!-- bus-midd -->
                <div class="w3agile bus-midd">
                    <div class="table-responsive">
                        <table class="table table-bordered agileinfo">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Slots <i class="fa fa-train" aria-hidden="true"></i></th>
                                    <th>Accomodation <i class="fa fa-clock-o"></th>
                                    <th>Fare</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php require_once('data/get_all_accomodations.php'); ?>
            						   		<tr>
                                <td class="t-one">1</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getSit['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getSit['acc_type']; ?>
            						   			</td>
            						   			<td align="center wthree">
            						   				<?= $getSit['acc_slot'] - $totalSit['sit']; ?>
            						   			</td>
            						   			<td align="center wthree"><?= $getSit['acc_price']; ?></td>
            						   		</tr>
            						   		<tr>
                                <td class="t-one">2</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getEcoA['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getEcoA['acc_type']; ?>
            						   			</td>
            						   			<td align="center">
            						   				<?= $getEcoA['acc_slot'] - $totalEcoA['ecoA']; ?>
            						   			</td>
            						   			<td align="center wthree"><?= $getEcoA['acc_price']; ?></td>
            						   		</tr>
            						   		<tr>
                                <td class="t-one">3</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getEcoB['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getEcoB['acc_type']; ?>
            						   			</td>
            						   			<td align="center wthree">
            						   				<?= $getEcoB['acc_slot'] - $totalEcoB['ecoB']; ?>
            						   			</td>
            						   			<td align="center wthree"><?= $getEcoB['acc_price']; ?></td>
            						   		</tr>
            						   		<tr>
                                <td class="t-one">4</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getTour['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getTour['acc_type']; ?>
            						   			</td>
            						   			<td align="center">
            						   				<?= $getTour['acc_slot'] - $totalTour['ecoT']; ?>
            						   			</td>
            						   			<td align="center wthree"><?= $getTour['acc_price']; ?></td>
            						   		</tr>
            						   		<tr>
                                <td class="t-one">5</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getCab['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getCab['acc_type']; ?>
            						   			</td>
            						   			<td align="center wthree">
            						   				<?= $getCab['acc_slot'] - $totalCab['ecoC']; ?>
            						   			</td>
            						   			<td align="center wthree"><?= $getCab['acc_price']; ?></td>
            						   		</tr>
            						   		<tr>
                                <td class="t-one">6</td>
            						   			<td class="wthree">
            						   				<input value="<?= $getDel['acc_id']; ?>" type="radio" name="acc">
            						   				<?= $getDel['acc_type']; ?>
            						   			</td>
            						   			<td align="center wthree">
            						   				<?= $getDel['acc_slot'] - $totalDel['ecoD']; ?>
            						   			</td>
            						   			<td align="center"><?= $getDel['acc_price']; ?></td>
            						   		</tr>
            						    </tbody>
                          </table>
                    </div>
                </div>
                  </form>
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

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <!-- //here ends scrolling icon -->
    <script type="text/javascript">
    	$(document).on('submit', '#form-acc', function(event) {
    		event.preventDefault();
    		/* Act on the event */
    		var acc = $('input[name="acc"]:checked').val();
    		var totalPass = $('input[name="totalPass"]').val();

    		if(acc == null){
    			alert('Please Select Accomodation!');
    		}else{
    			// console.log(acc);
    			if(totalPass.length == 0){
    				alert('Please Enter Number of Passenger!');
    			}else{
    				$.ajax({
    						url: 'data/session_accomodation.php',
    						type: 'post',
    						dataType: 'json',
    						data: {
    							acc : acc,
    							tp : totalPass
    						},
    						success: function (data) {
    							console.log(data.slot);
    							// 	window.location = "passenger.php";
    							if(data.slot >= 0){
                      window.location = 'pay.php'
    							}else{
    								alert('Not Enough Slot!');
    							}
    						},
    						error: function(){
    							alert('Error: L175+');
    						}
    					});
    			}//end totalPass
    		}//end acc == null
    	});

    </script>
    </body>
    </html>


    <?php
    } else{
    	echo '<strong>';
    	echo 'Page Not Exist';
    	echo '</strong>';
    }//end if else isset

     ?>
