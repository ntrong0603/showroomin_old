
  <div id='' class='container' >
		<div id='' class='row' >  
    <div class="col-md-3 ">
   		<?php include _template."user/left.php";?>
   </div>
   <div class="col-md-9" >
   		<div class="bar" ><h1> Quản lý đơn hàng</h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
 <style>

 .blue_table td:child(2n){
	 background: #ddd;
 }
 .blue_table td{
	 padding: 5px 10px;
	 text-align: left;
	 border:1px solid #ddd;
	 border-top: 0px;
 }
 .blue_table th{
	 color: white;
     background: #c00;
    padding: 5px 10px;
	 border-right: 1px solid #fff;
 }
</style>		   

<table class="blue_table">

	<tr>
    	<th style="width:20%;">Mã đơn hàng</th>	
        <th style="width:15%;">Sản phẩm</th>
        <th style="width:15%;">Ngày đặt</th>
        <th style="width:15%;">Số tiền</th>
       <th style="width:15%;">Tình trạng</th>     
		
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){
		$sql = "select * from #_dathang_chitiet where id_dathang=".$items[$i]['id'];
		$d->query($sql);
		$items_chitiet = $d->result_array();
		?>
		<?php for($a=0, $counta=count($items_chitiet); $a<$counta; $a++){
			
			$sql = "select * from #_product where id=".$items_chitiet[$a]['id_sanpham'];
		$d->query($sql);
		$product = $d->fetch_array();
			$sql = "select * from #_place where id=".$product['id_place'];
		$d->query($sql);
		$place = $d->fetch_array();
			?>
	<tr>
    	<td style="width:10%;" align="center"><?php echo @$items[$i]['madonhang']?></td>       
		<td style="width:20%;" align="center"><a style='color: #c00;' target='_blank' href="./place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place['id_tinh']);?>/<?php echo $place['tenkhongdau'];?>-<?php echo $place['id'];?>.html&p=<?php echo $product['id'];?>" style="text-decoration:none;"><?php echo @$product['ten']?></a></td>
		  <td style="width:20%;" align="center"><?php echo date('d/m/Y',$items[$i]['date'])?></td>          
           <td style="width:10%;" align="center"><?php echo number_format($product['gia'],0, ',', '.')?>&nbsp;VNĐ</td>
           <td style="width:15%;" align="center">
		   <?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$items_chitiet[$a]['status']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
           
           </td>         
			</tr>
	<?php	}}?>
</table>

<div class="paging"><?php echo $paging['paging']?></div>
                   
            </div>
   </div>

</div>
  </div>

