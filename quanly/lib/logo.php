<?php
 
    error_reporting(E_ALL);
 
    $upload_dir= '';
    $num_uploads = 5;
    $max_file_size  = 5120000;
    $ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
    $upload_max = $ini_max * 1024;
    $msg = '';
    $messages = array();
    if(isset($_FILES['userfile']['tmp_name']))
    {
        for($i=0; $i < count($_FILES['userfile']['tmp_name']);$i++)
        {
            if(!is_uploaded_file($_FILES['userfile']['tmp_name'][$i]))
            {
                $messages[] = 'No file uploaded';
            }
 
            // check the file is less than the maximum file size
            elseif($_FILES['userfile']['size'][$i] > $max_file_size)
            {
                $messages[] = "File size exceeds $max_file_size limit";
            }
            else
            {
                // copy the file to the specified dir
                if(@copy($_FILES['userfile']['tmp_name'][$i],$upload_dir .$_FILES['userfile']['name'][$i]))
                {
                    /*** give praise and thanks to the php gods ***/
                    $messages[] = $_FILES['userfile']['name'][$i].'';
                }
                else
                {
                    /*** an error message ***/
                    $messages[] = 'Uploading '.$_FILES['userfile']['name'][$i].' Failed';
                }
            }
        }
    }
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
 
<body>
 
<h3><?php echo $msg; ?></h3>
<p>
<?php
    if(sizeof($messages) != 0)
    {
        foreach($messages as $err)
        {
            echo $err.'<br />';
        }
    }
?>
</p>
<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
<?php
    $num = 0;
    while($num < $num_uploads)
    {
        echo '<div><input name="userfile[]" type="file" /></div>';
        $num++;
    }
?>
 
<input type="submit" value="Upload" />
</form>
 
</body>
</html>