  <section>
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
          <a class="navbar-brand" href="{{ route('admin.home') }}">Olá, <?= Auth::user()->name ?></a>
          <a href="{{ route('admin.search') }}" class="btn btn-outline-success"> Lista de Veículos</a>
          <a class="navbar-brand" href="{{ route('login.logout') }}">Sair <strong>x</strong></a>
      </nav>
  </section>
