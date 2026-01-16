<?php
require 'function-conn.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog - Gerai Pajak</title>
    <meta content="Artikel dan informasi terbaru seputar perpajakan Indonesia dari Gerai Pajak" name="description">
    <meta content="blog pajak, artikel pajak, berita perpajakan, tips pajak" name="keywords">

    <?php include 'library-head.php'; ?>

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

    <!-- Blog Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1><i class="bi bi-journal-richtext me-2"></i>Blog & Artikel</h1>
                    <p class="d-none d-lg-block">Temukan informasi terbaru seputar perpajakan, tips, dan panduan untuk membantu Anda memahami kewajiban perpajakan dengan lebih baik.</p>
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section class="blog-section">
            <div class="container">
                <div class="row">
                    <!-- Sidebar (Left) -->
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="sidebar-sticky">
                            <div class="card sidebar-card mb-4" data-aos="fade-left" data-aos-delay="100">
                                <div class="card-header">
                                    <i class="bi bi-folder2"></i>Kategori
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM categories");
                                    $catCount = mysqli_num_rows($query);

                                    if ($catCount > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $name = $data['name'];
                                    ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= htmlspecialchars($name); ?>
                                                <i class="bi bi-chevron-right text-muted"></i>
                                            </li>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <li class="list-group-item text-muted text-center py-4">
                                            <small>Belum ada kategori</small>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <!-- CTA Sidebar -->
                            <div class="card sidebar-card" data-aos="fade-left" data-aos-delay="200">
                                <div class="card-header">
                                    <i class="bi bi-question-circle"></i>Butuh Bantuan?
                                </div>
                                <div class="card-body text-center py-4">
                                    <p class="text-muted mb-3">Konsultasikan masalah perpajakan Anda dengan tim profesional kami.</p>
                                    <a href="https://wa.me/628118aborpajak" class="btn btn-success w-100" target="_blank">
                                        <i class="bi bi-whatsapp me-2"></i>Chat via WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Posts (Right) -->
                    <div class="col-lg-9">
                        <div class="row g-4">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
                            $postCount = mysqli_num_rows($query);

                            if ($postCount > 0) {
                                $delay = 0;
                                while ($data = mysqli_fetch_assoc($query)) {
                                    $title = $data['title'];
                                    $created_at = date('d M Y', strtotime($data['created_at']));
                                    $media = $data['media'];
                                    $id = $data['id'];
                            ?>
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                                        <div class="card blog-card">
                                            <img src="<?= env('IMAGES_PATH'); ?><?= $media; ?>" class="card-img-top" alt="<?= htmlspecialchars($title); ?>" onerror="this.onerror=null; this.src='https://placehold.co/400x300/dc3545/white?text=Gambar+Tidak+Tersedia'">
                                            <div class="card-body d-flex flex-column">
                                                <div class="card-date">
                                                    <i class="bi bi-calendar3"></i><?= $created_at; ?>
                                                </div>
                                                <h5 class="card-title">
                                                    <a href="blog-detail.php?id=<?= $id; ?>"><?= htmlspecialchars($title); ?></a>
                                                </h5>
                                                <div class="mt-auto">
                                                    <a href="blog-detail.php?id=<?= $id; ?>" class="btn btn-read text-white">
                                                        Baca <i class="bi bi-arrow-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $delay += 100;
                                    if ($delay > 300) $delay = 100; // Reset delay for better UX
                                }
                            } else {
                                ?>
                                <div class="col-12">
                                    <div class="empty-state">
                                        <i class="bi bi-journal-x"></i>
                                        <h4>Belum Ada Artikel</h4>
                                        <p>Artikel dan informasi perpajakan akan segera hadir. Nantikan update terbaru dari kami!</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include 'footer.php'; ?>

    <?php include 'library-foot.php'; ?>

</body>

</html>