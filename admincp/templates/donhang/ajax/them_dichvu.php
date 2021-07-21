<?php
	session_start();
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		
$d = new database($config['database']);

?>
	<div id='' class='item' >  
					<select id='dichvuin' name='dichvu[id][]' >
					<option value="0">Chọn dịch vụ</option>
							<?php	$d->query("select * from table_dichvu where  hienthi=1 order by stt asc, id desc" );
							$dichvu=$d->result_array();
							
							?>
							<?php for($i=0; $i<count($dichvu);$i++){?>       
						<option value="<?php echo $dichvu[$i]['id'];?>"><?php echo $dichvu[$i]['ten'];?></option>
							<?php } ?>
					</select>
					
					
					<select id='loaigiay' class='loaigiay' name='dichvu[loaigiay][]'>
						<option value="0">Loại giấy</option>
						
					</select>
						
				 <input type="hidden" name="dichvu[giaban][]" class='giaban' value='0' >
				 
				 <input type="hidden" name="dichvu[min][]" class='min' value='0' >
				 <input type="hidden" name="dichvu[base][]" class='base' value='0' >
				 <input type="hidden" name="dichvu[stack][]" class='stack' value='0' >
				 <input type="text" name="dichvu[soluong][]" class='soluong_dichvu' min="10" max="500" placeholder='số tờ' >
				 <input name="dichvu[tongia][]" class='tonggia' placeholder='Thành tiền' value="" type="text" size="20"   />	
				
				<input type="button" value="Delete" class="btn xoathem_dichvu" />
			</div>	
		
	