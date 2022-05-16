<?php
require('controller/frontend.php');

try {
    if (isset($_GET['url'])) {
        $action=str_replace("/","",$_GET['url']);
        route($action);
    }
    else {
        route('accueil');
    }
}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
