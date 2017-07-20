app.controller('authorsCtrl', ['$scope', '$http', '$route', function($scope, $http, $route){
	$http.get('/aston',
	{
		params : {route: 'list_auteur'}
	}).then(function(result) {
		console.log(result.data);
		$scope.authors = result.data.auteurs;
	})

	$scope.delete = function(author) {

		$http.delete('services/api.php',
		{
			params : {method: 'deleteAuthor', id_auteur: author.id_auteur}
		}).then(function(result) {
			$route.reload();
		})
	}

	$scope.add = function() {

		$http.get('services/api.php',
		{
			params : {
				method: 'addAuthor', nom: $scope.authorName, prenom: $scope.authorPrename, fonction: $scope.authorFunction 
			}
		}).then(function(result) {
			$route.reload();
		})
	}

}]);

app.controller('authorCtrl', ['$scope', '$http', '$routeParams', '$route', '$location', function($scope, $http, $routeParams, $route, $location){
	$http.get('/aston/',
	{
		params : {route: 'edit_auteur', id: $routeParams.id}

	}).then(function(result) {
		console.log(result);
		$scope.author = result.data[0];
		$scope.authorNewName = $scope.author.nom;
		$scope.authorNewPrename = $scope.author.prenom;
		$scope.authorNewFunction = $scope.author.fonction;
	})
}])

app.controller('editAuthorCtrl', ['$scope', '$http', '$routeParams', '$route', '$location', function($scope, $http, $routeParams, $route, $location){
    $scope.update = function() {
        $http.get('/aston/',
            {
                params : {
                    route:'edit_auteur',
                    id: $routeParams.id,
                    nom: $scope.authorNewName,
                    prenom: $scope.authorNewPrename,
                    fonction: $scope.authorNewFunction
                }

            }).then(function(result) {
            $location.path('authors');
        })
    }
}])
