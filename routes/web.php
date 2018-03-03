<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

/*  page d'accueil  */

Route::get('/index', 'IndexController@index');

/*  login  */

Route::get('/login', ['as'=>'login','uses'=>'IndexController@login']);

Route::post('log', 'AdminController@log');

/*  index admin  */

Route::get('/admin_index','AdminController@admin_index');

/*  backup de la BDD  */

Route::get('/backup','AdminController@backup');

Route::get('/sauvegarde','AdminController@sauvegarde');

/*  categorie de projet  */

Route::get('/creer_categorie_projet','AdminController@creer_categorie_projet');

Route::post('/c_categorie_projet','AdminController@c_categorie_projet');

Route::get('/liste_categorie','AdminController@liste_categorie');

Route::get('modifier_categorie{id}', 'AdminController@modifier_categorie'); 

Route::post('enregistrer_modifier_categorie{id}', 'AdminController@enregistrer_modifier_categorie');

Route::get('supprimer_categorie{id}', 'AdminController@supprimer_categorie');

/*  phase de projet  */

Route::get('/creer_projet_phase','AdminController@creer_projet_phase');

Route::post('/c_projet_phase','AdminController@c_projet_phase');

Route::get('/liste_phase','AdminController@liste_phase');

Route::get('modifier_phase{id}', 'AdminController@modifier_phase'); 

Route::post('enregistrer_modifier_phase{id}', 'AdminController@enregistrer_modifier_phase');

Route::get('supprimer_phase{id}', 'AdminController@supprimer_phase');

/*  responsable de projet  */

Route::get('/creer_projet_responsable','AdminController@creer_projet_responsable');

Route::post('/c_projet_responsable','AdminController@c_projet_responsable');

Route::get('/liste_responsable','AdminController@liste_responsable');

Route::get('modifier_responsable{id}', 'AdminController@modifier_responsable'); 

Route::post('enregistrer_modifier_responsable{id}', 'AdminController@enregistrer_modifier_responsable');

Route::get('supprimer_responsable{id}', 'AdminController@supprimer_responsable');

/*  executeur de projet  */

Route::get('/creer_projet_executeur','AdminController@creer_projet_executeur');

Route::post('/c_projet_executeur','AdminController@c_projet_executeur');

Route::get('/liste_executeur','AdminController@liste_executeur');

Route::get('modifier_executeur{id}', 'AdminController@modifier_executeur'); 

Route::post('enregistrer_modifier_executeur{id}', 'AdminController@enregistrer_modifier_executeur');

Route::get('supprimer_executeur{id}', 'AdminController@supprimer_executeur');

/*  projet  */

Route::get('/creer_projet','AdminController@creer_projet');

Route::post('/c_projet','AdminController@c_projet');

Route::get('/liste_projet','AdminController@liste_projet');

Route::get('modifier_projet{id}', 'AdminController@modifier_projet'); 

Route::post('enregistrer_modifier_projet{id}', 'AdminController@enregistrer_modifier_projet');

Route::get('supprimer_projet{id}', 'AdminController@supprimer_projet');

Route::get('projet', 'IndexController@projet'); 

/*  detail projet  */

Route::get('detail_projet{id}', 'IndexController@detail_projet');

Route::get('detail_categorie{id}', 'IndexController@detail_categorie'); 

Route::get('categorie{id}', 'IndexController@categorie'); 

/*  enregister le projet au format pdf  */

Route::get('pdf{id}', 'IndexController@pdf'); 

/*  commentaire  */

Route::post('/commentaire','IndexController@commentaire');

/*  utilisateur  */

Route::get('/creer_utilisateur','AdminController@creer_utilisateur');

Route::post('/nouveau_utilisateur','AdminController@nouveau_utilisateur');

Route::get('/liste_utilisateur','AdminController@liste_utilisateur');

Route::get('modifier_utilisateur{id}', 'AdminController@modifier_utilisateur'); 

Route::post('enregistrer_modifier_utilisateur{id}', 'AdminController@enregistrer_modifier_utilisateur');

Route::get('supprimer_utilisateur{id}', 'AdminController@supprimer_utilisateur');

Route::post('/commentaire','IndexController@commentaire');

Route::get('/planning', 'IndexController@planning');

Route::get('/repertoire_planning', 'IndexController@repertoire_planning');

Route::get('/planning_projet', 'AdminController@planning_projet');

Route::get('/repertoire_planning', 'AdminController@repertoire_planning');

Route::get('/liste_projet', 'IndexController@liste_projet');

Route::get('/contribuer', 'IndexController@contribuer');