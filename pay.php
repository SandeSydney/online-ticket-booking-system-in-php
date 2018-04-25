<?php

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['accomodation'])){
?>
    <?php include 'header.php';?>
        <!-- //header -->

        <!-- innerbanner -->
        <div class="agileits-inner-banner">

        </div>
        <!-- //innerbanner -->

        <!-- breadcrumbs -->
        <div class="w3layouts-breadcrumbs text-center">
            <div class="container">
                <span class="agile-breadcrumbs"><a href="index.php"><i class="fa fa-home home_1"></i></a> / <span>Pay</span></span>
            </div>
        </div>
        <!-- //breadcrumbs -->
        <!-- Pay -->
        <div class="agile-pay w3layouts-content">
            <div class="container">
                <h3 class="w3-head">Payment</h3>

        <div class="container-fluid">
					<form class="form-horizontal" role="form" id="form-pass">
					  <div class="form-group" >
					    <label for="">Booked By:</label>
					    <input type="text" class="form-control" id="book-by" placeholder="Enter Name"
					    autofocus="" required="" autocomplete="off">
					  </div>
					  <div class="form-group" >
					    <label for="">Contact:</label>
					    <input type="text" class="form-control" id="cont" placeholder="Enter Contact" required="" autocomplete="off">
					  </div>
					  <div class="form-group" >
					    <label for="">Address:</label>
					    <input type="text" class="form-control" id="address" placeholder="Enter Address" required="" autocomplete="off">
					  </div>
					<br />
					<?php
						$tb = $_SESSION['totalPass'];
					 	$count = 1;
					 	for($i = 0; $i < $tb; $i++){
					?>
					  <div class="panel panel-primary" >
					  	<div class="panel-heading">
					  		<h3 class="panel-title">Booked(<?= $count; ?>)</h3>
					  	</div>
					  	<div class="panel-body">
					  		<div class="container-fluid wthree ">
					  			<div class="wthree">
								    <label for="">Full Name (<?= $count; ?>):</label>
								    <input type="text" class="form-control" id="fN<?php echo $i; ?>"
								    placeholder="Enter Fullname" required autocomplete="off">
								  </div>

								  <div class="wthree">
								    <label for="">Age: (<?= $count; ?>):</label>
								    <input type="number" class="form-control" id="age<?php echo $i; ?>"
								    placeholder="Enter Age" required autocomplete="off">
								  </div>
								  <div class="wthree">
								    <label for="">Gender: (<?= $count; ?>):</label>
								    <select class="btn btn-default" id="gender<?php echo $i; ?>">
								    	<option value="Male">Male</option>
								    	<option value="Female">Female</option>
								    </select>
								  </div>
					  		</div>
					  	</div>
					  </div>
					<?php
					$count++;
					 	}//end for
					 ?>
					  <button type="submit" class="btn btn-success">NEXT
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</form>
				</div>
        </div>

        </div>
        <!--Plug-in Initialisation-->
        <script type="text/javascript">
            $(document).ready(function() {
                //Horizontal Tab
                $('#parentHorizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true, // 100% fit in a container
                    tabidentify: 'hor_1', // The tab groups identifier
                    activate: function(event) { // Callback function if tab is switched
                        var $tab = $(this);
                        var $info = $('#nested-tabInfo');
                        var $name = $('span', $info);
                        $name.text($tab.text());
                        $info.show();
                    }
                });
            });
        </script>
        <!-- // Pay -->

        <?php include 'footer.php';?>
        <!--//footer-->
        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- easy-responsive-tabs -->
        <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
        <script src="js/easyResponsiveTabs.js"></script>
        <!-- //easy-responsive-tabs -->
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
        <script type="text/javascript">
	$(document).on('submit', '#form-pass', function(event) {
		event.preventDefault();
		/* Act on the event */
		var bookBy = $('#book-by').val();
		var cont = $('#cont').val();
		var address = $('#address').val();

		var counter = <?= $i; ?>;
		for(var i = 0; i < counter; i++){
			var fN = $('#fN'+i).val();
			var age = $('#age'+i).val();
			var gender = $('#gender'+i).val();
			$.ajax({
					url: 'data/save_booked.php',
					type: 'post',
					dataType: 'json',
					data: {
						bookBy : bookBy,
						cont : cont,
						address : address,
						fN : fN,
						age : age,
						gender : gender
					},
					success: function (data) {
						// console.log(data);
						if(data.valid == true){
							window.location = data.url;
						}
					},
					error: function(){
						// alert('Error: L192+');
					}
				});
		}//end for
		alert('Booked Successfully!');
	});

</script>


</body>
</html>

<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>
