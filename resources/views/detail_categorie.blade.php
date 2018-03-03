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

    <!--breadcrumb-->
    <section class="breadcrumb">
        <div class="container">
          <ol class="cm-breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li class="cm-active">Detail categorie</li>
        </ol>
    </div>
</section>
<!--end breadcrumb-->

<!--content-->
<section class="content author-post">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content-column">
                <div class="tg-author">
                    <div class="tg-authorbox">
                        <figure class="tg-authorimg"><img src="img/categorie/categorie.jpg" alt="" width="130px"></figure>
                        <div class="tg-authorhead">
                            <div class="tg-leftarea">
                                <h3>{{$datas->full_titre}}</h3>
                                <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                    IntlDateFormatter::LONG,
                                    IntlDateFormatter::NONE);?>
                                    <span>Depuis le : {{$intl_date_formatter->format(new DateTime($datas->created_at))}}</span>
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
                                <p align="justify">Une categorie de projets . La categorie {{$datas->full_titre}} contient 5 projets </p>
                            </div>
                        </div>
                    </div>
                    <h4 class="page-title">Les projets de cette categorie</h4>
                    <?php $Projet = DB::table('projet')->where('categorie_id', $datas->id)->count('id'); 

                    if($Projet == 0){

                        echo "<p>Aucun projet pour cette categorie</p>";

                    }

                    ?>
                    <?php $Projet = DB::table('projet')->where('categorie_id', $datas->id)->orderBy('id','desc')->paginate(3); 
                    foreach($Projet as $projet) { ?>
                    <div class="column-post">
                        <div class="media">
                            <div class="media-left">
                                <a href="detail_projet<?php echo $projet->id?>" class="img-thumbnail"> <img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive"> </a>
                            </div>
                            <div class="media-body">
                                <div class="topic"> 
                                    <a href="#" class="tag bg4">{{$projet->resume_titre}}</a>
                                    <h4><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}}</a></h4>
                                    <ul class="post-tools">
                                        <?php $Responsable = DB::table('responsable')->where('id', $projet->responsable_id)->get(); 
                                        foreach($Responsable as $responsable) { ?>
                                        <li> Par <a href=""><strong> {{$responsable->libelle}}</strong> </a></li>
                                        <?php } ?>
                                        <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                            IntlDateFormatter::LONG,
                                            IntlDateFormatter::NONE);?>
                                            <li>  Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}} </li>
                                            <li><a href=""> <i class="ti-thought"></i> {{$projet->vue}} vues</a> </li>
                                        </ul>
                                        <p align="justify"> <?php echo str_limit($projet->contenu, 300); ?> </p>
                                        <a href="detail_projet<?php echo $projet->id?>" class="btn btn-red btn-sm">Lire Plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>  
                        <ul class="pagination pagination_post text-center">
                          {{$Projet->links()}}
                      </ul>              
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <div class="sidebar-col">
                        @include('ouagasquare') 

                        <!-- @include('top_projet') -->
                        @include('yanfoma')
                        @include('nous_suivre')
                        @include('newsletter')
                        @include('pensee_jour')
                        @include('liste_categorie')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end content-->

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