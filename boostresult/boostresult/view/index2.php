<?php
    echo $_POST['nome'];
 if (!empty($_POST['acao'])) {
    $msg = $_POST['acao'];
    echo $msg;
 } else {
    header('Location: index.html?msg=erro');
 };
 
 

?>
