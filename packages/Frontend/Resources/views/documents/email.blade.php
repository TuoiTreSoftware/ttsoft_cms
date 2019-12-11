<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ env('MAIL_FROM_NAME') }}</title>
</head>
<body>
<section class="content">
	<h2>Hello {{ $name }}!</h2>
	<h5>{{ $subject }}</h5>
	@if($subject === 'elite')
	<a href="https://drive.google.com/file/d/1preODoBUKOaYDICDNZDT5Bzl5hZsL7Tr/view?usp=sharing">Get Our Template Admin</a>
	@endif
	@if($subject === 'canvas')
	<a href="https://drive.google.com/open?id=19CJlbcTDWAhDSA6XaREe9MGUl6_qJS_Y">Get Our Template Frontend</a>
	@endif
</section>
</body>
</html>
