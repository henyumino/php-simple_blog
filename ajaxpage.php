<?php
    require_once "core/init.php";
    
    $idpost = $_POST['idpost'];
    $writter = $_POST['writter'];
    $status = "Draft";
    $idimagepost = $_POST['idpost'];
    $isipost = $_POST['isipost'];
    $slug = $_POST['slug'];
    $titlepost = $_POST['posttitle'];
    $category = $_POST['category'];
    $tags = $_POST['tag'];

    $getrow = $admin->get_row_tb('tb_post','slug',$slug);
    $getrow = $getrow->num_rows;
    
    if ($getrow > 1) {
        $getrow = $getrow + 1;
        $slug = $slug.$getrow;
    }

    if ($category == "") {
        $category = "";
    }
    // echo $isipost;

    if($admin->insert_post(array(
        'idpost' => $idpost,
        'writter' => $writter,
        'status' => $status,
        'idimagepost' => $idimagepost,
        'isipost' => $isipost,
        'slug' => $slug,
        'titlepost' => $titlepost,
        'category' => $category,
        'tags' => $tags
    ))){
        echo "berhasil";
    }
    else {
        echo "gagal";
    }

?>