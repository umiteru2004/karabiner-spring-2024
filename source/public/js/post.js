let map;
let marker = null;
let position;

async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
        mapId: "DEMO_MAP_ID",
    });

    map.addListener("click", (e) => {
        placeMarkerAndPanTo(e.latLng, map);
    });
}

async function placeMarkerAndPanTo(latLng, map) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    if (marker) marker.map = null;
    marker = new AdvancedMarkerElement({
        map,
        position: latLng,
    });
    map.panTo(latLng);

    position = latLng;
}

initMap();

const onCreateButtonClick = () => {
    const lat = position.lat();
    const lng = position.lng();

    const url = new URL("posts/create", window.location.href);
    url.searchParams.set("lat", lat);
    url.searchParams.set("lng", lng);

    location.href = url;
};
