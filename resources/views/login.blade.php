<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
        </style>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title> Login - OuagaSquare </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/icons/favicon.png">

        <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">

        <!-- HELPERS -->

        <link rel="stylesheet" type="text/css" href="assets/helpers/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/backgrounds.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/boilerplate.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/border-radius.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/grid.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/page-transitions.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/spacing.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/typography.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/utils.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/colors.css">

        <!-- ELEMENTS -->

        <link rel="stylesheet" type="text/css" href="assets/elements/badges.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/buttons.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/content-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/dashboard-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/forms.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/images.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/info-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/invoice.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/loading-indicators.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/menus.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/panel-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/response-messages.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/responsive-tables.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/ribbon.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/social-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/tables.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/tile-box.css">
        <link rel="stylesheet" type="text/css" href="assets/elements/timeline.css">



        <!-- ICONS -->

        <link rel="stylesheet" type="text/css" href="assets/icons/fontawesome/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="assets/icons/linecons/linecons.css">
        <link rel="stylesheet" type="text/css" href="assets/icons/spinnericon/spinnericon.css">


        <!-- WIDGETS -->

        <link rel="stylesheet" type="text/css" href="assets/widgets/accordion-ui/accordion.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/calendar/calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/carousel/carousel.css">

        <link rel="stylesheet" type="text/css" href="assets/widgets/charts/justgage/justgage.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/charts/morris/morris.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/charts/piegage/piegage.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/charts/xcharts/xcharts.css">

        <link rel="stylesheet" type="text/css" href="assets/widgets/chosen/chosen.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/colorpicker/colorpicker.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/datatable/datatable.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/datepicker/datepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/datepicker-ui/datepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/dialog/dialog.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/dropdown/dropdown.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/dropzone/dropzone.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/file-input/fileinput.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch-alt.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/ionrangeslider/ionrangeslider.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/jcrop/jcrop.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/jgrowl-notifications/jgrowl.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/loading-bar/loadingbar.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/maps/vector-maps/vectormaps.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/markdown/markdown.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/modal/modal.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/multi-select/multiselect.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/multi-upload/fileupload.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/nestable/nestable.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/noty-notifications/noty.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/popover/popover.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/pretty-photo/prettyphoto.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/progressbar/progressbar.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/range-slider/rangeslider.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/slidebars/slidebars.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/slider-ui/slider.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/tabs-ui/tabs.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/theme-switcher/themeswitcher.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/timepicker/timepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/tocify/tocify.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/tooltip/tooltip.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/touchspin/touchspin.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/uniform/uniform.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/wizard/wizard.css">
        <link rel="stylesheet" type="text/css" href="assets/widgets/xeditable/xeditable.css">

        <!-- SNIPPETS -->

        <link rel="stylesheet" type="text/css" href="assets/snippets/chat.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/files-box.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/login-box.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/notification-box.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/progress-box.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/todo.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/user-profile.css">
        <link rel="stylesheet" type="text/css" href="assets/snippets/mobile-navigation.css">

        <!-- APPLICATIONS -->

        <link rel="stylesheet" type="text/css" href="assets/applications/mailbox.css">

        <!-- Admin theme -->

        <link rel="stylesheet" type="text/css" href="assets/themes/admin/layout.css">
        <link rel="stylesheet" type="text/css" href="assets/themes/admin/color-schemes/default.css">

        <!-- Components theme -->

        <link rel="stylesheet" type="text/css" href="assets/themes/components/default.css">
        <link rel="stylesheet" type="text/css" href="assets/themes/components/border-radius.css">

        <!-- Admin responsive -->

        <link rel="stylesheet" type="text/css" href="assets/helpers/responsive-elements.css">
        <link rel="stylesheet" type="text/css" href="assets/helpers/admin-responsive.css">

        <!-- JS Core -->

        <script type="text/javascript" src="assets/js-core/jquery-core.js"></script>
        <script type="text/javascript" src="assets/js-core/jquery-ui-core.js"></script>
        <script type="text/javascript" src="assets/js-core/jquery-ui-widget.js"></script>
        <script type="text/javascript" src="assets/js-core/jquery-ui-mouse.js"></script>
        <script type="text/javascript" src="assets/js-core/jquery-ui-position.js"></script>
        <!--<script type="text/javascript" src="assets/js-core/transition.js"></script>-->
        <script type="text/javascript" src="assets/js-core/modernizr.js"></script>
        <script type="text/javascript" src="assets/js-core/jquery-cookie.js"></script>





        <script type="text/javascript">
            $(window).load(function(){
                setTimeout(function() {
                    $('#loading').fadeOut( 400, "linear" );
                }, 300);
            });
        </script>



    </head>
    <body>

        <style type="text/css">

            html,body {
                height: 100%;
                background: url('assets/image-resources/background.jpg');
            }

        </style>

        <div class="center-vertical">
            <div class="center-content row">
                @if(Session::has('error'))
                {<span style="color:red">{!!Session::get('error')!!}</span>}
                @endif
                <br>
                @if(Session::has('success'))
                {<span style="color:red">{!!Session::get('success')!!}</span>}
                @endif
                <form action="<?= URL::to('/log') ?>" method="post" id="login-validation" class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin">
                    <h3 class="text-center pad25B font-white text-transform-upr font-size-23">OuagaSquare Login <span class="opacity-80">v1.0</span></h3>
                    <div id="login-form" class="content-box bg-default">
                        <div class="content-box-wrapper pad20A">
                            <img class="mrg25B center-margin radius-all-100 display-block" src="assets/image-resources/logo_login.png" alt="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon addon-inside bg-gray">
                                        <i class="glyph-icon icon-unlock-alt"></i>
                                    </span>
                                    <input name="login" type="text" class="form-control" placeholder="Identifiant">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon addon-inside bg-gray">
                                        <i class="glyph-icon icon-unlock-alt"></i>
                                    </span>
                                    <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>

                    <div id="login-forgot" class="content-box bg-default hide">
                        <div class="content-box-wrapper pad20A">

                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address:</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon-inside bg-gray">
                                        <i class="glyph-icon icon-envelope-o"></i>
                                    </span>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="button-pane text-center">
                            <button type="submit" class="btn btn-md btn-primary">Recover Password</button>
                            <a href="login-2.html#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>  

        <script type="text/javascript" src="assets/widgets/progressbar/progressbar.js"></script>

        <script type="text/javascript" src="assets/widgets/superclick/superclick.js"></script>

        <script type="text/javascript" src="assets/widgets/input-switch/inputswitch-alt.js"></script>

        <script type="text/javascript" src="assets/widgets/slimscroll/slimscroll.js"></script>

        <script type="text/javascript" src="assets/widgets/slidebars/slidebars.js"></script>
        <script type="text/javascript" src="assets/widgets/slidebars/slidebars-demo.js"></script>

        <script type="text/javascript" src="assets/widgets/charts/piegage/piegage.js"></script>
        <script type="text/javascript" src="assets/widgets/charts/piegage/piegage-demo.js"></script>

        <script type="text/javascript" src="assets/widgets/screenfull/screenfull.js"></script>

        <script type="text/javascript" src="assets/widgets/content-box/contentbox.js"></script>

        <script type="text/javascript" src="assets/widgets/overlay/overlay.js"></script>

        <script type="text/javascript" src="assets/js-init/widgets-init.js"></script>

        <script type="text/javascript" src="assets/themes/admin/layout.js"></script>

        <script type="text/javascript" src="assets/widgets/theme-switcher/themeswitcher.js"></script>

    </body>
</html>