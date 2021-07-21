<?php
class qhack
{
	
	public $folder = '';
	public $text = '';
	public $real_url = '';
	public $file_name = '';
	public $title = '';
	public $alt = '';
	public $real_link = '';
	public $list_mime = 'jpg,jpeg,png,bpm,gif,ico';
	
	function __construct($config = null){
		if ($config != null && is_array($config)) {
			foreach ($config as $key=>$val) {
				$this->$key = $val;	
			}
		}
	}
	
	function qget($config = null) {
		$this->qgetimg($config);
		$this->qgeta();
		return $this->text;
	}
	
	function qgetimg($config = null){
		if ($config != null && is_array($config)) {
			foreach ($config as $key=>$val) {
				$this->$key = $val;	
			}
		}	
		$this->qtrim();
		if (strpos($this->text,'<img ') !== false ) {
			$dom = new DOMDocument();
			$dom->loadHTML(mb_convert_encoding($this->text, 'HTML-ENTITIES', 'UTF-8'));
			$img = $dom->getElementsByTagName('img');
			if (count($img) > 0) {
				foreach($img as $val) {
					if (strpos($val->getAttribute('src'),$_SERVER['SERVER_NAME']) === false) {
						$new_href = $this->save_image_from_url($val->getAttribute('src'),$this->file_name);
						if ($new_href != false)
							$val->setAttribute('src',$this->real_url.'/'.$new_href);
						$val->setAttribute ('alt',$this->alt);	
						$val->setAttribute ('title',$this->title);	
					}
				}
				if (isset($documentElement))
					$this->text = $dom->saveHTML($dom->documentElement);
				else
					$this->text = $dom->saveHTML();
			}
		}
		return $this->text;
	}
	
	function qgeta($config = null){

		if ($config != null && is_array($config)) {
			foreach ($config as $key=>$val) {
				$this->$key = $val;	
			}
		}	
		$this->qtrim();
		if (strpos($this->text,'</a>') !== false ) {
			$dom = new DOMDocument;
			$dom->loadHTML(mb_convert_encoding($this->text, 'HTML-ENTITIES', 'UTF-8'));
			$link = $dom->getElementsByTagName('a');
			if (count($link) > 0){
				foreach($link as $val) {
					if (strpos($val->getAttribute('href'),$_SERVER['SERVER_NAME']) === false) {
						$val->setAttribute('href',$this->real_link);	
						$val->setAttribute ('title',$this->title);	
					}
				}
				if (isset($documentElement))
					$this->text = $dom->saveHTML($dom->documentElement);
				else
					$this->text = $dom->saveHTML();
			}
		}
		return $this->text;
	}
	
	function save_image_from_url($url,$name) {
		$this->qtrim();
		$info = new SplFileInfo($url);
		$ext = end(explode('.',$url));		
		if (strpos($this->list_mime,$ext) === false) 
			$ext = 'jpg';
		$file  = file_get_contents($url);
		if ($file != false) {
			$i = 0;
			$newname = $name.'.'.$ext;
			while(file_exists(ltrim($this->folder.'/'.$newname,'/'))){
				$newname = $name.'-'.$i.'.'.$ext;
				$i++;
			}
			$result = file_put_contents(ltrim($this->folder.'/'.$newname,'/'), $file);
			if ($result)
				return $newname;
		}
		return false;
	}
	
	function qtrim(){
		$this->folder = rtrim($this->folder,'/');	
		$this->real_url = rtrim($this->real_url,'/');
	}
	
}

function qsave_image($table,$id,$folder,$link) {
	global $d;
	$sql = 'select * from table_'.$table.' where id='.$id;
	$d->query($sql);
	$item = $d->fetch_array();
	unset($item['id']);
	$cf['folder'] 		= $folder;
	$cf['real_url'] 	= rtrim(BASE_URL,'/').'/'.rtrim(str_replace('../','',$folder),'/');
	$cf['file_name']  	=  @$item['tenkhongdau'];
	$cf['title']		= isset($item['ten'])?$item['ten']:isset($item['ten_vi'])?$item['ten_vi']:'';
	$cf['real_link']	= BASE_URL.$link;
	$cf['alt'] 			= isset($item['ten'])?$item['ten']:isset($item['ten_vi'])?$item['ten_vi']:'';
	$quyen = new qhack($cf);
	foreach(array_keys($item) as $k){
		$ketqua =  $quyen->qget(array('text'=>$item[$k]));
		$item[$k] = mysql_real_escape_string($ketqua);
	}
	$d->reset();
	$d->setTable($table);
	$d->setWhere('id',$id);
	$d->update($item);
}

?>