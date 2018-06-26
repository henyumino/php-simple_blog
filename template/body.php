<div id="news-prev">
    <?php while($new_featpost = $featpost->fetch_assoc()):?>
        <?php if($feat_row == 1):?>
        <div class="left-box">
            <a href="read-post.php?slug=<?= $new_featpost['slug']?>"></a>
                <?php
                    if(!empty($new_featpost['category'])){
                        echo '<span class="tag-news" style="background: red;">'.$new_featpost['category'].'</span>';
                    }
                    else{

                    }
                ?>
            <div class="des-news">
                <h2>
                <?php 
                    if(strlen($new_featpost['titlepost']) > 85){
                        $title_feat = substr($new_featpost['titlepost'], 0, 85)."...";
                    }
                    else {
                        $title_feat = $new_featpost['titlepost'];
                    }     
                    echo $title_feat;
                ?>
                </h2>
            </div>
            <?php 
            $imgfeat = $admin->get_imgrecent($new_featpost['idimagepost']);
            if(!empty($imgfeat)):
            ?>
            <div class="img-bg" style="background-image: url('<?= $imgfeat['imagename']?>');"></div>
            <?php else:?>
            <div class="img-bg" style="background-image: url('image/blank.png');"></div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <?php if($feat_row == 2):?>
        <div class="center-box">
            <a href="read-post.php?slug=<?= $new_featpost['slug']?>"></a>
                <?php
                    if(!empty($new_featpost['category'])){
                        echo '<span class="tag-news" style="background: lawngreen;">'.$new_featpost['category'].'</span>';
                    }
                    else{

                    }
                ?>
            <div class="des-news-center">
                <h3>
                <?php 
                    if(strlen($new_featpost['titlepost']) > 85){
                        $title_feat = substr($new_featpost['titlepost'], 0, 85)."...";
                    }
                    else {
                        $title_feat = $new_featpost['titlepost'];
                    }     
                    echo $title_feat;
                ?>
                </h3>
            </div>
            <?php 
            $imgfeat = $admin->get_imgrecent($new_featpost['idimagepost']);
            if(!empty($imgfeat)):
            ?>
            <div class="img-bg" style="background-image: url('<?= $imgfeat['imagename']?>');"></div>
            <?php else:?>
            <div class="img-bg" style="background-image: url('image/blank.png');"></div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <?php if($feat_row == 3):?>
        <div class="side-left-box-top">
            <a href="read-post.php?slug=<?= $new_featpost['slug']?>"></a>
                <?php
                    if(!empty($new_featpost['category'])){
                        echo '<span class="tag-news" style="background: steelblue;">'.$new_featpost['category'].'</span>';
                    }
                    else{

                    }
                ?>
            <div class="des-news-right">
                <h3>
                <?php 
                    if(strlen($new_featpost['titlepost']) > 85){
                        $title_feat = substr($new_featpost['titlepost'], 0, 85)."...";
                    }
                    else {
                        $title_feat = $new_featpost['titlepost'];
                    }     
                    echo $title_feat;
                ?>
                </h3>
            </div>
            <?php 
            $imgfeat = $admin->get_imgrecent($new_featpost['idimagepost']);
            if(!empty($imgfeat)):
            ?>
            <div class="img-bg-right" style="background-image: url('<?= $imgfeat['imagename']?>');"></div>
            <?php else:?>
            <div class="img-bg-right" style="background-image: url('image/blank.png');"></div>
            <?php endif;?>    
        </div>
        <?php endif;?>
        <?php if($feat_row == 4):?>
        <div class="side-left-box">
            <a href="read-post.php?slug=<?= $new_featpost['slug']?>"></a>
                <?php
                    if(!empty($new_featpost['category'])){
                        echo '<span class="tag-news" style="background: yellow;">'.$new_featpost['category'].'</span>';
                    }
                    else{

                    }
                ?>
            <div class="des-news-right">
                <h3>
                <?php 
                    if(strlen($new_featpost['titlepost']) > 85){
                        $title_feat = substr($new_featpost['titlepost'], 0, 85)."...";
                    }
                    else {
                        $title_feat = $new_featpost['titlepost'];
                    }     
                    echo $title_feat;
                ?>
                </h3>
            </div>
            <?php 
            $imgfeat = $admin->get_imgrecent($new_featpost['idimagepost']);
            if(!empty($imgfeat)):
            ?>
            <div class="img-bg-right" style="background-image: url('<?= $imgfeat['imagename']?>');"></div>
            <?php else:?>
            <div class="img-bg-right" style="background-image: url('image/blank.png');"></div>
            <?php endif;?>
        </div>
        <?php endif;?>
    <?php $feat_row++;?>
    <?php endwhile;?>
