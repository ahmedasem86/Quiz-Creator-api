<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('layouts.head')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        @include('layouts.header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <section class="sidebar">
          @include('layouts.sidebar')
        </section>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- notification area -->
        <div class="col-md-3 pull-right">
          @include('flash::message')
        </div>

        <!-- Main content -->
        <section class="content container-fluid">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
    </div>
  </body>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Just for training
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019</strong> All rights reserved.
  </footer>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/jquery.dependent.fields/jquery.dependent.fields.js"></script>
    <!-- hide notifications -->

    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="/bower_components/jquery.repeater/jquery.repeater.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>

  <script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(350);
  </script>
  <script>
    $(document).ready(function () {
        $('#repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only) "data-repeater-item" with style="display:none;" and pass the
            initEmpty: false,
            // showing new item
            show: function () {
                $(this).slideDown();
            },
            // will be deleted.
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: false
        })
    });

  </script>
  <script type="text/javascript">
   function add_plugins () {
    tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
        ],
        a_plugin_option: true,
        a_configuration_option: 400,
      });
    }
    function add_dependents () {
      var numItems = $('.answer_type').length;
      for (var i = 0; i < numItems; i++) {
        $('select[name="answers['+i+'][answer_type]"]').attr("selected",true);
        $("input[name='answers["+i+"][image]']").dependsOn('select[name="answers['+i+'][answer_type]"]', ["1"]);
        $("textarea[name='answers["+i+"][answer_sumbit_response_html]']").dependsOn('select[name="answers['+i+'][answer_sumbit_response_type]"]', ["1"]);
        $("input[name='answers["+i+"][answer_sumbit_response]']").dependsOn('select[name="answers['+i+'][answer_sumbit_response_type]"]', ["0"]);
      }
    }

    $(document).ready(function(){
      setTimeout(()=>{
        $('select').trigger('change');
        $('.answer_image').trigger('change');

      },0)
      add_plugins();
      add_dependents();
      $("#repeater_add").on("click", function(){
        add_dependents();
        add_plugins();
        setTimeout(()=>{
          $('select').trigger('change');;
        },0)
      });
    });

  </script>

</html>
