@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                       @can('crear-proyecto')
                        <a class="btn btn-warning" href="{{ route('proyectos.create') }}">Nuevo Proyecto</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Duracion</th>
                                    <th style="color:#fff;">Presupuesto</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($proyectos as $proyecto)
                            <tr>
                                <td style="display: none;">{{ $proyecto->id }}</td>
                                <td>{{ $proyecto->nombre }}</td>
                                <td>{{ $proyecto->estado }}</td>
                                <td>{{ $proyecto->duracion }}</td>
                                <td>{{ $proyecto->presupuesto }}</td>
                                <td>
                                    <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">
                                        @can('editar-proyecto')
                                        <a class="btn btn-info" href="{{ route('proyectos.edit',$proyecto->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-proyecto')
                                        <button type="submit" class="btn btn-danger">Borrar Proyecto</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $proyectos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
