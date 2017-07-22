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
