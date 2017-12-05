
        //khai báo
    $("frmThemTaiKhoan").validate();

    //thông báo reg
    $.validator.addMethod("regx", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Không được có kí tự đặc biệt");

    $("#frmThemTaiKhoan").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtHoTen: {
                required: true,
            },
            // compound rule
            txtEmail: {
                required: true,
                email: true
            },
            txtMatKhau: {
                required: true,
                regx: /^([\w]+)$/,
                minlength: 6,
                maxlength: 26
            },
            txtSoDienThoai: {
                required: true,
                minlength: 6,
                digits: true
            },
            txtTenDangNhap: {
                required: true,
                regx: /^([\w]+)$/
            }
        },
        //Message
        messages: {
            txtHoTen: {
                required: "Tên không được bỏ trống",
                minlength: "Tên có ít nhất 6 kí tự"
            },
            txtEmail: {
                required: "Email không được bỏ trống",
                email: "Email không đúng định dạng"
            },
            txtMatKhau: {
                required: "Mật khẩu không được bỏ trống",
                minlength: "Mật khẩu ít nhất 6 kí tự",
                maxlength: "Mật khẩu tối đa 26 kí tự"
            },
            txtSoDienThoai: {
                required: "Số điện thoại không được bỏ trống",
                minlength: "Vui lòng nhập đúng số điện thoại",
                digits: "Số điện thoại không đúng định dạng"
            },
            txtTenDangNhap: {
                required: "Tên đăng nhập không được để trống",
            }
        },
});

