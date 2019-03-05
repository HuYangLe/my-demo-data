<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
		<table>
			<caption>列表</caption>
			<tr><th>编号</th><th>姓</th><th>名</th><th>年龄</th><th>城市</th></tr>
			<?php
				// 设置常量 
				$mysql_conf = array(
					'db_host' => '127.0.0.1:3306',
					'db_name' => 'test',
					'db_user' => 'root',
					'db_pwd' => 'root'
				);
				
				// 第一步：连接数据库 
				//$conn = mysql_connect('localhost','root','root') or die('数据库连接失败,错误信息：'.mysql_error());
				$mysqli = @new mysqli($mysql_conf['db_host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
				if($mysqli -> connect_error){
					die("数据库连接错误：".$mysqli->connect_error);
				}

				// 第二部：选择指定数据库，设置字符集 
				$mysqli->query("set names 'utf8';");
				$select_db = $mysqli ->select_db($mysql_conf['db_name']);
				if(!$select_db){
					die("字符集设置错误：".$mysqli->error);
				}

				// 增加数据
				
				// 修改数据
				// $query = "update user set first_name = '王' and last_name = '花花' where id = 3";
				// mysql_query($query) or die("修改数据错误：".mysql_errno());
				// 删除数据

				// 第三步：显示数据 
				$sql = 'select * from user';
				$res = $mysqli->query($sql);
				if(!$res){
					die("显示数据错误：".$mysqli->error);
				}

				// 第四步：把结果转换成数组赋值给$row,如果有数据则为真
				while(!!$row  = $res->fetch_array()){
				echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["age"]."</td><td>".$row["city"]."</td></tr>";
			}
				$res->free();
				$mysqli->close();
			?>
		</table>
	</body>
</html>
