angular.module('db', ['services'])
.factory('$DB', ['$services',
	function($services){
		var DB = {
			setting : _global_setting,
			log : function(msg){
				console.log(msg);
			}
		}
		return DB;
	}
]);