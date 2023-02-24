@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Historial de Solicitud Vacaciones</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-vacacion')
                        <a class="btn btn-warning" href="{{ route ('vacaciones.create') }}">Nueva Solicitud</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="blackground-color: #6777ef">
                                <th style="color:#000000;">ID</th>
                                <th style="color:#000000;">Nombre del trabajador</th>
                                <th style="color:#000000;">Dias Disponibles del trabajador</th>
                                <th style="color:#000000;">Observaciones</th>
                                <th style="color:#000000;">Fecha de inicio</th>

                            </thead>
                            <tbody>
                                @foreach($vacaciones as $vacacion)
                                <tr>
                                    <td style="display: ;">{{ $vacacion->id }}</td>
                                    <td>{{ $vacacion->name }}</td>
                                    <td>{{ $vacacion->days_taken }}</td>
                                    <td>{{ $vacacion->observations }}</td>
                                    <td>{{ $vacacion->date_init }}</td>
                                    <td>
                                        <form action="{{ route('vacaciones.destroy', $vacacion->id)}}" method="POST">
                                            @can('editar-vacacion')
                                            <a class="btn btn-info"
                                                href="{{ route('vacaciones.edit', $vacacion->id) }}">Editar</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-vacacion')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $vacaciones->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