</div>
    <div id="while-post">
        <div id="rencent-post">
        <?php if(!empty($artikel)):?>
            <?php while($row = $artikel->fetch_assoc()):?>
            <div class="post">        
                <div class="thumb-wrap">
                    <?php if(!empty($row['category'])):?>
                    <span class="post-tag"><?= $row['category']?></span>
                    <?php endif;?>
                    <?php 
                        $imgpost = $admin->get_imgrecent($row['idimagepost']);
                    if(!empty($imgpost)):
                    ?>
                        <div class="thumb" style="background-image: url('<?= $imgpost['imagename']?>');"></div>
                    <?php else:?>
                        <div class="thumb" style="background-image: url('image/blank.png');"></div>
                    <?php endif;?>
                </div>
                <span class="news-title">
                <?php 
                    if(strlen($row['titlepost']) > 85){
                        $title = substr($row['titlepost'], 0, 85)."...";
                    }
                    else {
                        $title = $row['titlepost'];
                    }
                    
                    echo "<a href='read-post.php?slug=".$row['slug']."'>".$title."</a>";
                ?>
                </span>
                <span class="by-write">Write by <b><?= $row['writter']?></b> - <?= date("l ,d F, Y", strtotime($row['waktupost']))?></span>
                <span class="news-desk">
                    <p><?= strip_tags($row['isipost'])?></p>
                </span>
                <a href="read-post.php?slug=<?= $row['slug']?>" class="read-more">Read more</a>
            </div>
            <?php endwhile;?>
        <?php else:?>
            <div>Tidak Ada Post</div>
        <?php endif;?>
            <!-- test -->
        </div>
        <div id="side-rencent">
            <div class="title-widget">SOCIAL</div>
            <div id="social-widget">
                <div class="media-widget"></div>
                <div class="media-widget" style="background: red;"></div>
                <div class="media-widget" style="background: steelblue;"></div>
            </div>
            <div id="rencent-popular-comment">
                <div class="rencent-tab">
                    <div class="tab" id="first-tab"><span>recent</span></div>
                    <div class="tab" id="second-tab"><span>popular</span></div>
                    <div class="tab" id="third-tab"><span>comments</span></div>
                </div>
                <div id="first-tab-isi">
                <?php while($recent_row = $recentpost->fetch_assoc()):?>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                        <?php 
                            $imgrecent = $admin->get_imgrecent($recent_row['idimagepost']);
                        ?>
                        <?php if($imgrecent != NULL):?>
                            <div class="thumb-mini" style="background-image:url('<?= $imgrecent['imagename']?>');"></div>
                        <?php else:?>
                            <div class="thumb-mini" style="background-image:url('image/blank.png');"></div>
                        <?php endif;?>
                        </div>
                        <span class="title-mini"><a href="read-post.php?slug=<?= $recent_row['slug'];?>">
                        <?php 
                            $tp = $recent_row['titlepost'];
                            if(strlen($tp) > 70){
                                echo substr($tp, 0, 70)."...";
                            }
                            else{
                                echo $tp;
                            }
                        ?>
                        </a></span>
                        <span class="month-post"><?=  date("d F, Y", strtotime($recent_row['waktupost']))?></span>
                    </div>
                <?php endwhile;?>
                </div>
                <div id="second-tab-isi">
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini"><p><a href="#">lorem cel sa twdsa ssah sadhgada sadgqad asdad  asdagtr sda</a></p></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/3.jpg');"></div>
                        </div>
                        <span class="title-mini"><a href="">lorem cel sa twdsa ssah sadhgada sadgqad asdad  asdagtr sda</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/2.jpg');"></div>
                        </div>
                        <span class="title-mini"><a href="">lorem cel sa twdsa ssah sadhgada sadgqad asdad  asdagtr sda</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/5.jpg');"></div>
                        </div>
                        <span class="title-mini"><a href="">lorem cel sa twdsa ssah sadhgada sadgqad asdad  asdagtr sda</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                </div>
                <div id="third-tab-isi">test3</div>
            </div>
            <div id="category">
                <div class="title-widget" style="width: 31%;">CATEGORY</div>
                <div class="category-box">
                    <ul>
                        <?php while($new_cat = $new_category->fetch_assoc()):?>
                            <li><a href="#"><?= $new_cat['category'];?></a></li>
                        <?php endwhile;?>
                    </ul>
                </div>  
            </div>
        </div>
        <div class="pager">
            <?php if($page > 1):?>
                <a href="?page=<?php echo $page-1;?>">prev</a>
            <?php endif;?>
            <?php for($i = 1;$i <= $pages; $i++):?>
                <?php if($page == $i):?>
                    <a class="page-active" href="?page=<?= $i?>"><?= $i?></a>
                    <?php else:?>
                    <a class="page-number" href="?page=<?= $i?>"><?= $i?></a>
                <?php endif;?>
            <?php endfor;?>
            <?php if($page != $i-1):?>
                <a href="?page=<?php echo $page+1;?>">next</a>
            <?php else:?>
            <?php endif;?>
        </div>
    </div>