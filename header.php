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
  <header>
    <div class="container">
      <!--logo-->
      <div class="logo">
        <h1><a href="index.html">Online Train Booking</a></h1>
      </div>
      <!--//logo-->
      <div class="w3layouts-login">
        <a data-toggle="modal" data-target="#myModal" href="#"><i class="glyphicon glyphicon-user"> </i>Login/Register(Admin)</a>
      </div>
      <div class="clearfix"></div>
      <!--Login modal-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
              <h4 class="modal-title" id="myModalLabel">
                            Online Ticket Booking</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8 extra-w3layouts" style="border-right: 1px dotted #C2C2C2;padding-ce: 30px;">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active form-login" id="Login">
                      <form class="form-horizontal" action="#" method="get">
                        <div class="form-group">
                          <label for="text" class="col-sm-2 control-label">
                                                Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control un" id="email1" placeholder="Username" required="required" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                                Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control pwd" id="exampleInputPassword1" placeholder="password" required="required" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-10">
                            <button type="submit" class="submit btn btn-primary btn-sm">
                                                    Submit</button>
                            <a href="javascript:;" class="agileits-forgot">Forgot your password?</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--//Login modal-->
    </div>
  </header>
