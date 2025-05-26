<?php
require_once(__DIR__ . "/../../config/Functions.php");
class Auth extends Controller {
    public function login() {
        if ( $_SERVER["REQUEST_METHOD"] === "POST" ){
            if ( isset( $_POST["login"]) ){
                $email = $_POST["email"];
                $password = $_POST["password"];
                $result = $this->auth_model("Auth_Model")->check_login($email);
                if ( $result === null ) {
                    // do something
                    echo "USER TIDAK ADA";
                    exit;
                }

                $verify_password = password_verify($password, $result["password"]);
                if ( !$verify_password )
                {
                    echo "PASSword SALAH";
                    exit;
                }


                // session_start();
                if ( session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION["login"] = "LOGIN";
                header("Location: " . BASE_URL);
                exit;
            }
        }

        $this->auth_view("login");
    }

    public function logout() {
        if ( session_status() === PHP_SESSION_NONE ) session_start();
        //  echo "Masuk logout";
        // exit;
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL );
        exit;
    }
}