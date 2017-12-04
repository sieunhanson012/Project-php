<?php include 'header.php';
?>
<div id="page-wrapper">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "tai-khoan": include_once("tai_khoan.php");
            break;

            default: include_once("home.php");
        }
    } else {
        include 'home.php';
    }
    ?>
</div>
<?php include 'footer.php'; ?>