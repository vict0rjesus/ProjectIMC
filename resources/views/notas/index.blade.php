<x-layout title=Notas>

<div class="container">
<form method="post" action="/notas/store">
  @csrf
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="Nome">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="nome">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="media">Media</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="media">
    </div>
  </div>
  <select class="form-select" aria-label="Default select example" name="status">
   <option selected>Status do aluno</option>
   <option value="Aprovado">Aprovado</option>
   <option value="Reprovado">Reprovado</option>
  </select><br>
  <button type="submit" class="btn btn-primary">Enviar</button>

  <a class="btn btn-primary" href="/notas/show" role="button">Alunos</a>
</form>

</div>

</x-layout>