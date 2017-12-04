<?php
class clsDataBase
{
    private  $db_host = "localhost";
    private  $db_username = "root";
    private  $db_password = "";
    private  $db_name = "db_shoes_shop";
    private  $conn = NULL;
    private  $result = NULL;

    protected function __construct()
    {
        self::Connect();
    }

    /*
         Hàm kết nối csdl
    */
    protected  function Connect()
    {
        $this->conn = mysqli_connect($this->db_host,$this->db_username, $this->db_password, $this->db_name);
        mysqli_set_charset($this->conn, "utf8");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    protected  function Disconnect()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    /*
        Hàm thưc thi câu truy vấn
    */
    protected  function Query($sql)
    {
        if ($this->conn) {
            $this->result = mysqli_query($this->conn, $sql);
        } else {
            return "Connection failed";
        }
    }

    /*
        Đếm số bản ghi của câu truy vân SELECT
    */
    protected  function NumRows()
    {
        if ($this->result) {
            $row = mysqli_num_rows($this->result);
        } else {
            $row = 0;
        }
        return $row;
    }

    /*
        Kiểm tra số dòng bị ảnh hưởng khi thực thi câu truy vấn INSERT UPDATE DELETE
        Không tìm thấy trả về -1
    */
    protected  function EffectRow(){
        if($this->conn){
            $number = mysqli_affected_rows($this->conn);
            return $number;
        }else{
            return "Connection failed";
        }
    }

    /*
        Lấy 1 dòng dữ liệu của câu truy vấn SELECT
        Không có dữ liệu trả về null
    */
    protected  function Fetch()
    {
        $data = null;
        if ($this->result) {
            $data = mysqli_fetch_assoc($this->result);
        } else {
            $data = array();
        }
        return $data;
    }

    /*
        Lấy tất cả dữ liệu của câu truy vấn
        Không có dữ liệu trả về null
    */
    protected  function FetchAll()
    {
        $data = null;
        if ($this->result) {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $data[] = $row;
            }
        } else {
            $data = null;
        }
        return $data;
    }

    /*
        Ngắt kết nối csdl
    */
    protected  function __destruct(){
        self::Disconnect();
    }
}