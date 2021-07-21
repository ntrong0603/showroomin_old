<?php
	function getItemSelect($table,$where){
		global $d;
		$sql_getItemsSelect='select * from '.$table.' '.$where;
		
		$d->query($sql_getItemsSelect);
		$itemSelect=$d->result_array();
		return $itemSelect;
	}
 ?>
<div>
	<h3>thống kê concept</h3>
</div>
<div class='thongke_loc'>
	<div style='margin-right:0px;'>
	<span class='title_thongke_loc'>Bộ lọc:</span>
	Từ ngày
	<select id="id_tungay" name="tungay" onchange="select_onchange_tungay" class="input">
		<option value="0" >-</option>
		<?php for($i=1; $i<=31;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	<select id="id_tuthang" name="tuthang" onchange="select_onchange_tuthang" class="input">
		<option value="0" >-</option>
		<?php for($i=1; $i<=12;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	<select id="id_tunam" name="tunam" onchange="select_onchange_tunam" class="input">
		<option value="0" >-</option>
		<?php for($i=2018; $i<=2030;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	
	Đến ngày
	<select id="id_denngay" name="denngay" onchange="select_onchange_denngay" class="input">
		<option value="0" >-</option>
		<?php for($i=1; $i<=31;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	<select id="id_denthang" name="denthang" onchange="select_onchange_denthang" class="input">
		<option value="0" >-</option>
		<?php for($i=1; $i<=12;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	<select id="id_dennam" name="dennam" onchange="select_onchange_dennam" class="input">
		<option value="0" >-</option>
		<?php for($i=2018; $i<=2030;$i++){?>
		<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
		<?php }?>
	</select>
	
	<select id="id_nhasx" name="nhasx" onchange="select_onchange_nhasx()" class="input">
		<option value="0" >Nhà sản xuất</option>
		<?php 
			$nhasx=getItemSelect('table_brand','');
			for($i=0;$i<count($nhasx);$i++){?>
			
				<option value="<?php echo $nhasx[$i]['id']; ?>" <?php if(isset($_GET['nhasx']) && $_GET['nhasx'] == $nhasx[$i]['id']){ echo 'selected';}?>><?php echo $nhasx[$i]['ten']; ?></option>
				
				
		<?php	}
		?>
	</select>
	
	<select id="id_concept" name="concept" onchange="select_onchange_concept()" class="input">
		<option value="0" >Showroom/Concept</option>
		<?php 
			if(isset($_GET['nhasx']) && $_GET['nhasx']!=0){
			$showroom=getItemSelect('table_place',' where brand='.$_GET['nhasx']);
			for($i=0;$i<count($showroom);$i++){?>
			
				<option value="<?php echo $showroom[$i]['id']; ?>" <?php if(isset($_GET['showroom']) && $_GET['showroom'] == $showroom[$i]['id']){ echo 'selected';}?>><?php echo $showroom[$i]['ten']; ?></option>
				
				
			<?php	}
			}
		?>
	</select>
	
	<a href='javascript:void()' onclick='select_TimKiem()'  id='bt_timkiem_thongke'>Tìm kiếm</a>

	</div>
	
	<script>
	function select_onchange_nhasx(){
		var link='index.php?com=thongke&act=<?php echo $_GET['act']; ?>';
		
		var tungay=document.getElementById("id_tungay");
		var tuthang=document.getElementById("id_tuthang");
		var tunam=document.getElementById("id_tunam");
			
		var denngay=document.getElementById("id_denngay");
		var denthang=document.getElementById("id_denthang");
		var dennam=document.getElementById("id_dennam");
		var nhasx=document.getElementById("id_nhasx");
		
		if(tungay.value>0 && tuthang.value>0 && tunam.value>0){
			link+='&tungay='+tungay.value+'-'+tuthang.value+'-'+tunam.value;	
		}
		if(denngay.value>0 && denthang.value>0 && dennam.value>0){
			link+='&denngay='+denngay.value+'-'+denthang.value+'-'+dennam.value;
		}
		link+='&nhasx='+nhasx.value;
		
		window.location =link;	
		return true;
	}
	function select_TimKiem()
		{	

			var link='index.php?com=thongke&act=<?php echo $_GET['act']; ?>';

			var tungay=document.getElementById("id_tungay");
			var tuthang=document.getElementById("id_tuthang");
			var tunam=document.getElementById("id_tunam");
			
			var denngay=document.getElementById("id_denngay");
			var denthang=document.getElementById("id_denthang");
			var dennam=document.getElementById("id_dennam");
			
			var nhasx=document.getElementById("id_nhasx");
			var showroom=document.getElementById("id_concept");
			
			if(tungay.value>0 && tuthang.value>0 && tunam.value>0 ){
				link+='&tungay='+tungay.value+'-'+tuthang.value+'-'+tunam.value;
			}
			if( denngay.value>0 && denthang.value>0 && dennam.value>0){
				link+='&denngay='+denngay.value+'-'+denthang.value+'-'+dennam.value;
			}
			link+='&nhasx='+nhasx.value;
			link+='&showroom='+showroom.value;

			
			window.location =link;	
			return true;
			
		}
	function sapxep(var1){
			var link='index.php?com=thongke&act=<?php echo $_GET['act']; ?>';

			var tungay=document.getElementById("id_tungay");
			var tuthang=document.getElementById("id_tuthang");
			var tunam=document.getElementById("id_tunam");
			
			var denngay=document.getElementById("id_denngay");
			var denthang=document.getElementById("id_denthang");
			var dennam=document.getElementById("id_dennam");
			
			var nhasx=document.getElementById("id_nhasx");
			var showroom=document.getElementById("id_concept");
			
			if(tungay.value>0 && tuthang.value>0 && tunam.value>0){
				link+='&tungay='+tungay.value+'-'+tuthang.value+'-'+tunam.value;	
			}
			if(denngay.value>0 && denthang.value>0 && dennam.value>0){
				link+='&denngay='+denngay.value+'-'+denthang.value+'-'+dennam.value;
			}
			link+='&nhasx='+nhasx.value;
			link+='&showroom='+showroom.value;
			
			link+='&sapxep='+var1;
			
			window.location =link;
			
			return true;
		}
		function xuatfile(){
			window.location='http://showroomin.com/quanly/templates/thongke_new/ajax_exConcept.php';
		}
	</script>
</div>

<table class="blue_table">
	<tr>
        <th style="width:5%;">Stt</th>		
      	<th style="width:20%;">Tên concept</th>
        <th style="width:12.5%;"><a href='javascript:void()' class='sapxep' onclick="sapxep('<?php if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotxem-tang'){
				echo 'luotxem-giam';
				
			}else{
				echo 'luotxem-tang';
				
				
			}?>')">lượt xem</a></th>
        <th style="width:12.5%;"><a href='javascript:void()' class='sapxep' onclick='sapxep("<?php if(isset($_GET['sapxep']) && $_GET['sapxep']=='danhgia-tang'){
				echo 'danhgia-giam';
			}else{
				echo 'danhgia-tang';
				
					
				
			}?>")'>đánh giá</a></th>
		<th style="width:12.5%;"><a href='javascript:void()' class='sapxep' onclick='sapxep("<?php if(isset($_GET['sapxep']) && $_GET['sapxep']=='quantam-tang'){
				echo 'quantam-giam';
			}else{
				echo 'quantam-tang';
				
					
				
			}?>")'>quan tâm</a></th>
		<th style="width:12.5%;"><a href='javascript:void()' class='sapxep' onclick='sapxep("<?php if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotdat-tang'){
				echo 'luotdat-giam';
			}else{
				echo 'luotdat-tang';
				
					
				
			}?>")'>lượt đặt hàng</a></th>
		<th style="width:12.5%;">nhà sản xuất</th>
        <th style="width:12.5%;">link</th>
	</tr>
	<?php for($i=0;$i<count($items);$i++){?>
	<tr>
        <td style="width:5%;"><?php echo $items[$i]['stt']; ?></td>
		<td style="width:20%;"><?php echo $items[$i]['ten'] ?></td>
		<td style="width:12.5%;"><?php echo $items[$i]['luotxem'] ?></td>
		<td style="width:12.5%;"><?php echo $items[$i]['luotdanhgia'] ?></td>
		<td style="width:12.5%;"><?php echo $items[$i]['luotquantam'] ?></td>
		<td style="width:12.5%;"><?php echo $items[$i]['luotmua'] ?></td>
		<td style="width:12.5%;"><?php echo $items[$i]['ten_nhasx'] ?></td>
		<td style="width:12.5%;"><a href='index.php?com=place&act=edit&id_danhmucc1=<?php echo $items[$i]['id_danhmuc'] ?>&id=<?php echo $items[$i]['id'] ?>' class='thongke_xemchitiet'>Xem chi tiet</a></td>
	</tr>
	<?php }?>
</table>
<div style='display: flex;
    align-items: center;'>
<div class='xuatexcel'><a href='javascript:void()' onclick='xuatfile()'><img src='./media/images/icon_excel.png'/> Xuất file Excel</a></div>
<div class="paging"><?php echo $paging['paging']?></div>
</div>