<?php
    session_start(); // initial session

    if(!isset($_SESSION["aluno"]) || $_SESSION["aluno"] !== true){ // se não existir loggedin no session ou loggedin não estuver valido volta para index.php
        header("location: index.php");
        exit;
    }


?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="dashboardAluno.php">Aluno</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Matérias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="listaProfessor.php">Português</a></li>
            <li><a class="dropdown-item" href="ListaAluno.php">Matemática</a></li>
            <li><a class="dropdown-item" href="#">Inglês</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Atividades Extracurriculares</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
    </div>
  </div>
</nav>

<div class="container">

	<?php
		require_once('./classes/Post.php');
    $post = new Post();
    $posts = $post->getPost();

		if (empty($posts))
			echo "<h1>Nenhuma postagem encontrada!</h1>";
		else
			foreach ($posts as $post):
	?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="upload/matematica.jpg" height='350' width='350' alt="Card image cap"> 
  <div class="card-body">
    <h5 class="card-title"><a href="exibe.php?id=<?php echo $post['idPost']; ?>" title="<?php echo $post['titulo']; ?>"><?php echo $post['titulo']; ?></a></h5>
    <h6 class="card-subtitle mb-2 text-muted">
        por <b><?php echo $post['idProfessor']; ?></b>
    em <b><?php echo date('d/m/Y', strtotime($post['dataPost'])) ?></b> 
  </h6>
    <p class="card-text">
        <?php
      $str = strip_tags($post['corpo']);
      $len = strlen($str);
      $max = 500;

      if ($len <= $max)
        echo $str;
      else
        echo substr($str, 0, $max) . '...';
        ?>
    </p>
    <div class="pb-5"><a href="exibe.php?id=<?php echo $post['idPost']; ?>" class="btn btn-dark float-right" title="Ler Mais">Ler Mais</a></div>
  </div>
</div>

<?php endforeach; ?>
</div>

<!-- <div class="card" style="width: 18rem;">
  <img src="upload/matematica.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<!-- </div>
    <div class="wrapper">
        <section class="aluno">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-center">Título</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Professor</th>
                    </tr>
                </thead>
                <tbody>
                    
                        // require_once('./classes/Post.php');
                        // $post = new Post();
                        // $posts = $post->getPost();
                        // foreach($posts as $key){ 
                        //     $titulo = $key['titulo'];
                        //     $corpo = $key['corpo'];
                        //     echo "<tr><td>$titulo</td><td>$corpo</td></tr>";
                        //}
                    
                </tbody>
            </table>
        </section>
    </div> -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>