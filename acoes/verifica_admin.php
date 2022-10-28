<?php
// Inicia sessões
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["email"]) || $_SESSION["adm"] != 1)
{
// Usuário não logado! Redireciona para a página de login
header("Location: admin.php");
exit;
}
?>