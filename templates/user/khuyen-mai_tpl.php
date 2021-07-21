
  <div id='' class='container' >
		<div id='' class='row' >  
    <div class="col-md-3 ">
   		<?php include _template."user/left.php";?>
   </div>
   <div class="col-md-9" >
   		<div class="bar" ><h1>Thông tin khuyến mãi</h1></div>
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
    	<th style="width:20%;">Mã khuyến mãi</th>	
        <th style="width:15%;">Mô tả</th>
       <th style="width:15%;">Tình trạng</th>     
		
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){ ?>
		
	<tr>
    	<td style="width:10%;" align="center"><?php echo @$items[$i]['ten']?></td>       
    	<td style="width:10%;" align="center"><?php echo @$items[$i]['mota']?></td>       
		<td style="width:15%;" align="center"><?php if( $items[$i]['status']==0 ){ echo "Chưa sử dụng";}else{echo "Đã sử dụng";} ?>
		  
           
           </td>         
			</tr>
	<?php	}?>
</table>

<div class="paging"><?php echo $paging['paging']?></div>
                   
            </div>
   </div>

</div>
  </div>

