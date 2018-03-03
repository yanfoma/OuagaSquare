@include('admin.header')

@include('admin.sidebar')

<div id="page-content-wrapper">
    <div id="page-content">

        <div class="container">

            <script type="text/javascript" src="assets/widgets/parsley/parsley.js"></script>
            <!-- Chosen -->

            <!--<link rel="stylesheet" type="text/css" href="assets/widgets/chosen/chosen.css">-->
            <script type="text/javascript" src="assets/widgets/chosen/chosen.js"></script>
            <script type="text/javascript" src="assets/widgets/chosen/chosen-demo.js"></script>

            <script type="text/javascript" src="assets/widgets/datepicker/datepicker.js"></script>
            <script type="text/javascript">
                /* Datepicker bootstrap */

                $(function() { "use strict";
                    $('.bootstrap-datepicker').bsdatepicker({
                        format: 'yyyy-mm-dd'
                    });
                });

            </script>
            
            <!--<link rel="stylesheet" type="text/css" href="assets/widgets/datatable/datatable.css">-->
            <script type="text/javascript" src="assets/widgets/datatable/datatable.js"></script>
            <script type="text/javascript" src="assets/widgets/datatable/datatable-bootstrap.js"></script>
            <script type="text/javascript" src="assets/widgets/datatable/datatable-responsive.js"></script>

            <script type="text/javascript">

                /* Datatables responsive */

                $(document).ready(function() {
                    $('#datatable-responsive').DataTable( {
                        responsive: true,
                        sort: false
                    } );
                } );

                $(document).ready(function() {
                    $('.dataTables_filter input').attr("placeholder", "Rechercher...");
                });

            </script>

            <div id="page-title">
                <h2>Personnels</h2>
                <p>...</p>
                
            </div>

            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">

                    </h3>
                    <div class="example-box-wrapper">
                        <ul class="nav-responsive nav nav-tabs"><li class="dropdown pull-right tabdrop active"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><i class="glyph-icon icon-align-justify"></i> <b class="caret"></b></a></li>
                            <li class="active"><a href="#tab1" data-toggle="tab">Répertoire du projets</a></li>  
                            <li class=""><a href="#tab2" data-toggle="tab">Ajout du projet</a></li>   
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="panel-body">
                                    <h3 class="title-hero">

                                    </h3>
                                    <div class="example-box-wrapper">
                                        <table id="datatable-responsive" style="margin-top: -30px" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th hidden="hidden">ID</th>
                                                    <th style="text-align: center">Intitule du projet</th>
                                                    <th style="text-align: center">Categorie</th>
                                                    <th style="text-align: center">Responsable</th>
                                                    <th style="text-align: center">Executeur</th>
                                                    <th style="text-align: center">Phase</th>
                                                    <th style="text-align: center">Details</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $Projet = DB::table('projet')->orderBy('id', 'desc')->get();
                                                foreach ($Projet as $projet) {
                                                    ?>
                                                    <tr>
                                                        <td hidden="hidden"><?php echo $projet->id ?></td>
                                                        <td style="vertical-align: middle;text-align: center">{{$projet->full_titre}}</td>
                                                        <?php
                                                        $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->orderBy('id', 'desc')->get();
                                                        foreach ($Categorie as $categorie) {
                                                            ?>
                                                            <td style="vertical-align: middle;text-align:center">{{$categorie->resume_titre}}</td>
                                                            <?php } ?>
                                                            <?php
                                                            $Responsable = DB::table('responsable')->where('id', $projet->responsable_id)->orderBy('id', 'desc')->get();
                                                            foreach ($Responsable as $responsable) {
                                                                ?>
                                                                <td style="vertical-align: middle;text-align:center">{{$responsable->libelle}}</td>
                                                                <?php } ?>
                                                                <?php
                                                                $Executeur = DB::table('executeur')->where('id', $projet->executeur_id)->orderBy('id', 'desc')->get();
                                                                foreach ($Executeur as $executeur) {
                                                                    ?>
                                                                    <td style="vertical-align: middle;text-align:center">{{$executeur->libelle}}</td>
                                                                    <?php } ?>
                                                                    <?php
                                                                    $Phase = DB::table('phase')->where('id', $projet->phase_id)->orderBy('id', 'desc')->get();
                                                                    foreach ($Phase as $phase) {
                                                                        ?>
                                                                        <td style="vertical-align: middle;text-align:center">{{$phase->libelle}}</td>
                                                                        <?php } ?>
                                                                        <td style="vertical-align: middle;text-align:center"><a data-toggle="modal" data-target="#detail_projet<?php echo $projet->id?>" style="height: 30px;text-align: center;vertical-align: middle;background: #00a792;font-size: 13px;color: #fff" class="btn btn-primary">+</a><a data-toggle="modal" data-target="#modifier_projet<?php echo $projet->id?>" class="btn btn-primary" style="height: 30px;text-align: center;vertical-align: middle;background: #00a792;font-size: 13px;color: #fff">M</a><a href="supprimer_projet<?php echo $projet->id?>" class="btn btn-primary" style="height: 30px;text-align: center;vertical-align: middle;background: #00a792;font-size: 13px;color: #fff">X</a></td>

                                                                        <div class="modal fade" id="detail_projet<?php echo $projet->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                        <h4 class="modal-title">Details du projet {{$projet->full_titre}}</h4>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <br/>
                                                                                                <div class="col-sm-6">
                                                                                                    <img src="img/couverture/{{$projet->avatar}}" style="height: 200px" width="100%" >
                                                                                                </div>

                                                                                                <div class="col-sm-6">
                                                                                                    <embed src='img/pdf/{{$projet->fichier_joint}}' type='application/pdf' style="height: 200px" width="100%" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <br/>
                                                                                                    <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                                                                                        IntlDateFormatter::LONG,
                                                                                                        IntlDateFormatter::NONE);?>
                                                                                                        <div class="col-sm-3">
                                                                                                            <span class="btn btn-primary">Cout : {{$projet->cout}} FCFA</span>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3">
                                                                                                            <span class="btn btn-primary">Date de debut : {{$intl_date_formatter->format(new DateTime($projet->date_debut))}}</span>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3">
                                                                                                            <span class="btn btn-primary">Date de fin : {{$intl_date_formatter->format(new DateTime($projet->date_fin))}}</span>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3">
                                                                                                            <span class="btn btn-primary">Nombre de vue(s) : {{$projet->vue}}</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br/><br/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="modal fade" id="modifier_projet<?php echo $projet->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                                <h4 class="modal-title">Modifier projet</h4>
                                                                                            </div>
                                                                                            <br/>
                                                                                            <form action="enregistrer_modifier_projet<?php echo $projet->id;?>" method="post" class="form-horizontal" id="demo-form" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Resume du titre</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                            <input type="text" required="" name="abrege" class="form-control" data-parsley-id="5198" value="{{$projet->resume_titre}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Titre du projet</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <input type="text" required="" name="intitule" class="form-control" data-parsley-id="7358" value="{{$projet->full_titre}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Categorie</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <select name="categorie" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                                                @foreach($cat as $it)
                                                                                                                <option value="{{$it->id}}">{{$it->full_titre}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Responsable</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <select name="responsable" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                                                @foreach($respons as $it)
                                                                                                                <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Executeur</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <select name="executeur" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                                                @foreach($execut as $it)
                                                                                                                <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Phase du projet</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <select name="phase" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                                                @foreach($phaz as $it)
                                                                                                                <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Cout du projet</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <input name="cout" type="number" required="" class="form-control" data-parsley-id="7358" value="{{$projet->cout}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Date de debut</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <input name="date_debut" type="text" style="height: 40px;width: 100%" class="bootstrap-datepicker form-control"  data-date-format="yy/mm/dd" data-parsley-id="7776" placeholder="Date de début" required="" value="{{$projet->date_debut}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Date de fin</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <input name="date_fin" type="text" style="height: 40px;width: 100%" class="bootstrap-datepicker form-control"  data-date-format="yy/mm/dd" data-parsley-id="7776" placeholder="Date de fin" required="" value="{{$projet->date_fin}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <br/>
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-sm-3 control-label">Description</label>
                                                                                                        <div class="col-sm-6">
                                                                                                            <textarea class="form-control" cols="" rows="5" name="contenu" required="" value="{{$projet->contenu}}"></textarea> 
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                                    <input type="submit" name="save" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                    <div class="bg-default content-box text-center pad20A mrg25T">
                                                                        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-lg btn-default">Retour à la page précédente</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <h3 class="title-hero">

                                                                    </h3>
                                                                    <div class="example-box-wrapper">
                                                                        <form action="c_projet" method="post" enctype="multipart/form-data" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Resume du titre</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                        <input type="text" required="" name="abrege" class="form-control" data-parsley-id="5198"><ul class="parsley-errors-list" id="parsley-id-5198"></ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Titre du projet</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" required="" name="intitule" class="form-control" data-parsley-id="7358"><ul class="parsley-errors-list" id="parsley-id-7358"></ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Categorie</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="categorie" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                            @foreach($cat as $it)
                                                                                            <option value="{{$it->id}}">{{$it->full_titre}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <a data-toggle="modal" data-target="#ajout_categorie" style="height: 40px;text-align: center;vertical-align: middle;background: #00a792;font-size: 20px;color: #fff" class="form-control">+</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Responsable</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="responsable" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                            @foreach($respons as $it)
                                                                                            <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <a data-toggle="modal" data-target="#ajout_responsable" style="height: 40px;text-align: center;vertical-align: middle;background: #00a792;font-size: 20px;color: #fff" class="form-control">+</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Executeur</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="executeur" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                            @foreach($execut as $it)
                                                                                            <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <a data-toggle="modal" data-target="#ajout_executeur" style="height: 40px;text-align: center;vertical-align: middle;background: #00a792;font-size: 20px;color: #fff" class="form-control">+</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Phase du projet</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="phase" required="" class="chosen-select" style="display: none;" id="fonction">
                                                                                            @foreach($phaz as $it)
                                                                                            <option value="{{$it->id}}">{{$it->libelle}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <a data-toggle="modal" data-target="#ajout_phase" style="height: 40px;text-align: center;vertical-align: middle;background: #00a792;font-size: 20px;color: #fff" class="form-control">+</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Cout du projet</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input name="cout" type="number" required="" class="form-control" data-parsley-id="7358"><ul class="parsley-errors-list" id="parsley-id-7358"></ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Date de debut</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input name="date_debut" type="text" style="height: 40px;width: 100%" class="bootstrap-datepicker form-control"  data-date-format="yy/mm/dd" data-parsley-id="7776" placeholder="Date de début" required="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Date de fin</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input name="date_fin" type="text" style="height: 40px;width: 100%" class="bootstrap-datepicker form-control"  data-date-format="yy/mm/dd" data-parsley-id="7776" placeholder="Date de fin" required="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Avatar du projet</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input name="avatar" type="file" style="height: 40px;width: 100%" class="form-control" required="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Document</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input name="document" type="file" style="height: 40px;width: 100%" class="form-control" required="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Description</label>
                                                                                    <div class="col-sm-6">
                                                                                        <textarea class="form-control" cols="" rows="5" name="contenu" required=""></textarea> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                <input type="submit" name="save" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-lg btn-default">Retour à la page précédente</a>
                                                                            </div>
                                                                        </form>
                                                                        <div class="modal fade" id="ajout_categorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                        <h4 class="modal-title">Ajout de categorie</h4>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <form action="c_categorie_projet" method="post" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <br/>
                                                                                                    <label class="col-sm-3 control-label">Resume du titre</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                        <input type="text" name="resume" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('resume'))
                                                                                                    {<span style="color:red">{!!$errors->first('resume')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-3 control-label">Titre de la categorie</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="text" name="detail" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('detail'))
                                                                                                    {<span style="color:red">{!!$errors->first('detail')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                            <input type="submit" name="oui" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="ajout_responsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                        <h4 class="modal-title">Ajout de responsable</h4>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <form action="c_projet_responsable" method="post" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <br/>
                                                                                                    <label class="col-sm-3 control-label">Libelle</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                        <input type="text" name="responsable" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('responsable'))
                                                                                                    {<span style="color:red">{!!$errors->first('responsable')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                            <input type="submit" name="oui" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="ajout_executeur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                        <h4 class="modal-title">Ajout d'executeur</h4>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <form action="c_projet_executeur" method="post" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <br/>
                                                                                                    <label class="col-sm-3 control-label">Libelle</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                        <input type="text" name="identite" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('identite'))
                                                                                                    {<span style="color:red">{!!$errors->first('identite')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-3 control-label">Adresse</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="text" name="adresse" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('adresse'))
                                                                                                    {<span style="color:red">{!!$errors->first('adresse')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                            <input type="submit" name="oui" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="ajout_phase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                                        <h4 class="modal-title">Ajout de phase</h4>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <form action="c_projet_phase" method="post" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <br/>
                                                                                                    <label class="col-sm-3 control-label">Libelle</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                        <input type="text" name="phase" class="form-control" required="">
                                                                                                    </div>
                                                                                                    @if($errors->has('phase'))
                                                                                                    {<span style="color:red">{!!$errors->first('phase')!!}</span>}
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                            <input type="submit" name="oui" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('admin.footer')