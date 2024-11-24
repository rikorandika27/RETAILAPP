<?php
if (!function_exists('formatrupiah')) {
    function formatrupiah($angka) {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}
?>