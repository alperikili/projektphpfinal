<?php
session_start();
require_once './Users.php';
require_once './Cart.php';

$user = new Users();
if (!$user->isLoggedIn()) {
    header("location:./signing.php");
    exit;
}

$cart = new Cart();

// Handle removal of a product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $cart->removeProduct($_POST['product_id']);
}

$products = $cart->getAllProductsFromCart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Your Cart</title>
</head>
<body>
<div class="container mt-4">

    <?php if (count($products) > 0): ?>
        <a class="btn btn-danger mb-3" href="/reset-session.php">Empty Cart</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $total_quantity = 0;

                foreach ($products as $product):
                    $row_total = $product['price'] * $product['quantity'];
                    $total += $row_total;
                    $total_quantity += $product['quantity'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="change-qty.php?action=decrement&product_id=<?php echo $product['id']; ?>">-</a>
                            <?php echo $product['quantity']; ?>
                            <a class="btn btn-info btn-sm" href="change-qty.php?action=increment&product_id=<?php echo $product['id']; ?>">+</a>
                        </td>
                        <td><?php echo number_format($product['price'], 2); ?> $</td>
                        <td><?php echo number_format($row_total, 2); ?> $</td>
                        <td>
                            <form action="remove.php" method="DELETE" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
                                <button type="submit" class="btn btn-warning btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="text-left"><strong>Total:</strong></td>
                    <td class="text-left"><strong><?php echo $total_quantity; ?></strong></td>
                    <td colspan="1" class="text-left"><strong><?php echo number_format($total, 2); ?> $</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <a href="./checkout.php" class="btn btn-success">Checkout</a>

        <div class="text-center mt-3">
            <a href="product-show.php" class="btn btn-primary">Go to Products</a>
            <a href="index.php" class="btn btn-secondary">Go to Home Page</a>
        </div>

    <?php else: ?>
        <div class="alert alert-warning" role="alert">Your cart is empty.</div>
        <div class="text-center mt-3">
            <a href="product-show.php" class="btn btn-primary">Go to Products</a>
            <a href="index.php" class="btn btn-secondary">Go to Home Page</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

