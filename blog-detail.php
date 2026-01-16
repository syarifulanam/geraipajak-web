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
            <?php
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
            $query = mysqli_query($conn, "SELECT * FROM posts where id = $id");
            if ($data = mysqli_fetch_assoc($query)) {
                $title = $data['title'];
                $content = $data['content'];
                $media = $data['media'];
            ?>
                <h5 class="text-center mt-3"><?= $title; ?></h5>
                <div class="container mt-3">
                    <div class="row">
                        <img src="https://repo.geraipajak.com/uploads/<?= $media; ?>" class="img-fluid mb-3" alt="...">
                        <p><?= $content; ?></p>
                    </div>
                </div>
            <?php
            } else {
                echo "Post tidak ditemukan.";
                exit;
            }
            ?>
        </section>
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- <?php include 'footer.php'; ?> -->

    <?php include 'library-foot.php'; ?>

</body>

</html>