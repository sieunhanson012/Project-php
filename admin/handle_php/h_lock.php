<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';
clsDataBase::openConnect();
if (isset($_POST["ma_tai_khoan"]) && !empty($_POST["ma_tai_khoan"])) {
	if (clsTaiKhoan::khoaTaiKhoan($_POST["ma_tai_khoan"])) {
		helper::alertSuccess("Khóa tài khoản");
	} else {
		helper::alertFail("Khóa tài khoản");
	}
}
clsDataBase::closeConnect();
