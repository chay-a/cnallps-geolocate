<?php
/**
 * Plugin Name: cnalps-geo
 */


/**
 * Minimalistic geolocator Shortcode
 *
 * @param array $atts Shortcode attributes. Default empty.
 * @return string Shortcode output.
 */
function cnalps_register_geolocate_shortcode($atts = [])
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $latitude = $atts['latitude'];
    $longitude = $atts['longitude'];
    $zoom = $atts['zoom'];
    echo "
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0/leaflet.css\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0/leaflet.js\"></script>

    <div id=\"cnalps-map\" style=\"width: 100%; height: 300px;\"></div>
    <script>
        let map = L.map('cnalps-map').setView([$latitude, $longitude], $zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([$latitude, $longitude]).addTo(map)
            .bindPopup('La Tour de Crest')
            .openPopup();
    </script>
    ";
}


add_shortcode( 'CNAlpsGeolocate', 'cnalps_register_geolocate_shortcode' );