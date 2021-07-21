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
    listid=listid.substr(1);     //alert(listid);
    if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
    hoi= confirm("Bạn có chắc chắn muốn xóa?");
    if (hoi==true) document.location = "index.php?com=krpano&act=delete_audio&listid=" + listid;
});
});
</script>
<h3>Quản lý video</h3>
<script language="javascript">              
    function select_onchange()
    {               
        var a=document.getElementById("id_sp");
        window.location ="index.php?com=krpano&act=man_audio&id_sp="+a.value;   
        return true;
    }
</script>
<table class="blue_table">
    <tr>
        <th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:12%;">name</th>
        <th style="width:12%;">icon</th>
        <th style="width:12%;">audio</th>
        <th style="width:6%;">x</th>
        <th style="width:6%;">y</th>
        <th style="width:6%;">alpha</th>
        <th style="width:6%;">scale</th>
        <th style="width:6%;">align</th>
        <th style="width:6%;">volume</th>
        <th style="width:6%;">sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for($i=0, $count=count($audioitems); $i<$count; $i++){?>

    <tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
        <td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$audioitems[$i]['id']?>" class="chon" /></td>
        <td style="width:12%;">
         <?php echo @$audioitems[$i]['name']?>
        
        </td>
        <td style="width:12%;">
            <img src="<?php echo _upload_audio.@$audioitems[$i]['icon']; ?>" width='20%'>
        </td>
        <td style="width:12%;">
         <?php echo @$audioitems[$i]['audiourl']?>
        
        </td>
       
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['x']?>
        </td>
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['y']?>
        </td>
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['alpha']?>
        </td>
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['scale']?>
        </td>
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['align']?>
        </td>
        <td align="center" style="width:6%;">
            <?php echo @$audioitems[$i]['volume']?>
        </td>
        <td style="width:6%;">
            <a href="index.php?com=krpano&act=edit_audio&id=<?php echo @$audioitems[$i]['id']?>">
                <img src="media/images/edit.png" border="0" />
            </a>
        </td>
        <td style="width:6%;">
            <a href="index.php?com=krpano&act=delete_audio&id=<?php echo @$audioitems[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
                <img src="media/images/delete.png" border="0" />
            </a>
        </td>
    </tr>
    <?php   }?>
</table>
<a href="index.php?com=krpano&act=add_audio"><img src="media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>