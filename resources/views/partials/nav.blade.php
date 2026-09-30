<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body py-3 px-4" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 fw-bold" href="/">WEB TI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-3">
        <li class="nav-item px-2">
          <a class="nav-link fs-5 {{ ($title ?? '') == 'Home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link fs-5 {{ ($title ?? '') == 'Berita' ? 'active' : '' }}" href="/berita">Berita</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link fs-5 {{ ($title ?? '') == 'Profile' ? 'active' : '' }}" href="/profile">Profile</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link fs-5 {{ ($title ?? '') == 'Contact' ? 'active' : '' }}" href="/contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>