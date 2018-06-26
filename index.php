<?php 
    require_once "core/init.php";

    $recentpost = $admin->recent_post();
    
    $new_category = $admin->get_category('tb_category');
    $new_category2 = $admin->get_category('tb_category');
    
    $perPage = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

    $artikel = $admin->get_artikel('tb_post',$start,$perPage);

    $all = $admin->get_artikel_all('tb_post');

    $total = $all->num_rows;

    $pages = ceil($total/$perPage);

    $recentpost = $admin->recent_post(); 

    $featpost = $admin->get_featpost('tb_post', 4);

    $feat_row = 1;

?>
<?php require_once('template/header.php');?>
<?php require_once('template/body.php');?>
<?php require_once('template/footer.php');?>