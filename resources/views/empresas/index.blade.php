@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Empresas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                       
                       @can('crear-empresa')
                        <a class="btn btn-warning" href="{{ route('empresas.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Ciudad</th>
                                    <th style="color:#fff;">Provincia</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($empresas as $empresa)
                            <tr>
                                <td style="display: none;">{{ $empresa->id }}</td>                                
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->ciudad }}</td>
                                <td>{{ $empresa->provincia }}</td>
                                <td>
                                    <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">                                        
                                        @can('editar-empresa')
                                        <a class="btn btn-info" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-empresa')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $empresas->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
