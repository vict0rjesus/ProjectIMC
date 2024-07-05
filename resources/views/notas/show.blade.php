<x-layout title="Calcular IMC">

  <div class="titulo">

    <h1>Histórico de Notas</h1>

    <button type="button" class="btn btn-default btn-lg" data-bs-toggle="modal" data-bs-target="#myModal2">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
       <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
       <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
      </svg>
          </button>

    <div class="modal" tabindex="-1" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Media</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($showNotas as $notas)
      <tr>
        <th scope="row">{{$notas->id}}</th>
        <td>{{$notas->nome}}</td>
        <td>{{$notas->media}}</td>
        <td>{{$notas->status}}</td>
        <td>
          <form id="deleteForm{{$notas->id}}" action="{{ route('notas.delete',
            ['id' => $notas->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-default btn-lg" data-bs-toggle="modal">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
              </svg>
            </button>
          </form>
        </td>


        <td>
          <button type="button" class="btn btn-default btn-lg" data-bs-toggle="modal" data-bs-target="#myModal{{$notas->id}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
              <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
            </svg>
          </button>
        </td>
      </tr>

      <div class="modal" tabindex="-1" id="myModal{{$notas->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Atualizar tabela</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('notas.update',['id' => $notas->id])}}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="Nome">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="novo_nome" value="{{$notas->nome}}">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" placeholder="media">Media</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="novo_media" value="{{$notas->media}}">
    </div>
  </div>
  <select class="form-select" aria-label="Default select example" name="novo_status" value="{{$notas->status}}">
   <option selected>Status do aluno</option>
   <option value="Aprovado">Aprovado</option>
   <option value="Reprovado">Reprovado</option>
  </select><br>
  <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  </table>

</x-layout>