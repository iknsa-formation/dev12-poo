var app = angular.module("authorApp", 
	["ngRoute"]
);

app.config(function($routeProvider) {

	$routeProvider.when('/', {
		templateUrl : 'app/views/home.html',
		controller : 'homeCtrl'

	}).when('/authors', {
		templateUrl : 'app/views/authors.html',
		controller : 'authorsCtrl'

	}).when('/author/:id', {
		templateUrl : 'app/views/author.html',
		controller : 'authorCtrl'

	}).when('/author/edit/:id', {
		templateUrl : 'app/views/edit_author.html',
		controller : 'authorCtrl'

	}).otherwise({
		redirectTo : '/'
	});
})
