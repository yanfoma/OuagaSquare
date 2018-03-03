<?php

namespace App\Http\Controllers;
use App\Model\Projet;
use App\Model\Categorie;
use App\Model\Commentaire;
use Storage;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class IndexController extends Controller
{
	public function index()
	{
		return view('index');
	}

	public function login()
	{
		return view('admin.login');
	}

	public function pdf($id)
	{
		$edit=Projet::find($id);
		return View('pdf')->with('datas',$edit);
	}

	/*  detail projet  */

	public function detail_projet($id)
	{	
		$edit=Projet::find($id);
		$edit->vue=$edit->vue+1;
		$edit->save();
		return View('detail_projet')->with('datas',$edit);
	}

	public function detail_categorie($id)
	{	
		$edit=Categorie::find($id);
		return View('detail_categorie')->with('datas',$edit);
	}

	public function commentaire(Request $data)
	{
		$validation=Validator::make($data->all(),array(
			'nom'=>'required',
			'commentaire'=>'required',
			'avatar'=>'required',
		));

		if($validation->fails())
		{
			return back();
		}
		else
		{
			$image = $data->file('avatar');
			$image_new_name = time().$image->getClientOriginalName();
			$image->move('img/avatar/', $image_new_name);
			Commentaire::create([
				'nom'         => $data->nom,
				'contenu'     => $data->commentaire,
				'avatar'         => $image_new_name,
				'projet_id'  => $data->projet_id,
			]);

			return back();
		}
	}

	public function categorie($id)
	{	
		$edit=Categorie::find($id);

		return View('categorie')->with('datas',$edit);
	}

	public function projet()
	{	
		return View('projet');
	}

	public function planning() {

		return view('planning');
	}

	public function repertoire_planning() {

		$projet = Projet::select('full_titre as title','date_debut as start','date_fin as end')->get()->toArray();

		return Response()->json($projet);

	}

	public function liste_projet() {

		return view('liste_projet');
	}

	public function contribuer() {

		return view('contribuer');
	}

}
