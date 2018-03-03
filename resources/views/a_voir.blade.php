<div style="height: 40px;"></div>
<div class="col-sm-12 col-md-12">
	<div class="content-col">
		<div class="news-carousel post-video wow animated fadeInUp" data-wow-delay="0.2s">
			<h3 class="main-title">A Regarder</h3>
			<div id="post-video" class="owl-carousel">
				<?php $Projet = DB::table('projet')->count('id'); 

				if($Projet == 0){

					echo "<p>Aucun document de projet a regarder</p>";

				}

				?>
				<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(10)->get(); 
				foreach($Projet as $projet) { ?>
				<div>
					<div class="column-post">
						<a href="#" class="img-thumbnail"> <embed src='img/pdf/{{$projet->fichier_joint}}' type='application/pdf' class="img-responsive" /> </a>
							<div class="news-overlay"> 
								<a href="detail_projet<?php echo $projet->id?>">
									<span class="tag bg3">{{$projet->full_titre}}</span>
									<?php $intl_date_formatter = new IntlDateFormatter('frc',
										IntlDateFormatter::LONG,
										IntlDateFormatter::NONE);?>
										<span class="date">Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}}</span>
									</a>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>