@include('admin.header')

@include('admin.sidebar')

<div id="page-content-wrapper">
    <div id="page-content">

        <div class="container">

            <script type="text/javascript" src="assets/widgets/parsley/parsley.js"></script>
            <!-- Chosen -->

            <link href='assets/calendrier/fullcalendar.min.css' rel='stylesheet' />
            <link href='assets/calendrier/fullcalendar.print.min.css' rel='stylesheet' media='print' />
            <script src='assets/calendrier/lib/moment.min.js'></script>
            <script src='assets/calendrier/fullcalendar.min.js'></script>
            <script>

                $(document).ready(function() {
                    var e= [];
                    $.ajax({
                        url: 'repertoire_planning',
                        type: "GET",
                        dataType: "JSON",
                        async: false
                    }).done(function(r){
                        e= r;
                    })

                    $('#calendrier').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        navLinks: true, 
                        selectable: true,
                        events: e
                 });

                });

            </script>

            <div id="page-title">
                <h2>Planning</h2>
                <p>...</p>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">

                    </h3>
                    <div class="example-box-wrapper">
                        <ul class="nav-responsive nav nav-tabs"><li class="dropdown pull-right tabdrop active"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><i class="glyph-icon icon-align-justify"></i> <b class="caret"></b></a></li>
                            <li class="active"><a href="#tab1" data-toggle="tab">Planning des projets</a></li>   
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div id='calendrier'></div>
                            </div>
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

@include('admin.footer')