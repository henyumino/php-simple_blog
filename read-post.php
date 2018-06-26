<?php
    require_once "core/init.php";

    if( !Session::cek_sesi('email') ){
        $user = 'Anonymous';
    }
    else {
        $user = 'Admin';
    }
    
    $slug = $_GET['slug'];
    
    $post = $admin->get_postdata('tb_post','slug',$slug);

    if(empty($post)){
        header('Location: 404.php');
    }
    
    $new_category = $admin->get_category('tb_category');
    $new_category2 = $admin->get_category('tb_category');

    $postdate = date("l ,d F, Y", strtotime($post['waktupost']));
    
    $tags = explode(',',$post['tags']);

    $recentpost = $admin->recent_post();
    
    if(empty($post['tags'])){
        $tags = "";
    }
    
    $admin->update_read('tb_post' , array(
        'idpost' => $post['idpost'],
        'read_time' => $post['read_time'] + 1
    ));

    if(isset($_POST['submit-comment'])){
        $admin->input_comment('tb_komentar', array(
            'idkomenpost'   => $post['idpost'],
            'namaakun'      => $user,
            'isikomentar'   => $_POST['comment-input'],
            'idreply'       => time()
        ));
    }

    $comment = $admin->get_comment('tb_komentar', 'idkomenpost', $post['idpost']); 
    $comment_count = $comment->num_rows;

    if(isset($_POST['submit-reply'])){
        $admin->input_reply('tb_reply', array(
            'idcomment'     => $_POST['comment-id'],
            'namaakun'      => $user,
            'isikomentar'   => $_POST['comment-input-reply']
        ));
    }


?>
<?php require_once('template/header.php');?>
<?php require_once('template/main-post.php');?>
<?php require_once('template/footer.php');?>