<?php

if (!empty($_REQUEST["id"])) {
	$maTK = $_REQUEST["id"];
} else {
	die("404");
}
clsDataBase::openConnect();
$data = clsTaiKhoan::layBangTaiKhoanTheoMa($maTK);
clsDataBase::closeConnect();

?>
<div class="header">
    <h1 class="page-header">
        Tables Page
        <small>Responsive tables</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">Data</li>
    </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa tài khoản
        </div>
        <div class="panel-body">
            <form action="">
                <input type="hidden" id="_maTK" value="<?=$maTK?>" >
                <div class="form-group">
                    <label for="_tenDangNhap">Tên đăng nhập</label>
                    <input type="email" class="form-control" id="_tenDangNhap" name="txtTenDangNhap" placeholder="Tên đăng nhập" value="<?=$data["ten_dang_nhap"];?> " disabled >
                </div>
                <div class="form-group">
                    <label for="_email">Email</label>
                    <input type="text" class="form-control" id="_email" name="txtEmail" placeholder="Email" value="<?=$data["email"];?> " disabled>
                </div>
                <div class="form-group">
                    <label for="_hoTen">Họ tên</label>
                    <input type="text" class="form-control" id="_hoTen" name="txtHoTen" placeholder="text" value="<?=$data["ho_ten"];?> " required>
                </div>
                <div class="form-group">
                    <label for="_matKhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="_matKhau" name="txtMatKhau" placeholder="Mật khẩu" value="<?=$data["mat_khau"];?>" required>
                </div>
                <div class="form-group">
                    <label for="_soDienThoai">Số điện thoại</label>
                    <input type="text" class="form-control" id="_soDienThoai" name="txtSoDienThoai" placeholder="Số điện thoại" value="<?=$data["so_dien_thoai"];?>" required>
                </div>
                <div class="form-group">
                    <label for="_NgayTao">Ngày tạo</label>
                    <input type="date" class="form-control" id="_NgayTao" name="txtNgayTao" value="<?=$data["ngay_tao"];?>" disabled>
                </div>
                <div class="form-group">
                    <label for="_NgayDangNhapCuoi">Lần đăng nhập cuối</label>
                    <input type="date" class="form-control" id="_NgayDangNhapCuoi" name="txtNgayDangNhapCuoi" value="<?=$data["lan_dang_nhap_cuoi"];?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Quyền</label>
                    <br>
                    <select name="txtQuyen" id="_quyen" class="form-control" required="required"  >
                        <option value="0" <?=($data["quyen"] == 0) ? "selected" : ""?>>Admin</option>
                        <option value="1" <?=($data["quyen"] == 1) ? "selected" : ""?>>User</option>
                    </select>
                </div>
                <a class="btn btn-default" href="index.php?page=tai-khoan"><i class="fa fa-arrow-left"></i> Quay lại</a>
                <a  id="submit-edit-account" class="btn btn-primary"><i class="fa fa-save"></i> Lưu tài khoản</a>
            </form>
        </div>
    </div>
    <div class="result"></div>
</div>


