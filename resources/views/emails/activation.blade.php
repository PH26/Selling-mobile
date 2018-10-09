<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activation</title>
</head>
<body>
	<p>Welcome, <b>{{ $name }}</b> </p>
	<p>Click to active your account:</p>
	<a href="{{ url('user/activation', $link)}}">{{ url('user/activation', $link)}}</a> 
	<p>Thanks!</p>
</body>
</html>
