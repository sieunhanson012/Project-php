<?php 

class clsTaiKhoan extends clsDataBase{

	private $_MaTK;
	private $_HoTen;
	private $_TenDangNhap;
	private $_MatKhau;
	private $_Email;
	private $_SoDienThoai;
	private $_NgayTao;
	private $_LanDangNhapCuoi;
	private $_TinhTrang;
	private $_TrangThai;
	private $_Quyen;

	function __construct()
    {
        parent::__construct();
    }
    public function Them(){
		$this->Query("SELECT ten_dang_nhap FROM taikhoan WHERE ten_dang_nhap = $this->_TenDangNhap");
		if($this->NumRows()>0){
			//tồn tại tên đăng nhập
			return "usernameExsist";
		}else{
			//không tồn tại tên đăng nhập => kiểm tra tồn tại email
			$this->Query("SELECT email FROM taikhoan WHERE email = $this->_Email");
			if($this->NumRows()>0){
				return "emailExsist";
			}else{
				$this->Query("INSERT INTO taikhoan(ho_ten,ten_dang_nhap,mat_khau,email,so_dien_thoai,ngay_tao,lan_dang_nhap_cuoi,tinh_trang,trang_thai,quyen) VALUES($this->_HoTen,$this->_TenDangNhap,$this->_MatKhau,$this->_Email,$this->_SoDienThoai,$this->_NgayTao,$this->_LanDangNhapCuoi,$this->_TinhTrang,$this->_TrangThai,$this->_Quyen) ");
				if($this->EffectRow()>0){
					return true;
				}else{
					return false;
				}
			}
		}
	}

	public function Xoa(){
		$this->Query("UPDATE taikhoan SET trang_thai = 0 WHERE ma_tai_khoan = $this->_MaTK");
		//Kiểm tra số dòng bị ảnh hưởng trong database
		//Trả về true nếu tồn tại
		if($this->EffectRow()>0){
			return true;
		}else{
			return false;
		}
	}

	public function Sua(){
		$this->Query("UPDATE taikhoan SET ho_ten = $this->_HoTen, mat_khau = $this->_MatKhau, ten_dang_nhap = $this->_TenDangNhap, email = $this->_Email, so_dien_thoai = $this->_SoDienThoai, tinh_trang = $this->_TinhTrang, trang_thai = $this->_TrangThai, quyen = $this->_Quyen WHERE ma_tai_khoan = $this->_MaTK");
		//Kiểm tra số dòng bị ảnh hưởng trong database
		//Trả về true nếu tồn tại
		if($this->EffectRow()>0){
			return true;
		}else{
			return false;
		}
	}

	public function dangNhap(){
		$this->Query("SELECT ma_tai_khoan,ho_ten,ten_dang_nhap,mat_khau,quyen,tinh_trang FROM taikhoan WHERE ten_dang_nhap = '$this->_TenDangNhap'") AND trang_thai == 1;
		//Kiểm tra có tồn tại tài khoản không?
		if($this->NumRows()>0){
			$data = $this->Fetch();
			//Lấy mật khẩu để kiểm tra với mật khẩu nhập vào
			if($this->_MatKhau == $data["mat_khau"]){
				//Kiểm tra tài khoản có bị khóa không
				if($data["tinh_trang"] == 1){
					//Đăng nhập thành công
					$_SESSION["ten_dang_nhap"] = $data["ten_dang_nhap"];
					$_SESSION["quyen"] = $data["quyen"];
					$_SESSION["ho_ten"] = $data["ho_ten"];
					$MaTK = $data["ma_tai_khoan"];
					$NgayHienTai = date();
					//Cập nhật lần đăng nhập cuối của tài khoản
					$this->Query("UPDATE FROM taikhoan SET ngay_tao = '$NgayHienTai' WHERE ma_tai_khoan = $MaTK ");
					if($this->EffectRow()>0){
						return true;	
					}else{
						return false;
					}
				}else{
					//Tài khoản bị khóa
					return "lock";
				}
			}else{
				//Mật khẩu không đúng
				return "wrong";
			}
		}else{
			//Tên đăng nhập không tồn tại
			return "invalid";
		}
	}

	public function dangXuat(){
		if(isset($_SESSION["ten_dang_nhap"])&&isset($_SESSION["quyen"])&&isset($_SESSION["ho_ten"])){
			unset($_SESSION["ten_dang_nhap"]);
			unset($_SESSION["quyen"]);
			unset($_SESSION["ho_ten"]);
			return true;
		}
		return false;
	}

	public  function layBangTaiKhoan(){
		$this->Query("SELECT * FROM taikhoan");
		if($this->NumRows()>0){
			return $this->FetchAll();
		}else{
			return false;
		}
	}

	public  function khoaTaiKhoan(){

	}
}