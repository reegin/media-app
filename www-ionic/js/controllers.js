angular.module('controllers', ['ionic','logic','helper'])


.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  // Form data for the login modal
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})

.controller('PlaylistsCtrl', ['$scope','$state','$logic','$helper',function($scope,$state,$logic,$helper) {
  $scope.datas = 0;
  $scope._ready = 0;
  var http = $logic.getCategory();
  //$scope.abc = 'abc';
  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if (!error){
      $scope.datas = $logic.parserList(data);
      $datas =  $scope.datas;
      console.log($datas);
    }else{
      $scope.error = error;
      return 1;
    }
  }.bind(this));
}])

.controller('PlaylistCtrl', function($scope, $stateParams, $logic, $state) {
  $scope.datas = 0;
  $scope._ready = 0;
  var http = $logic.listProduct($stateParams.playlistId);

  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if (!error){
      $scope.datas = $logic.parserList(data);
      $datas =  $scope.datas;
      console.log($datas);
    }else{
      $scope.error = error;
      return 1;
    }
  }.bind(this));
})

.controller('AllSongCtrl', ['$scope','$state','$logic','$helper',function($scope,$state,$logic,$helper) {
  $scope.datas = 0;
  $scope._ready = 0;
  var http = $logic.getSong();
  //$scope.abc = 'abc';
  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if (!error){
      $scope.datas = $logic.parserList(data);
      $datas =  $scope.datas;
      console.log($datas);
    }else{
      $scope.error = error;
      return 1;
    }
  }.bind(this));
  

}])

.controller('ArtistsCtrl', ['$scope','$state','$logic','$helper',function($scope,$state,$logic,$helper) {
  $scope.datas = 0;
  $scope._ready = 0;
  var http = $logic.getArtist();

  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if(!error){
      $scope.datas = $logic.parserList(data);
      $datas = $scope.datas;
      console.log($datas);
    }
    else{
      $scope.error = error;
      return 1;
    }
  }
  .bind(this));
}])

.controller('ArtistCtrl', function($scope, $stateParams, $logic, $state) {
  $scope.datas = 0;
  $scope._ready = 0;
  var http = $logic.listArt($stateParams.artistID);

  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if (!error){
      $scope.datas = $logic.parserList(data);
      $datas =  $scope.datas;
      console.log($datas);
    }else{
      $scope.error = error;
      return 1;
    }
  }.bind(this));
})

.controller('NowPlayingCtrl', function($scope, $stateParams, $logic, $state,$sce) {

  $scope.convert = function(src) {
    return $sce.trustAsResourceUrl(src);
  }
  
  $scope.data = 0;
  $scope._ready = 0;
  console.log($stateParams.songId);
  var http = $logic.selectProduct($stateParams.songId);

  http.success(function(data){
    $scope._ready = 1;
    var error = $logic.parserError(data);
    if (!error){
      $scope.data = $logic.parserOne(data);
      $data =  $scope.data;
      console.log($data);

      $scope.link = "http://localhost/"+$data.link;
      link = $scope.link;
      console.log(link);

    }else{
      $scope.error = error;
      return 1;
    }
  }.bind(this));
})
