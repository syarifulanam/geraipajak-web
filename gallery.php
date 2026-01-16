<?php
require 'function-conn.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Galeri - Gerai Pajak</title>
    <meta content="Dokumentasi kegiatan dan aktivitas Gerai Pajak dalam memberikan layanan perpajakan" name="description">
    <meta content="galeri gerai pajak, foto kegiatan, dokumentasi pajak" name="keywords">

    <?php include 'library-head.php'; ?>
    <link href="assets/css/gallery.css" rel="stylesheet">
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

    <!-- Gallery Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1><i class="bi bi-images me-2"></i>Galeri Kegiatan</h1>
                    <p>Dokumentasi berbagai kegiatan dan aktivitas Gerai Pajak dalam memberikan layanan perpajakan terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section class="gallery-section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
                $galleryCount = mysqli_num_rows($query);

                if ($galleryCount > 0) {
                ?>
                    <div class="gallery" data-aos="fade-up">
                        <?php
                        while ($data = mysqli_fetch_assoc($query)) {
                            $name = $data['name'];
                            $description = $data['description'];
                            $picture = $data['picture'];
                            $id = $data['id'];
                        ?>
                            <figure>
                                <!-- <span><?= $picture; ?></span> -->
                                <img src="<?= env('IMAGES_PATH'); ?><?= $picture; ?>" alt="<?= htmlspecialchars($name); ?>" onerror="this.onerror=null; this.src='https://placehold.co/400x300/dc3545/white?text=Gambar+Tidak+Tersedia'" />
                                <figcaption><?= htmlspecialchars($name); ?> <small><?= htmlspecialchars($description); ?></small></figcaption>
                            </figure>
                        <?php
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="empty-state" data-aos="fade-up">
                        <i class="bi bi-images"></i>
                        <h4>Belum Ada Galeri</h4>
                        <p>Dokumentasi kegiatan akan segera hadir. Nantikan update terbaru dari kami!</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include 'footer.php'; ?>

    <?php include 'library-foot.php'; ?>
    <script src="assets/js/gallery.js"></script>
</body>

</html>