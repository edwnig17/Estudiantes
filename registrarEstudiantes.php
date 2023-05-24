<?php

if (isset($_POST['guardar'])){
    require_once("config.php");

    $config = new Config();

    $config->setNombres($_POST['nombres']);
    $config->setDireccion($_POST['direccion']);
    $config->setLogros($_POST['logros']);
    $config->setSer($_POST['ser']);
    $config->setIngles($_POST['ingles']);
    $config->setReview($_POST['review']);
    $config->setSkills($_POST['skills']);

    $config->insertData();

    echo "<script>alert('los datos fuero guardados satisfactoriamente'); document.location='estudiantes.php'</script>";
}
?>