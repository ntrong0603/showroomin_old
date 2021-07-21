
    <div style="width:87%; height:auto; margin:0 auto; ">
   <div id='' class='col-md-3' >  </div>
   <div class="col-md-6" >
   		<div class="bar"><h1 class='title'>Đăng ký</h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
          <form method="post" name="frm" action="./user/register.html" >
       
				<div class="form-group">
                     <label for="email">Email (* dùng đăng nhập) </label>
                    <input type="email" class="form-control" id="email" name="username" placeholder="" required="required">
                  </div>
                  
                  <div class="form-group">
                    <label for="tenlienhe">Mật khẩu: </label>
                    <input type="password" data-minlength="6"  class="form-control" id="password1" name="password" placeholder="Mật khẩu" required="required">
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="tenlienhe"> Nhập lại mật khẩu: </label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Nhập lại mật khẩu" required="required">
                  </div>
                
                
                  <input type="submit" class="btn btn-dangnhap" value="<?php echo _gui?>"/>
                  <input class="btn btn-dangky" type="button" value="Reset" onclick="document.frm.reset();" />
                  
         
         
	             </form>
                   <!--<h1>Sign in</h1>

<ul>
    <?php foreach ($hybridauth->getProviders() as $name) : ?>
        <?php if (!isset($adapters[$name])) : ?>
            <li>
                <a href="<?php print $config2['callback'] . "?provider={$name}"; ?>">
                    Sign in with <strong><?php print $name; ?></strong>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php if ($adapters) : ?>
    <h1>You are logged in:</h1>
    <ul>
        <?php foreach ($adapters as $name => $adapter) : ?>
            <li>
                <strong><?php print $adapter->getUserProfile()->displayName; ?></strong> from
                <i><?php print $name; ?></i>
                <span>(<a href="<?php print $config2['callback'] . "?logout={$name}"; ?>">Log Out</a>)</span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>-->
            </div>
   </div></div>
   <div class="clearfix"></div>



