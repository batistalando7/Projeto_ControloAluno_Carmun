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
  <title>Confeitaria Confmat - Administrador</title>
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

<!--senha forte-->
<script type="text/javascript">
                    function validar()
                    {
                        var str = document.getElementById('txtsenha').value;

                        if(str.length<2)
                        {
                            document.getElementById("demo").innerHTML = "Digite";
                            document.getElementById("demo").style.backgroundColor = "White";
                            return("Curta demais");
                        }
                        else if(str.search(/[0-9]/) == -1)
                        {
                            document.getElementById("demo").innerHTML = "Obrigatório 1 numero";
                            document.getElementById("demo").style.backgroundColor = "Red";
                            return ("Número");
                        }
                        else if (str.search(/[a-z]/) == -1) {
                            document.getElementById("demo").innerHTML = "Obrigatório 1 letra minuscula";
                            document.getElementById("demo").style.backgroundColor = "Red";
                            return ("Minuscula");
                        }
                        else if (str.search(/[A-Z]/) == -1) {
                            document.getElementById("demo").innerHTML = "Obrigatório 1 letra maiuscula";
                            document.getElementById("demo").style.backgroundColor = "Red";
                            return ("Maiuscula");
                        }
                        else if (str.search(/[!/@/#/%/^/&/(/)/+/_/./,/;/:/-/]/) == -1) {
                            document.getElementById("demo").innerHTML = "Obrigatório 1 caracter especial(Ex: %,!,/)";
                            document.getElementById("demo").style.backgroundColor = "Red";
                            return ("Caracteres Especial(!,#,$,%,&,+,^)");
                        }
                        
                        document.getElementById("demo").innerHTML = "Excelente";
                        document.getElementById("demo").style.backgroundColor = "Green";
                        return ("OK");
                    }

                    function mostrar() {
                        var senha = document.getElementById("txtsenha");
                        if (senha.type == "password") {
                            senha.type = "text";
                        }
                        else {
                            senha.type = "password";
                        }
                      
                        
                    }
                </script>
                <!--fechar senha forte-->

  <!--Mensagem de confirmação do excluir-->
  <?php
  if(isset($_GET['msg']))
  {
     $msg = $_GET['msg'];
     echo "<script>alert('.$msg');</script>";
  }
  ?>
  <!--Fechar mensagem-->

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
            <h1 class="welcome-text"><img src="images/i10.png">Gestão de <span class="text-black fw-bold">Usuarios</span></h1>
            <h3 class="welcome-sub-text">Faça a gerencia dos seus usaurios do sistema</h3>
          </li>
        </ul>
        <!--Fechar header-->

        <!--Dropdownlist categoria-->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block">
            
          </li>
          <!--Fechar dropdownlist categoria-->

          <!--Pesquisar-->
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" id="txtfiltro" name="txtfiltro" placeholder="Pesquisar" title="Pesquisar" >
            </form>
          </li>
          <!--Fevhar Pesquisar-->

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
              <span class="menu-title" >Menu</span>
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


       
      
      <!-- Formulario de cadastro -->
      
      <!--PHP metodo cadastrar-->
      <?php
      if(isset($_POST['cadusuario']))
      {
        $usuario = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];
        
        $sql = "INSERT INTO tb_utilizador(nome_ut, senha_ut) VALUES('$usuario','$senha')";
        $result = mysqli_query($conexao,$sql);
        if($result)
        {
          echo "<script>alert('Cadastrado com sucusso!');</script>";
        }
        else
        {
          echo "<script>alert('Erro ao cadastrar!');</script>";
        }
      }

       ?>
      <!--Fechar cadastrar-->

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
                      <strong><label for="Usuario">Usuario</label></strong>
                      <input type="text" class="form-control" id="txtusuario" name="txtusuario" placeholder="Usuario" Required>
                    </div>
                    <div class="form-group">
                      <strong><label for="Senha">Senha</label></strong>
                      <input type="text" class="form-control" id="txtsenha" name="txtsenha" placeholder="Senha" onkeyup="validar()" Required>
                      <label aling="left" id="demo" name="demo"></label>
                   
                    <button type="submit" name="cadusuario" id="cadusuario" class="btn btn-outline-primary btn-fw" onclick="return confirm('Salvar dados ?')">Salvar</button>
                  </form>
                </div>
              </div>
            </div>
          
            <!--Fechar formulario-->
          </div>
        

        <br>
            <!--Lista-->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><img src="images/t3.png"> Lista De Usuarios</h4>
                  <p class="card-description">
                  <code>.Detalhes Dos Usuarios</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="tblista" name="tblista">
                      <thead>
                        <tr>
                          <th>ID Utilizador</th>
                          <th>Utilizador</th>
                          <th>Senha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql =  "SELECT * FROM `tb_utilizador` WHERE 1 ORDER BY nome_ut DESC";
                        $result = $conexao->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".$user_data['id_utilizador']."</td>";   
                            echo "<td>".$user_data['nome_ut']."</td>";
                            echo "<td>".$user_data['senha_ut']."</td>";
                            ?>
                            <td><a href="Page_Usuario_Editar.php?id=<?php echo $user_data['id_utilizador']?>" class="btn btn-outline-warning btn-fw"><img src="images/t1.png"></a></td>
                            <td><a href="Page_Usuario_Excluir.php?id=<?php echo $user_data['id_utilizador']?>" onclick="return confirm('Excluir Usuario ?')" class="btn btn-outline-danger btn-fw"><img src="images/t2.png"></a></td>
                           <?php                

                        }
                       ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--Fechar lista-->
            </div>

        <!-- Fechar geral -->

             <!-- Rodape -->
             <footer class="footer">
             <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Website <a href="https://www.bootstrapdash.com/" target="_blank">Carmun</a> Projeto Final.</span>
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
