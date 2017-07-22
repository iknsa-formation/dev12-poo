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
