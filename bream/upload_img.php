<?php
//设置文件保存目录
$uploaddir = "upfiles/";
//设置允许上传文件的类型
$type=array("jpg","gif","bmp","jpeg","png");
//获取文件后缀名函数
function fileext($filename)
{
	return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length)
{
	$hash = 'CR';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars);
	mt_srand((double)microtime());
	for($i = 0; $i < $length; $i++)
	{
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}
//截取文件格式后缀
$a=strtolower(fileext($_FILES['filename']['name']));
//判断文件类型
if(!in_array($a,$type))
{
	$text=implode(",",$type);
	$ret_code=3;//文件类型错误
	$page_result=$text;
	$retArray = array('ret_code' => 
	$ret_code,'page_result'=>$page_result);
	$retJson = json_encode($retArray);
	echo $retJson;
	return;
}
//生成目标文件的文件名
else
{
	$filename=explode(".",$_FILES['filename']['name']);
	// do
	// {
	$filename[0]=random(10); //设置随机数长度
	$name=implode(".",$filename);
	//$name1=$name.".Mcncc";
	$uploadfile=$uploaddir.$name;
	// }
	// while(file_exists($uploadfile));
	// do while 循环，不明觉厉
	if (move_uploaded_file($_FILES['filename']['tmp_name'],$uploadfile))
	{
		if(is_uploaded_file($_FILES['filename']['tmp_name']))
		{
			$ret_code=1;
			//上传失败
		}
		else
		{//上传成功
			$ret_code=0;
		}
	}
	$retArray = array('ret_code' => $ret_code);
	$retJson = json_encode($retArray);
}

//以上与下面段注释可以联合使用，可以使图片根据计算出来的比例压缩
$file_type=$_FILES["filename"]['type'];
function ResizeImage($uploadfile,$maxwidth,$maxheight,$name)
{
	//取得当前图片大小
	$width = imagesx($uploadfile);
	$height = imagesy($uploadfile);
	$i=0.5;
	//生成缩略图的大小
	if(($width > $maxwidth) || ($height > $maxheight))
	{
		$widthratio = $maxwidth/$width;
		$heightratio = $maxheight/$height;
		// 谁小用谁
		if($widthratio < $heightratio)
		{
			$ratio = $widthratio;
		}
		else
		{
			$ratio = $heightratio;
		}
		$newwidth = $width*$ratio;
		$newheight = $height*$ratio;
// 一种按输入来，一种直接取一半
		// $newwidth = $width*$i;
		// $newheight = $height*$i;
		if(function_exists("imagecopyresampled"))
		{
			$uploaddir_resize = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($uploaddir_resize, $uploadfile, 0, 0, 0, 0, $newwidth, 
			$newheight, $width, $height);
		}
		else
		{
			$uploaddir_resize = imagecreate($newwidth, $newheight);
			imagecopyresized($uploaddir_resize, $uploadfile, 0, 0, 0, 0, $newwidth, 
			$newheight, $width, $height);
		}
		ImageJpeg ($uploaddir_resize,$name);
		$hehe = ImageDestroy ($uploaddir_resize);//销毁图像
	}
	else
	{
		ImageJpeg ($uploadfile,$name);
	}
}

// imagecreatefromjpeg 从图像取得一个新图像

if($_FILES["filename"]['size'])
{
	if($file_type == "image/pjpeg"||$file_type == "image/jpg"|$file_type == 
	"image/jpeg")
	{
		//$im = imagecreatefromjpeg($_FILES[$upload_input_name]['tmp_name']);
		$im = imagecreatefromjpeg($uploadfile);
	}
	elseif($file_type == "image/xpng")
	{
		//$im = imagecreatefrompng($_FILES[$upload_input_name]['tmp_name']);
		$im = imagecreatefromjpeg($uploadfile);
	}
	elseif($file_type == "image/gif")
	{
		//$im = imagecreatefromgif($_FILES[$upload_input_name]['tmp_name']);
		$im = imagecreatefromjpeg($uploadfile);
	}
		else//默认jpg
	{
		$im = imagecreatefromjpeg($uploadfile);
	}
	if($im)
	{
		//压缩图片
		$uploaddir_resize="upfiles_resize/";
		$uploadfile_resize=$uploaddir_resize.$name;
		$pic_width_max=360;
		$pic_height_max=180;
		ResizeImage($im,$pic_width_max,$pic_height_max,$uploadfile_resize);
		ImageDestroy ($im);
	}
}