<h3>Thêm video</h3>
<form name="frm" method="post" action="index.php?com=krpano&act=save_video&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
    <b>name</b> <input type="text" name="name" value="<?php echo @$item['name']; ?>" class="input"/> <strong>Tên video</strong>
    <br />
    <br />
	<b>Video</b> <input type="file" name="video" /> <strong>file video</strong>
    <br />
    <br />
    <b>ath</b> <input type="number" name="ath" value="<?php echo @$item['ath']; ?>" class="input"/> <strong>tọa độ ngang</strong>
    <br />
    <br />
	<b>atv</b> <input type="number" name="atv" value="<?php echo @$item['atv']; ?>" class="input"/><strong>tọa độ dọc</strong>
    <br />
    <br />
    <b>edge</b> <input type="text" name="edge" value="<?php echo @$item['edge']; ?>" class="input"/> <strong>vị trí tương đối</strong>
    <br />
    <br />
    <b>scale</b> <input type="number" name="scale" value="<?php echo @$item['scale']; ?>" class="input"/> <strong>tỉ lệ của video</strong>
    <br />
    <br />
    <b>scale mobile</b> <input type="number" name="scalemobile" value="<?php echo @$item['scalemobile']; ?>" class="input"/><strong>tỉ lệ của video trong mobile</strong>
    <br />
    <br />
    <b>rx</b> <input type="number" name="rx" value="<?php echo @$item['rx']; ?>" class="input"/><strong>độ xoay dọc </strong>
    <br />
    <br />
    <b>ry</b> <input type="number" name="ry" value="<?php echo @$item['ry']; ?>" class="input"/><strong>độ xoay ngang </strong>
    <br />
    <br />
    <b>rz</b> <input type="number" name="rz" value="<?php echo @$item['rz']; ?>" class="input"/><strong>độ xoay tròn </strong>
    <br />
    <br />
    <b>loop video</b> <input type="text" name="loppvideo" value="<?php echo @$item['loopvideo']; ?>" class="input"/> 
    <br />
    <br />
    <b>volume</b> <input type="number" name="volume" value="<?php echo @$item['volume']; ?>" class="input"/><strong>Âm lượng </strong>
    <br />
    <br />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_video'" class="btn" />
</form>