
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cafe2";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['item_name'], $_POST['price'], $_POST['quantity'])) {
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];

    $sql = "INSERT INTO order_place (item_name, price, quantity) VALUES ('$item_name', $price, $quantity)";
    
    if ($conn->query($sql)) {
        echo "✅ Order placed successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
} else {
    echo "No data received.";
}

$conn->close();
?>
