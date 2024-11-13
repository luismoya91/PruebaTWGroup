<div class="card mt-5" >
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-md-3">Crear Reserva</div>
            <div class="col 1 d-flex flex-row-reverse color-white">
                <a data-bs-toggle="collapse" data-bs-target="#collapseBodyR"  aria-expanded="false" aria-controls="collapseBody">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                      </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="collapse show" id="collapseBodyR">
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




