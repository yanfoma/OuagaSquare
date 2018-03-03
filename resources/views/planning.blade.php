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

	<script type="text/javascript" src="assets/js-core/jquery-core.js"></script>

	
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
				<div class="content-col">
					<div id='calendrier'></div>
				</div>
			</div>
		</div>
	</section>
	<!-- content end-->

	<!--footer-->
	@include('footer')
	<!--footer-->

	<script src="js/jquery.min.js"></script>
	<link href='assets/calendrier/fullcalendar.min.css' rel='stylesheet' />
	<link href='assets/calendrier/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='assets/calendrier/lib/moment.min.js'></script>
	<script src='assets/calendrier/fullcalendar.min.js'></script>
	<script>

		$(document).ready(function() {
			var e= [];
			$.ajax({
				url: 'repertoire_planning',
				type: "GET",
				dataType: "JSON",
				async: false
			}).done(function(r){
				e= r;
			})

			$('#calendrier').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				navLinks: true, 
				selectable: true,
				events: e
			});

		});

	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/wow.min.js"></script>

</body>

</html>