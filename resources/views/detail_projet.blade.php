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
            <li><a href="index">Accueil</a></li>
            <li class="cm-active">Detail projet</li>
        </ol>
    </div>
</section>
<!--end breadcrumb-->

<!--content-->
<section class="content item-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content-column">
                <div class="single-post clearfix">
                    <div class="topic"> 
                        <?php $Categorie = DB::table('categorie')->where('id', $datas->categorie_id)->get(); 
                        foreach($Categorie as $categorie) { ?>
                        <a href="detail_categorie<?php echo $categorie->id?>" class="tag bg4">{{$categorie->full_titre}}</a>
                        <?php } ?>
                        <h3>{{$datas->full_titre}}</h3>
                        <ul class="post-tools">
                          <?php $Responsable = DB::table('responsable')->where('id', $datas->responsable_id)->get(); 
                          foreach($Responsable as $responsable) { ?>
                          <li> Par <a href=""><strong> {{$responsable->libelle}}</strong> </a></li>
                          <?php } ?>
                          <?php $intl_date_formatter = new IntlDateFormatter('frc',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::NONE);?>
                            <li>  Depuis le {{$intl_date_formatter->format(new DateTime($datas->created_at))}} </li>
                            <li><a href=""> <i class="ti-thought"></i> {{$datas->vue}} vues</a> </li>
                        </ul>
                    </div>
                    <div class="flex-slider2">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>                                 
                                    <a href="#" class="l-news-slider">
                                        <img src="img/couverture/{{$datas->avatar}}" alt="" class="img-responsive">   
                                    </a>  
                                </li>
                            </ul>
                        </div>
                        <span class="tg-postfeatured"><i class="fa fa-bolt"></i></span>
                    </div><!--flex slider-->
                    <div class="post-text">
                        <p align="justify">
                            <?php echo $datas->contenu; ?>
                        </p>
                    </div>
                    <br>
                    <div class="post-video">
                        <iframe src="img/pdf/{{$datas->fichier_joint}}"" type="application/pdf" style="width:100%" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="comments">
                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="#comment" aria-controls="home" role="tab" data-toggle="tab">Commentaires</a></li>
                                <li role="presentation" class="active"><a href="#l-comment" aria-controls="profile" role="tab" data-toggle="tab">Laisser un commentaire</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="comment">
                                    <ul>
                                        <?php $Commentaire = DB::table('commentaire')->where('projet_id', $datas->id)->count('id'); 

                                        if($Commentaire == 0){

                                            echo "<p>Aucun commentaire pour ce projet</p>";

                                        }

                                        ?>

                                        <?php $Commentaire = DB::table('commentaire')->where('projet_id', $datas->id)->orderBy('id','desc')->limit(3)->get(); 
                                        foreach($Commentaire as $commentaire) { ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-circle" width="50" src="img/avatar/{{$commentaire->avatar}}" alt="...">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                                        IntlDateFormatter::LONG,
                                                        IntlDateFormatter::NONE);?>
                                                        <h4 class="media-heading">{{$commentaire->nom}} <span> {{$intl_date_formatter->format(new DateTime($datas->created_at))}}</span> <a href="#"></a></h4>
                                                        <p>
                                                            {{$commentaire->contenu}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="l-comment">
                                        <div class="login">
                                            <form action="commentaire" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="projet_id" value="<?php echo $datas->id; ?>"/>
                                                    <input name="avatar" type="file" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input name="nom" type="text" class="form-control" placeholder="Nom" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Message" rows="5" name="commentaire" required=""></textarea>
                                                </div>
                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-danger  btn-lg">Envoyer</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <h4 class="page-title">Projets similaires</h4>
                    <div id="post-carousel" class="owl-carousel">
                        <?php $Projet = DB::table('projet')->where('id', '!=', $datas->id)->orderBy('id','desc')->limit(8)->get(); 
                        foreach($Projet as $projet) { ?>
                        <div> 
                            <div class="column-post">
                                <a href="#" class="img-thumbnail">
                                    <img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive">
                                </a>
                                <div class="topic">
                                    <?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
                                    foreach($Categorie as $categorie) { ?>
                                    <a href="detail_categorie<?php echo $categorie->id?>" class="tag bg1">{{$categorie->full_titre}}</a>
                                    <?php } ?>
                                    <h4><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}}</a></h4>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="sidebar-col">
                        @include('plus_detail_projet')
                        @include('ouagasquare') 

                        <!-- @include('top_projet') -->
                        @include('yanfoma')
                        @include('nous_suivre')
                        @include('newsletter')
                        @include('pensee_jour')
                        @include('archive')
                        @include('liste_categorie')
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