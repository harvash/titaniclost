<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Titanic Lost</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	  	<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-core.min.js"></script>
		<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-bundle.min.js"></script>
		<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js"></script>
	<!-- Include the data adapter -->
		<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-data-adapter.min.js"></script>
		
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	Logo
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Event</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lists<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="#">page1</a></li>
							<li><a href="#">page2</a></li>
							<li><a href="#">page3</a></li>
						</ul>
					</li>
                </ul>

				<!-- Search -->
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<div class="jumbotron feature">
		<div class="container">
			<h1><span class="glyphicon glyphicon-equalizer"></span> Titantic Lost</h1>
			<p>Data driven retrospective of 1300+ passengers</p>
			<p><a class="btn btn-default" href="#">Full List</a></p>
		</div>
	</div>

    <!-- Content -->
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Survival Statistics
                </h1>
                <p>The Titanic disaster is well known to many, here are some interesting facts.</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Feature Row -->
        <div class="row">
        <?php
            function requireToVar($file){
                ob_start();
                require($file);
                return ob_get_clean();
            }
            $jstring=requireToVar('surviveAgeGenderSQL.php');
            $byclass=requireToVar('survivalByClass.php')
            ?>
          
            <article class="col-md-4 article-intro">
                <a href="#">
                    <img class="img-responsive img-rounded" src="js/holder.js/700x300" alt="">                    
                </a>
                <h3>
                    <a href="#">Casuality Statistics</a>
                </h3>
                <p>Frightening to think that money may have caused many to, er....sink or swim?</p>
            </article>
            <article class="col-md-4 article-intro">
           <div id="container">
           <script>
            		anychart.onDocumentReady(function () {
            		var byclass = <?php echo $byclass ?>;
        			 // mappings
        		    var dataSet = anychart.data.set(byclass);
        		    var pclass = dataSet.mapAs({x:"pclass", value:"survivors"});
        		    var chart = anychart.pie(pclass);
        		    chart.innerRadius('60%');
        		    // set chart title text settings
        		    chart.title("Percentage of Surviors by Passenger Class");
        		    chart.container("container");
        		    chart.draw();
            		});
              </script></div>
                <h3>
                    <a href="#">Survival by Class</a>
                </h3>
                <p>
					The upper crust will prevail against any odds!
                </p>
            </article>

            <article class="col-md-4 article-intro">

            <div id="container1">

            <script>
            anychart.onDocumentReady(function () {

            	// data "surviveAgeGenderSQL.php")
            	var phpdata = <?php echo $jstring ?>;
            	data = anychart.data.set(phpdata); 

            	// remapping data
            	var males = data.mapAs({x: "Age_Range", value: "Males"});
                var females = data.mapAs({x: "Age_Range", value: "Females"});

            	// create a chart
            	var chart = anychart.cartesian();
            	//chart.height = "400px";
            	//chart.width = "550px";

            	// set default series type
            	chart.defaultSeriesType("column");


                // create variable for series
                var series;
                // create male series
                series = chart.column(males);
                // set id for the male series
                series.id("males");
              	series.name("males");
              	series.color("blue");
              
                // create female series
                series = chart.column(females);
                // set id for female series
                series.id("females");
            	series.name("females");
                series.color("pink");

            	// enable legend
            	chart.legend(true);

            	// set axes titles
            	var xAxis = chart.xAxis();
            	xAxis.title("Age Range");
            	var yAxis = chart.yAxis();
            	yAxis.title("# of survivors");

            	var stage = anychart.graphics.create("container1");
            	chart.container(stage).draw();
            	// draw chart
            	//chart.container("container");
            	//chart.draw();
            });
            </script>
  			</div>
                <h3>
                    <a href="#">Survival by Age & Gender</a>
                </h3>
                
                <p>
                   In early 1900's, it was still a man's world!
                </p>
            </article>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
	<!--  dropped for a later day...
	<footer>
		<div class="footer-blurb">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-tags"></span> Fares by Class</h3>
						<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
						<p><a class="btn btn-default" href="#">Procrastinate</a></p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon glyphicon-user"></span> Port of Embarcation </h3>
						<p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. </p>
						<p><a class="btn btn-default" href="#">Unleash</a></p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-globe"></span> Top 5 Destinations</h3>
						<p>Professionally cultivate one-to-one customer service with robust ideas. Completely synergize resource taxing relationships via premier niche markets. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
						<p><a class="btn btn-default" href="#">Synergize</a></p>
					</div>

				</div>
				<!-- /.row -->	
			</div>
        </div>
        -->
        <div class="small-print">
        	<div class="container">
        		<p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
        		<p>Copyright &copy; Ugly Kitty Studios 2020 </p>
        	</div>
        </div>
	</footer>

	
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- IE10 viewport bug workaround -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	
	<!-- Placeholder Images -->
	<script src="js/holder.min.js"></script>
	

	
</body>

</html>
