<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OuagaSquare</title>
    <!-- Style CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>          
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>          
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>        
    <![endif]-->
</head>

<body>

	<!--top bar-->
	@include('top_bar')
    <!--top bar end-->

	<!--header-->
    @include('header')
    <!--end header-->

    <!--navigation-->
    @include('navigation')
	<!--navigation end-->

    <!--content-->
    <section class="content">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-9 col-md-9 ">
	            	<div class="content-col">
		            	
	            		@include('edition_speciale')

		                <!--latest post-->
		                @include('dernier_projet')
		                <!--latest post end-->

		                @include('categorie') 
		                

		                <!--Advertisement-->
		                <div class="advertisement text-center clearfix">
		                	<a href="http://www.anptic.gov.bf/" target="blank">
								<img class="img-responsive" src="img/ad/anptic.png" alt="ad">
							</a>
		                </div>
		                <!--advertisement end-->

		                <!--short news -->
		                @include('plus_lus')
		                <!--short news end -->
		            </div>
	        	</div>
		            
	            <div class="col-sm-3 col-md-3">
	            	<div class="sidebar-col">
		                @include('ouagasquare') 
		                
		                <!-- @include('top_projet') -->
		                @include('yanfoma')
		                @include('commentaire')
		                @include('nous_suivre')
		                @include('newsletter')
		                @include('pensee_jour')
		                @include('archive')
		            </div>
	            </div>
	            @include('a_voir')
	        </div>
	    </div>
	</section>
    <!-- content end-->

    <!--footer-->
   	@include('footer')
    <!--footer-->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/wow.min.js"></script>
    
</body>

</html>