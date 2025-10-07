<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div 
        x-data="mapSelector({
            latitude: $wire.entangle('data.latitude'),
            longitude: $wire.entangle('data.longitude'),
            zoomLevel: $wire.entangle('data.zoom_level')
        })"
        x-init="initMap()"
        class="relative"
    >
        <div 
            x-ref="map" 
            id="map-selector"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600"
            style="height: 400px;"
        ></div>
        
        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            <span x-show="latitude && longitude">
                📍 Koordinat terpilih: 
                <span x-text="parseFloat(latitude).toFixed(6)"></span>, 
                <span x-text="parseFloat(longitude).toFixed(6)"></span>
            </span>
            <span x-show="!latitude || !longitude">
                Klik pada peta untuk memilih lokasi
            </span>
        </div>
    </div>
</x-dynamic-component>

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
function mapSelector(config) {
    return {
        map: null,
        marker: null,
        latitude: config.latitude,
        longitude: config.longitude,
        zoomLevel: config.zoomLevel,
        
        initMap() {
            // Default ke Ambon, Maluku jika tidak ada koordinat
            const defaultLat = this.latitude || -3.6500;
            const defaultLng = this.longitude || 128.1900;
            const defaultZoom = this.zoomLevel || 15;
            
            // Inisialisasi map
            this.map = L.map(this.$refs.map).setView([defaultLat, defaultLng], defaultZoom);
            
            // Tambahkan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(this.map);
            
            // Tambahkan marker jika sudah ada koordinat
            if (this.latitude && this.longitude) {
                this.addMarker(this.latitude, this.longitude);
            }
            
            // Event listener untuk klik pada map
            this.map.on('click', (e) => {
                this.latitude = e.latlng.lat;
                this.longitude = e.latlng.lng;
                this.addMarker(e.latlng.lat, e.latlng.lng);
            });
            
            // Watch untuk perubahan dari input manual
            this.$watch('latitude', (value) => {
                if (value && this.longitude) {
                    this.addMarker(parseFloat(value), parseFloat(this.longitude));
                    this.map.setView([parseFloat(value), parseFloat(this.longitude)]);
                }
            });
            
            this.$watch('longitude', (value) => {
                if (this.latitude && value) {
                    this.addMarker(parseFloat(this.latitude), parseFloat(value));
                    this.map.setView([parseFloat(this.latitude), parseFloat(value)]);
                }
            });
            
            this.$watch('zoomLevel', (value) => {
                if (value) {
                    this.map.setZoom(parseInt(value));
                }
            });
        },
        
        addMarker(lat, lng) {
            // Hapus marker lama jika ada
            if (this.marker) {
                this.map.removeLayer(this.marker);
            }
            
            // Tambahkan marker baru
            this.marker = L.marker([lat, lng], {
                draggable: true
            }).addTo(this.map);
            
            // Update koordinat saat marker di-drag
            this.marker.on('dragend', (e) => {
                const position = e.target.getLatLng();
                this.latitude = position.lat;
                this.longitude = position.lng;
            });
            
            // Center map ke marker
            this.map.setView([lat, lng]);
        }
    }
}
</script>
@endpush