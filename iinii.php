<?php
session_start();
include_once('Classe_Conexao.php');

  if(empty($_SESSION['utilizador']) || $_SESSION['utilizador'] == '1')
  {
    echo "<script language='javascript' type='text/javascript'>
    alert('Efectue o seu login!');
    window.location.href='Page_Login.php'
    </script>";
  }
  else
  {
    $lbuser = $_SESSION['utilizador'];
    $sql = "SELECT * FROM tb_utilizador WHERE nome_ut = '$lbuser' LIMIT 1";
    $result = mysqli_query($conexao,$sql);
    $dados = mysqli_fetch_assoc($result); 
  }
  
  #
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Colégio Madrugada - Administrador</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />  
</head>
<body>

    <!-- Corpo -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.php">
            <h2 style="color: brown;"><strong>C</strong>armun</h2>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 

        <!--header-->
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Saudações Administrador, <span class="text-black fw-bold"><?php echo $dados['nome_ut'] ?></span></h1>
            <h3 class="welcome-sub-text">Faça a administração das entradas e saídas dos alunos.</h3>
          </li>
        </ul>
        <!--Fechar header-->

        <!--Dropdownlist categoria-->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block">
           
          </li>
          <!--Fechar dropdownlist categoria-->

          <li class="nav-item d-none d-lg-block">
            
          </li>
          
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Pesquisar" title="Pesquisar">
            </form>
          </li>

          <!--Notificacao-->
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">Há notificações</p>
                <span class="badge badge-pill badge-primary float-right">Ver</span>
              </a>
            </div>
          </li>
          <!--Fechar Notificacao-->

          <!--Sobre o incone-->
          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <span class="count"></span>
            </a>

            <!--Ver ultimas 5 noticacoes-->

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">Notificações </p>
                <span class="badge badge-pill badge-primary float-right">Ultimas 5</span>
              </a>
              <?php 
                        $estado = 'Ativo';
                        $sql ="SELECT * FROM `tb_aluno` INNER JOIN tb_entrada ON tb_aluno.id_aluno=tb_entrada.id_aluno ORDER BY id_entrada DESC LIMIT 15";
                        $result1 = $conexao->query($sql);
                        while($dados1 = mysqli_fetch_assoc($result1)) 
                        {
                          ?>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                          <img src="./upload/<?php echo $dados1['PT_IMAGEM']; ?>">
                          </div>
                          <div class="preview-item-content flex-grow py-4">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $dados1['nome_al'] ?></p>
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $dados1[''] ?></p>
                            <p class="fw-light small-text mb-0"><?php echo $dados1['ST_TOTAL'] ?> Kz</p>
                            <p class="fw-light small-text mb-0"><?php echo $dados1['ST_DATA'] ?></p>
                          </div>
                          <div class="dropdown-divider"></div>
                        </a>
                        <?php
                        }
              ?>
            </div>
            <!--Fechar Notificacao-->
            
          </li>
          
          
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" name="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/i14.png" alt="Profile image"></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold" id="usuario" name="usuario"><?php echo $lbuser; ?></p>
                <p class="fw-light text-muted mb-0"><?php echo $dados['FUN_EMAIL'] ?></p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> <?php echo $dados['FUN_TELEFONE'] ?> <span class="badge badge-pill badge-danger"></span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i><?php echo $dados['FUN_FUNCAO'] ?></a>
              <a class="dropdown-item" href="https://www.google.com/maps/dir//Confmat,+Lda/@-8.9161915,13.1922462,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x1a51f53230cac779:0xfac3ef16c99ba2a3!2m2!1d13.2622868!2d-8.9161981"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Google Maps</a>
              <a class="dropdown-item" href="Page_quebrar.php" onclick="return confirm('Fechar Admin ?')"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sair</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!--Fechar sobre-->
    
    <!-- geral -->
    <div class="container-fluid page-body-wrapper">

      <!-- Menu bar a esquerda -->
      <nav class="sidebar" id="sidebar">
        <ul class="nav">
          
          <!--Menu-->
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class=""><img src="images/i2.png"></img></i>
              <span class="menu-title" style="color: darkslategrey">Menu</span>
            </a>
          </li>
          <!--Fechar menu-->

          <!--Funcionarios-->
          <li class="nav-item nav-category">Funcionalidades</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class=""><img src="images/i1.png"></img></i><t></t>
              <span class="menu-title">Usuarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Page_Usuario.php">Usuarios</a></li>
              </ul>
            </div>
          </li>
          <!--Fechar Funcionarios-->

          
          <!--Produtos-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class=""><img src="images/i3.png"></img></i>
              <span class="menu-title">Etiquetas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Page_Produto.php">Etiquetas</a></li>
              </ul>
            </div>
          </li>
          <!--Fechar Produtos-->

          <!--Clientes-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class=""><img src="images/i4.png"></img></i>
              <span class="menu-title">Clientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Page_Cliente.php">Alunos</a></li>
              </ul>
            </div>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Page_Encarregado.php">Encarregados</a></li>
              </ul>
            </div>
          </li>
          <!--Fechar clientes-->

          <!--Login-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class=""><img src="images/i6.png"></i>
              <span class="menu-title">Login</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Page_Login.php" onclick="return confirm('Logar novamente ?')">Login</a></li>
              </ul>
            </div>
          </li>
          <!--Fechar Login-->

          <!--Ajuda-->
          <li class="nav-item nav-category">Ajuda</li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class=""><img src="images/i7.png"></i>
              <span class="menu-title">Reclamação</span>
            </a>
          </li>
          <!--Fechae Ajuda-->

        </ul>
      </nav>
      <!-- fechar menu bar a esquerda -->

      <!-- informacao -->
      <div class="main-panel">
        <div class="content-wrapper">
              <div class="row"> 
                <!--Tabela-->
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title"><img src="images/entrada.svg" width="30" height="30"> Entradas</h4>
                      <p class="card-description">
                        Todos<code> alunos presentes</code>
                      </p>
                      <div class="table-responsive">
                       
                      <table class="table table-hover">
                      <thead>
                        <tr>
                         <th>ID</th>
                          <th>Aluno</th>
                          <th>Telefone</th>
                          <th>Morada</th>
                          <th>Email</th>
                          <th>Curso</th>
                          <th>Classe</th>
                          <th>Ano Lectivo</th>
                          <th>Hora</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            
                        <?php
                        $sql = "SELECT * FROM `tb_aluno` INNER JOIN tb_entrada ON tb_aluno.id_aluno=tb_entrada.id_aluno ORDER BY id_entrada DESC LIMIT 15";
                        $result = $conexao->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <?php
                            
                            echo "<td>".$user_data['id_entrada']."</td>";
                            echo "<td>".$user_data['nome_al']."</td>";
                            echo "<td>".$user_data['telefone_al']."</td>";
                            echo "<td>".$user_data['morada_al']."</td>";
                            echo "<td>".$user_data['email_al']."</td>";
                            echo "<td>".$user_data['curso_al']."</td>";
                            echo "<td>".$user_data['classe_al']."</td>";
                            echo "<td>".$user_data['ano_lectivo_al']."</td>";
                            echo "<td>".$user_data['hora_data_ent']."</td>";
                            
                            ?>
                            <!--Editar e excluir-->
                            <td><a href="Page_Solicitacao_Confirmacao.php?id=<?php echo $user_data['ID_SOLICITACAO']?>"
                             class="btn btn-outline-warning btn-fw" onclick="return confirm('Enviar Confirmação ?')"><img src="images/t6.png"></a></td>
                             
                            <td><a href="Page_Solicitacao_Excluir.php?id=<?php echo $user_data['ID_SOLICITACAO']?>"
                             class="btn btn-outline-danger btn-fw" onclick="return confirm('Excluir Solicitacao ?')"><img src="images/t2.png"></a></td>
                            <!--Fechar editar e excluir-->
                           <?php                
                          echo "</tr>";
                        }
                       ?> 
                        </tr>
                      </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
            <!--Fechar tabela-->

             <!--Tabela-2-->
             <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title"><img src="images/out.svg" width="30" height="30"> Saidas</h4>
                      <p class="card-description">
                        Todos<code> alunos ausentes</code>
                      </p>
                      <div class="table-responsive">
                       
                      <table class="table table-hover">
                      <thead>
                        <tr>
                         <th>ID</th>
                          <th>Aluno</th>
                          <th>Telefone</th>
                          <th>Morada</th>
                          <th>Email</th>
                          <th>Curso</th>
                          <th>Classe</th>
                          <th>Ano Lectivo</th>
                          <th>Hora</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            
                        <?php
                        $sql = "SELECT * FROM `tb_aluno` INNER JOIN tb_saida ON tb_aluno.id_aluno=tb_saida.id_aluno ORDER BY id_saida DESC LIMIT 15";
                        $result = $conexao->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <?php
                            
                            echo "<td>".$user_data['id_saida']."</td>";
                            echo "<td>".$user_data['nome_al']."</td>";
                            echo "<td>".$user_data['telefone_al']."</td>";
                            echo "<td>".$user_data['morada_al']."</td>";
                            echo "<td>".$user_data['email_al']."</td>";
                            echo "<td>".$user_data['curso_al']."</td>";
                            echo "<td>".$user_data['classe_al']."</td>";
                            echo "<td>".$user_data['ano_lectivo_al']."</td>";
                            echo "<td>".$user_data['hora_data_sai']."</td>";
                            
                            ?>
                            <!--Editar e excluir-->
                            <td><a href="Page_Solicitacao_Confirmacao.php?id=<?php echo $user_data['ID_SOLICITACAO']?>"
                             class="btn btn-outline-warning btn-fw" onclick="return confirm('Enviar Confirmação ?')"><img src="images/t6.png"></a></td>
                             
                            <td><a href="Page_Solicitacao_Excluir.php?id=<?php echo $user_data['ID_SOLICITACAO']?>"
                             class="btn btn-outline-danger btn-fw" onclick="return confirm('Excluir Solicitacao ?')"><img src="images/t2.png"></a></td>
                            <!--Fechar editar e excluir-->
                           <?php                
                          echo "</tr>";
                        }
                       ?> 
                        </tr>
                      </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
            <!--Fechar tabela-2-->
          </div>
        </div>

        <!-- Rodape -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Website <a href="https://www.bootstrapdash.com/" target="_blank">Carmun</a> Projeto Final.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Todos os direito reservados.</span>
          </div>
        </footer>
        <!-- Fechar rodape -->

      </div>
      <!-- fechar informacao -->

    </div>
    <!-- fechar geral -->
  </div>
  <!-- fechar corpo -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- Plugin javascript para pagina -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- Fechar plugin javascript para pagina -->

  <!-- links:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- fechar links -->

  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
