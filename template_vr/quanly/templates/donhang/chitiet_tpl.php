<?php
//TÌNH TRẠNG ĐƠN HÀNG
$sql="select * from table_dh_status";
$d->query($sql);
$tinhtrang = $d->result_array();

$sql = "SELECT * FROM table_tt_hoadon WHERE id_donhang = ".$item['id'].' order by id desc';
$d->query($sql);
$hoadondo = $d->fetch_array();
?>
<h3 style="margin:10px;color:orange;">Chi tiết đơn đặt hàng </h3>
<h4 style='color:#f00;'>Thông tin người mua</h4>
<p style=' padding:10px;'>Tên người mua: <?=$item['ten']?></p>
<p style=' padding:10px;'>Email: <?=$item['email']?></p>
<p style=' padding:10px;'>Địa chỉ: <?=$item['diachi']?></p>
<p style=' padding:10px;'>Số diện thoại: <?=$item['dienthoai']?></p>
<p style=' padding:10px;'>Ngày sinh: <?=date('d/m/Y', strtotime($item['ngaysinh']))?></p>
<p style=' padding:10px;'>Ghi chú người mua: <?=$item['ghichunguoimua']?></p>
<hr style=' border-bottom:1px solid' />
<h4 style='color:#f00;'>Giao hàng gấp</h4>
<p style=' padding:10px;'>Ghi chú giao hàng gấp: <?=$item['luuy']?></p>
<hr style=' border-bottom:1px solid' />
<h4 style='color:#f00;'>Gói quà</h4>
<p style=' padding:10px;'>Gói quà: <?=$item['goiqua'] == 1 ? 'Có' : 'Không';?></p>
<p style=' padding:10px;'>Ghi chú gói quà: <?=$item['ghichugoiqua']?></p>
<hr style=' border-bottom:1px solid' />
<h4 style='color:#f00;'>Thông tin người nhận</h4>
<p style=' padding:10px;'>Tên người nhận: <?=$item['tennguoinhan']?></p>
<p style=' padding:10px;'>Địa chỉ người nhận: <?=$item['diachinguoinhan']?></p>
<p style=' padding:10px;'>Số điện thoại: <?=$item['dienthoainguoinhan']?></p>
<p style=' padding:10px;'>Ghi chú giao hàng: <?=$item['ghichunguoinhan']?></p>

<hr style=' border-bottom:1px solid' />
<h4 style='color:#f00;'>Thông tin đơn vị xuất hóa đơn</h4>
<p style=' padding:10px;'>Tên đơn vị: <?=$hoadondo['tencty']?></p>
<p style=' padding:10px;'>Địa chỉ: <?=$hoadondo['diachicty']?></p>
<p style=' padding:10px;'>Mã số thuế: <?=$hoadondo['masothue']?></p>
<p style=' padding:10px;'>Lưu ý xuất hóa đơn: <?=$hoadondo['ghichuhoadon']?></p>
<hr />
<h3 style='color:#f00;'>Mã đơn hàng: <?=$item['madonhang']?> </h3>
<h3 style='color:#f00;'>Ngày mua hàng: <?=date('d/m/Y H:i:s',$item['date'])?> </h3>
<table class="">
<thead>
	<tr>

	
		<th>Stt</th>
		<th style="width:25%;">Tên</th>
		<th>Kiểu mẫu sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Tổng giá</th>

	</tr>
</thead>
<?php

global $d;

$tonggia=0;
$i = 1;
foreach($chitietdathang as $chitiet)

{

	

	$id_sanpham = $chitiet["id_sanpham"];

	$sql="select * from table_product where id=$id_sanpham";
	$d->query($sql);
	$ctsp = $d->result_array();


?>

	<?php foreach ($ctsp as $key => $value): ?>

	<tr>


		<td><?=$i++?></td>
		<td style="width:25%;"><?=$value['ten']?></td>
		<td style="width:15%;">

			<img src="./../../upload/sanpham/<?=$value['photo']?>" style="width:100px;height:100px;"/>

		</td>
		<td style=""><?=$chitiet['soluong']?></td>
		<td><? echo number_format ($value['gia'],0,",",".")." VNĐ"; ?></td>
		<td>

			<?php



          

                if($value['gia']==0) echo _lienhegia; 

                else{

                    echo number_format ($chitiet['soluong']*$value['gia'],0,",",".")." VNĐ";

                    $tonggia+=$chitiet['soluong']*$value['gia'];

                }     

            

            

			

			?>

		</td>

	</tr>

		<?php endforeach ?>

<?php

}

?>

<tr><td colspan="8" style=";text-align:right;font-weight:bold;"> Trị giá đơn hàng: <?=number_format ($tonggia,0,",",".")." VNĐ"?></td></tr>

<? if($item['goiqua'] == 1):?>
<? $goiqua = result_row("select * from table_goiqua limit 1")?>
<tr><td colspan="8" style=";text-align:right;font-weight:bold;">Phí gói quà: <?=number_format ($goiqua['goiqua'],0,",",".")." VNĐ"?></td></tr>
<tr><td colspan="8" style=";text-align:right;font-weight:bold;"> Tổng cộng: <?=number_format ($tonggia + $goiqua['goiqua'],0,",",".")." VNĐ"?></td></tr>

<?endif;?>

<tr>
	<td colspan="8" style=";text-align:right;font-weight:bold;">
		Tình trạng đơn hàng: 
		<form action="index.php?com=order&act=chitiet&id=<?=$item['id']?>" method='post'>
			<select name='tinhtrangdonhang'>
				<? if( count($tinhtrang) > 0 ): foreach($tinhtrang as $tt): ?>
				<option <? if($item['tinhtrangdonhang'] == $tt['id']) echo 'selected="selected"';?> value="<?=$tt['id']?>"><?=$tt['name']?></option>
				<?endforeach; endif;?>
			</select>
			<input type='submit' name='submit' value='Cập nhật' />
		</form>
	</td>
</tr>

<tr><td colspan="8" style=";text-align:right;font-weight:bold;"><a href='index.php?com=order&act=man'>Quay lại</a></td></tr>
</table>