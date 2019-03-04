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
				define("DB_HOST",'localhost');
				define("DB_USER",'root');
				define("DB_PSW",'root');
				define("DB_NAME",'test');
				
				// 第一步：连接数据库 
				$conn = mysql_connect('localhost','root','root') or die('数据库连接失败,错误信息：'.mysql_error());
				
				// 第二部：选择指定数据库，设置字符集 
				mysql_select_db(DB_NAME,$conn) or die('数据库错误，错误信息：'.mysql_error());
				mysql_query('SET NAMES UTF8') or die('字符集设置错误：'.mysql_error());

				// 第三步：显示数据 
				$query = 'select * from user';
				$result = mysql_query($query) or die('SQL语句错误,错误信息：'.mysql_error());

				// 第四步：把结果转换成数组赋值给$row,如果有数据则为真
				while(!!$row  = mysql_fetch_array($result)){
				echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["age"]."</td><td>".$row["city"]."</td></tr>";
			}
				mysql_close($conn);
			?>
		</table>
	</body>
</html>
