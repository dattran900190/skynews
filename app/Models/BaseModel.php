<?php 
namespace App\Models;

use PDO;
use PDOException;
require_once __DIR__ . "../../../env.php";
class BaseModel
{
    protected $conn = null;
    protected $tableName = null;
    protected $primaryKey = 'id';
    protected $sqlBuilder;

    public function __construct()
    {
        $host = HOST;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;
        $port = PORT;
        try {
            $this->conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8; 
                            port=$port", $username, $password);
        } catch (PDOException $e) {
            echo "Lỗi kết nối DATABASE" . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * method create: dùng để thêm dữ liệu
     * @$data: dữ liệu bao gồm có key và value, trong đó key là tên cột trong bảng dữ liệu và value tương ứng
     */
    public static function create($data)
    {
        $model = new static;
        $sql = "INSERT INTO $model->tableName(";
        $values = " VALUES( ";

        foreach ($data as $column => $val) {
            $sql .= "`$column`, ";
            $values .= ":$column, ";
        }

        $sql = rtrim($sql, ', ') . ") " . rtrim($values, ', ') . ")";
        // dd($sql);
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);

        return $model->conn->lastInsertId();
    }

    /**
     * phương thức update: để cập nhật dữ liệu theo id
     * @data: dữ liệu bao gồm có key và value, trong đó key là tên cột trong bảng dữ liệu và value tương ứng
     */
    public static function update($data, $id)
    {
        $model = new static;
        $sql = "UPDATE $model->tableName SET ";
        foreach ($data as $column => $val) {
            $sql .= "`$column`=:$column, ";
        }

        $sql = rtrim($sql, ", ") . " WHERE $model->primaryKey=:$model->primaryKey";
        // dd($sql);
        //Thêm primary vào cho data
        $data["$model->primaryKey"] = $id;

        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
    }

    /**
     * @method delete: Phương thức xóa dữ liệu
     * @param $id: giá trị theo khóa chính
     */
    public static function delete($id)
    {
        $model = new static;
        $sql = "DELETE FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);
    }

    /**
     * @method find: tìm kiếm dữ liệu theo id, trả về 1 bản ghi
     * @param $id: giá trị cần tìm
     */
    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);

        $stmt->execute(["$model->primaryKey" => $id]);

        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $result[0] ?? [];
    }

    /**
     * @method where: phương thức tìm kiếm dữ liệu theo điều kiện
     * @param $column: tên cột cầm tìm
     * @param $operator: biểu thức
     * @param $value: giá trị cần tìm
     */
    public static function where($column, $operator, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $column $operator '$value'";
        // dd($model->sqlBuilder);
        return $model;
    }
    public function whereCate($column, $operator, $value)
    {
        if ($this->sqlBuilder != '') {
            $this->sqlBuilder .= " WHERE $column $operator '$value'";
        } else
            $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE $column $operator '$value'";
        // dd($this->sqlBuilder);
        return $this;
    }

    /**
     * @method get: lấy dữ liệu
     */
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        // dd($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @method first: lấy ra phần tử đầu tiên
     * 
     */
    public function first()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS)[0] ?? [];
    }

    /**
     * @method orWhere: thêm điều kiện hoặc
     * @param $column: tên cột cầm tìm
     * @param $operator: biểu thức
     * @param $value: giá trị cần tìm
     */
    public function orWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " OR `$column` $operator '$value'";
        return $this;
    }

    public function andWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " AND `$column` $operator '$value'";
        return $this;
    }

    /**
     * @method select: phương thức chọn cột cần lấy
     * @param $columms: mảng các tên cột cần lấy
     */
    public static function select($columns = ['*'])
    {
        $model = new static;
        $model->sqlBuilder = "SELECT ";
        foreach ($columns as $col) {
            $model->sqlBuilder .= " $col, ";
        }
        //loại bỏ dấu ", "
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ") . " FROM $model->tableName";
        // dd($model->sqlBuilder);
        return $model;
    }

    /**
     * @method join: nối bảng
     * @param $table: tên bảng cần nối
     * @param $parentKey: khóa chính bảng cha
     * @param $childKey: Khóa ngoại
     */

    public function join($table, $reference, $key)
    {
        $this->sqlBuilder .= " JOIN $table ON $this->tableName.$reference = $table.$key";
        return $this;
    }
    public function joinCate($table, $reference, $key)
    {
        $this->sqlBuilder .= " JOIN $table ON $reference = $key";
        // dd($this->sqlBuilder);
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
{
    $this->sqlBuilder .= " ORDER BY `$column` $direction";
    return $this;
}

public function limit($number)
{
    $this->sqlBuilder .= " LIMIT $number";
    return $this;
}
public static function updateStatus($id, $status)
{
    $model = new static;
    $sql = "UPDATE $model->tableName SET status = :status WHERE id = :id";
    $stmt = $model->conn->prepare($sql);
    $stmt->execute([
        'status' => $status,
        'id' => $id
    ]);
}

}


?>