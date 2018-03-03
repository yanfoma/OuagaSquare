<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Storage;
use File;
use App\Http\Requests;
use App\Model\Categorie;
use App\Model\Phase;
use App\Model\Responsable;
use App\Model\Executeur;
use App\Model\Projet;
use App\Model\User;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
/**
* 
*/
class AdminController extends BaseController
{
	/*  login  */

	public function log()
	{
		$data=array(
			'name'=>Input::get('login'),
			'password'=>Input::get('password'));

		if(Auth::attempt($data))
			{
				return Redirect::to('admin_index');
			}
			else
			{
				return Redirect::to('/');
			}
		}

		/*  index admin  */

		public function admin_index()
		{

			return view('admin.index');
		}

		/*  backup  */

		public function backup()
		{

			return view('admin.backup');
		}


		public function sauvegarde()
		{

			return view('sauvegarde');
		}

		/*  categorie de projet  */

		public function creer_categorie_projet()
		{

			return view('admin.creer_categorie_projet');
		}

		public function c_categorie_projet(Request $data)
		{
			$validation=Validator::make($data->all(),array(
				'resume'=>'required',
				'detail'=>'required',
			));

			if($validation->fails())
			{
				return Redirect::back()->withErrors($validation);
			}
			else
			{
				$table= new Categorie;
				$table->resume_titre=$data->Input('resume');
				$table->full_titre=$data->Input('detail');

				$table->save();

				return Redirect::back();
			}
		}

		public function liste_categorie()
		{
			return view('liste_categorie');
		}

		public function modifier_categorie($id)
		{
			$edit=Categorie::find($id);
			return View('modifier_categorie')->with('datas',$edit);
		}

		public function enregistrer_modifier_categorie(Request $tabledata, $id)
		{
			$table=Categorie::find($id);
			$table->resume_titre=$tabledata->Input('resume');
			$table->full_titre=$tabledata->Input('detail');
			$table->save();
			return Redirect::back();
		}

		public function supprimer_categorie($id)
		{
			$sup=Categorie::find($id);
			$sup_projet=DB::table('projet')->where('categorie_id', $id)->delete();
			$sup->delete();
			return Redirect::back();
		}

		/*  phase de projet  */

		public function creer_projet_phase()
		{

			return view('admin.creer_projet_phase');
		}

		public function c_projet_phase(Request $data)
		{
			$validation=Validator::make($data->all(),array(
				'phase'=>'required',
			));

			if($validation->fails())
			{
				return Redirect::to('creer_projet_phase')->withErrors($validation);
			}
			else
			{
				$table= new Phase;
				$table->libelle=$data->Input('phase');

				$table->save();

				return Redirect::to('creer_projet_phase');
			}
		}

		public function liste_phase()
		{
			return view('liste_phase');
		}

		public function modifier_phase($id)
		{
			$edit=Phase::find($id);
			return View('modifier_phase')->with('datas',$edit);
		}

		public function enregistrer_modifier_phase(Request $tabledata, $id)
		{
			$table=Phase::find($id);
			$table->libelle=$tabledata->Input('phase');
			$table->save();
			return Redirect::back();
		}

		public function supprimer_phase($id)
		{
			$sup=Phase::find($id);
			$sup_projet=DB::table('projet')->where('phase_id', $id)->delete();
			$sup->delete();
			return Redirect::back();
		}

		/*  responsable de projet  */

		public function creer_projet_responsable()
		{

			return view('admin.creer_projet_responsable');
		}

		public function c_projet_responsable(Request $data)
		{
			$validation=Validator::make($data->all(),array(
				'responsable'=>'required',
			));

			if($validation->fails())
			{
				return Redirect::to('creer_projet_responsable')->withErrors($validation);
			}
			else
			{
				$table= new Responsable;
				$table->libelle=$data->Input('responsable');

				$table->save();

				return Redirect::back();
			}
		}

		public function liste_responsable()
		{
			return view('liste_responsable');
		}

		public function modifier_responsable($id)
		{
			$edit=Responsable::find($id);
			return View('modifier_responsable')->with('datas',$edit);
		}

		public function enregistrer_modifier_responsable(Request $tabledata, $id)
		{
			$table=Responsable::find($id);
			$table->libelle=$tabledata->Input('responsable');
			$table->save();
			return Redirect::back();
		}

		public function supprimer_responsable($id)
		{
			$sup=Responsable::find($id);
			$sup_projet=DB::table('projet')->where('responsable_id', $id)->delete();
			$sup->delete();
			return Redirect::back();
		}

		/*  executeur de projet  */

		public function creer_projet_executeur()
		{

			return view('admin.creer_projet_executeur');
		}

		public function c_projet_executeur(Request $data)
		{
			$validation=Validator::make($data->all(),array(
				'identite'=>'required',
				'adresse'=>'required',
			));

			if($validation->fails())
			{
				return Redirect::back()->withErrors($validation);
			}
			else
			{
				$table= new Executeur;
				$table->libelle=$data->Input('identite');
				$table->adresse=$data->Input('adresse');

				$table->save();

				return Redirect::back();
			}
		}

		public function liste_executeur()
		{
			return view('liste_executeur');
		}

		public function modifier_executeur($id)
		{
			$edit=Executeur::find($id);
			return View('modifier_executeur')->with('datas',$edit);
		}

		public function enregistrer_modifier_executeur(Request $tabledata, $id)
		{
			$table=Executeur::find($id);
			$table->libelle=$tabledata->Input('libelle');
			$table->adresse=$tabledata->Input('adresse');
			$table->save();
			return Redirect::back();
		}

