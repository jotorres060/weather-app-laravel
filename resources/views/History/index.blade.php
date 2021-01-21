@extends ('layouts.app')
@section ('title', 'Historial')
@section ('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mt-5" style="width: 40rem;">
            <div class="card-body overflow-scroll" style="max-height: 40rem;">
                <h3 class="card-title text-center">Historial</h3>
                <hr>

                <ul class="list-group">
                    @foreach ($histories as $history)
                        <li class="list-group-item py-3">
                            <p class="fst-italic text-center text-secondary mb-0">{{ $history["created_at"] }}</p>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm text-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Ciudad</th>
                                            <th>Región</th>
                                            <th>Temperatura</th>
                                            <th>Humedad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $history["city"] }}</td>
                                            <td>{{ $history["region"] }}</td>
                                            <td>{{ $history["temperature"] }}</td>
                                            <td>{{ $history["humidity"] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Regresar -->
    <div class="mt-3 text-center">
        <a class="btn btn-warning btn-sm fw-bold" href="{{ route('weather_index') }}" title="Regresar">Regresar</a>
        <a class="btn btn-warning btn-sm fw-bold" href="{{ route('history_clear') }}" title="Limpiar">Limpiar</a>
    </div>
@endsection
