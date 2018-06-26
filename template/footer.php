<div id="footer">
        <div id="main-footer">
            <div class="footer-row">
                <span class="border-left"></span>
                <span class="title-footer">random post</span>
                <div class="mainbox-footer">

                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                
                </div>
            </div>
            <div class="footer-row">
                <span class="border-left"></span>
                <span class="title-footer">tags</span>
                <div class="mainbox-footer">
                    <div class="none-div"></div>
                    <?php 
                        if( empty($new_category2)){
                            echo "koosng";
                        }
                    ?>
                    <?php while($new_cat2 = $new_category2->fetch_assoc()):?>
                        <div class="tag-footer"><a href="#"><?= $new_cat2['category'];?></a></div>
                    <?php endwhile;?>
                </div>
            </div>
            <div class="footer-row">
                <span class="border-left"></span>
                <span class="title-footer">recent comment</span>
                <div class="mainbox-footer">
                   
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    <div class="main-isi">
                        <div class="thumb-mini-wrap">
                            <div class="thumb-mini" style="background-image:url('image/1.jpg');"></div>
                        </div>
                        <span class="title-mini-footer"><a href="#">How to Use Your Smartphone Battery Last Longer</a></span>
                        <span class="month-post">18 agusutus 2019</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="copyright">
                Perenial News <a href="#">Templates</a>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body> 
</html>