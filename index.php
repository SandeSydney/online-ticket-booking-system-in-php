<?php
require_once('./data/get_origin.php');
require_once('./data/get_destination.php');
 ?>
<?php include 'header.php';?>
  <!--//-->
  <div class=" header-right">
    <div class="banner">
      <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider">
            <li>
              <div class="banner2">
                <div class="caption">
                  <h3><span>50% off</span> on train Tickets</h3>
                  <p><a href="train.html">Book now</a></p>
                </div>
              </div>
            </li>

            <li>
              <div class="banner4">
                <div class="caption">
                  <h3><span>Upto Rs.125 Discount </span> & Flat 100% Money Back</h3>
                  <p><a href="bus.html">Book now</a></p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="agile-trains w3layouts-content">
     <div class="container">
  <div class="col-md-4 bann-info1">
    <i class="train-icon fa fa-train"></i>
  </div>
  <div class="col-md-5 bann-info">
    <h3>Search for Trains</h3>
        <div class="book-a-ticket">
              <div class=" bann-info">
                <form action="trains-list.php" method="post" id="form-itinerary">
                      <div class="ban-top">
                        <div class="bnr-left">
                          <label class="inputLabel">From:</label>
                          <select class="btn btn-default city" id="orig-id">
            					    <?php foreach($origins as $o): ?>
            					    	<option value="<?= $o['origin_id']; ?>"><?= $o['origin_desc']; ?></option>
            				    	<?php endforeach; ?>
            					    </select>
                        </div>

                        <div class="bnr-left">
                          <label class="inputLabel">To:</label>
                          <select class="btn btn-default" id="dest-id">
            				    	<?php foreach($destinations as $d): ?>
            					    	<option value="<?= $d['dest_id']; ?>"><?= $d['dest_destination']; ?></option>
            				    	<?php endforeach; ?>
            					    </select>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="ban-bottom">
                        <div class="bnr-right">
                          <label class="inputLabel">Date of Journey:</label>
                          <input class="date datepicker" id="dept-date" type="text" placeholder="dd-mm-yyyy" required="required" />
                        </div>
                        <div class="clearfix"></div>
                        <!-- start-date-piker -->
                        <link rel="stylesheet" href="css/jquery-ui.css">
                        <script src="js/jquery-ui.js"></script>
                        <script>
                          $(function() {
                            $(".datepicker,#datepicker1").datepicker();
                          });
                        </script>
                        <!-- /End-date-piker -->
                      </div>
                      <div class="search">
                        <input type="submit" class="submit" value="Search">
                      </div>
                    </form>
              </div>
          </div>

  </div>
  <div class="clearfix"></div>
  </div>
  </div>


  <!--Plug-in Initialisation-->
  <script type="text/javascript">
    $(document).ready(function() {

      //Vertical Tab
      $('#parentVerticalTab').easyResponsiveTabs({
        type: 'vertical', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function(event) { // Callback function if tab is switched
          var $tab = $(this);
          var $info = $('#nested-tabInfo2');
          var $name = $('span', $info);
          $name.text($tab.text());
          $info.show();
        }
      });
    });
  </script>
  <!-- //Categories -->
<?php include 'footer.php';?>
  <!--//footer-->

  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
  <!-- Responsive-slider -->
  <!-- Banner-slider -->
  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function() {
      $("#slider").responsiveSlides({
        auto: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <!-- //Banner-slider -->
  <!-- //Responsive-slider -->
  <!-- Bootstrap select option script -->
  <script src="js/bootstrap-select.js"></script>
  <script>
    $(document).ready(function() {
      var mySelect = $('#first-disabled2');

      $('#special').on('click', function() {
        mySelect.find('option:selected').prop('disabled', true);
        mySelect.selectpicker('refresh');
      });

      $('#special2').on('click', function() {
        mySelect.find('option:disabled').prop('disabled', false);
        mySelect.selectpicker('refresh');
      });

      $('#basic2').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    });
  </script>
  <!-- //Bootstrap select option script -->

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
  	$(document).on('submit', '.form-login', function(event) {
  		event.preventDefault();
  		/* Act on the event */
  		// console.log('test');
  		var un = $('.un').val();
  		var pwd = $('.pwd').val();

  		$.ajax({
  				url: '../data/login.php',
  				type: 'post',
  				dataType: 'json',
  					data: {
  						un: un,
  						pwd : pwd
  					},
  				success: function (data) {
  					// console.log(data);
  					if(data.valid == true){
  						window.location = data.url;
  					}else{
  						$('#modal-message').find('#body-cont').text(data.msg);
  						$('#modal-message').modal('show');
  						$('.un').val("");
  						$('.pwd').val("");
  						$('.un').focus();
  					}
  				},
  				error: function(){
  					alert('Error: L99+');
  				}//
  			});
  	});

  </script>


  <script type="text/javascript">
  	$(document).on('submit', '#form-itinerary', function(event) {
  		event.preventDefault();
  		/* Act on the event */
  		var validate = "";
  		var origin = $('select[id=orig-id]').val();
  		var dest = $('select[id=dest-id]').val();
  		var dept = $('input[id=dept-date]').val();

  		if(dept.length == 0){
  			alert('Please Select Departure Date!');
  		}else{
  			$.ajax({
  					url: 'data/session_itinerary.php',
  					type: 'post',
  					dataType: 'json',
  					data: {
  						oid : origin,
  						did : dest,
  						dd : dept
  					},
  					success: function (data) {
  						console.log(data);
  						if(data.valid == true){
  							window.location = data.url;
  							console.log('sss');
  						}
  					},
  					error: function(){
  						alert('Error: L161+');
  					}
  				});
  		}//end dept kung == 0


  	});

  </script>
  <!-- start-smoth-scrolling -->
  <!-- //here ends scrolling icon -->
</body>
<!-- //body -->

</html>
<!-- //html -->
