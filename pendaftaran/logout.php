<?php
session_start();

// Hancurkan semua data session login
$_SESSION = [];
session_unset();
session_destroy();

// Tendang balik dengan pesan aman ke login.php
echo "<script>
    alert('Anda berhasil keluar dari sistem admin.');
    window.location.href = 'login.php';
</script>";
exit;
?>