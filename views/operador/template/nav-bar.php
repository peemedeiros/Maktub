<nav class="navbar mb-3 navbar-dark bg-primary navbar-expand-lg">
    <a class="navbar-brand font-weight-bold" href="#">Painel - Operador</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active nav-hover" href="operador-home.php?operador=<?=$_GET['operador']?>">Cotações</a>
            <a class="nav-item nav-link active nav-hover" href="operador-planos.php?operador=<?=$_GET['operador']?>">Gerencie seus planos</a>
            <a class="btn btn-danger right text-white" href="operador-login.php"> SAIR </a>
        </div>
    </div>
</nav>