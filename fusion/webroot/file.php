<?php
	if($file != "none" && $file != "") { //有了上传文件了  

        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
        $time_limit=60;          
        set_time_limit($time_limit); // 

        //把文件内容读到字符串中  
        $fp=fopen($file,  "rb"); 
        if(!$fp) die("file open error"); 
        $file_data = addslashes(fread($fp, filesize($file))); 
        fclose($fp); 
        unlink($file);  
             
        //文件格式,名字,大小 
        $type=$file_type; 
        $name=$file_name; 
        $size=$file_size; 
     
	    $data->file_data = $file_data;
		$data->file_size = $size;
		$data->file_type = $type;
		$data->file_name = $name;
		$sql = $data->add();
		
        $result=mysql_query($sql); 
     
        //下面这句取出了刚才的insert语句的id 
        $id=mysql_insert_id(); 
     
        mysql_close($conn); 
         
        set_time_limit(30); //恢复缺省超时设置  
         
        echo "上传成功"; 
        echo "<a href='show_info.php?id=$id'>显示上传文件信息</a>"; 
    }   
    else {   
        echo "你没有上传任何文件";   
    }    
?>
