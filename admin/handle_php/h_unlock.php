<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';
clsDataBase::openConnect();
if (isset($_POST["ma_tai_khoan"]) && !empty($_POST["ma_tai_khoan"])) {
	if (clsTaiKhoan::moKhoaTaiKhoan($_POST["ma_tai_khoan"])) {
		helper::alertSuccess("Mở khóa tài khoản");
	} else {
		helper::alertFail("Mở khóa tài khoản");
	}
}
clsDataBase::closeConnect();
