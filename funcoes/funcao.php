<?php
function formatDateFromDB($data){
    $dt = \DateTime::createFromFormat("Y-m-d", $data);
    return $dt->format("d/m/Y");
}