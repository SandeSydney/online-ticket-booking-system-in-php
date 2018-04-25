<?php
require_once('session_login.php');
 ?>

 <!DOCTYPE html>
 <html>

 <head>
   <title>Train Booking!</title>
   <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
   <!-- bootstrap-CSS -->
   <link rel="stylesheet" href="css/bootstrap-select.css">
   <!-- bootstrap-select-CSS -->
   <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
   <!-- Fontawesome-CSS -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
   <!-- Custom Theme files -->
   <!--theme-style-->
   <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
   <!--//theme-style-->
   <!--meta data-->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="" />
   <script type="application/x-javascript">
     addEventListener("load", function() {
       setTimeout(hideURLbar, 0);
     }, false);

     function hideURLbar() {
       window.scrollTo(0, 1);
     }
   </script>
   <!--//meta data-->
   <!-- online fonts -->
   <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
   <!-- /online fonts -->

 </head>
 <!-- //head -->
 <!-- body -->

 <body>
   <!--header-->
<nav class="navbar navbar-inverse">
     <div class="container-fluid">
       <!--logo-->
       <div class="logo">
         <h1><a href="index.html">Online Train Booking</a></h1>
       </div>
       <ul class="nav navbar-nav">
        <li class="active"><a href="reservation.php">Reserved
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        </a></li>
        <li class=""><a href="transaction.php">Transaction
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
        </a></li>
       </ul>
       <div class="w3layouts-login">
         <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
       </div>
       <div class="clearfix"></div>
     </div>
</nav>
<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div id="trans-table"></div>
	</div>
	<div class="col-md-1"></div>
</div>


<?php require_once('modal/view_passenger.php'); ?>
<?php require_once('modal/message.php'); ?>
<?php require_once('modal/confirmation.php'); ?>

<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	function showAllTransaction()
	{
		$.ajax({
				url: '../data/get_all_transaction.php',
				type: 'post',
				// data: {},
				success: function (data) {
					$('#trans-table').html(data);
				},
				error: function(){
					alert('Error: L70+');
				}
			});
	}//end transaction
	showAllTransaction();



	var t_id,per;
	//10 percent
	function tenPercent(trans_id, perc){
		// console.log(trans_id);
		t_id = trans_id;
		per = perc;
		$('#modal-confirmation').modal('show');
	}//end tenPercent

	$('.tenPercent').click(function(event) {
		/* Act on the event */
		$.ajax({
				url: '../data/refundTen.php',
				type: 'post',
				dataType: 'json',
				data: {
					t_id : t_id,
					per : per
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == false){
						$('#modal-message').find('.modal-body').text('Passenger is Already Refunded!');

					}else if(data.valid == true){
						showAllTransaction();
						$('#modal-message').find('.modal-body').text('Passenger Refunded Successfully!');
					}
						$('#modal-confirmation').modal('hide');
						$('#modal-message').modal('show');
				},
				error: function(){
					alert('Error: L90+');
				}
			});
	});//end ten%


	//20
</script>

</body>
</html>
