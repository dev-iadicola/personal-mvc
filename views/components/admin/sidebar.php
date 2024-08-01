<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-4">Sidebar</span>
  </a>
  <hr>
  <?php
  function isActive($menuItem, $currentPage)
  {
    return strtolower($menuItem) === strtolower($currentPage) ? 'active' : '';
  }
  $page = $this->mvc->request->getRequestPath();

  echo $page;


  ?>
  <ul class="nav nav-pills flex-column mb-auto  ">
    <li class="nav-item my-2">
      <a href="/admin/dashboard" class="nav-link text-white <?php echo isActive('/admin/dashboard', $page) ?>" aria-current="page">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#home"></use>
        </svg>
        Dashboard
      </a>
    </li>
    <li class="nav-item my-2">
      <div class=" ">
        <button class="btn btn-light w-100 text-left px-4" type="button" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="false" aria-controls="collapseExample">
          Gestione Portfolio
        </button>

        <div class="collapse" id="collapsePortfolio">
          <div class="card card-body mt-2">
            <a class="dropdown-item" href="/admin/home">Gestione Home Page</a>
            <a class="dropdown-item" href="/admin/contatti">Contatti</a>
            <a class="dropdown-item" href="/admin/portfolio">Portfolio</a>
            <a class="dropdown-item" href="/admin/progetti">Progetti</a>
          </div>
        </div>
      </div>

    </li>


    <li>

      <div class=" my-2">
        <button class="btn btn-light w-100 text-left px-4" type="button" data-toggle="collapse" data-target="#collapseLaws" aria-expanded="false" aria-controls="collapseExample">
          Laws
        </button>

        <div class="collapse" id="collapseLaws">
          <div class="card card-body mt-2">
            <a class="dropdown-item" href="/admin/laws/cookie-policy">Cookie Policy</a>
            <a class="dropdown-item" href="/admin/laws/termini-condizioni">Termini e Condizioni</a>
            <a class="dropdown-item" href="/admin/laws/privacy-policy">Privacy Policy</a>
          </div>
        </div>
      </div>

    </li>


    <li>
      <div class=" my-2">
        <button class="btn btn-light w-100 text-left px-4" type="button" data-toggle="collapse" data-target="#collapseLaws" aria-expanded="false" aria-controls="collapseExample">
          User
        </button>

        <div class="collapse" id="collapseLaws">
          <div class="card card-body mt-2">
            <a class="dropdown-item" href="/admin/laws/cookie-policy">Impostazioni</a>
            <a class="dropdown-item" href="/admin/laws/termini-condizioni">Cambia Password</a>
            <a class="dropdown-item" href="/admin/laws/privacy-policy">Edit Profile</a>
          </div>
        </div>
      </div>
    </li>

    <li class="nav-item my-5">
      <a href="/admin/logout" class=" text-white text-decoration-none no-underline" aria-current="page">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#logout"></use>
        </svg>
      <strong>  Log-out</strong> <i class=" ml-3 fa fa-sign-out" aria-hidden="true"></i>

      </a>
    </li>
  </ul>
  <hr>

</div>