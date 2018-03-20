<?php

class helper {

	public static function alertSuccess($stringNotify) {
		echo "<script>
        $.notify({
            title : '<strong>Thông báo: </strong>',
            message: '" . $stringNotify . " thành công'
        });
        </script>";
	}
	public static function alertFail($stringNotify) {
		echo "<script>
        $.notify({
            title: '<strong>Thông báo: </strong>',
            message:'" . $stringNotify . " thất bại'
        },{
            type: 'danger'
        });
        </script>";
	}

	public static function alertDanger($stringNotify) {
		echo "<script>
        $.notify({
            title: '<strong>Thông báo: </strong>',
            message:'" . $stringNotify . "'
        },{
            type: 'danger'
        });
        </script>";
	}

}
