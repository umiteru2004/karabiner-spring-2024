function initMap() {
    const map = document.getElementById("map");

    const TOKYO_TOWER = { lat: 35.6585769, lng: 139.7454506 };
    const OPT = {
        zoom: 13,
        center: TOKYO_TOWER,
    };

    const mapObj = new google.maps.Map(map, OPT);
}
