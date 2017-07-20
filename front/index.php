<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP - Authors</title>
	<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="bower_components/angular-route/angular-route.min.js"></script>
	<script type="text/javascript" src="app/scripts/app.js"></script>
	<script type="text/javascript" src="app/scripts/controllers/controller.js"></script>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body ng-app="authorApp" class="container">
	{{authors}}
	<div data:ng-view></div>

</body>
</html>
