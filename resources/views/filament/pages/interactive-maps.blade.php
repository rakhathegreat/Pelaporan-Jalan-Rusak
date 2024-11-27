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
            var map = L.map('map').setView([-7.371628450097823, 108.52700299463467], 13);

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

            locations.forEach(location => {
                if (location.koordinat) {
                    var latitude = location.koordinat.latitude; // Latitude dari relasi
                    var longitude = location.koordinat.longitude; // Longitude dari relasi

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
        });
    </script>
</x-filament-panels::page>
