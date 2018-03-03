<div class="sidebar-box wow animated fadeInUp" data-wow-delay="1.4s">
	<h3>Plus de details du projet</h3>
	<div id="testimonials" class="owl-carousel owl-theme">
		<div class="item">
			<?php $Responsable = DB::table('responsable')->where('id', $datas->responsable_id)->get(); 
			foreach($Responsable as $responsable) { ?>
			<p align="justify"> Responsable du projet : <span class="tag bg1">{{$responsable->libelle}}</span></p>
			<?php } ?>
			<?php $Executeur = DB::table('executeur')->where('id', $datas->executeur_id)->get(); 
			foreach($Executeur as $executeur) { ?>
			<p align="justify"> Executeur du projet : <span class="tag bg2">{{$executeur->libelle}} {{$executeur->adresse}}</span></p>
			<?php } ?>
			<p align="justify"> Debut du projet : <span class="tag bg3">{{$datas->created_at}}</span></p>
			<p align="justify"> Fin du projet : <span class="tag bg4">{{$datas->created_at}}</span></p>
			<p align="justify" > Cout du projet : <span class="tag bg5">{{$datas->cout}} FCFA</span></p>
			<?php $Phase = DB::table('phase')->where('id', $datas->phase_id)->get(); 
			foreach($Phase as $phase) { ?>
			<p align="justify"> Phase du projet : <span class="tag bg1">{{$phase->libelle}}</span></p>
			<?php } ?>
		</div>
	</div>
</div>