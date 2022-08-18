<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("layout/front/head.php") ?>

<body>
    <?php $this->load->view("layout/front/nav.php") ?>


    <?php if ($panel_atas) {
        $this->load->view("layout/front/section_dashboard.php");
    } ?>

    <main id="main">

        <?php if ($breadcrums) {
            $this->load->view("layout/front/breadcrums.php", $content);
        }

        ?>

        <?php
        if ($var) {
            $this->load->view($nama_view, $content);
        } else {
            $this->load->view($nama_view);
        }
        ?>


    </main><!-- End #main -->

    <?php $this->load->view("layout/front/foot.php") ?>

</body>

</html>