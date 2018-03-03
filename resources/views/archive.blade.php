<div class="sidebar-box wow animated fadeInUp" data-wow-delay="1.6s">
	<h3>Archives</h3>
	<ul class="list-unstyled archives">
		<?php $Projet = DB::table('projet')->count('id'); ?>
		<li><a href="#">Janvier <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Fevrier <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Mars <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Avril <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Mai <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Juin <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Juillet <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Aout <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Septembre <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Octobre <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Novembre <span>(<?php echo $Projet?>)</span></a></li>
		<li><a href="#">Decembre <span>(<?php echo $Projet?>)</span></a></li>
	</ul>
</div>