<html lang="en" class="gr__csunix_mohawkcollege_ca">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Waterfall finder</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
    <script type='text/javascript'>
        var pushpinInfos = [{
            "name": "Carlisle Community Centre & Arena",
            "address": "1496 Centre Road",
            "city": "Carlisle",
            "phone": "905-689-7283",
            "latitude": "43.39606",
            "longtitude": "-79.98293"
        }, {
            "name": "Chedoke Twin Pad Arena",
            "address": "91 Chedmac Dr.",
            "city": "Hamilton",
            "phone": "905-546-2429",
            "latitude": "43.23889",
            "longtitude": "-79.92077"
        }, {
            "name": "Coronation Arena and Pool",
            "address": "81 Macklin St. North",
            "city": "Hamilton",
            "phone": "905-546-3109",
            "latitude": "43.2646",
            "longtitude": "-79.89598"
        }, {
            "name": "Eastwood Arena",
            "address": "111 Burlington St. East",
            "city": "Hamilton",
            "phone": "905-546-3152",
            "latitude": "43.27171",
            "longtitude": "-79.8556399"
        }, {
            "name": "Glanbrook Arena & Auditorium",
            "address": "4300 Binbrook Road",
            "city": "Binbrook",
            "phone": "905-692-9331",
            "latitude": "43.12911",
            "longtitude": "-79.83908"
        }, {
            "name": "Inch Park Arena & Pool",
            "address": "400 Queensdale Ave.",
            "city": "Hamilton",
            "phone": "905-546-4922",
            "latitude": "43.23712",
            "longtitude": "-79.85937"
        }, {
            "name": "Lawfield Arena",
            "address": "150 Folkstone Ave.",
            "city": "Hamilton",
            "phone": "905-546-4923",
            "latitude": "43.21464",
            "longtitude": "-79.8511599"
        }, {
            "name": "Market Street (J.L. Grightmire) Arena",
            "address": "35 Market St. South",
            "city": "Dundas",
            "phone": "905-540-6678",
            "latitude": "43.26596",
            "longtitude": "-79.96339"
        }, {
            "name": "Mohawk 4 Ice Centre",
            "address": "710 Mountain Brow Blvd.",
            "city": "Hamilton",
            "phone": "905-318-5111",
            "latitude": "43.21037",
            "longtitude": "-79.81616"
        }, {
            "name": "Morgan Firestone Arena",
            "address": "385 Jerseyville Road West",
            "city": "Ancaster",
            "phone": "905-546-3769",
            "latitude": "43.21674",
            "longtitude": "-80.00733"
        }, {
            "name": "Mountain (Dave Andreychuk) Arena",
            "address": "25 Hester St.",
            "city": "Hamilton",
            "phone": "905-546-4938",
            "latitude": "43.22558",
            "longtitude": "-79.88101"
        }, {
            "name": "North Wentworth Twin-Pad Arena",
            "address": "27 Hwy 5",
            "city": "Flamborough",
            "phone": "905-689-6666",
            "latitude": "43.3102291",
            "longtitude": "-79.9202291"
        }, {
            "name": "Olympic Arena",
            "address": "70 Olympic Dr.",
            "city": "Dundas",
            "phone": "905-540-6686",
            "latitude": "43.27292",
            "longtitude": "-79.93426"
        }, {
            "name": "Parkdale (Pat Quinn) Arena and Pool",
            "address": "1770 Main St. East",
            "city": "Hamilton",
            "phone": "905-546-4785",
            "latitude": "43.2366018",
            "longtitude": "-79.7939014"
        }, {
            "name": "Rosedale Arena and Pool",
            "address": "100 Greenhill Ave.",
            "city": "Hamilton",
            "phone": "905-546-4805",
            "latitude": "43.21986",
            "longtitude": "-79.80896"
        }, {
            "name": "Saltfleet Arena",
            "address": "24 Sherwood Park Road",
            "city": "Stoney Creek",
            "phone": "905-643-3883",
            "latitude": "43.21851",
            "longtitude": "-79.70443"
        }, {
            "name": "Scott Park Arena",
            "address": "876 Cannon St. East",
            "city": "Hamilton",
            "phone": "905-546-4919",
            "latitude": "43.25033",
            "longtitude": "-79.83038"
        }, {
            "name": "Spring Valley Arena",
            "address": "29 Orchard Dr.",
            "city": "Ancaster",
            "phone": "905-648-4404",
            "latitude": "43.217",
            "longtitude": "-79.9977399"
        }, {
            "name": "Stoney Creek Arena",
            "address": "37 King St. West",
            "city": "Stoney Creek",
            "phone": "905-662-2426",
            "latitude": "43.26648",
            "longtitude": "-79.95509"
        }, {
            "name": "Valley Park Arena & Rec Centre",
            "address": "970 Paramount Dr.",
            "city": "Stoney Creek",
            "phone": "905-573-3600",
            "latitude": "43.19332",
            "longtitude": "-79.79796"
        }];
		 
