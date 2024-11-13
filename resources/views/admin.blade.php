<div class="card" >
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-md-3">@if(isset($edit) && $edit)Editar Sala @else Crear Sala @endif</div>
            <div class="col 1 d-flex flex-row-reverse color-white">
                <a data-bs-toggle="collapse" data-bs-target="#collapseBody"  aria-expanded="true" aria-controls="collapseBody">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                      </svg>
                </a>
            </div>
        </div>
    </div>
    @if(isset($edit) && $edit)
        <div class="collapse show" id="collapseBody">
            <div class="card-body">
                <div>
                    <form action="{{ url('room/edit/save/' . $room->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la sala</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$room->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea style="height: auto" rows="5" cols="50" class="form-control" name="description" placeholder="Leave a comment here" id="description">{{ $room->description}}</textarea>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="collapse" id="collapseBody">
            <div class="card-body">
                <div>
                <form action="{{ route('room') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la sala</label>
                        <input type="text" name="name" class="form-control" id="name" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Alguna descripción" id="description"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

  @if(!isset($edit))
  <div class="card mt-2">
    <div class="card-header">
        Salas
    </div>
    <div class="card-body">
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2">Nombre</th>
                        <th scope="col" class="col-md-4">Descripcion</th>
                        <th scope="col" class="col-md-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $key => $room)
                        <tr class="">
                            <td scope="row">{{ $room->name}}</td>
                            <td>{{ $room->description}}</td>
                            <td><form method="GET" action="{{ url('room/edit/' . $room->id) }}" style="display: contents;">
                                <button type="submit"  class=" btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar sala" data-action="edit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg></button>
                                </form>
                                <a class="eliminate btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar sala" onclick="return confirm('Seguro de eliminar la sala?')" href="{{route('roomDelete', $room->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                        <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                      </svg>
                                    </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="card mt-5" >
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-md-3">Crear Reserva</div>
            <div class="col 1 d-flex flex-row-reverse color-white">
                <a data-bs-toggle="collapse" data-bs-target="#collapseBodyR"  aria-expanded="true" aria-controls="collapseBody">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                      </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseBodyR">
        <div class="card-body">
            <div >
                <form action="{{ route('reserve') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="room_id">Sala</label>
                        <div class="form-group">
                            <select class="form-control @error('room_id') is-invalid @enderror" name="room_id"  id="room_id" style="width: 100% !important;">
                                <option value>[Seleccione]</option>
                                @foreach ($rooms as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="date_reserve" class="form-label">Fecha Reserva</label>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' name="date_reserve" id="date_reserve" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker({
                                    format: 'YYYY/\M/\DD HH'
                                });
                            });
                        </script>
                        @if($errors->has('date_reserve'))
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $errors->first('date_reserve') }}</strong>
                            </span>
                         @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="card mt-2">
    <div class="card-header">
        Filtro de Reserva
    </div>
    <div class="card-body">
        <form action="{{ route('reserveSearch') }}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="room_id">Sala</label>
                <div class="form-group">
                    <select class="form-control @error('room_id') is-invalid @enderror" name="room_id"  id="room_id" style="width: 100% !important;" required>
                        <option value>[Seleccione]</option>
                        @foreach ($rooms as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a class="btn btn-primary" href="{{ route('home')}}">Todos</a>
        </form>
    </div>
  </div>
  <div class="card mt-2">
    <div class="card-header">
        Reservas
    </div>
    <div class="card-body">
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">Sala</th>
                        <th scope="col-md-2">Fecha Reserva</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reserves as $reserve)
                    <tr class="">
                        <td>{{ $reserve->room->name }}</td>
                        <td scope="row">{{ $reserve->date_reserve}}</td>
                        <td>{{ $reserve->status}}</td>
                        <td><a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aprovar reserva" onclick="return confirm('Seguro de aprobar la reserva?')" href="{{route('approveReserve', $reserve->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                              </svg>
                            </a>
                            <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Cancelar reserva" onclick="return confirm('Seguro de cancelar la reserva?')" href="{{route('cancelReserve', $reserve->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                  </svg>
                                </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
  @endif




