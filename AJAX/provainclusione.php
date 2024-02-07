<?php
include '../CLASSI/ClassiGenerali/Data.php';

include '../CLASSI/SingoloIncontroMVC/SingoloIncontroModel.php';


$data = new Data(10,2,2);
echo $data->getGiorno();
?>