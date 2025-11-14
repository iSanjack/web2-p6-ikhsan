<?php
require_once "app/Models/User.php";

class LoginController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        require "app/Views/login_view.php";
    }

    public function prosesLogin()
    {
        session_start();
        $user = new User($this->db);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $user->login($username, $password);

        if ($data) {
            // Simpan data user ke session
            $_SESSION['user'] = $data;

            // Arahkan ke halaman utama setelah login sukses
            header("Location: index.php?action=index");
            exit;
        } else {
            echo "<script>
                alert('Username atau password salah!');
                window.location='index.php?action=login';
            </script>";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        // Setelah logout, kembali ke halaman login
       header("Location: index.php?action=login");
exit;
    }
}
?>
