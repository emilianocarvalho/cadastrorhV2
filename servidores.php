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
    <title>Homepage - tabler.github.io - a responsive, flat and full featured admin template</title>
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

    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysqli_error());

    mysqli_select_db($conexao, DBNAME) or die(mysqli_error());

    if (!$conexao) {
        echo 'Error: Unable to connect to MySQL.'.PHP_EOL;
        echo 'Debugging errno: '.mysqli_connect_errno().PHP_EOL;
        echo 'Debugging error: '.mysqli_connect_error().PHP_EOL;
        exit;
    }

    // echo 'Success: A proper connection to MySQL was made! The database is great.'.PHP_EOL;
    // echo 'Host information: '.mysqli_get_host_info($conexao).PHP_EOL;

    session_start();


    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        // session_start();
        // session_destroy();
        header('Location: login.php');
        exit;
    }
    
    $termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

    // Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
    if (empty($termo)) {
        $conexao = conexao::getInstance();
        $sql = 'SELECT id, nome, email, celular, data_nascimento, status, foto FROM servidor';
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
    } else {
        // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
        $conexao = conexao::getInstance();
        $sql = 'SELECT id, nome, email, celular, status, foto FROM servidor WHERE nome LIKE :nome OR email LIKE :email 
        OR celular LIKE :celular';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $termo.'%');
        $stm->bindValue(':email', $termo.'%');
        $stm->bindValue(':celular', $termo.'%');
        $stm->execute();
        $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
    }

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

        <?php $HeaderContext = 'Servidores'; ?>

        <?php include_once("./partials/nav.php"); ?>
        <div class="my-3 my-md-5">
          <div class="container">
              <div class="page-header">
                <h1 class="page-title">
                <?php echo $HeaderContext ?>
                </h1>
            </div>


            <div class="row row-cards row-deck">
              
              <div class="col-md-6 col-lg-12">
                <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-user"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">132 <small>Total</small></a></h4>
                      <small class="text-muted">12 servidores</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-user-check"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">78 <small>Efetivos</small></a></h4>
                      <small class="text-muted">32 iniciais</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">23 <small>Outros Orgãos</small></a></h4>
                      <small class="text-muted">13 transferencias</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                      <i class="fe fe-user-plus"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">30 <small>Comissionados</small></a></h4>
                      <small class="text-muted">16 esperando</small>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Listagem</h3>
                  </div>
                  <div class="table-responsive">
                  <?php if (!empty($clientes)) {
                      ?>

                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">ID.</th>
                          <th>Foto</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone(s)</th>
                          <th>Admissão</th>
                          <th>Setor</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($clientes as $cliente) {
                      ?>

                        <tr>
                          <td><span class="text-muted"><?php echo $cliente->id; ?></span></td>
                          <td><img src='./fotos/<?php echo verificaFoto($conexao, $cliente->id); ?>' height='40' width='40'></a></td>
                          <!-- <td><a href="invoice.html" class="text-inherit">Design Works</a></td> -->
                          <td><?php echo $cliente->nome; ?></td>
                          <td><?php echo $cliente->email; ?></td>
                          <td><?php echo $cliente->celular; ?></td>
                          <td>$887</td>
                          <td><span class="status-icon bg-success"></span><?php echo $cliente->status; ?></td>
                          <td class="text-right">
                            <a href='cadastro_completo/editar.php?id=<?php echo $cliente->id; ?>' class="btn btn-secondary btn-sm">Gerenciar</a>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Ações</button>
                            </div>
                          </td>
                          <td>
                            <a class="icon" href="javascript:void(0)">
                              <i class="fe fe-edit"></i>
                            </a>
                          </td>
                        </tr>

                      <?php } ?>

                      </tbody>
                    </table>
                  <?php
                    } else {
                        ?>

                            <h3 class="text-center text-primary">Não existem Funcionários cadastrados!</h3>
                          <?php
                    } ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("./partials/footer.php"); ?>