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
    <script type="text/javascript">
      function loginsuccessfully() {
          setTimeout("window.location='../index.php'", 1000);
      }
      function loginfailed(){
          setTimeout ("window.location='../login.php'", 1000);
      }
    </script>

  </head>
  <body class="">

    <?php 
        
    require './config/conexao.php';

    $conexao = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysqli_error());

    mysqli_select_db($conexao, DBNAME) or die(mysqli_error());
    //codigo PHP
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'") or die(mysqli_error());
    $row = mysqli_num_rows($sql);
    if ($row > 0) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        echo "<center>Você foi autenticado com Sucesso</center>";
        // header('Location: index.php');
        echo "<script>loginsuccessfully()</script>";
    } else {
        echo "<center>Nome de usuario ou senha invalido! tentar novamente.</center>";
        // header('Location: login.php');
        echo "<script>loginfailed()</script>";
    }
    ?>
  </body>
</html>    
