<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <img src="/img/lovidea.png" width="40" alt="lovidea">
      <a class="navbar-brand" href="/">LovIdea Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active ==="home") ? 'active' : ''}}" href="/">Halaman Utama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active ==="about") ? 'active' : ''}}" href="/about">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active ==="categories") ? 'active' : ''}}" href="/categories">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active ==="posts") ? 'active' : ''}}" href="/blog">Blog</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto ">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selamat datang kembali, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active ==="login") ? 'active' : ''}}"><i class="bi bi-box-arrow-in-right"></i> LOGIN</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>