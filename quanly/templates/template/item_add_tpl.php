

<h3>Thêm mới template</h3>

<form name="frm" method="post" action="index.php?com=template&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
    <b>Tên </b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />     
    <b>Mã số </b> <input type="text" name="maso" value="<?php echo $item['maso']?>" class="input" /><br />     
    <b>Mặt hàng kinh doanh </b> 
		
		<?php for($i=0,$count=count($mathangkinhdoanh);$i<$count;$i++){
						?>
						 <div class="checkbox">
                                <label>
                                    <input style="cursor: pointer" type="checkbox" name="mathangkinhdoanh<?php echo $mathangkinhdoanh[$i]['id'];?>" value="<?php echo $mathangkinhdoanh[$i]['id'];?>" <?php $arr=explode(",", $item['mathangkinhdoanh']); if(in_array($mathangkinhdoanh[$i]['id'],$arr) ){ echo "checked";}?>><?php echo $mathangkinhdoanh[$i]['ten'];?>
                                </label>
                          </div>
						
		<?php }?>
	<br />     
   	
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _place_type?> - <span style="font-weight:bold; color:red">Kích thước hình: rộng: 438px, cao 240px</span><br />
    <br />
	
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=template&act=man'" class="btn" />
</form>


