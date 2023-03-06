<?php
class Config
{
    public $HOST = "localhost";
    public $USER = "root";
    public $PASSWORD = "";
    public $DB_NAME = "airline";
    public $TABLE_NAME = "booking";

    public $conn;

    public function connect()
    {
        $this->conn = mysqli_connect($this->HOST, $this->USER, $this->PASSWORD, $this->DB_NAME);
    }

    public function insertAPI($name, $age, $email, $departure, $destination, $seat)
    {
        $this->connect();

        $query = "INSERT INTO $this->TABLE_NAME(name , age, email, departure, destination, seat) VALUES('$name', $age, '$email', '$departure', '$destination', $seat);";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetchAllAPI()
    {
        $this->connect();

        $query = "SELECT * FROM $this->TABLE_NAME";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetchSingelAPI($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->TABLE_NAME WHERE id = $id";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function deleteAPI($id)
    {
        $this->connect();

        $query = "DELETE FROM $this->TABLE_NAME WHERE id = $id";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function updateAPI($id, $name, $age, $email, $departure, $destination, $seat)
    {
        $this->Connect();

        $fetch_res = $this->fetchSingelAPI($id);

        $record = mysqli_fetch_array($fetch_res);

        if ($record) {
            $query = "UPDATE $this->TABLE_NAME SET name='$name', age=$age, email='$email', departure='$departure', destination='$destination', seat='$seat' WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res; // bool return 
        } else {
            return false;
        }
    }
}
?>