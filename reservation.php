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
<br>
<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div id="book-table"></div>
	</div>
	<div class="col-md-2"></div>
</div>


<?php require_once('modal/view_passenger.php'); ?>
<?php require_once('modal/message.php'); ?>
<?php require_once('modal/confirmation.php'); ?>

<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	function showAllBook(){
		$.ajax({
				url: '../data/get_all_book.php',
				type: 'post',
				// data: {},
				success: function (data) {
					// console.log(data);
					$('#book-table').html(data);
				},
				error: function(){
					alert('Error: L54+');
				}
			});
	}//end showAllBook
	showAllBook();

	var book_tracker;
	function deleteBook(tracker){
		// console.log(tracker);
		book_tracker = tracker;
		$('#modal-confirmation').modal('show');
	}//end deleteBook

	$('.del-book').click(function(event) {
		/* Act on the event */
		$.ajax({
				url: '../data/deleteBook.php',
				type: 'post',
				dataType: 'json',
				data: {
					tracker : book_tracker
				},
				success: function (data) {
					// console.log(data);
					$('#modal-confirmation').modal('hide');
					showAllBook();
					$('#modal-message').find('.modal-body').text(data.msg);
					$('#modal-message').modal('show');
				},
				error: function(){
					alert('Error: L87+');
				}
			});
	});//del


	function displayPassenger(tracker){
		// console.log(tracker);
		$.ajax({
				url: '../data/getPassengers.php',
				type: 'post',
				// dataType: 'json',
				data: {
					tracker : tracker
				},
				success: function (data) {
					// console.log(data);
					$('#passenger-list').html(data);
				},
				error: function(){
					alert('Error: L113+');
				}
			});
	}//end displayPassenger

	function viewBook(tracker){
		// $('#modal-view-pass').modal('show');

		$.ajax({
				url: '../data/getBookBy.php',
				type: 'post',
				dataType: 'json',
				data: {
					tracker : tracker
				},
				success: function (data) {
					// console.log(data);
					$('#book-by').text(data.book_by);
					$('#date').text(data.book_departure);
					$('#contact').text(data.book_contact);
					$('#address').text(data.book_address);
					$('#modal-view-pass').modal('show');
				},
				error: function(){
					alert('Error: L113+');
				}
			});
		displayPassenger(tracker);
	}//end viewBook

	function acceptPayment(){
		var counter = $('#i').val();
		var tot = 0;
		for(var i = 0; i < counter; i++){
			var name = $('#name'+i).val();
			var disc = $('#disc'+i).val();
			var price = $('#price'+i).val();
			var discounted = price * disc;
			$('#pri'+i).text(discounted);
			tot += Number(discounted);

		}//for loop
		$('#total').text(tot);

	}//end acceptPayment

	function addTransaction(){
		var counter = $('#i').val();
		var tot = 0;
		for(var i = 0; i < counter; i++){
			var name = $('#name'+i).val();
			var disc = $('#disc'+i).val();
			var price = $('#price'+i).val();
			var discounted = price * disc;
			$('#pri'+i).text(discounted);
			tot += Number(discounted);
				$.ajax({
	    			url: '../data/save_transaction.php',
	    			type: 'post',
	    			dataType: 'json',
	    			data: {
	    				bid : name,
	    				disc : disc
	    			},
	    			success: function (data) {
	    				console.log(data);
	    				$('#modal-view-pass').modal('hide');
	    				showAllBook();
	    				$('#modal-message').find('.modal-body').text('Transaction Save Successfully!');
	    				$('#modal-message').modal('show');
	    			},
	    			error: function(){
	    				alert('Error: L162+');
	    			}
	    		});
		}//for loop
		$('#total').text(tot);
	}
</script>

</body>
</html>
