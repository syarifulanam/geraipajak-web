<?php
require 'function-conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gerai Pajak</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include 'library-head.php'; ?>

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

    <main id="main" class="mt-3">


        <section>
            <h1 class="text-center mt-3">Welcome to Blog</h1>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM posts order by id desc");
                            while ($data = mysqli_fetch_assoc($query)) {
                                $title = $data['title'];
                                $created_at = $data['created_at'];
                                $media = $data['media'];
                                $id = $data['id'];
                            ?>
                                <div class="col-lg-4 mb-3 mt-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="https://repo.geraipajak.com/uploads/<?= $media; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $title; ?></h5>
                                            <p class="card-text"><?= $created_at; ?></p>
                                            <a href="blog-detail.php?id=<?= $id; ?>" class="btn btn-primary">Read</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Categories</li>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM categories");
                            while ($data = mysqli_fetch_assoc($query)) {
                                $name = $data['name'];
                            ?>
                                <li class="list-group-item"><?= $name; ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
            </div>
        </section>
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- <?php include 'footer.php'; ?> -->

    <?php include 'library-foot.php'; ?>

</body>

</html>