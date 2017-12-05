<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';

$_MaTK = $_POST["maTK"];
$_HoTen = $_POST["hoTen"];
$_MatKhau = $_POST["matKhau"];
$_SoDienThoai = $_POST["soDienThoai"];
$_Quyen = $_POST["quyen"];

if (empty($_MaTK)) {
	die("404");
}

clsDataBase::openConnect();
if (clsTaiKhoan::Sua($_MaTK, $_HoTen, $_MatKhau, $_SoDienThoai, $_Quyen)) {
	helper::alertSuccess("Sửa tài khoản");
} else {
	helper::alertFail("Sửa tài khoản");
}
clsDataBase::closeConnect();
