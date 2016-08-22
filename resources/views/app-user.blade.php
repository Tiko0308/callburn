<!DOCTYPE html>
<html ng-app='tikoApp'>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/style.css">
    </head>
    <body>
        @yield('content')
        <script type="text/javascript" src="/bower_components/angular/angular.js"></script>
        <script type="text/javascript" src="/assets/angular/AngularController.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <!-- jQuery 2.1.4 -->
                {!! HTML::script( asset('assets/assets-admin/plugins/jQuery/jQuery-2.1.4.min.js') ) !!}
                {!! HTML::script( asset('assets/assets-admin/js/remove-content.main.js') ) !!} 
                <!-- jQuery UI 1.11.4 -->
                <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
                <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                <script>
                  $.widget.bridge('uibutton', $.ui.button);
                </script>
                <!-- Morris.js charts -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                {!! HTML::script( asset('assets/assets-admin/bootstrap/js/bootstrap.min.js') ) !!} 
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
                <!-- Sparkline -->
                {!! HTML::script( asset('assets/assets-admin/plugins/sparkline/jquery.sparkline.min.js') ) !!}
                <!-- jvectormap -->
                {!! HTML::script( asset('assets/assets-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ) !!}
                {!! HTML::script( asset('assets/assets-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ) !!}
                <!-- DataTables -->
                {!! HTML::script( asset('assets/assets-admin/plugins/datatables/jquery.dataTables.min.js') ) !!}
                {!! HTML::script( asset('assets/assets-admin/plugins/datatables/dataTables.bootstrap.min.js') ) !!}
                <!-- jQuery Knob Chart -->
                {!! HTML::script( asset('assets/assets-admin/plugins/knob/jquery.knob.js') ) !!}
                <!-- daterangepicker -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
                {!! HTML::script( asset('assets/assets-admin/plugins/daterangepicker/daterangepicker.js') ) !!}
                <!-- datepicker -->
                {!! HTML::script( asset('assets/assets-admin/plugins/datepicker/bootstrap-datepicker.js') ) !!}
                <!-- Bootstrap WYSIHTML5 -->
                
                <!-- Slimscroll -->
                {!! HTML::script( asset('assets/assets-admin/plugins/slimScroll/jquery.slimscroll.min.js') ) !!}
                <!-- FastClick -->
                {!! HTML::script( asset('assets/assets-admin/plugins/fastclick/fastclick.min.js') ) !!}
                <!-- AdminLTE App -->
                {!! HTML::script( asset('assets/assets-admin/dist/js/app.min.js') ) !!}
                {!! HTML::script( asset('assets/assets-admin/dist/js/demo.js') ) !!} 
                <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
                
                {!! HTML::script( asset('assets/assets-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ) !!}
                @yield('script')
    </body>
</html>
