<?php
	function get_bill_total($id){
		global $d;
		$d->reset();
		$sql = "select id_sanpham,soluong from table_dathang_chitiet where id_dathang = ".$id;
		$d->query($sql);
		$ct = $d->result_array();
		$tongtien = 0;
		
		foreach( $ct as $chitiet){
			$id_sanpham = $chitiet["id_sanpham"];
			$d->reset();
			$sql="select gia,giakm from table_product where id = $id_sanpham";
			$d->query($sql);
			$ctsp = $d->fetch_array();
			
			$tongtien += ($chitiet['soluong'] * $ctsp['gia']); 
		}
		
		return $tongtien;
		
	}

	
?>
<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=order&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý đơn hàng</h3>
<table class="blue_table">

	<tr>
    	<th style="width:5%;">STT</th>		
			<th style="width:10%;">Tên</th>
			<th style="width:15%;">Email</th>
			<th style="width:15%;">Điện thoại</th>      
			<th style="width:15%;">Hình thức thanh toán</th>  
			<th style="width:15%;">Ngày đặt</th>   
			<th style="width:5%;">Tổng tiền</th>      
			<th style="width:5%;">Đã giao</th>
			<th style="width:5%;">Chi tiết</th>
			<th style="width:5%;">Xóa</th>

	</tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>
		<td style="width:20%;"><?=$items[$i]['ten']?> <?php if($items[$i]['xem']==0){echo '<img src="../../quanly/media/images/New_icons_101.gif"/>';}?></td>
		<td style="width:15%;"><?=$items[$i]['email']?></td>
		<td style="width:10%;"><?=$items[$i]['dienthoai']?></td>
		<td style="width:10%;"><?=$items[$i]['ghichu']?></td>
		<td style="width:5%;">
			<?=date('d/m/Y', $items[$i]['date'])?>
		
		</td>
		<td style="width:10%;">
			<?php
				$tong = get_bill_total($items[$i]['id']);
				echo number_format($tong,0,'',',').' VND';
			?>
		</td>
		<td id="">
            <?=$items[$i]['name']?>
       </td>
       <td style="width:10%;">
			<a href="index.php?com=order&act=chitiet&id=<?=$items[$i]['id']?>&xem=<?=$xem[0]['xem']?>">
				<img src="../../quanly/media/images/edit.png" />
			</a>
		</td>
		<td>
			<a href="index.php?com=order&act=delete&id=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="../../quanly/media/images/delete.png" /></a>
		</td>
	</tr>
	<?php }?>
	
</table>
<a href="#" id="xoahet"><img src="../../quanly/media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>

<script type="text/javascript">
function doi_hienthi(CategoryID,table)
{
		$.ajax({
				  url:'<? echo _source.'ajax.php'?>',
				  type:'POST',
				  data: "act=hienthi&id="+CategoryID+"&table="+table,
				  dataType:"json",
				  success: function(output){
					  $('#hienthi'+CategoryID+ ' img').remove();
					  $('#hienthi'+CategoryID).append(output.image);
				  }
			});
}
</script>