<?php
//该类代表数据库，负责对数据库进行操作
//这个类是业成的

class DBDriver{
	
	public $connetion;		//该属性代表数据库连接
	public $statement;		//该属性代表数据库查询（语句）

	public function __construct(){
		$drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		try{//连接数据库
			$this->connetion = new PDO('mysql:host=localhost;port=3306;dbname=test','root','root',$drivers);
		}catch(PDOException $e){
			echo '数据库连接出错,错误原因是：' . $e->getMessage();
			exit;
		}
		echo '连接成功','<hr/>';
	}

	//该方法查询数据库，让数据库执行查询语句
	public function query($sql){
		try{
			$this->statement = $this->connetion->query($sql);
		}catch(PDOException $p){
			echo '错误原因是：',$this->connetion->errorInfo()[2],'<br/>';
		}
		
		//以下代码是在PDO错误处理方式是静默方式状况下采用的错误处理方法
		// if($this->statement == false){
		// 	echo '错误代号是：',$this->connetion->errorCode(),'<br/>';
		// 	echo '错误原因是：',$this->connetion->errorInfo()[2],'<br/>';
		// 	exit;
		// }
	}

	//第二个办法，创建一个方法，但是根据标记的不同，返回不同的数据
	public function get_results_recods($sql,$only=true,$fetch_style = PDO::FETCH_ASSOC){
		$this->query($sql);
		if($only == true){
			return $this->statement->fetch($fetch_style);	//返回一条记录
		}else{
			return $this->statement->fetchAll($fetch_style);//返回多条记录
		}
	}

	//对数据库做增,删,改操作
	public function exec($sql){
		//以下代码是在PDO错误处理方式是异常处理方式状况下采用的错误处理方法
		try{
			$n = $this->connetion->exec($sql);
		}catch(PDOException $p){
			echo '错误代号是：',$this->connetion->errorCode(),'<br/>';
			echo '错误原因是：',$this->connetion->errorInfo()[2],'<br/>';
			exit;
		}
		echo '操作成功！','<br/>';
		echo '受影响的行数是：' . $n . '行','<br/>';

		//以下代码是在PDO错误处理方式是静默方式状况下采用的错误处理方法
		// if($n === false){
		// 	echo '错误代号是：',$this->connetion->errorCode(),'<br/>';
		// 	echo '错误原因是：',$this->connetion->errorInfo()[2],'<br/>';
		// 	exit;
		// }else{
		// 	echo '操作成功！','<br/>';
		// 	echo '受影响的行数是：' . $n . '行','<br/>';
		// }
	}

	//获得中最后插入的记录的ID
	public function lastInsertId(){
		$id = $this->connetion->lastInsertId();
		return $id;
	}
}