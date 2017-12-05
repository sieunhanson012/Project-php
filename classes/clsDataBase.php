<?php
class clsDataBase
{
    private static $conn = NULL;
    private static $result = NULL;
    /*
         Hàm kết nối csdl
    */
    public static function openConnect()
    {
        self::$conn = mysqli_connect("localhost","root","","db_shoes_shop");
        mysqli_set_charset(self::$conn, "utf8");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public static function closeConnect()
    {
            mysqli_close(self::$conn);
    }

    /*
        Hàm thưc thi câu truy vấn
    */
    public static function query($sql)
    {
        self::$result  = mysqli_query(self::$conn,$sql);
    }

    /*
        Đếm số bản ghi của câu truy vân SELECT
    */
    public static function numRows()
    {
        if (self::$result) {
            $row = mysqli_num_rows(self::$result);
        } else {
            $row = 0;
        }
        return $row;
    }

    /*
        Kiểm tra số dòng bị ảnh hưởng khi thực thi câu truy vấn INSERT UPDATE DELETE
        Không tìm thấy trả về -1
    */
    public static function effectRow(){
        if(self::$conn){
            $number = mysqli_affected_rows(self::$conn);
            return $number;
        }else{
            return "Connection failed";
        }
    }

    /*
        Lấy 1 dòng dữ liệu của câu truy vấn SELECT
        Không có dữ liệu trả về null
    */
    public static function Fetch()
    {
        $data = null;
        if (self::$result) {
            $data = mysqli_fetch_assoc(self::$result);
        } else {
            $data = array();
        }
        return $data;
    }

    /*
        Lấy tất cả dữ liệu của câu truy vấn
        Không có dữ liệu trả về null
    */
    public static function fetchAll()
    {
        $data = null;
        if (self::$result) {
            while ($row = mysqli_fetch_assoc(self::$result)) {
                $data[] = $row;
            }
        } else {
            $data = null;
        }
        return $data;
    }
}