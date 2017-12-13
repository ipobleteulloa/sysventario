  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">SySVentario</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('mantenciones/') }}">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Mantenciones</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{ url('equipos/') }}">
            <i class="fa fa-fw fa-desktop"></i>
            <span class="nav-link-text">Equipos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Impresoras">
          <a class="nav-link" href="{{ url('impresoras/') }}">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Impresoras</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Okidatas">
          <a class="nav-link" href="{{ url('okidatas/') }}">
            <i class="fa fa-fw fa-file-text-o"></i>
            <span class="nav-link-text">Okidatas</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Zebras">
          <a class="nav-link" href="{{ url('zebras/') }}">
            <i class="fa fa-fw fa-tags"></i>
            <span class="nav-link-text">Zebras</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#otros" data-parent="#Accordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Otros</span>
          </a>
          <ul class="sidenav-second-level collapse" id="otros">
            <li>
              <a href="{{ url('sistemaoperativo/') }}">Sistemas Operativos</a>
            </li>
            <li>
              <a href="{{ url('sectores/') }}">Sectores</a>
            </li>
            <li>
              <a href="{{ url('encargados/') }}">Encargados</a>
            </li>
            <!-- <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li> -->
          </ul>
        </li>
      </ul> 


      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>



      <ul class="navbar-nav ml-auto">
        @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link"> {{ Auth::user()->name }} </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::asset('/logout') }}">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        @endif

        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::asset('/login') }}">
            <i class="fa fa-fw fa-sign-in"></i>Login</a>
        </li>
        @endif
      </ul>


    </div>
  </nav>