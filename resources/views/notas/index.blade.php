<x-layout title=Notas>

<div class="container">
<form method="post" action="">
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
   <option value="1">Aprovado</option>
   <option value="2">Reprovado</option>
  </select><br>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</div>

</x-layout>