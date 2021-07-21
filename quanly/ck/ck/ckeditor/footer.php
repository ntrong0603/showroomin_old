<?php            
$d->reset();
$sql_foot = "select noidung_vi from #_footer ";
$d->query($sql_foot);
$company_foot = $d->fetch_array();
?>
<div class="footer-container">
    <div class="counter left">
        <?php echo $counter?>
        <div style="padding: 9px 0 0 10px;color: #7982C4;">
            THỐNG KÊ TRUY CẬP
        </div>   
    </div>
    <div class="company-info left">
            <?php echo $company_foot['noidung_vi']?>
    </div>
    <div class="share left">
        <a href="fb.html" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo getCurrentPageURL()?>', 'newwindow', 'width=900, height=250'); return false;"> 
        <span class="share-button fb"></span>
        </a>
        <a href="gg.html" onclick="window.open('https://plus.google.com/share?url=<?php echo getCurrentPageURL()?>', 'newwindow', 'width=900, height=250'); return false;"> 
        <span class="share-button gg"></span>
        </a>
        <a href="tt.html" onclick="window.open('http://twitter.com/share?url=<?php echo getCurrentPageURL()?>', 'newwindow', 'width=900, height=250'); return false;">  
        <span class="share-button twt"></span>
        </a>     
        <a href="tt.html" onclick="window.open('http://www.linkedin.com/sharer.php?u=<?php echo getCurrentPageURL()?>', 'newwindow', 'width=900, height=250'); return false;"> 
        <span class="share-button linkedin"></span> 
        </a>
        <a href="tt.html" onclick="window.open('https://myspace.com/Modules/PostTo/Pages/?l=3&u=<?php echo getCurrentPageURL()?>', 'newwindow', 'width=900, height=250'); return false;"> 
        <span class="share-button myspace"></span>
        </a>
        <div class="clear"></div> 
        
        <div style="color:#fff;margin-top: 55px;">
            Copyright &copy; 2014.Hung Thinh. Design by <a href="http://www.tsmvn.com">TSM</a>
        </div>
    </div>
    
    
    <div class="clear"></div>
</div>

<div class="fb-fanpage">
<img class="fb-button" src="images/button_facebook.png"/>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-like-box" data-href="https://www.facebook.com/pages/Th%E1%BA%A3m-tr%E1%BA%A3i-s%C3%A0n/630256860383106" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
</div>

<script>
$('.fb-button').click(function(){
    if($(this).parent().css('right')=='-300px'){
        $(this).parent().animate({
            right:'0'
        },1000)
    }
    else{
         $(this).parent().animate({
            right:'-300'
        },1000)
    }
})
</script>