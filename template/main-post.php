    <div id="while-post-view">
        <div class="view-post">
            <div class="breadscrumb">
                <a href="index.php">Home</a>
                <i class="fa fa-angle-right fa-1x"></i>
                <a href="index.php">Posts</a>
                <i class="fa fa-angle-right fa-1x"></i>
                <a><?= $post['titlepost'];?></a>
            </div>
            <h1><?= $post['titlepost'];?></h1>
            <div class="post-meta">
                <span>By </span>
                <strong><?= $post['writter'];?> </strong>
                - 
                <span><?= $postdate;?></span>

            </div>
            <div class="core-post">
                <?= $post['isipost'];?>
            </div>
            <div class="while-tag">
                <?php if(!empty($tags)):?>
                    <span>Tags: </span>
                    <?php foreach($tags as $tag):?>
                        <a href="#"><?= $tag;?></a>
                    <?php endforeach;?>
                <?php else: ?>
                    
                <?php endif;?>
            </div>
            <div class="related-news">
                <h4>you might also like</h4>
                <div class="while-related">
                    <ul>
                        <li>
                            <div class="related-thumb">
                               <a href="#" class="thumb-img" style="background-image: url('image/1.jpg');"></a>
                            </div>
                            <a href="#">Apple’s new ipad lets you play the latest games for a fraction of the price</a>
                        </li>
                        <li>
                            <div class="related-thumb">
                               <a href="#" class="thumb-img" style="background-image: url('image/1.jpg');"></a>
                            </div>
                            <a href="#">Apple’s new ipad lets you play the latest games for a fraction of the price</a>
                        </li>
                        <li>
                            <div class="related-thumb">
                               <a href="#" class="thumb-img" style="background-image: url('image/1.jpg');"></a>
                            </div>
                            <a href="#">Apple’s new ipad lets you play the latest games for a fraction of the price</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="post-comment-wrap">
                <div class="head-comment">
                    <span>leave a comment</span>
                </div>
                <span class="comment-count"><?= $comment_count;?> Comments:</span>
                <div class="while-comment">
                <?php while($new_comment = $comment->fetch_assoc()):?>
                    <div class="comment-block">
                        <div class="comment-avatar" style="background-image: url('image/desho.png');"></div>
                        <div class="comment-content">
                            <div class="comment-user-header">
                                <span><?= $new_comment['namaakun']?></span>
                                <span><?= date('d F Y', strtotime($new_comment['waktukomentar']))?> at <?= date('H:i', strtotime($new_comment['waktukomentar']))?></span>
                            </div>
                            <div class="comment-user"><?= $new_comment['isikomentar']?></div>
                            <button class="reply-user" href="javascript:;">Reply</button>
                        </div>
                        <!-- reply comment -->
                        <?php 
                            $reply = $admin->get_reply('tb_reply','idcomment',$new_comment['idreply']);
                            // print_r($reply);
                            // echo $new_comment['idreply'];
            
                        ?>
                        <?php if($reply->num_rows != NULL):?>
                            <span class="reply-expanded">
                                <i class="fa fa-caret-down fa-1x" style="transform: rotate(0deg);"></i>
                                <a href="javascript:;" class="reply-expanded-button" target="_self">Reply</a>
                            </span>
                            <?php while($new_reply = $reply->fetch_assoc()):?>
                            <div class="comment-reply">
                                <div class="comment-avatar" style="background-image: url('image/desho.png');"></div>
                                <div class="comment-box-reply">
                                    <div class="comment-user-header">
                                        <span><?= $new_reply['namaakun']?></span>
                                        <span><?= date('d F Y', strtotime($new_reply['waktureply']))?> at <?= date('H:i', strtotime($new_reply['waktureply']))?></span>
                                    </div>
                                    <div class="comment-user"><?= $new_reply['isikomentar']?></div>
                                </div>
                            </div>
                            <?php endwhile;?>
                        <?php else:?>
                        <?php endif;?>
                            <!-- input reply -->
                            <div class="comment-input komentar">
                                <form action="read-post.php?slug=<?= $post['slug']?>" method="POST">
                                <input type="hidden" name="comment-id" value="<?= $new_comment['idreply']?>">
                                <textarea name="comment-input-reply" id="" cols="50" rows="4" placeholder="Enter your comment..."></textarea>
                                <div class="comment-indenty">
                                    <div class="comment-userpic" style="background-image: url('image/dummy.png');"></div>
                                    <span>Comment As <?= $user?></span>
                                    <button name="submit-reply">Publish</button>
                                </form>
                                </div>
                            </div>
                    </div>
                <?php endwhile;?>
                    <!-- end comment -->
                    <div class="comment-input">
                        <form action="read-post.php?slug=<?= $post['slug']?>" method="POST">
                        <textarea name="comment-input" id="" cols="50" rows="4" placeholder="Enter your comment..."></textarea>
                        <div class="comment-indenty">
                            <div class="comment-userpic" style="background-image: url('image/dummy.png');"></div>
                            <span>Comment As <?= $user?></span>
                            <button name="submit-comment">Publish</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="side-rencent-post">
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
    </div>