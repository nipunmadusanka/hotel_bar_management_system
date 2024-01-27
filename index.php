<?php require_once('header.php'); 
?>

<?php
if (isset($_GET['page'])){
    $page = 'pages/' . $_GET['page'].'.php';
} else {
    $page = 'dashboard.php';
}
if (file_exists($page)){
    require_once($page);
}else {
    require_once('pages/brand_table.php');
}
?>
 
<?php require_once('footer.php'); ?>