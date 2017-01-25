
angular.module('starter', ['ionic', 'controllers', 'logic', 'ngCordova'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

  .state('app', {
  url: '/app',
  abstract: true,
  templateUrl: 'templates/menu.html',
  controller: 'AppCtrl'
})
	// .state('app.nowPlaying', {
	// 	  url: '/nowPlaying',
	// 	  views: {
	// 		'menuContent': {
	// 		  templateUrl: 'templates/nowPlaying.html'
	// 		}
	// 	  }
	// 	})
		
	.state('app.nowPlaying', {
    url: '/song/:songId',
    views: {
      'menuContent': {
        templateUrl: 'templates/nowPlaying.html',
        controller: 'NowPlayingCtrl'
      }
    }
  })

  .state('app.allSong', {
    url: '/all',
    views: {
      'menuContent': {
        templateUrl: 'templates/allSong.html',
        controller: 'AllSongCtrl'
      }
    }
  })	

  .state('app.search', {
    url: '/search',
    views: {
      'menuContent': {
        templateUrl: 'templates/search.html',
        controller: 'AllSongCtrl'
		
      }
    }
  })

  .state('app.playlists', {
    url: '/playlists',
    views: {
      'menuContent': {
        templateUrl: 'templates/playlists.html',
        controller: 'PlaylistsCtrl'
      }
    }
  })

  .state('app.playlist', {
    url: '/playlists/:playlistId',
    views: {
      'menuContent': {
        templateUrl: 'templates/playlist.html',
        controller: 'PlaylistCtrl'
      }
    }
  })

  .state('app.artists', {
    url: '/artists',
    views: {
      'menuContent': {
        templateUrl: 'templates/artists.html',
        controller: 'ArtistsCtrl'
      }
    }
  })

  .state('app.artist', {
    url: '/artists/:artistID',
    views: {
      'menuContent': {
        templateUrl: 'templates/artist.html',
        controller: 'ArtistCtrl'
      }
    }
  })

  

  .state('app.logout', {
    url: '/logout',
    views: {
      'menuContent': {
        templateUrl: 'templates/logout.html'
    }
    }
  })
 
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/app/playlists');
});
