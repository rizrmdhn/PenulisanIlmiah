<?php
session_start();
include('includes/config.php');


$query = mysqli_query($con, "SELECT * FROM tblproducts");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>P4SPurileisa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/produk.css">
    <link rel="icon" href="assets/images/image 1.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/image 1.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

<?php include('includes/header.php'); ?>

    <div class="container">
        <div class="headdaftar">
            <h1 class="text-center text-success font-weight-bold">Produk Kami<br> apa yang kami buat pasti Bermanfaat!
            </h1>
            <p>Produk kami adalah produk yang terbuat dari bahan alam dan juga pemanfaatan bahan tersebut berguna untuk
                memastikan tidak adanya pembuangan limbah yang tidak berarti namun lebih ke arah pemanfaatan sehingga
                dapat menjadi produk yang bermanfaat bagi kehidupan kita!</p>
        </div>
    </div>
    </nav>


    <div class="content-product">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <!-- Product -->
            <div class="col-xl-12 mb-4" style="margin : 120px ;"> <!-- Adjusted to col-lg-8 for wider layout on large screens -->
                <div class="product-item">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $carouselID = "productCarousel" . $row['id']; // Unique ID for each carousel
                            ?>
                            <div id="<?php echo $carouselID; ?>" class="carousel slide product-image" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $images = array($row['picture1'], $row['picture2'], $row['picture3']);
                                    foreach ($images as $index => $image) {
                                        $activeClass = ($index === 0) ? 'active' : '';
                                    ?>
                                        <div class="carousel-item <?php echo $activeClass; ?>">
                                            <img src="admin/uploads/<?php echo $image; ?>" alt="Product Image<?php echo $index + 1; ?>" class="carousel-image img-fluid" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carouselID; ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carouselID; ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        
                            <div class="product-detail">
                                <div class="text-product-detail px-2">
                                    <h1><?php echo $row['name']; ?></h1>
                                    <h2>Rp <?php echo $row['price']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                                <button class="buy-btn mx-auto fw-bold">Beli Sekarang</button>
                            </div>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

    <!-- FOOTER -->
    <?php include('includes/footer.php'); ?>
    
</body>

</html>