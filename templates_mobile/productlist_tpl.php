

<script language="javascript">
	function addtocart(pid){
		document.form1.placeid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>

<form name="form1" action="index.php">
	<input type="hidden" name="placeid" />
    <input type="hidden" name="command" />
</form>

<h1 class="title_wap">
<?php
echo _sanpham;

?>
</h1>
<div class="content_wap">
<?php for($i=0;$i <count($place);$i++){
	$sql = "select * from #_place_danhmuc where hienthi=1 and id='".$place[$i]['id_danhmuc']."'";
	$d->query($sql);
	$row_danhmuc = $d->fetch_array();
	$sql = "select * from #_thuoctinh where hienthi=1";
	if($place[$i]['thuoctinh']!='')
			{
			$thuoctinh_qg = substr($place[$i]['thuoctinh'],0,-1);
			
			$thuoctinh_qg = substr($thuoctinh_qg,1);
			
			$sql.=" and id in (".$thuoctinh_qg .")";
			}
	$sql.="and id_danhmuc = 10 order by stt,id desc";
	
	$d->query($sql);
	$quocgia = $d->result_array();
	
	$sql = "select * from #_thuoctinh where hienthi=1";
	if($place[$i]['thuoctinh']!='')
			{
			$thuoctinh_qg = substr($place[$i]['thuoctinh'],0,-1);
			
			$thuoctinh_qg = substr($thuoctinh_qg,1);
			$sql.=" and id in (".$thuoctinh_qg.")";
			}
	$sql.="and id_danhmuc = 11 order by stt,id desc";
	
	$d->query($sql);
	$thuonghieu = $d->result_array();
	?>
	
	<div class="item_pro">
    <a href="<?php if($row_danhmuc['tenkhongdau'] != ''){ echo $row_danhmuc['tenkhongdau'];} else{ echo 'san-pham'; }?>/<?php echo $place[$i]['tenkhongdau']; ?>">
    	<div class="img_pro">
        	<img src="<?php echo _upload_sanpham_l.$place[$i]['thumb']?>" title="<?php echo $place[$i]['ten'.$lang]?>" 
            alt="<?php echo $place[$i]['ten'.$lang]?>"/>
        </div>
        <h2><?php echo $place[$i]['ten'.$lang]?></h2>
        <div class="size">
        	<p><?php echo _kichthuocthung?>: <?php echo $place[$i]['kichthuoc']?></p>
            <p><?php echo _thuonghieu?>: <?php echo $thuonghieu[0]['ten'.$lang]?></p>
            <p><?php echo _quocgia?>: <?php echo $quocgia[0]['ten'.$lang]?></p>
        </div>
        <h3><?php echo $place[$i]['mota'.$lang]?>...</h3>
     </a>
     <a style="float:right; margin-right:10px;" href="<?php if($row_danhmuc['tenkhongdau'] != ''){ echo $row_danhmuc['tenkhongdau'];} else{ echo 'san-pham'; }?>/<?php echo $place[$i]['tenkhongdau']; ?>"> <?php echo _xemtiep?> >>
     </a>
     <div class="clear"></div>
    </div>
<?php }
?>
<div class="phantrang" ><?php echo $paging['paging']?></div>
 <div class="clear"></div>
</div>