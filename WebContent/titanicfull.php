<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Titanic Lost: The full list</title>

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
	<!-- Jquery Includes from Google CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
    <!-- JQWidgets Stuffs -->
    	<link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css"/>
    	<link rel="stylesheet" type="text/css" href="jqwidgets/styles/jqx.energyblue.css" />
            <script src="jqwidgets/jqx-all.js"></script>
            <script src="jqwidgets/jqxcore.js"></script>
            <script src="jqwidgets/jqxdata.js"></script>
            <script src="jqwidgets/jqxbuttons.js"></script>
            <script src="jqwidgets/jqxscrollbar.js"></script>
            <script src="jqwidgets/jqxmenu.js"></script>
            <script src="jqwidgets/jqxgrid.js"></script>
            <script src="jqwidgets/jqxgrid.pager.js"></script>
            <script src="jqwidgets/jqxgrid.selection.js"></script>
            <script src="jqwidgets/jqxdropdownlist.js"></script>
            <script src="jqwidgets/jqxlistbox.js"></script>
            <script src="jqwidgets/jqxgrid.columnsresize.js"></script>
            <script src="jqwidgets/jqxcalendar.js"></script>
            <script src="jqwidgets/jqxdatetimeinput.js"></script>
            <script src="jqwidgets/jqxgrid.edit.js"></script>
            <script src="jqwidgets/jqxcheckbox.js"></script>
            <script src="jqwidgets/jqxgrid.filter.js"></script>
            <script src="jqwidgets/jqxgrid.sort.js"></script>
</head>
<?php
    function requireToVar($file){
        ob_start();
        require($file);
        return ob_get_clean();
    }
    $fullList=requireToVar('passengerList.php');
 ?>
<script type = "text/javascript">
    $(document).ready(function (){        

     var listall = <?php echo $fullList ?>;

  	 var source = {
  			datatype: "json",
  			datafields: [
  				{ name: 'pclass' },
  				{ name: 'survived' },
  				{ name: 'name' },
  				{ name: 'sex' },
  				{ name: 'age' },
  				{ name: 'sibsp' },
  				{ name: 'parch' },
  				{ name: 'ticket' },
  				{ name: 'fare' },
  				{ name: 'cabin' },
  				{ name: 'embarked' },
  				{ name: 'boat' },
  				{ name: 'body' },
  				{ name: 'destination' }	
  	  	 	],
  		    localdata: listall
  	  	 };
     
     var dataAdapter = new $.jqx.dataAdapter(source); 

     $("#jqxgrid").jqxGrid(
             {
                 source: dataAdapter,
                 columnsresize: true,
                 theme: 'energyblue',
                 sortable: true,
                 pageable: true,
                 pagesize: 50,
                 pagesizeoptions: ['10', '50', '100'],
                 autoheight: true,
                 width: 1000,
                 columns: [
                   { text: 'Passenger Class', datafield: 'pclass' },
                   { text: 'Survivor', datafield: 'survived' },
                   { text: 'Name', datafield: 'name' },
                   { text: 'Gender', datafield: 'sex' },
                   { text: 'Age', datafield: 'age' },
                   { text: 'Siblings', datafield: 'sibsp' },
                   { text: 'Parents', datafield: 'parch' },
                   { text: 'Ticket#', datafield: 'ticket' },
                   { text: 'Fare', datafield: 'fare' },
                   { text: 'Cabin', datafield: 'cabin' },
                   { text: 'Embarcation', datafield: 'embarked' },
                   { text: 'Life Boat', datafield: 'boat' },
                   { text: 'Body#', datafield: 'body' },
                   { text: 'Destination', datafield: 'destination' }                  
                 ]
             });     
     $('#jqxgrid').jqxGrid('autoresizecolumns'); 
    });   

  </script>
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
                        <a href="index.php">Home</a>
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
			
		</div>
    </div>
    <!-- Content -->
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Full Passenger List
                </h1>
                <p>Look through the passenger list</p>
            </div>
        </div>
    </div>
    <div class="container">
    	<div id="jqxgrid"></div>
    </div>
    <footer>
        <div class="small-print">
        	<div class="container">
        		<p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
        		<p>Copyright &copy; Ugly Kitty Studios 2020 </p>
        	</div>
        </div>
	</footer>
</body>

 
 
 
