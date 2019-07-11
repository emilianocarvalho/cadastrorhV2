<?php $HeaderContext = 'Servidores'; ?>
<?php include("./partials/nav.php"); ?>
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
        header('Location: index.php');
        exit;
    }
    echo '<center>Você está logado</center>';

    // Recebe o termo de pesquisa se existir
    
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

            <div class="row row-cards row-deck">
              
              <div class="col-md-6 col-lg-12">
                <div class="row">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value float-right text-blue">+5%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">Total Servidores</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-1" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function (c3, $) {
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-1',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Total Servidores'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#467fcf']
                      			}
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value float-right text-red">-3%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">Efetivos</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-2" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function (c3, $) {
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-2',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Efetivos'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#e74c3c']
                      			}
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value float-right text-green">-3%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">A Disposição</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-3" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function (c3, $) {
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-3',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'A Disposição'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#5eba00']
                      			}
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value float-right text-yellow">9%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">Comissionados</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-4" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function (c3, $) {
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-4',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Comissionados'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#f1c40f']
                      			}
                      		});
                      	});
                      });
                    </script>
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
                          <td><img src='cadastro_completo/fotos/<?php echo verificaFoto($conexao, $cliente->id); ?>' height='40' width='40'></a></td>
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