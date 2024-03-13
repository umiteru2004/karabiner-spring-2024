let map;
let marker = null;

const position = { lat: -34.397, lng: 150.644 };

async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    map = new Map(document.getElementById("map"), {
        center: position,
        zoom: 8,
        mapId: "DEMO_MAP_ID",
    });

    map.addListener("click", (e) => {
        placeMarkerAndPanTo(e.latLng, map);
    });

    marker = new AdvancedMarkerElement({
        map,
        position: position,
    });
}

async function placeMarkerAndPanTo(latLng, map) {
    marker.position = latLng;
    map.panTo(latLng);

    position.lat = latLng.lat();
    position.lng = latLng.lng();
}

initMap();

const onCreateButtonClick = () => {
    const lat = position.lat;
    const lng = position.lng;

    const url = new URL("posts/create", window.location.href);
    url.searchParams.set("lat", lat);
    url.searchParams.set("lng", lng);

    location.href = url;
};
