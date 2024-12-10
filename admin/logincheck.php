<?php
session_start();

if (!isset($_SESSION['admin_id']) && !isset($_SESSION['user_id'])) {
    // If neither admin_id nor user_id is set, redirect to login page
    header('location:index.php');
    exit();
}

// Optional: Debugging messages (remove in production)
// echo "Admin ID: " . ($_SESSION['admin_id'] ?? 'Not set');
// echo "User ID: " . ($_SESSION['user_id'] ?? 'Not set');
?>
