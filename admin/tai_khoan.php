<?php
$taikhoan = new clsTaiKhoan();
$data = $taikhoan->layBangTaiKhoan();
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
                            Hover Rows
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Lần đăng nhập cuối</th>
                                            <th>Khóa</th>
                                            <th>Xóa</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($data as $values => $rows ): ?>
                                        <tr>
                                            <td><?= $values;  ?></td>
                                            <td><?= $rows["ho_ten"]; ?></td>
                                            <td><?= $rows["email"]; ?></td>
                                            <td><?= $rows["so_dien_thoai"]; ?></td>
                                            <td><?= $rows["lan_dang_nhap_cuoi"]; ?></td>
                                            <td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td>
                                            <td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td>
                                            <td>@twitter</td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>