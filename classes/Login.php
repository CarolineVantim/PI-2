<?php

require_once './banco/Database.php';

class Login extends Database
{

    public function validarLogin($email, $senha)
    {
        $login = "";
        $count = 0;

        $conn = database::setConnection();

        $sql = "SELECT Email, Senha FROM administrativo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (($email == $row["Email"]) && ($senha == $row["Senha"])) {
                    $login = "administrativo";
                    $count++;
                }
            }
        }


        $sql = "SELECT Email, Senha FROM aluno";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (($email == $row["Email"]) && ($senha == $row["Senha"])) {
                    $login = "aluno";
                    $count++;
                }
            }
        }

        $sql = "SELECT Email, Senha FROM professor";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (($email == $row["Email"]) && ($senha == $row["Senha"])) {
                    $login = "professor";
                    $count++;
                }
            }
        }

        $sql = "SELECT Email, Senha FROM empresa";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (($email == $row["Email"]) && ($senha == $row["Senha"])) {
                    $login = "empresa";
                    $count++;
                }
            }
        }


        if (!$conn) {
            return false;
        }

        $conn->close();

        if ($count < 2) {
            return $login;
        } else {
            return false;
        }
    }
}
