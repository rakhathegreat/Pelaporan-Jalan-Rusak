<x-filament-panels::page>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Map container -->
    <div id="map" style="height: 500px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi peta
            var map = L.map('map').setView([-7.371628450097823, 108.52700299463467], 15);

            // Tambahkan tile OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Data dari server (Laravel ke JS)
            var locations = @json($locations);

            // Tambahkan marker berdasarkan data dari database
            locations.forEach(function(location) {
                var coords = location.koordinat.split(',');
                var latitude = parseFloat(coords[0]);
                var longitude = parseFloat(coords[1]);

                // Tambahkan marker
                L.marker([latitude, longitude], {
                    icon: L.icon({
                        iconUrl: 'https://cdn-icons-png.flaticon.com/512/564/564619.png',
                        iconSize: [30, 30],
                        iconAnchor: [15, 30],
                        popupAnchor: [0, -30]
                    })
                }).addTo(map).bindPopup(
                    `<b>${location.nama_jalan}</b><br>
                    Kota: ${location.kota}<br>
                    Lingkungan: ${location.lingkungan}<br>
                    Kondisi: ${location.kondisi}`
                );
            });
        });
    </script>
</x-filament-panels::page>
