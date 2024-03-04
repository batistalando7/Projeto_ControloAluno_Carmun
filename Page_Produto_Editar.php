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
  <div class="container-scroller">
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
            <h1 class="welcome-text"><img src="images/t5.png"> Editar <span class="text-black fw-bold">Etiquetas</span></h1>
            <h3 class="welcome-sub-text">Faça a edição das informações do Etiquetas</h3>
          </li>
        </ul>
        <!--Fechar header-->

        <!--Dropdownlist categoria-->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block">
            
          </li>
          <!--Fechar dropdownlist categoria-->


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!--Fechar sobre-->
    
    <!-- geral -->
    <div class="container-fluid page-body-wrapper">

      <!-- Escolher a cor -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Cor Menu Lateral</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">Cor Menu Bar</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!--Fechar escolher cor-->

      <!-- Menu bar a esquerda -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
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
              <span class="menu-title">Funcionarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Page_Funcionarios.php">Funcionarios</a></li>
                <li class="nav-item"><a class="nav-link" href="Page_Usuario.php">Usuario</a></li>
              </ul>
            </div>
          </li>
          <!--Fechar Funcionarios-->


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
          <a class="nav-link" href="Page_Reclamacao.php">
              <i class=""><img src="images/i7.png"></i>
              <span class="menu-title">Reclamação</span>
            </a>
          </li>
          <!--Fechae Ajuda-->

        </ul>
      </nav>
      <!-- fechar menu bar a esquerda -->
     
      <!-- Formulario de cadastro -->
      
      <!--PHP metodo Editar-->
      <?php
      $id = $_GET['id'];
      if(isset($_POST['editarusuario']))
      {
        $codigo = $_POST['txtcodigo'];
        $aluno = $_POST['txtaluno'];


        $sql = "UPDATE tb_etiqueta SET codigo_et ='$codigo', id_aluno ='$aluno' where id_etiqueta = $id  ";
        $result = mysqli_query($conexao,$sql);
        if($result)
        {
            echo "<script>alert('Editado com sucesso');</script>";
        }
        else
        {
            header("Location: Page_Encarregado.php?msg= Impossivel Editar");
        }
      }

       ?>
      <!--Fechar Editar-->

      <!--Buscar os valores-->
      <?php
          $id = $_GET['id'];
          $sql = "SELECT * FROM tb_etiqueta WHERE id_etiqueta = $id LIMIT 1";
          $result = mysqli_query($conexao,$sql);
          $dados = mysqli_fetch_assoc($result);
      ?>
      <!--Fechar Buscar-->
       <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><img src="images/t4.png"> Dados</h4>
                  <p class="card-description">
                    Preencha os campos
                  </p>
                  <form method="post" class="forms-sample">
                  <div class="form-group">
                      <strong><label for="Codigo">Codigo Etiqueta</label></strong>
                      <input type="text" class="form-control" id="txtcodigo" name="txtcodigo" value="<?php echo $dados['codigo_et'] ?>" Required>
                    </div>
                    <div class="form-group">
                      <strong><label for="Aluno">Selecione Aluno</label></strong>
                      
                      <!--Selecionar nome e valor do id funcionario-->
                           <select name="txtaluno" id="txtaluno" class="form-control">
                                <?php
                                    $sql1 = "SELECT * FROM tb_aluno ORDER BY nome_al DESC";
                                    $result1 = $conexao->query($sql1);
                                    while($dados1 = mysqli_fetch_assoc($result1))
                                    {
                                    ?>
                                        <option value="<?php echo $dados1['id_aluno'] ?>"><?php echo $dados1['nome_al'] ?></option>
                                    <?php 
                                    }
                                ?>
                           </select>
                      <!--Fechar selecionar-->

                    </div>
                    <button type="submit" name="editarusuario" id="cadusuario" class="btn btn-outline-warning btn-fw">Editar</button>
                    <a href="Page_Produto.php" class="btn btn-outline-danger btn-fw">Voltar</a>
                  </form>
                </div>
              </div>
            </div>
          
            <!--Fechar formulario-->
          </div>
         </div>

        <!-- Fechar geral -->

             <!-- Rodape -->
             <footer class="footer">
             <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Website <a href="https://www.bootstrapdash.com/" target="_blank">Cormun</a> Projeto Final.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Todos os direito reservados.</span>
          </div>
        </footer>
        <!-- Fechar rodape -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
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

