
<!DOCTYPE html>
<html>
	<head>
		<title>Confeitaria Confmat - Administrador</title>
		<meta charset="utf-8">
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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
<body style="background: url('images/b2.jpg') right no-repeat; background-size: cover; height: 100vh;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container" style="background-color: #c45104;">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                <div class="logo mt-5 mb-3">
						<img class="rounded-circle" src="images/confmat.JPG" width="80px">
					</div>
                    
                    <?php

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    use PHPMailer\PHPMailer\SMTP;

                    require 'phpmailer/src/Exception.php';
                    require 'phpmailer/src/PHPMailer.php';
                    require 'phpmailer/src/SMTP.php';

                    if(isset($_POST["Send"]))
                    {
                        $Email = new PHPMailer(true);

                        $Email->isSMTP();
                        $Email->Host = 'smtp.gmail.com';
                        $Email->SMTPAuth = true;
                        $Email->Username = 'confeitariaconfmat23@gmail.com';
                        $Email->Password = 'fzoflbxvcjqxmncp';
                        $Email->SMTPSecure = 'ssl';
                        $Email->Port = 465;

                        $Email->setFrom('confeitariaconfmat23@gmail.com','Sistema de recuperação de senha');

                        $Email->addAddress($_POST["txtemail"]);

                        $Email->isHTML(true);

                        $Email->Subject = "Confmat Admin - Recuperação de senha, segue em anexo a sua senha do sistema:";
                        
                        include_once('Classe_Conexao.php');
                        $texto = $_POST['txtemail'];
                        $sql = "SELECT * FROM TB_USUARIO INNER JOIN TB_FUNCIONARIO ON TB_USUARIO.ID_FUNCIONARIO = TB_FUNCIONARIO.ID_FUNCIONARIO WHERE FUN_EMAIL = '$texto'";
                        $result = mysqli_query($conexao,$sql);
                        $dados = mysqli_fetch_assoc($result);

                        $Email->Body = $dados['SENHA'];

                        

                        if($Email->send())
                        {
                            echo "<script>alert('Email enviado!');</script>";
                        }
                        else
                        {
                            echo "<script>alert('Erro ao enviar!');</script>";
                        }

                    }
 
                    ?>

                    <div class="heading mb-3">
						<h4>Recuperação de senhas</h4>
					</div>
					<div class="reset-form d-block">
						<form class="" method="post">
                        <p class="mb-3 text-white">
								Insira o seu email para recuperar a sua password pelo email
							</p>
							<div class="form-input">
								<span><i class="fa fa-envelope"></i></span>
								<input type="email" id="txtemail" name="txtemail" placeholder="Email" required>
							</div>

							<div class="mb-3">
								<button type="submit" name="Send" id="Send" class="btn-outline-warning btn-fw">Enviar</button>
							</div>
							<div>
							<a href="Page_Login.php" onclick="return confirm('Ir para Login ?')" class="btn btn-outline-primary btn-fw">
								Login
							</a>
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>

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