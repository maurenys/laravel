@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Areas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @can('crear-area')
                        <a class="btn btn-warning" href="{{ route ('areas.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="blackground-color: #6777ef">
                                <th style="color:#000000;">Nombre del area</th>
                                <th style="color:#000000;">Descripcion</th>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <td style="display: none;">{{ $area->id }}</td>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->description }}</td>
                                <td>
                                    <form action="{{ route('areas.destroy', $area->id)}}" method="POST">
                                    @can('editar-area')
                                    <a class="btn btn-info" href="{{ route('areas.edit', $area->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-area')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $areas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
