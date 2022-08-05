@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Almacenes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                       
                       @can('crear-almacen')
                        <a class="btn btn-warning" href="{{ route('almacenes.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Tipo</th>
                                    <th style="color:#fff;">Estado</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($almacenes as $almacen)
                            <tr>
                                <td style="display: none;">{{ $almacen->id }}</td>                                
                                <td>{{ $almacen->nombre }}</td>
                                <td>{{ $almacen->Tipo }}</td>
                                <td>{{ $almacen->Estado }}</td>
                                <td>
                                    <form action="{{ route('almacenes.destroy',$almacen->id) }}" method="POST">                                        
                                        @can('editar-almacen')
                                        <a class="btn btn-info" href="{{ route('almacenes.edit',$almacen->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-almacen')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-end">
                            {!! $almacenes->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
