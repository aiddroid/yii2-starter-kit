<!doctype html>
<html ng-app>
    <head>
	<title>angular demo</title>
        <script src="http://code.angularjs.org/angular-1.0.1.min.js"></script>
    </head>
    <body>
	Your name: <input type="text" ng-model="yourname" placeholder="World">
        <hr>
        Hello {{yourname || 'World'}}!
    </body>
</html>
