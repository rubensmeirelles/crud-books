<!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <span><a href="{{ route('dashboard') }}"><strong>CRUD Book</strong></a></span>
    <div class="d-flex align-items-center gap-2">
      <span>Olá, <strong>{{ Auth::user()->first_name ?? 'Usuário' }}</strong></span>
      <a href="{{ route('user.index') }}" class="icon-btn"><i class="bi bi-person-circle"></i></a>
      <a href="{{ route('login.logout') }}" class="icon-btn"><i class="bi bi-box-arrow-right"></i></a>
    </div>
  </div>