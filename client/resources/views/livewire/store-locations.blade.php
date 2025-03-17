<div>

    <div class="container">

        <div class="row mt-5">
            <div class="col-9">
                <div id='map' wire:ignore></div>

            </div>

            <div class="col-3">
                <div class="place-wrap">

                    <p class="place-title">Danh Sách Cửa Hàng</p>

                    <div class="d-flex flex-column row-gap-3" wire:ignore>

                        @foreach ($store_locations as $store_location)
                            <div class="place-item">
                                <div class="place-name">{{ $store_location['name'] }}</div>
                                {{-- <div class="place-distance">( 35km - 12 phút )</div> --}}
                                <div class="place-time"><span>Open</span><span>: {{ $store_location['open'] }}</span>
                                </div>
                                <div class="place-address"><span>Đc</span><span>:
                                        {{ $store_location['address'] }}</span></div>
                                <button class="nice-button mt-3 drt-btn" data-lat="{{ $store_location['latitude'] }}"
                                    data-lng="{{ $store_location['longitude'] }}">Xem
                                    đường đi</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        let points = []
        let current_lat = null
        let current_lng = null

        let des_lat = null
        let des_lng = null

        $(document).ready(function() {

            navigator.geolocation.getCurrentPosition(

                (position) => {

                    console.log('Vị trí của bạn:', position.coords.latitude, position.coords
                        .longitude);

                    current_lat = position.coords.latitude
                    current_lng = position.coords.longitude

                    $wire.$set('current_lat', current_lat)
                    $wire.$set('current_lng', current_lng)

                    $wire.$set('des_lat', des_lat)
                    $wire.$set('des_lng', des_lng)

                    $wire.dispatch('show_direction')
                },
                (error) => {
                    console.error('Không thể lấy vị trí:', error);
                }
            );

            $('.drt-btn').click(function() {

                $('.place-item').css('border', '1px #e3e3e3 solid')
                $(this).closest('.place-item').css('border', '1px #a5678e solid')

                des_lat = $(this).data("lat")
                des_lng = $(this).data("lng")

                if (current_lat == null && current_lng == null) {

                    navigator.geolocation.getCurrentPosition(

                        (position) => {

                            console.log('Vị trí của bạn:', position.coords.latitude, position.coords
                                .longitude);

                            current_lat = position.coords.latitude
                            current_lng = position.coords.longitude

                            $wire.$set('current_lat', current_lat)
                            $wire.$set('current_lng', current_lng)

                            $wire.$set('des_lat', des_lat)
                            $wire.$set('des_lng', des_lng)

                            $wire.dispatch('show_direction')
                        },
                        (error) => {
                            console.error('Không thể lấy vị trí:', error);
                        }
                    );

                } else {

                    $wire.$set('des_lat', des_lat)
                    $wire.$set('des_lng', des_lng)

                    $wire.dispatch('show_direction')
                }


            })
        })

        goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';
        $store_locations = $wire.$get('store_locations')
        //create map
        let map = new goongjs.Map({
            container: 'map',
            style: 'https://tiles.goong.io/assets/goong_map_web.json',
            center: [105.75005, 10.03202], //[lng,lat]
            zoom: 13,
        });

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

        $store_locations.forEach(store_location => {

            new goongjs.Marker({
                    color: "#00abed"
                })
                .setLngLat([store_location.longitude, store_location.latitude])
                .addTo(map);

            new goongjs.Popup({
                    offset: popupOffsets,
                    className: 'store-location',
                    closeButton: false,
                    closeOnClick: false
                })
                .setLngLat([store_location.longitude, store_location.latitude])
                .setHTML("<span>NVD's Pizzeria</span>")
                .addTo(map);
        });

        $wire.on('updated-points', () => {

            points = $wire.$get('points')
            let geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

            if (map.getSource('route')) {
                // Nếu đã có nguồn 'route', chỉ cần cập nhật dữ liệu

                map.getSource('route').setData({
                    'type': 'Feature',
                    'properties': {},
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': geoJSONCoordinates
                    }
                });
            } else {

                new goongjs.Marker({
                        color: "red"
                    })
                    .setLngLat([current_lng, current_lat])
                    .addTo(map);

                new goongjs.Popup({
                        offset: popupOffsets,
                        className: 'my-location',
                        closeButton: false,
                        closeOnClick: false
                    })
                    .setLngLat([current_lng, current_lat])
                    .setHTML("<span>Bạn ở đây</span>")
                    .addTo(map);

                map.addSource('route', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': geoJSONCoordinates
                        }
                    }
                });
                map.addLayer({
                    'id': 'route',
                    'type': 'line',
                    'source': 'route',
                    'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    'paint': {
                        'line-color': '#00abed',
                        'line-width': 8
                    }
                });


            }
            map.flyTo({
                center: [des_lng, des_lat],
                zoom: 15,

            });


        })
    </script>
@endscript

@section('js')
@endsection
