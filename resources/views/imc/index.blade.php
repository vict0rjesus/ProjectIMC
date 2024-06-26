<x-layout title=IMC>

<div class="container">
<form method="post" action="/imc/store">
  @csrf
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="Nome">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="nome">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="Peso">Peso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="peso">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label" placeholder="Altura">Altura</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" name="altura">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Calcular</button>
</form>
</div>

<label>RESULTADO</label><br>
<label>IMC: {{$resultado["imc"]}}</label><br>
<label>Classe: {{$resultado["faixa"]}}</label>
<br><br><br>

</x-layout>