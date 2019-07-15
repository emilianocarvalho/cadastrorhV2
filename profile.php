<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>eServidor - eservidor.procon.pb.gov.br - Sistemas Administrativos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <!-- <script type="text/javascript">
      function loginsuccessfully() {
          setTimeout("window.location='../servidores.php'", 1000);
      }
      function loginfailed(){
          setTimeout ("window.location='../login.phplogin.php'", 1000);
      }
    </script> -->

  </head>
  <body class="">
<?php
    require_once './utils/const.php';
    require_once './utils/utils.php';

    require './config/conexao.php';
    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysql_error());

    mysqli_select_db($conexao, DBNAME) or die(mysqli_error());

    if (!$conexao) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    // echo "Success: A proper connection to MySQL was made! The database is great." . PHP_EOL;
    // echo "Host information: " . mysqli_get_host_info($conexao) . PHP_EOL;
    
    // mysqli_close($conexao);
    
    session_start();
    if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
        header("Location: index.php");
        exit;
    } else {
        // echo "<center>Você está logado</center>";
    }

    // Recebe o id do cliente do cliente via GET
    if (isset($_GET['id'])) {
        $id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
    }

    // Valida se existe um id e se ele é numérico
    if (!empty($id_cliente) && is_numeric($id_cliente)) :

        // Captura os dados do cliente solicitado
        $conexao = conexao::getInstance();
        $sql = 'SELECT id, nome, pai, mae, rua, numero, complemento, cep, bairro, cidade, email, cpf, identidade, titulo, zona, secao, pis, 
        carteiratrabalho, reservista, escolar, instituicao, curso, deficiente, nota, cargo, funcao, forma_admissao, regime, setor, matricula,
        data_nascimento, data_admissao, sexo, nacionalidade, naturalidade, estado, estado_civil, numero_dependente, telefone, celular, whatsapp,
        banco, agencia, conta_corrente, status, foto, cnh, cnh_categoria, tipo_sangue, deficiente, deficiente_tipo FROM servidor WHERE id = :id';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id_cliente);
        $stm->execute();

        $cliente = $stm->fetch(PDO::FETCH_OBJ);

        if (!empty($cliente)) :

                // Formata a data no formato nacional
        $array_data = explode('-', $cliente->data_nascimento);
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

                // Formata a data no formato Nacional
        $array_data2 = explode('-', $cliente->data_admissao);
        $data_formatada2 = $array_data2[2] . '/' . $array_data2[1] . '/' . $array_data2[0];

        endif;
        // var_dump($cliente);

    endif;
    ?>
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.php">
                <img src="./assets/images/eServidor.png" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(./assets/images/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(./assets/images/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(./assets/images/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./assets/images/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Procon PB NTI</span>
                      <small class="text-muted d-block mt-1">TIPO PERFIL</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Perfil
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Configurações
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Caixa de Entrada
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Mensagens
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Sair
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <?php $HeaderContext = 'Servidores - Perfil'; ?>
        <?php include_once("./partials/nav.php"); ?>
        
        <div class="my-3 my-md-5">
          <div class="container">
            
            <?php if (empty($cliente)) : ?>
              <h3 class="text-center text-danger">Cliente não encontrado!</h3>
            
            <?php else : ?>

            <div class="row">
              <div class="col-lg-4">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url(./fotos/<?php echo verificaFoto($conexao, $cliente->id); ?>);"></div>
                  <div class="card-body text-center">
                    <img class="card-profile-img" src='./fotos/<?php echo verificaFoto($conexao, $cliente->id); ?>'>
                    <!-- <img class="card-profile-img" src="demo/faces/male/16.jpg"> -->
                    <h3 class="mb-3"><?php echo $cliente->nome; ?></h3>
                    <p class="mb-4">
                      <?php echo $cliente->email; ?>, matrícula <?php echo $cliente->matricula;?>. <?='<br>';?> Tipo Sanguíneo <?php echo $cliente->tipo_sangue; ?>.
                    </p>
                    <button class="btn btn-outline-primary btn-sm">
                      <span class="fa fa-twitter"></span> Follow
                    </button>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="media">
                      <span class="avatar avatar-xxl mr-5" style="background-image: url(demo/faces/male/21.jpg)"></span>
                      <div class="media-body">
                        <h4 class="m-0"><?php echo $cliente->nome; ?></h4>
                        <p class="text-muted mb-0"><?= $cliente->cargo ?></p>
                        <ul class="social-links list-inline mb-0 mt-2">
                          <li class="list-inline-item">
                            <a href="javascript:void(0)" title="Facebook" data-toggle="tooltip"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="javascript:void(0)" title="<?= $cliente->whatsapp ?>" data-toggle="tooltip"><i class="fa fa-whatsapp"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="javascript:void(0)" title="<?= $cliente->telefone ?>" data-toggle="tooltip"><i class="fa fa-phone"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="javascript:void(0)" title="@skypename" data-toggle="tooltip"><i class="fa fa-skype"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">My Profile</h3>
                  </div>
                  <div class="card-body">
                    <form action="action_profile.php" method="post" id='form-contato' enctype='multipart/form-data'>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar avatar-xl" style="background-image: url(demo/faces/female/9.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label class="form-label">Email-Address</label>
                            <input class="form-control" placeholder="your-email@domain.com"/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control" rows="5">Big belly rude boy, million dollar hustler. Unemployed.</textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email-Address</label>
                        <input class="form-control" placeholder="your-email@domain.com"/>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" value="password"/>
                      </div>
                      <div class="form-footer">
                        <button class="btn btn-primary btn-block">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">                
                <form>
                  <div  class="card">
                  <?php include("profile-pessoal.php"); ?>                  
                  </div>
                  <div  class="card">
                  <?php include("profile-cadastral.php"); ?>                  
                  </div>
                </form>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <?php include("./partials/footer.php"); ?>
    </div>
  </body>
</html>