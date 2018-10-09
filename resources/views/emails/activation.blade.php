<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activation</title>
</head>
<body>
	<p>Wellcome,<b>{{ $name }}</b> </p>
	Please active your account:
	<a href="{{ url('user/activation', $link)}}">{{ url('user/activation', $link)}}</a> 
	<p>Thanks!</p>
</body>
</html>