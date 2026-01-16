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
    <link href="assets/css/gallery.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

    <main id="main" class="mt-3">
        <section>
            <div class="gallery mt-3">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM gallery order by id desc");
                while ($data = mysqli_fetch_assoc($query)) {
                    $name = $data['name'];
                    $description = $data['description'];
                    $picture = $data['picture'];
                    $id = $data['id'];
                ?>
                    <figure>
                        <img src="https://repo.geraipajak.com/uploads/<?= $picture; ?>" alt="" />
                        <figcaption><?= $name; ?> <small><?= $description; ?></small></figcaption>
                    </figure>
                <?php
                }
                ?>
            </div>
        </section>
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include 'library-foot.php'; ?>
    <script src="assets/js/gallery.js"></script>
</body>

</html>