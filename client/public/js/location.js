goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

//create map
var map = new goongjs.Map({
    container: 'map',
    style: 'https://tiles.goong.io/assets/goong_map_web.json',
    center: [105.75005, 10.03202], //[lng,lat]
    zoom: 13,
});

//create markers
var _nguyenvanlinh_marker = new goongjs.Marker({
        color: "#33539e",

})
    .setLngLat([105.75005, 10.03202])
    .addTo(map);

var _nguyenvancu_marker = new goongjs.Marker({
    color: "#33539e",

})
    .setLngLat([105.76169, 10.03979])
    .addTo(map);

var _tranhoangna_marker = new goongjs.Marker({
    color: "#33539e",

})
    .setLngLat([105.74947, 10.02501])
    .addTo(map);

var _3thang2_marker = new goongjs.Marker({
    color: "#33539e",

})
    .setLngLat([105.77019, 10.02732])
    .addTo(map);


//create popup
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
var popup = new goongjs.Popup({
    offset: popupOffsets,
    className: 'pupup',
    closeButton: false,
    closeOnClick: false
})
    .setLngLat([105.75005, 10.03202])
    .setHTML("<span>NVD's Pizzeria</span>")
    .setMaxWidth("300px")
    .addTo(map);

// get my location
// navigator.geolocation.getCurrentPosition(
//     (position) => {
//         console.log('Vị trí của bạn:', position.coords.latitude, position.coords.longitude);
//     },
//     (error) => {
//         console.error('Không thể lấy vị trí:', error);
//     }
// );

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
    },
    {
        "lat": 10.027750000000001,
        "lng": 105.77021
    },
    {
        "lat": 10.02754,
        "lng": 105.77003
    },
    {
        "lat": 10.027230000000001,
        "lng": 105.76977000000001
    },
    {
        "lat": 10.026610000000002,
        "lng": 105.76925000000001
    },
    {
        "lat": 10.02551,
        "lng": 105.76832
    },
    {
        "lat": 10.02515,
        "lng": 105.76801
    },
    {
        "lat": 10.02468,
        "lng": 105.7676
    },
    {
        "lat": 10.02397,
        "lng": 105.76698
    },
    {
        "lat": 10.02332,
        "lng": 105.76637000000001
    },
    {
        "lat": 10.022960000000001,
        "lng": 105.76607000000001
    },
    {
        "lat": 10.02219,
        "lng": 105.76545000000002
    },
    {
        "lat": 10.02149,
        "lng": 105.76484
    },
    {
        "lat": 10.021550000000001,
        "lng": 105.76471000000001
    },
    {
        "lat": 10.022390000000001,
        "lng": 105.76354
    },
    {
        "lat": 10.02255,
        "lng": 105.76332000000001
    },
    {
        "lat": 10.02269,
        "lng": 105.76312000000001
    },
    {
        "lat": 10.02308,
        "lng": 105.76257000000001
    },
    {
        "lat": 10.023370000000002,
        "lng": 105.76217000000001
    },
    {
        "lat": 10.02425,
        "lng": 105.76091000000001
    },
    {
        "lat": 10.0244,
        "lng": 105.76068000000001
    },
    {
        "lat": 10.02452,
        "lng": 105.76052000000001
    },
    {
        "lat": 10.02576,
        "lng": 105.75873000000001
    },
    {
        "lat": 10.02725,
        "lng": 105.75653000000001
    },
    {
        "lat": 10.027370000000001,
        "lng": 105.75636000000002
    },
    {
        "lat": 10.027690000000002,
        "lng": 105.75589000000001
    },
    {
        "lat": 10.02796,
        "lng": 105.75549000000001
    },
    {
        "lat": 10.02876,
        "lng": 105.75434000000001
    },
    {
        "lat": 10.029290000000001,
        "lng": 105.75364
    },
    {
        "lat": 10.02964,
        "lng": 105.75322000000001
    },
    {
        "lat": 10.03059,
        "lng": 105.75208
    },
    {
        "lat": 10.030660000000001,
        "lng": 105.75200000000001
    },
    {
        "lat": 10.031220000000001,
        "lng": 105.75134000000001
    },
    {
        "lat": 10.032060000000001,
        "lng": 105.75036000000001
    },
    {
        "lat": 10.03214,
        "lng": 105.75015
    },
    {
        "lat": 10.03218,
        "lng": 105.75009000000001
    },
    {
        "lat": 10.03223,
        "lng": 105.75004000000001
    },
    {
        "lat": 10.032050000000002,
        "lng": 105.74996000000002
    }
]

// Chuyển đổi dữ liệu sang đúng định dạng GeoJSON
// const geoJSONCoordinates = coordinates.map(coord => [coord.lng, coord.lat]);

// console.log(geoJSONCoordinates)

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