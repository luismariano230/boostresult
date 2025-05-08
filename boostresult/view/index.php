<?php
session_start();

if (isset($_SESSION['nome'])) {
    echo "Bem-vindo, " . $_SESSION['nome'] . "!";
} else {
    echo "Usuário não está logado.";
}
?>
