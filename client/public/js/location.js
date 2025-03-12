goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

//create map
var map = new goongjs.Map({
    container: 'map',
    style: 'https://tiles.goong.io/assets/goong_map_web.json',
    center: [105.75005, 10.03202], //[lng,lat]
    zoom: 13,
});

var locations = [
    { name: "_nguyenvanlinh", lngLat: [105.75005, 10.03202] },
    { name: "_nguyenvancu", lngLat: [105.76169, 10.03979] },
    { name: "_tranhoangna", lngLat: [105.74947, 10.02501] },
    { name: "_3thang2", lngLat: [105.77019, 10.02732] }

];

var markerHeight = 40,
    markerRadius = 10,
    linearOffset = 25;

var popupOffsets = {
    'top': [0, 0],
    'top-left': [0, 0],
    'top-right': [0, 0],
    'bottom': [0, -markerHeight],
    'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'left': [markerRadius, (markerHeight - markerRadius) * -1],
    'right': [-markerRadius, (markerHeight - markerRadius) * -1]
};

locations.forEach(location => {
    new goongjs.Marker({ color: "#33539e" })
        .setLngLat(location.lngLat)
        .addTo(map);

    new goongjs.Popup({
        offset: popupOffsets,
        className: 'pupup',
        closeButton: false,
        closeOnClick: false
    })
        .setLngLat(location.lngLat)
        .setHTML("<span>NVD's Pizzeria</span>")
        .addTo(map);
});

const coordinates = [
    {
        "lat": 10.02738,
        "lng": 105.77011
    },
    {
        "lat": 10.02743,
        "lng": 105.77015000000002
    },
    {
        "lat": 10.02852,
        "lng": 105.77112000000001
    },
    {
        "lat": 10.02865,
        "lng": 105.77123
    },
    {
        "lat": 10.02904,
        "lng": 105.77158000000001
    },
    {
        "lat": 10.02921,
        "lng": 105.77173
    },
    {
        "lat": 10.029990000000002,
        "lng": 105.77242000000001
    },
    {
        "lat": 10.03011,
        "lng": 105.77229000000001
    },
    {
        "lat": 10.029620000000001,
        "lng": 105.77187
    }
]

// Chuyển đổi dữ liệu sang đúng định dạng GeoJSON
const geoJSONCoordinates = coordinates.map(coord => [coord.lng, coord.lat]);

console.log(geoJSONCoordinates)

// map.on('load', function () {
//     map.addSource('route', {
//         'type': 'geojson',
//         'data': {
//             'type': 'Feature',
//             'properties': {},
//             'geometry': {
//                 'type': 'LineString',
//                 'coordinates': geoJSONCoordinates
//             }
//         }
//     });
//     map.addLayer({
//         'id': 'route',
//         'type': 'line',
//         'source': 'route',
//         'layout': {
//             'line-join': 'round',
//             'line-cap': 'round'
//         },
//         'paint': {
//             'line-color': '#33539e',
//             'line-width': 8
//         }
//     });
// });