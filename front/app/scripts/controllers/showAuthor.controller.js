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
