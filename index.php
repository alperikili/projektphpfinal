
<?php
if(!session_id()){
    session_start();
}
require_once './Users.php';
$user = new Users();
if(!$user->isLoggedIn ()){
    header ("location:/signing.php");
} ?>
<html>
<head>
    <title>Projekt 2.0</title>
    <link href="css projekt.css" rel="stylesheet" type="text/css">
    <style>
         .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .image-card {
            width: 30%;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            text-align: center;
            padding: 10px;
        }

        .image-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .image-card h3 {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
        }

        .image-card p {
            font-size: 14px;
            color: #666;
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">The Album Of Dreams</div>
        <ul class="nav-links">
            <li><a href="/product-show.php">Products</a></li>
            <li><a class="me-3 py-2 text-dark text-decoration-none position-relative" href="/checkout.php">
                Cart
                <?php
                    require_once "./Cart.php";
                    $cart = new Cart();
                    $nrOfProducts = $cart->getNrOfProducts ();
                    if($nrOfProducts>0){
                        ?>
                <span class="badge rounded-pill bg-danger"><?php echo $nrOfProducts; ?> </span>
                <?php
                    }
                ?>
            </a></li>
            <li><a href="/profile.php">Profile<a></li>
            <li><a href="/logout.php">LogOut</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 1">
            <h3>Imazhi 1</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>

        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 2">
            <h3>Imazhi 2</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>

        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 3">
            <h3>Imazhi 3</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>

        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 4">
            <h3>Imazhi 4</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>

        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 5">
            <h3>Imazhi 5</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>

        <div class="image-card">
            <img src="https://placehold.co/600x400" alt="Image 6">
            <h3>Imazhi 6</h3>
            <p>This space is reserved for an image that will visually represent the content described above. Once the image is added, it will help to enhance the overall understanding and appeal of the material by providing a visual context to complement the text.

</p>
        </div>
    </div>
        <div class="vertical-links">
            <ul>
            <li><a href="https://myaccount.google.com/?utm_source=sign_in_no_continue&pli=1"><img src="emailmain.png" alt="email"></a></li>
            <li><a href="https://www.instagram.com/"><img src="instagrammain.png" alt="instagram"></a></li>
            <li><a href="https://www.facebook.com/"><img src="facebookmain.png" alt="facebook link"></a></li>
            </ul>
        </div>
</body>
</html>