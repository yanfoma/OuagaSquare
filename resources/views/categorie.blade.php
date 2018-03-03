<div style="height: 40px;"></div>
<div class="news-carousel wow animated fadeInUp" data-wow-delay="0.2s">
	<h3 class="main-title">Categories de projets</h3>
	<div id="post-carousel" class="owl-carousel">
		<?php $Categorie = DB::table('categorie')->count('id'); 

		if($Categorie == 0){

			echo "<p>Aucune categorie de projets</p>";

		}

		?>
		<?php $Categorie = DB::table('categorie')->orderBy('id','desc')->limit(10)->get(); 
		foreach($Categorie as $categorie) { ?>
		<div>
			<div class="column-post">
				<a href="detail_categorie<?php echo $categorie->id?>" class="img-thumbnail"> <img src="img/categorie/categorie.jpg" alt="" class="img-responsive" style="border: 1px solid #000"> </a>
				<div class="topic"> <a href="#" class="tag bg2">{{$categorie->full_titre}}</a>
					<h4><a href="detail_categorie<?php echo $categorie->id?>">{{$categorie->full_titre}}</a></h4>
					
					<ul class="post-tools">
						<?php $intl_date_formatter = new IntlDateFormatter('frc',
							IntlDateFormatter::LONG,
							IntlDateFormatter::NONE);?>
							<li>  Depuis le {{$intl_date_formatter->format(new DateTime($categorie->created_at))}} </li>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!--post slider-->
	</div>
