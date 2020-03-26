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
<?php
    function requireToVar($file){
        ob_start();
        require($file);
        return ob_get_clean();
    }
    $byAgeGender=requireToVar('surviveAgeGenderSQL.php');
    $byClass=requireToVar('survivalByClass.php');
    $byDest=requireToVar('destinationChart.php');
    ?>
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
			<p><a class="btn btn-default" href="titanicfull.php">Full List</a></p>
		</div>
	</div>

    <!-- Content -->
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
        	<!--  main container -->    
            <article class="col-md-4 article-intro">
                <h3>
                    Top Ten Destinations
                </h3>
            <div id="container1"><div id="chart1"></div></div>
                <p>Many didn't make it to where they were going.</p>
            <script>
        		anychart.onDocumentReady(function () {
        		var byclass = <?php echo $byDest ?>;
    			 // mappings
        	  	var dataSet = anychart.data.set(byclass);
        	    // create a chart
        	    var chart = anychart.bar();

        	    // create a bar series and set the data
        	    //var series = chart.bar(data);
        	    var dest = dataSet.mapAs({x: "destination",value: "count"});
        	    var series = chart.bar(dest);
        	    var ticksArray = [1,10, 20, 30,40,50,60,70,80,90];
        	    chart.yScale().ticks().set(ticksArray);
        	    // set the chart title
        	    chart.title("Bar Chart: Basic Sample");

        	    // set the titles of the axes
        	    chart.xAxis().title("Destination");
        	    chart.yAxis().title("Passengers");

        	    // set the container id
        	    chart.container("chart1");

        	    // initiate drawing the chart
        	    chart.draw();
        		});
         	</script>
            </article>
            
            <article class="col-md-4 article-intro">
        	<h3>
                    Survival by Passenger Class
            </h3>
        	<div id="container1"><div id="chart2"></div></div>
        	<p>The upper crust will prevail against any odds!</p>
            <script>
        		anychart.onDocumentReady(function () {
        		var byclass = <?php echo $byClass ?>;
    			 // mappings
        	  	var dataSet = anychart.data.set(byclass);
        	  	var pclass = dataSet.mapAs({x:"pclass", value:"count"});
        	  
        	    // create a pie chart and set the data
        	    var chart = anychart.pie(pclass);

        	    /* set the inner radius
        	    (to turn the pie chart into a doughnut chart)*/
        	    chart.innerRadius("50%");
        	    
        	  	var palette = anychart.palettes.rangeColors();
        	    palette.items([
        	        {color: 'green'},
        	        {color: 'yellow'},
        	      {color: 'red'}
        	    ]);
        	    chart.palette(palette);
        	    chart.container("chart2");
				chart.labels().fontColor('black');
        	    // initiate drawing the chart
        	    chart.draw();
        		});
     		</script>
        </article>

        <article class="col-md-4 article-intro">
        	<h3>
                    Survival by Age & Gender
            </h3>
            <div id="container1"><div id="chart3"></div></div>                   
            <p>
               In early 1900's, it was still a man's world!
            </p>
            <script>
            anychart.onDocumentReady(function () {

            	// data "surviveAgeGenderSQL.php")
            	var phpdata = <?php echo $byAgeGender ?>;
            	data = anychart.data.set(phpdata); 

            	   // remapping data
            	   var males = data.mapAs({x: "age_range", value: "males"});
            	   var females = data.mapAs({x: "age_range", value: "females"});

            	    // create a chart
            	    var chart = anychart.column();

            	    // create the first series, set the data and name
            	    var series1 = chart.column(males);
            	    series1.name("Males: ");
            	    series1.color("blue");
            	    // create the second series, set the data and name
            	    var series2 = chart.column(females);
            	    series2.name("Females: ");
            		series2.color("pink");
            	    // set the padding between columns
            	    chart.barsPadding(-0.5);

            	    // set the padding between column groups
            	    chart.barGroupsPadding(2);
            	    
            	    // enable legend
            	    chart.legend(true);
            	    
            	    // set the titles of the axes
            	    chart.xAxis().title("Age Ranges");
            	    chart.yAxis().title("# Survivors");

            	    // set the container id
            	    chart.container("chart3");

            	    // initiate drawing the chart
            	    chart.draw();
            });
            </script>
        </article>
 	</div>
        <!-- /.row -->
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
    -->
			</div>
        </div>
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
