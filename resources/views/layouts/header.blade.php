<!-- Logo -->
<a href="index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>Q</b>uiz</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Quiz</b> Creator</span>
</a>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <li class="nav navbar-nav">
      <div >
            <a  class="btn btn-default" style="margin:6px; background-color:white !important;"href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </div>
    </li>
  </div>
</nav>
