<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mock Draft Tool</title>
    <link rel="stylesheet"
    href="css/bootstrap.min.css">
    <link rel="stylesheet"
    href="css/dc.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
        src="http://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Still need to add Angular.min.js files -->
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand pull-left" href="index.php"><img src="/img/footballIcon.jpg" alt="Logo" style="height:125%; width:125%;"></a>
          <ul class="nav navbar-nav navbar-left">
            <li role="presentation">
              <a href="index.php">NFL Arrests LoL...</a>
            </li>
          </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
					<li role="presentation">
          <div class="dropdown" style="margin-top:10px;">
						<a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Log In
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="index.php?controller=signupController">Sign Up</a></li>
						<li><a href="index.php?controller=loginController">Log In</a></li>
						</ul>
					</div>
					</li>
          <li role="presentation">
            <a href="index.php?controller=arrestController"><span><i class="fa fa-cogs"></i></span>&nbspNFL Arrests</a>
          </li>
          <li role="presentation">
            <a href="index.php?controller=playerListController"><span><i class="fa fa-users"></i></span>&nbspPlayers List</a>
          </li>
          <li role="presentation">
            <a href="index.php?controller=rankingController"><span><i class="fa fa-free-code-camp"></i></span>&nbspRankings</a>
          </li>
          <li role="presentation">
            <a href="index.php?controller=startSitController"><span><i class="fa fa-bed"></i></span>&nbspStart/Sit</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="main-div">
    <?php 
      function my_autoloader($class) {
        if(strpos($class, 'Controller') !== false){
          include 'classes/Controllers/' . $class . '.class.php';
        }
        else if(strpos($class, 'View') !== false) {
          include 'classes/Views/' . $class . '.class.php';
        }
        else if (strpos($class, 'Model') !== false) {
          include 'classes/Models/' . $class . '.class.php';
        }
        else { include 'classes/' . $class . '.class.php'; }
      }
      spl_autoload_register('my_autoloader');

      $app = new app;
    ?>
    </div>
    <div class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
				<ul class="nav navbar-nav pull-left">
					<li role="presentation">
					  <a href='#'>Fantasy Football Nerds&nbsp</a>
					</li>
					<li role="presentation">
					  <a href='#'>NFL Arrests&nbsp</a>
					</li>
					<li>
					  <a href='#'>NewsRiver&nbsp</a>
				  </li>
				</ul>
        <p class="navbar-text pull-right">
          A Jb-Y Production &copy <?php echo date("Y"); ?> 
        </p>
      </div>
    </div>
  </body>
</html>
