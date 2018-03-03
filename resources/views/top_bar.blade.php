<section class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<ul class="list-inline top-nav">
					<?php
					$Categorie=DB::table('categorie')
					->orderBy('id', 'desc')
					->limit(5)->get();
					foreach($Categorie as $row)
						{?>
							<li>
								<a href="<?php echo url('detail_categorie');?><?php echo $row->id;?>"><span>{{$row->resume_titre}}</span></a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-sm-6 text-right">
						<ul class="list-inline top-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>