<?php
$servername = "algeai.fun";
$username = "root";
$password = "";
$dbname = "product_listing";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$price_min = isset($_GET['price_min']) ? $_GET['price_min'] : 0;
$price_max = isset($_GET['price_max']) ? $_GET['price_max'] : 1000;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sale_status = isset($_GET['sale_status']) ? $_GET['sale_status'] : '';

$query = "SELECT * FROM products WHERE price BETWEEN $price_min AND $price_max";

if (!empty($category)) {
    $query .= " AND category='$category'";
}

if (!empty($sale_status)) {
    $query .= " AND sale_status='$sale_status'";
}

$query .= " LIMIT $start, $limit";
$result = $conn->query($query);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

$conn->close();
?>
