<x-filament-panels::page>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Map Container -->
    <div id="map" style="height: 500px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi peta
            var map = L.map('map').setView([-7.371628450097823, 108.52700299463467], 17);

            // Simpan posisi awal peta
            var homeLatLng = [-7.371628450097823, 108.52700299463467];
            var homeZoom = 17;

            // Buat kontrol tombol "Home"
            var homeControl = L.Control.extend({
                options: {
                    position: 'topleft' // Bisa diubah ke 'topright', 'bottomleft', 'bottomright'
                },
                onAdd: function (map) {
                    // Buat elemen tombol
                    var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');

                    // Tambahkan gaya ke tombol
                    container.style.backgroundColor = 'white';
                    container.style.backgroundImage = 'url(https://img.icons8.com/material-rounded/24/000000/home.png)';
                    container.style.backgroundSize = '20px 20px';
                    container.style.backgroundPosition = 'center';
                    container.style.backgroundRepeat = 'no-repeat';
                    container.style.width = '34px';
                    container.style.height = '34px';
                    container.style.cursor = 'pointer';

                    // Tambahkan event listener
                    container.onclick = function () {
                        map.setView(homeLatLng, homeZoom); // Kembali ke posisi awal
                    };

                    return container;
                }
            });

            // Tambahkan kontrol "Home" ke peta
            map.addControl(new homeControl());

            // Tambahkan tiles OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Icon custom untuk marker
            var customIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/564/564619.png',
                iconSize: [30, 30],
                iconAnchor: [15, 30],
                popupAnchor: [0, -30],
            });

            // Data marker dari server
            var locations = @json($locations);

            // Pastikan locations tidak null atau undefined
            if (locations && Array.isArray(locations)) {
                locations.forEach(location => {
                    if (location.koordinat) {
                        var latitude = location.koordinat.latitude;
                        var longitude = location.koordinat.longitude;

                        // Konten popup
                        var popupContent = `
                            <strong>${location.nama_jalan}</strong><br>
                            <b>Lingkungan:</b> ${location.lingkungan}<br>
                            <b>RT/RW:</b> ${location.rt}/${location.rw}<br>
                            <b>Kondisi:</b> ${location.kondisi}
                        `;

                        // Tambahkan marker ke peta
                        L.marker([latitude, longitude], { icon: customIcon })
                            .addTo(map)
                            .bindPopup(popupContent);
                    }
                });
            } else {
                console.error("Data locations tidak valid atau kosong.");
            }
        });
    </script>
</x-filament-panels::page>