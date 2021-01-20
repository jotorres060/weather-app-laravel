@extends ('layouts.app')
@section ('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mt-5" style="width: 40rem;">
            <div class="card-body">
                <h3 class="card-title text-center">Aplicación del clima</h3>
                <hr>

                <form action="{{ route("weather_get_info_by_city") }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="city">Selecciona una ciudad</label>
                        <select class="form-select cursor" name="city" id="city" required onchange="sendForm()">
                            <option value="">Seleccione...</option>
                            <option value="miami" {{ (isset($city) && $city == "miami") ? "selected" : '' }}>Miami</option>
                            <option value="orlando" {{ (isset($city) && $city == "orlando") ? "selected" : '' }}>Orlando</option>
                            <option value="newYork" {{ (isset($city) && $city == "newYork") ? "selected" : '' }}>New York</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @isset ($data)
        <!-- History -->
        <div class="mt-5 mb-2 d-flex flex-row-reverse">
            <a class="btn btn-warning btn-sm fw-bold" href="{{ route('history_index') }}" title="Ver historial">Historial</a>
        </div>

        <!-- Map -->
        <div class="card shadow">
            <div class="card-body p-0">
                <div id="map" style="height: 500px; width: 100%;"></div>

                <input type="hidden" name="imageUrl" value="{{ asset('images/cloud-sun.svg') }}" id="imageUrl">
                <input type="hidden" name="city" value="{{ $data["city"] }}" id="cityName">
                <input type="hidden" name="region" value="{{ $data["region"] }}" id="region">
                <input type="hidden" name="latitude" value="{{ $data["latitude"] }}" id="latitude">
                <input type="hidden" name="longitude" value="{{ $data["longitude"] }}" id="longitude">
                <input type="hidden" name="temperature" value="{{ $data["temperature"] }}" id="temperature">
                <input type="hidden" name="humidity" value="{{ $data["humidity"] }}" id="humidity">
            </div>
        </div>
    @endisset
@endsection
@push ('scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
    <script src="{{ asset('js/Weather/app.js') }}"></script>
@endpush
