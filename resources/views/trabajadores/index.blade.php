@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Trabajador</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @can('crear-trabajador')
                        <a class="btn btn-warning" href="{{ route ('trabajadores.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="blackground-color: #6777ef">
                                <th style="color:#000000;">ID</th>
                                <th style="color:#000000;">Nombre del Trabajador</th>
                              
                        </thead>
                        <tbody>
                            @foreach($trabajadores as $trabajador)
                            <tr>
                                <td style="display: none;">{{ $trabajador->id }}</td>
                                <td>{{ $trabajador->name }}</td>
                                
                                <td>
                                    <form action="{{ route('trabajadores.destroy', $trabajador->id)}}" method="POST">
                                    @can('editar-trabajador')
                                    <a class="btn btn-info" href="{{ route('trabajadores.edit', $trabajador->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-trabajador')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $trabajadores->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
