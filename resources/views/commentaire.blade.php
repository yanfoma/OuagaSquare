<div class="sidebar-box wow animated fadeInUp" data-wow-delay="0.8s">
	<div class="side-tabs">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Commentaires</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<?php $Commentaire = DB::table('commentaire')->orderBy('id','desc')->limit(5)->get(); 
				foreach($Commentaire as $commentaire) { ?>
				<div class="media">
					<div class="media-left">
						<a href="#"> <img class="media-object" src="img/avatar/{{$commentaire->avatar}}" width="60" alt="..."> </a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><a href="#"><?php echo str_limit($commentaire->contenu, 50); ?></a></h4> <span>Par <?php echo $commentaire->nom; ?></span> 
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>