var map, infobox;
 var pinLayer, pinInfobox;
  map = new Microsoft.Maps.Map('#myMap', {
    credentials: 'Au_XHmIB-5bDRoMBwyoqbiyVuKYcZ9SPuq3_G_1syMU7agEhMofRAQbEeeUnUBJe'
  });

  //Create an infobox at the center of the map but don't show it.
  infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
    visible: false
  });

  //Assign the infobox to a map instance.
  infobox.setMap(map);

 pinLayer = new Microsoft.Maps.EntityCollection();
            map.entities.push(pinLayer);

  //Create random locations in the map bounds.
  var randomLocations = Microsoft.Maps.TestDataGenerator.getLocations(5, map.getBounds());

  for (var i = 0; i < randomLocations.length; i++) {
    var pin = new Microsoft.Maps.Pushpin(randomLocations[i]);

    //Store some metadata with the pushpin.
    pin.metadata = {
      title: 'Pin ' + i,
      description: 'Discription for pin' + i
    };

    //Add a click event handler to the pushpin.
    Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);

    pinLayer.push(pin);
    //Add pushpin to the map.
    map.entities.push(pin);
  }


 function pushpinClicked(e) {
            //Make sure the infobox has metadata to display.
            if("undefined" === typeof e.target){
                infobox.setOptions({
                    location: e.getLocation(),
                    title: e.metadata.title,
                    description: e.metadata.description,
                    visible: true
                });
            }else if (e.target.metadata) {
                //Set the infobox options with the metadata of the pushpin.
                infobox.setOptions({
                    location: e.target.getLocation(),
                    title: e.target.metadata.title,
                    description: e.target.metadata.description,
                    visible: true
                });
            }
        }

        function showInfoboxByKey(Key) {
            //Look up the  pushpin by gridKey.
            var selectedPin = pinLayer.get(Key);
            //Show an infobox for the cluster or pushpin.
            //alert(selectedPin);
            
            Microsoft.Maps.Events.invoke(selectedPin, "click", selectedPin);
        } 
</script>
 <script type='text/javascript'
        src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap'
        async defer></script>
 <div id="myMap" style="position:relative;width:600px;height:400px;"></div>
 <a href='javascript:void(0);' onclick='showInfoboxByKey(3);'> Click Here </a>
	
    </script>
	  
	 
	 
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Au_XHmIB-5bDRoMBwyoqbiyVuKYcZ9SPuq3_G_1syMU7agEhMofRAQbEeeUnUBJe&callback=loadMapScenario' async defer></script>
	 
</head>
<body data-gr-c-s-loaded="true" style="">
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="https://www.clipartmax.com/png/small/125-1250741_waterfall-icon-png.png" alt="waterfall" height="40" width="40" style="float:left; ">Waterfall Finder</a>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="min-height: 887px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Search Beauty of City Here</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Waterfall location
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions

                                    </button>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="myMap" style="position: relative;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);height: 650px;">
							 
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default" style="
    height: 902px;
">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i>Information Box</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group" style="
    height: 630px;
">
                                <div class="panel panel-green">
                        <div class="panel-heading">
                            Waterfall Details
                        </div>
                        <div class="panel-body">
						  
                            <p>Waterfall name:</p>
							<p>Parking available: Yes</p>
							<p>Food available: Yes</p>
							
                        </div>
                        <div class="panel-footer">
                             
                        </div>
                    </div>
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Navigation
                        </div>
                        <div class="panel-body">
							<h4>You are here</h4>						
                            <div id="userlocation" class="panel-body" style="position:relative;width:100%;height: 280px;"></div>
							<br>
								<hr class="style1">
							<br>
							<button type="button" class="btn btn-outline btn-primary btn-lg btn-block">Start Navigation</button>
                        </div>
						
                        <div class="panel-footer">
                             
                        </div>
                    </div>
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Share
                        </div>
                        <div class="panel-body">
                            <p><div class="text-center">                           
                                 
                                <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-flickr"><i class="fa fa-flickr"></i></a>                                 
                                <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                                <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                               
                            </div></p>
                        </div>
                        <div class="panel-footer">
                             
                        </div>
                    </div>
                                 
                            </div>
                            <!-- /.list-group -->
                             
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>



 
