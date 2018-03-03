@include('header')

@include('sidebar')

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
                        format: 'dd-mm-yyyy'
                    });
                });

            </script>

            <script type="text/javascript">

                $(document).ready(function(){
                    $(document).on('change','#fonction',function(){
                        var fonction_id=$(this).val();
                        var a=$(this).parent();
                        //console.log(fonction_id);
                        $.ajax({
                            type:'get',
                            url:'salaire_fonction',
                            data:{'id':fonction_id},
                            dataType:'json',
                            success:function(data){
                                //console.log("salaire");
                                //console.log(data.salaire);
                                a.add('#salaire').val(data.salaire);
                            }
                        });
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
                    $('#datatable-responsive-2').DataTable( {
                        responsive: true,
                        sort: false
                    } );
                    $('#datatable-responsive-3').DataTable( {
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
                @include('theme')
            </div>

            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">

                    </h3>
                    <div class="example-box-wrapper">
                        <ul class="nav-responsive nav nav-tabs"><li class="dropdown pull-right tabdrop active"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><i class="glyph-icon icon-align-justify"></i> <b class="caret"></b></a></li>
                            <li class="active"><a href="#tab1" data-toggle="tab">Liste des taches en cours</a></li>  
                            <li class=""><a href="#tab2" data-toggle="tab">Liste des taches terminees</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab">Liste des paiements</a></li>   
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="panel-body">
                                    <h3 class="title-hero">

                                    </h3>
                                    <div class="example-box-wrapper">
                                        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th hidden="hidden">ID</th>
                                                    <th style="text-align: center">Section</th>
                                                    <th style="text-align: center">Date de debut</th>
                                                    <th style="text-align: center">Date de fin</th>
                                                    <th style="text-align: center">Etat</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $Planning = DB::table('planning')->where('created_by',Auth::user()->created_by)->where('personnel', $datas->nom)->where('etat', 'Non terminé')->orderBy('id', 'desc')->get();
                                                foreach ($Planning as $planning) {
                                                    ?>
                                                    <tr>
                                                        <td hidden="hidden"><?php echo $planning->id ?></td>
                                                        <td style="text-align: center">{{$planning->section}}</td>
                                                        <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                                        IntlDateFormatter::LONG,
                                                        IntlDateFormatter::NONE);?>
                                                        <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($planning->date_debut))}}</td>
                                                        <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($planning->date_fin))}}</td>
                                                        <td style="text-align: center">{{$planning->etat}}</td>
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
                                                <table id="datatable-responsive-2" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th hidden="hidden">ID</th>
                                                            <th style="text-align: center">Section</th>
                                                            <th style="text-align: center">Date de debut</th>
                                                            <th style="text-align: center">Date de fin</th>
                                                            <th style="text-align: center">Etat</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $Planning = DB::table('planning')->where('created_by',Auth::user()->created_by)->where('personnel', $datas->nom)->where('etat', 'Terminer')->orderBy('id', 'desc')->get();
                                                        foreach ($Planning as $planning) {
                                                            ?>
                                                            <tr>
                                                                <td hidden="hidden"><?php echo $planning->id ?></td>
                                                                <td style="text-align: center">{{$planning->section}}</td>
                                                                <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                                        IntlDateFormatter::LONG,
                                                        IntlDateFormatter::NONE);?>
                                                                <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($planning->date_debut))}}</td>
                                                                <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($planning->date_fin))}}</td>
                                                                <td style="text-align: center">{{$planning->etat}}</td>
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
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <h3 class="title-hero">

                                                </h3>
                                                <div class="example-box-wrapper">
                                                    <table id="datatable-responsive-3" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th hidden="hidden">ID</th>
                                                                <th style="text-align: center">Date de debut</th>
                                                                <th style="text-align: center">Date de fin</th>
                                                                <th style="text-align: center">Mois</th>
                                                                <th style="text-align: center">Salaire net</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $Salaire = DB::table('salaire')->where('created_by',Auth::user()->created_by)->where('personnel_id', $datas->id)->orderBy('id', 'desc')->get();
                                                            foreach ($Salaire as $salaire) {
                                                                ?>
                                                                <tr>
                                                                    <td hidden="hidden"><?php echo $salaire ->id ?></td>
                                                                    <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($salaire->date_debut))}}</td>
                                                                    <td style="text-align: center">{{$intl_date_formatter->format(new DateTime($salaire->date_fin))}}</td>
                                                                    <td style="text-align: center">{{$salaire->mois}}</td>
                                                                    <td style="text-align: center">{{$salaire->salaire_net}} FCFA</td>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('footer')