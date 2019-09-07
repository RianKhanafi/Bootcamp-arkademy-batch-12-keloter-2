<?php
function login_validasi($username = "username", $password = "aH!a5aiya")
{
    // password validasi
    if (preg_match("/[a-z]/", $password)) {
        if (preg_match("/[A-Z]/", $password)) {
            if (preg_match("/[0-9]/", $password)) {
                if (preg_match("/[!@#$%^&*()]/", $password)) {
                    if (strlen($password) >= 8) {
                        echo "password:" . $password;
                    } else {
                        echo "passsword minimal 8 karakter";
                    }
                } else {
                    echo " password harus kombinasi min 1 karakter special";
                }
            } else {
                echo "password harus kombinasi angka";
            }
        } else {
            echo "password harus kombinasi huruf besar kecil";
        }
    }
    if (preg_match("/[a-z]/", $username)) {
        if (!preg_match("/[A-Z]/", $username)) {
            if (!preg_match("/[0-9]/", $username)) {
                if (!preg_match("/[!@#$%^&*()+=]/", $username)) {
                    $sum = strlen($username);
                    if ($sum >= 5 and $sum <= 9) {
                        echo "&nbsp; username:" . $username;
                    } else {
                        echo "Username minimal 5 dan maksimal 9";
                    }
                } else {
                    echo "tidakboleh ada karakter special";
                }
            } else {
                echo "Angka tidak boleh";
            }
        } else {
            echo "username harus kombinasi huruf kecil";
        }
    }
}


echo login_validasi();
