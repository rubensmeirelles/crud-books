<h5 class="mb-3">Entrar</h5>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="text" name="username" class="form-control mb-2" placeholder="Usuário">
    <input type="password" name="password" class="form-control mb-2" placeholder="Senha">
    <button class="btn btn-primary w-100">Acessar</button>
</form>
