  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">All quizes</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ (Request::segment(2) == 'questions')? 'active' : '' }}"><a href="/"><i class="fa fa-question-circle"></i> <span>Questions</span></a></li>
    <li class = "{{ (Request::segment(2) == 'response')? 'active' : '' }}"><a href="/admin/response"><i class="fa fa-list"></i> <span>Response logging</span></a></li>

  </ul>
  <!-- /.sidebar-menu -->
