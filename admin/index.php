<?php include 'header.php';
?>
<div id="page-wrapper">
    <?php
if (isset($_GET['page'])) {
	switch ($_GET['page']) {
	case "tai-khoan":include_once "tai_khoan.php";
		break;
	case "sua-tai-khoan":include_once "sua_tai_khoan.php";
		break;
	case "them-tai-khoan":include_once "them_tai_khoan.php";
		break;
	default:include_once "home.php";
	}
} else {
	include 'home.php';
}
?>
</div>
<?php include 'footer.php';?>
