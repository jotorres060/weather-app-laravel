let latitude, longitude;

if (document.getElementById("latitude") !== null && document.getElementById("longitude") !== null) {
    latitude = document.getElementById("latitude").value;
    longitude = document.getElementById("longitude").value;
}

if (latitude !== undefined && longitude !== undefined) {
    let map = createMap(latitude, longitude);
    createMarker(map, latitude, longitude);
    createPopup(map, latitude, longitude);
}

function createMap(latitude, longitude) {
    mapboxgl.accessToken = 'pk.eyJ1Ijoiam90b3JyZXMwNjAiLCJhIjoiY2trNGU2anEwMHJpeDJwcXg4eXViMWEzbiJ9.DHFt1zvh3O8pEsmWqaNdTw';
    return new mapboxgl.Map({
        center: [longitude, latitude],
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 11
    });
}

function createMarker(map, latitude, longitude) {
    return new mapboxgl.Marker({color: "#7b1fa2"})
        .setLngLat([longitude, latitude])
        .setPopup(createPopup(map, latitude, longitude))
        .addTo(map);
}

function createPopup(map, latitude, longitude) {
    let markerHeight = 50, markerRadius = 10, linearOffset = 25;
    let popupOffsets = {
        'top': [0, 0],
        'top-left': [0,0],
        'top-right': [0,0],
        'bottom': [0, -markerHeight],
        'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
        'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
        'left': [markerRadius, (markerHeight - markerRadius) * -1],
        'right': [-markerRadius, (markerHeight - markerRadius) * -1]
    };
    return new mapboxgl.Popup({offset: popupOffsets})
        .setLngLat([longitude, latitude])
        .setHTML(getHtmlPopup())
        .setMaxWidth("300px")
        .addTo(map);
}

function getHtmlPopup() {
    let imageUrl = document.getElementById("imageUrl").value;
    let city = document.getElementById("cityName").value;
    let region = document.getElementById("region").value;
    let temperature = document.getElementById("temperature").value;
    let humidity = document.getElementById("humidity").value;

    return `
        <div class="d-flex justify-content-center">
            <img class="text-primary" src="${imageUrl}" alt="Cloud-sun" height="45" width="45">
        </div>
        <h5 class="mt-1">${city} <small>(${region})</small></h5>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Temperatura:</strong> ${temperature}°
            </li>
            <li class="list-group-item">
                <strong>Humedad:</strong> ${humidity}
            </li>
        </ul>
    `;
}

function sendForm() {
    if (document.getElementById("city").value !== "") {
        document.getElementsByTagName("form")[0].submit();
    }
}
