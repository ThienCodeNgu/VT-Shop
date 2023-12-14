<?php
// Bắt đầu session
session_start();

// Xóa session cụ thể, ví dụ 'ten_bien'
unset($_SESSION['position']);

// Trả về dữ liệu JSON để xử lý trong JavaScript
header('Content-Type: application/json');
echo json_encode(['success' => true]);
?>