<?php
include_once('Classe_Conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM tb_encarregado WHERE id_encarregado = $id";
$result = mysqli_query($conexao,$sql);
try
{
    if($result)
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Excluido com sucesso!');
        window.location.href='Page_Encarregado.php'
        </script>";
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro ao excluir!');
        window.location.href='Page_Encarregado.php'
        </script>";
    }
}
catch(Exception $ex)
{
    echo "<script>alert('Erro ao excluir!');</script>" + $ex;
}

?>