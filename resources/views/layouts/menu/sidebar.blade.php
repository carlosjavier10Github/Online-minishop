<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <nav class="nav flex-column">
    <a class="nav-link active" href="#">Active</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </nav>


</div>



<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
      <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
      <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
      <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
</nav>


@isset($forhome)  {{-- si se usa con include no va este bloque , si se usa con extends si va este bloque --}}
{{-- expr --}}
<div id="main">
  <!-- Add all your websites page content must be into the label   <main class="py-4"> -->
    <main class="py-4">
      @yield('content')

    </main>
  </div>
@endisset


