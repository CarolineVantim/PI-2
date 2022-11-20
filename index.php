<?php
    require_once('classes/Login.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for tipo Post
        $usuario = new Login();
        $result = $usuario->getEmpresa($_POST['email']); 
        $row = $result->fetch_assoc(); 
        if($_POST['email'] and $_POST['senha']){ // se o usuario e senha for valido
            session_start(); // inicializa session 
            $_SESSION['loggedin'] = TRUE; // seta no session loggedin verdadeiro
            header("location: dashboard.php"); // redireciona para inicio
            } else {
                $_SESSION['loggedin'] = FALSE; // se não seta no session loggedin falso
        }
    }
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .title{text-align: center; margin-top:30px;}
        .wrapper{ width: 350px; padding: 20px; margin: auto; margin-top: 50px;}
    </style>
</head>
<body>
    <h1 class="title">Login</h1>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuário</label>
                <input type="email" name="email" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>