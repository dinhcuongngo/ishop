<!DOCTYPE html>
<html lang="vn">
<head>
	<title>iShop::@yield('title')</title>
	<meta charset="utf-8">
	@include('layouts.meta')
</head>
<body>
<!-- START OF HEADER -->
@include('layouts.header')
<!-- END OF HEADER -->

<!-- START OF CONTENT -->
@yield('content')
<!-- END OF CONTENT -->

<!-- START OF FOOTER -->
@include('layouts.footer')
<!-- END OF FOOTER -->
</body>
</html>
