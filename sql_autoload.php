<?php
function model_load($classname){
	if(!class_exists($classname)){
		$classFile = $classname . '.php';
		if(file_exists($classFile)){
			//加载类
			include $classname.'.php';
			echo '已加载'.$classname,'<hr/>';
			return true;
		}
	}
}

// function dorm_autoload($classname){
// 	if(!class_exists($classname)){
// 		//如果要加载的文件存在于dorm子文件夹
// 		$coursefile = 'pdo/' . $classname . '.php';
// 		if(file_exists($coursefile)){
// 			include $coursefile;
// 			echo '已加载'.$coursefile,'<hr/>';
// 			return true;
// 		}
// 	}
// }

// function teaching_autoload($classname){
// 	if(!class_exists($classname)){
// 		//如果要加载的文件存在于teaching子文件夹
// 		$coursefile = 'teaching/' . $classname . '.php';
// 		if(file_exists($coursefile)){
// 			include $coursefile;
// 			echo '已加载'.$coursefile,'<hr/>';
// 			return true;
// 		}
// 	}
// }

spl_autoload_register('model_load');
// spl_autoload_register('dorm_autoload');
// spl_autoload_register('teaching_autoload');
