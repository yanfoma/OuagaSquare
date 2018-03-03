<div class="sidebar-box wow animated fadeInUp" data-wow-delay="1.6s">
	<h3>Categories de projets</h3>
	<ul class="list-unstyled archives">
		<?php $Categorie = DB::table('categorie')->count('id'); 

        if($Categorie == 0){

            echo "<p>Aucune categorie de projets</p>";

        }

        ?>
		<?php $Categorie = DB::table('categorie')->orderBy('id', 'desc')->limit(5)->get(); 
		foreach($Categorie as $categorie) { ?>
		<li><a href="detail_categorie<?php echo $categorie->id?>">{{$categorie->full_titre}} </a></li>
		<?php } ?>
	</ul>
</div>