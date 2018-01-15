<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>密码修改</title>
</head>
<body>
	<center>
	<h1>密码修改</h1>
	<hr>
	<form action="{{ url('home/forgot/dopass') }}" method="POST">
	{{ csrf_field() }}
		用户名：<input type="text" name="name"><br><br>
		注册邮箱:<input type="email" name="email"><br><br>
		<button type="submit" >提交</button>
	</form>
	</center>
</body>
</html>