<?php
    require_once "core/init.php";

    if( !Session::cek_sesi('email') ){
        header('Location: login.php');
    }

    $email = Session::get('email');
    $result = $admin->profile_admin($email);
    // paging
    $perPage = 6;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

    $artikel = $admin->get_artikel('tb_post',$start,$perPage);

    $all = $admin->get_artikel_all('tb_post');

    $total = $all->num_rows;

    $pages = ceil($total/$perPage);
    
?>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
<body>
    <div class="dash-sidemenu">
        <div class="profile-box">
            <div class="profile-photo">
            <?php while($row = $result->fetch_assoc()):?>
                <div class="dash-profile-photo" style="background-image: url('<?= $row['idfoto']?>');"></div>
            </div>
                <span class="user-name"><?= $row['nama']?> <i class="fa fa-angle-down fa-1x" style="transform: rotate(0deg)"></i></span>
            <?php endwhile;?>
        </div>
        <div class="menu-user">
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-cog fa-1x"></i>
                    <a href="setting.php">Edit Profile</a>
                </span> 
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-sign-out fa-1x"></i>
                    <a href="logout.php">Logout</a>
                </span> 
            </div>
        </div>
        <div class="sidemenu-top">
            <span class="dash-tab">
                <i class="fa fa-dashboard fa-1x"></i>
                <a>Dashboard</a>
            </span>
        </div>
        <div class="sidemenu-box">
            <div class="dash-menutab" id="dash-active">
                <span class="dash-menutab-sib">
                    <i class="fa fa-file fa-1x"></i>
                    <a>Posts</a> 
                </span>
                <i class="fa fa-caret-left fa-2x" id="caret"></i>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-comment fa-1x"></i>
                    <a>Comments</a>
                </span>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-paint-brush fa-1x"></i>
                    <a>Appearance</a>
                </span>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-cog fa-1x"></i>
                    <a>Setting</a>
                </span>
            </div>
        </div>
    </div>
    <div class="dashboard-header">
        <!-- hide show menu , search box -->
        <div class="toggle-dash">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="addpost-head">
            <a href="post-new.php">
                <i class="fa fa-file-text fa-2x"></i>
            </a>    
        </div>
    </div>
    <div class="dash-body">
        <div class="main-post-body">
            <span class="title-page">Post</span>
            <div class="dash-whilepost">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>No</td>
                        <td>Title</td>
                        <td>Categories</td>
                        <td><i class="fa fa-comment fa-1x"></i></td>
                        <td><i class="fa fa-eye fa-1x"></i></td>
                        <td>Date</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php $p = $start;?>
                    <?php while($row = $artikel->fetch_assoc()): $p++;?>
                    <tr>
                        <td>
                            <span class="post-title-tr-td">
                                <?= $p;?>    
                            </span>
                        </td>
                        <td>
                            <span class="post-title-tr">
                                <a href="post.php?postid=<?= $row['idpost']?>"><?= $row['titlepost']?></a>
                            </span>
                            
                            <div class="post-action">
                                <span class="post-action-ev">
                                    <a href="post.php?postid=<?= $row['idpost']?>">Edit</a>
                                    |
                                    <a href="#">Delete</a>
                                </span>
                            </div>
                        </td>
                        <td>
                            <span class="post-title-tr">
                                <?= $row['category']?>
                            </span>
                        </td>
                        <td>
                            <span class="post-title-tr">None</span>
                        </td>
                        <td>
                            <span class="post-title-tr"><?= $row['read_time']?></span>
                        </td>
                        <td>
                            <span class="post-title-tr"><?= date("d/m/Y",strtotime($row['waktupost']))?></span>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </table>
                <div class="paging">
                    <?php if($page > 1):?>
                        <span class="page-number"><a href="?page=<?= $page-1?>"><<</a></span>
                    <?php else:?>
                    <?php endif;?>
                    <?php for($i = 1;$i <= $pages; $i++):?>
                        <?php if($page == $i):?>
                        <a class="page-number" style="color: #1194f6" href="?page=<?= $i?>"><?= $i?></a>
                        <?php else:?>
                        <a class="page-number" href="?page=<?= $i?>"><?= $i?></a>
                        <?php endif;?>
                    <?php endfor;?>
                    <?php if($page != $i-1):?>
                        <span class="page-number"><a href="?page=<?= $page+1?>">>></a></span>
                    <?php else:?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>