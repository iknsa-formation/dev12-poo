app.controller('authorsCtrl', ['$scope', '$http', '$route', function($scope, $http, $route){
	$http.get('/aston/',
	{
		params : {
		    route: 'list_auteur'
		}
	}).then(function(result) {
		console.log(result.data);
		$scope.authors = result.data.auteurs;
	});

	$scope.delete = function(author) {
		$http.delete('/aston/',
		{
			params : {
                route: 'delete_auteur',
                id: author.id_auteur
			}
		}).then(function() {
			$route.reload();
		});
	};
	$scope.add = function() {
		$http.get('/aston/',
		{
			params : {
				route: 'add_auteur',
                nom: $scope.authorName,
                prenom: $scope.authorPrename,
                fonction: $scope.authorFunction
			}
		}).then(function() {
			$route.reload();
		});
	};
}]);

app.controller('authorCtrl', ['$scope', '$http', '$routeParams', '$route', '$location', function($scope, $http, $routeParams, $route, $location){
	$http.get('/aston/',
	{
		params : {
			route: 'show_auteur',
			id: $routeParams.id,
            origin: 'default'
        }
	}).then(function(result) {
		$scope.author = result.data.auteur;
		$scope.authorNewName = $scope.author.nom;
		$scope.authorNewPrename = $scope.author.prenom;
		$scope.authorNewFunction = $scope.author.fonction;
	});
}]);

app.controller('editAuthorCtrl', function($scope, $http, $routeParams, $location, $route){

    $http.get('/aston/',
    {
        params : {
            origin: 'default',
            route: 'edit_auteur',
            id: $routeParams.id,
            nom: $scope.authorNewName,
            prenom: $scope.authorNewPrename,
            fonction: $scope.authorNewFunction
        }
    }).then(function(result) {
        console.log(result);
        $scope.authorNewName = result.data.auteur.nom;
        $scope.authorNewPrename = result.data.auteur.prenom;
        $scope.authorNewFunction = result.data.auteur.fonction;
    });

    $scope.update = function() {
        $http.get('/aston/',
        {
            params : {
                route: 'edit_auteur',
                id: $routeParams.id,
                nom: $scope.authorNewName,
                prenom: $scope.authorNewPrename,
                fonction: $scope.authorNewFunction
            }
        }).then(function () {
            $location.path('authors');
        });
    };
});

app.controller('homeCtrl', ['$scope', function ($scope) {

}]);
