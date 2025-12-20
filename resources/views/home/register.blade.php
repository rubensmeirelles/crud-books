<h5 class="mb-3">Cadastrar</h5>
<form action="{{ route('user.register') }}" method="POST">
    @csrf
    <input name="name" value="{{ old('name') }}" type="text" class="form-control mb-2" placeholder="Nome">
    <input name="username" value="{{ old('username') }}" type="text" class="form-control mb-2" placeholder="Username">
    <input name="email" value="{{ old('email') }}" type="email" class="form-control mb-2" placeholder="Email">
    <input name="password" type="password" class="form-control mb-2" placeholder="Senha">
    <button class="btn btn-success w-100">Registrar</button>
</form>
