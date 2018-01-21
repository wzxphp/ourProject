<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>麦博科技</title>
</head>
<body>
	<div>
		{{ $name }}:您好，您正在进行密码修改操作，请确认本人操作
		<a href="{{ url('home/forgot/updatepass') }}/{{ $data }}">点击修改密码</a>
	</div>
</body>
</html>