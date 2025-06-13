<?php
require('model/participants_model.php');

function index()
{
    $participants=getParticipants();
    $titre="liste des participants";
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/participants_view.php');
    require('view/autres_pages/footer.php');
}