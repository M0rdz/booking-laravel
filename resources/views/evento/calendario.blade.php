@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Calendario')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="container">
                <div id="agenda">
                </div>
             </div>

            
           <!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del evento</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                
                                <form action="" id="formularioEventos">

                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="id">ID:</label>
                                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="id">Color:</label>
                                        <input type="color" class="form-control" name="color" id="color" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Título</label>
                                        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el título del evento">
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="start">start</label>
                                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="end">end</label>
                                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted">Help text</small>
                                    </div>


                                </form>

                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
