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
					<br/><br/>
					<div class="tg-author">
                        <div class="tg-authorbox">
                            <figure class="tg-authorimg"><img src="img/code.png" width="100px"></figure>
                            <div class="tg-authorhead">
                                <div class="tg-leftarea">
                                    <h3>VOUS ETES DEVELOPPEUR ?</h3>
                                    <span>-------------------------------------</span>
                                </div>
                                <div class="tg-rightarea">
                                    <ul class="tg-socialicons tg-socialiconsround">
                                    <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                    <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                    <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="tg-youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                                </div>
                            </div>
                            <div class="tg-description">
                                <p>1 - Ce projet est open source. Si vous voullez aider à améliorer, veuillez cloner le projet sur github. Lien à venir.</p>
                                <p>2 - Le framework utilisez est Laravel. Apportez vos modifications. Et proposez votre version.</p>
                                <p>3 - Nous reverrons vos modifications. Et si elles nous conviennent nous les approverons.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tg-author">
                        <div class="tg-authorbox">
                            <figure class="tg-authorimg"><img src="img/projet.jpg" width="80px"></figure>
                            <div class="tg-authorhead">
                                <div class="tg-leftarea">
                                    <h3>VOUS AVEZ DES PROJETS ?</h3>
                                    <span>------------------------------------</span>
                                </div>
                                <div class="tg-rightarea">
                                    <ul class="tg-socialicons tg-socialiconsround">
                                    <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                    <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                    <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="tg-youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                                </div>
                            </div>
                            <div class="tg-description">
                                <p>1 - Vous avez des projets dont vous oudriez que nous publions. Et bien commencer par nous envoyer un mail à votreemai@yahoo.fr.</p>
                                <p>2 - Un compte vous sera crée puis nous enverons vos informations.</p>
                                <p>3 - Prenez un plaisir à publier vos projets. Merci !!!</p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<!-- content end-->

	<!--footer-->
	@include('footer')
	<!--footer-->

	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/wow.min.js"></script>

</body>

</html>