	/*
		Khóa tài khoản trang tai_khoan
	*/
	$('#ckbLock').change(function() {
	    var id = $('#ckbLock').val();
	    if (this.checked) {
	        $.post(
	            "handle_php/h_lock.php", {
	                ma_tai_khoan: id
	            },
	            function(data) {
	                $(".result").html(data);
	            });
	    } else {
	        $.post(
	            "handle_php/h_unlock.php", {
	                ma_tai_khoan: id
	            },
	            function(data) {
	                $(".result").html(data);
	            });
	    }
	});
	
	/*
		Sửa tài khoản trang sua_tai_khoan
	*/
	$('#submit-edit-account').click(function(e) {
	    $.confirm({
	        icon: 'glyphicon glyphicon-edit',
	        title: 'Thông báo',
	        content: 'Bạn có muốn lưu không?',
	        type: 'green',
	        typeAnimated: true,
	        buttons: {
	            Yes: {
	                text: 'Đồng ý',
	                btnClass: 'btn-success',
	                action: function() {
	                    $.post("handle_php/h_edit_account.php", {
	                            maTK: $('#_maTK').val(),
	                            hoTen: $('#_hoTen').val(),
	                            matKhau: $('#_matKhau').val(),
	                            soDienThoai: $('#_soDienThoai').val(),
	                            quyen: $('#_quyen').val()
	                        },
	                        function(data) {
	                            $(".result").html(data);
	                        });
	                }
	            },
	            Close: {
	                text: "Quay lại",
	                close: function() {}
	            }
	        }
	    });
	});