		public function supprimer_executeur($id)
		{
			$sup=Executeur::find($id);
			$sup_projet=DB::table('projet')->where('executeur_id', $id)->delete();
			$sup->delete();
			return Redirect::back();
		}

		/*  projet  */

		public function creer_projet()
		{
			$cat=Categorie::all(['full_titre','id']);	
			$phaz=Phase::all(['libelle','id']);	
			$execut=Executeur::all(['libelle', 'adresse','id']);	
			$respons=Responsable::all(['libelle','id']);	

			return view('admin.creer_projet', compact('cat',$cat,'phaz',$phaz,'execut',$execut,'respons',$respons));
		}

		public function c_projet(Request $data)
		{
			$validation=Validator::make($data->all(),array(
				
			));

			if($validation->fails())
			{
				return Redirect::back()->withErrors($validation);
			}
			else
			{	
			/*$table= new Projet;
			$table->resume_titre=$data->Input('abrege');
			$table->full_titre=$data->Input('intitule');
			$table->categorie_id=$data->Input('categorie');
			$table->cout=$data->Input('cout');
			$table->responsable_id=$data->Input('responsable');
			$table->executeur_id=$data->Input('executeur');
			$table->contenu=$data->Input('contenu');
			$table->phase_id=$data->Input('phase');
			$table->date_debut=$data->Input('date_debut');
			$table->date_fin=$data->Input('date_fin');

			if($data->file('avatar'))
			{
				$filename=$data->file('avatar')->getClientOriginalName();

				Storage::disk('upload_dir')->put($filename,file_get_contents($data->file('avatar')->getRealPath()));
				
				$table->avatar=$filename;
			}
			
			$table->save();*/

			$image = $data->file('avatar');
			$image_new_name = time().$image->getClientOriginalName();
			$image->move('img/couverture/', $image_new_name);

			$doc = $data->file('document');
			$doc_new_name = time().$doc->getClientOriginalName();
			$doc->move('img/pdf/', $doc_new_name);

			Projet::create([
				'resume_titre' 		=> $data->abrege,
				'full_titre' 		=> $data->intitule,
				'categorie_id'		=> $data->categorie,
				'cout'  			=> $data->cout,
				'responsable_id'    => $data->responsable,
				'executeur_id'      => $data->executeur,
				'contenu'        	=> $data->contenu,
				'phase_id'     		=> 	$data->phase,
				'date_debut'        => $data->date_debut,
				'date_fin'       	=> 	$data->date_fin,
				'avatar'     	 	=> 	$image_new_name,
				'fichier_joint' 	=> 	$doc_new_name,
				'vue' 				=> 	'0',
			]);


			return Redirect::back();
		}
	}

	public function liste_projet()
	{
		return view('liste_projet');
	}

	public function modifier_projet($id)
	{
		$edit=Projet::find($id);
		$categorie=Categorie::all(['full_titre','id']);	
		$phase=Phase::all(['libelle','id']);	
		$executeur=Executeur::all(['libelle', 'adresse','id']);	
		$responsable=Responsable::all(['libelle','id']);
		return View('modifier_projet', compact('categorie',$categorie,'phase',$phase,'executeur',$executeur,'responsable',$responsable))->with('datas',$edit);
	}

	public function enregistrer_modifier_projet(Request $tabledata, $id)
	{
		$table=Projet::find($id);
		$table->resume_titre=$tabledata->Input('abrege');
		$table->full_titre=$tabledata->Input('intitule');
		$table->categorie_id=$tabledata->Input('categorie');
		$table->cout=$tabledata->Input('cout');
		$table->responsable_id=$tabledata->Input('responsable');
		$table->executeur_id=$tabledata->Input('executeur');
		$table->contenu=$tabledata->Input('contenu');
		$table->phase_id=$tabledata->Input('phase');
		$table->date_debut=$tabledata->Input('date_debut');
		$table->date_fin=$tabledata->Input('date_fin');

		$table->save();
		
		return Redirect::back();
	}

	public function supprimer_projet($id)
	{
		$sup=Projet::find($id);
		$sup_commentaire=DB::table('commentaire')->where('projet_id', $id)->delete();
		$sup->delete();
		return Redirect::back();
	}

	/* utilisateur */

	public function creer_utilisateur()
	{

		return view('creer_utilisateur');
	}

	public function nouveau_utilisateur(Request $data)
	{
		$validation=Validator::make($data->all(),array(
			'nom'=>'required',
			'password'=>'required',
			'email'=>'required',
		));
		if($validation->fails())
		{
			return Redirect::to('creer_projet')->withErrors($validation);
		}
		else
		{
			$table= new User;
			$table->name=$data->Input('nom');
			$table->email=$data->Input('email');
			$table->password=Hash::make($data->Input('password'));
			$table->save();

			return Redirect::to('creer_utilisateur');
		}
	}

	public function liste_utilisateur()
	{
		return view('liste_utilisateur');
	}

	public function modifier_utilisateur($id)
	{
		$edit=User::find($id);
		return View('modifier_utilisateur')->with('datas',$edit);
	}

	public function enregistrer_modifier_utilisateur(Request $tabledata, $id)
	{
		$table=User::find($id);
		$table->name=$tabledata->Input('nom');
		$table->email=$tabledata->Input('email');
		$table->password=$tabledata->Input('password');
		$table->save();
		return Redirect::to('liste_utilisateur');
	}

	public function supprimer_utilisateur($id)
	{
		$sup=User::find($id);
		$sup->delete();
		return Redirect::to('liste_utilisateur');
	}

	public function planning_projet() {

		return view('admin.planning');
	}

	public function repertoire_planning() {

		$projet = Projet::select('full_titre as title','date_debut as start','date_fin as end')->get()->toArray();

		return Response()->json($projet);

	}


}
?>