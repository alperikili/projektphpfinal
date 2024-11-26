<?php
require_once './db/products.php';
require_once './Product.php';
$raw_products = getAllProducts();
$products = [];

foreach ($raw_products as $p) {
    array_push($products, new Product($p['id'], $p['name'], $p['price'], $p['image']));
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".add-to-card-btn").click(function(){
                $.ajax({
                    success: function(res) {
                        toastr.options.timeOut = 3000;
                        toastr.options.positionClass = 'toast-top-center';
                        toastr.success('Product is Added');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <a href="index.php" class="btn btn-primary">Go to Home Page</a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class='col-4'>
                    <?php include "./ProductCard.php"; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
