<?php

class pekerja
{
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'worker';
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname) or die("Koneksi Gagal!");
    }

    public function addworker($nama, $work, $salary)
    {
        $sql_name = "INSERT INTO name(name) VALUE('$nama')";
        $sql_work = "INSERT INTO work(name) VALUE('$work')";
        $sql_salary = "INSERT INTO kategori(salary) VALUE('$salary')";
        $save_name = mysqli_query($this->conn, $sql_name);
        if ($save_name) {
            $save_work =  mysqli_query($this->conn, $sql_work);
            if ($save_work) {
                $save_name =  mysqli_query($this->conn, $sql_salary);
                if ($save_name) {
                    $id_work = mysqli_query($this->conn, "SELECT * FROM work ORDER BY id desc");
                    $id_salary = mysqli_query($this->conn, "SELECT * FROM kategori ORDER BY id desc");
                    $name = mysqli_query($this->conn, "SELECT * FROM name ORDER BY id desc");
                    $id = mysqli_fetch_array($name);
                    $id_name = $id['id'];
                    $id_sal = mysqli_fetch_array($id_salary);
                    $id_salary =   $id_sal['id'];
                    $id_wo = mysqli_fetch_array($id_work);
                    $id_work = $id_wo['id'];

                    $update_name = "UPDATE name SET id_work = '$id_work', 
                                                    id_salary = '$id_salary'
                                                WHERE id = $id_name";
                    $update = mysqli_query($this->conn, $update_name);
                    $update_work = "UPDATE work SET id_salary = '$id_salary'  WHERE id = $id_work";
                    $update_w = mysqli_query($this->conn, $update_work);
                    if ($update_w) {
                        session_start();
                        $_SESSION['alert'] = "Data " . $nama . " telah berhasil disimpan";
                        header("location:index.php");
                    }
                }
            }
        }
    }

    public function select_all()
    {
        $select = "SELECT name.name as nameworker, name.id, kategori.salary, work.name as namework FROM name 
        INNER JOIN  work ON name.id_work = work.id
        INNER JOIN kategori  ON work.id_salary = kategori.id";
        $all = mysqli_query($this->conn, $select);
        foreach ($all as $fild) {
            $result[] = $fild;
        }
        return $result;
    }

    public function update()
    {
        $select = "SELECT name.name as nameworker, name.id, kategori.salary, work.name as namework FROM name 
        INNER JOIN  work ON name.id_work = work.id
        INNER JOIN kategori  ON work.id_salary = kategori.id WHERE name.id = '$_GET[id]'";
        $all = mysqli_query($this->conn, $select);
        foreach ($all as $fild) {
            $result[] = $fild;
        }
        return $result;
    }
    public function updateworker($id, $nama, $work, $salary)
    {
        $tampil = mysqli_query($this->conn, "SELECT * FROM name WHERE id = '$id'");
        $id_all = mysqli_fetch_array($tampil);
        $update = mysqli_query($this->conn, "UPDATE name set name = '$nama' WHERE id='$id'");
        if ($update) {
            mysqli_query($this->conn, "UPDATE work set name = '$work' WHERE id='$id_all[id_work]'");
            $update_salay = mysqli_query($this->conn, "UPDATE kategori set salary = '$salary' WHERE id='$id_all[id_salary]'");
            if ($update_salay) {
                session_start();
                $_SESSION['alert'] = "Data " . $nama . " telah berhasil edit";
                header("location:index.php");
            }
        }
    }

    public function delete($id)
    {
        $tampil = mysqli_query($this->conn, "SELECT * FROM name WHERE id = '$id'");
        $id_all = mysqli_fetch_array($tampil);
        $delete = mysqli_query($this->conn, "DELETE name,work,kategori FROM name INNER JOIN work INNER JOIN kategori WHERE name.id='$id' and work.id='$id_all[id_work]' and kategori.id='$id_all[id_salary]'");
        if ($delete) {
            session_start();
            $_SESSION['alert'] = "Data " . $id_all['name'] . " telah berhasil hapus";
            header("location:index.php");
        }
    }
}
