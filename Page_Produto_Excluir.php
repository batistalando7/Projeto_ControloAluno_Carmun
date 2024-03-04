<?php
include_once('Classe_Conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM tb_etiqueta WHERE id_etiqueta = $id";
$result = mysqli_query($conexao,$sql);
try
{
    if($result)
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Excluido com sucesso!');
        window.location.href='Page_Produto.php'
        </script>";
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro ao excluir!');
        window.location.href='Page_Produto.php'
        </script>";
    }
}
catch(Exception $ex)
{
    echo "<script>alert('Erro ao excluir!');</script>" + $ex;
}

?>