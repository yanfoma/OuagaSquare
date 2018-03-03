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
  <section class="content item-list">
    <div class="container">
      <div class="row">
        <div class="col-md-9 page-content-column">
          <h4 class="page-title">Liste des Projets</h4>
          <?php $Commentaire = DB::table('commentaire')->count('id'); 

          if($Commentaire == 0){

            echo "<p>Aucun commentaire pour ce projet</p>";

          }

          ?>
          <?php $Projet = DB::table('projet')->orderBy('id','desc')->paginate(2); 
          foreach($Projet as $projet) { ?>
          <div class="column-post">
            <a href="detail_projet<?php echo $projet->id?>" class="img-thumbnail"> <img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive"> </a>
            <div class="topic"> 
              <?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
              foreach($Categorie as $categorie) { ?>
              <a href="detail_categorie<?php echo $categorie->id?>" class="tag bg5">{{$categorie->full_titre}}</a>
              <?php } ?>
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
                <p align="justify"> <?php echo str_limit($projet->contenu, 300); ?></p>
                <a href="detail_projet<?php echo $projet->id?>" class="btn btn-red btn-sm">Lire Plus</a>
              </div>
            </div>
            <?php }?>
            <ul class="pagination pagination_post text-center">
              {{$Projet->links()}}
            </ul>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="sidebar-col">

             <!-- @include('top_projet') -->
             @include('yanfoma')
             @include('commentaire')
             @include('nous_suivre')
             @include('newsletter')
             @include('pensee_jour')
             @include('archive')
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- content end-->

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