var _mico_global_session = new Object({customer:0});
angular.module('helper', ['services'])
.factory('$helper', ['$services',
	function($services){
		var helper = {
			preAction : function($scope,$location,$state){
				this._rootScope = $scope;
				this._rootScope._ajaxloading = new Object();
				this._scope = $scope;
				this._location = $location;
				this._state = $state;
				this._scope.customer = this.getCustomer();
				this._scope.error = "";
			},
			startLoading : function(){
				this._rootScope._ajaxloading['system'] = 1;
			},
			stopLoading : function(data){
				this._rootScope._ajaxloading['system'] = 0;
			},
			mapOne : function(id,f,datas){
				var ret = 0;
				angular.forEach(datas, function(val, key) {
					if (val[f] == id){
						ret = val;
					}
				});
				return ret;
			},
			getCustomer : function(){
				return this.getSetting('customer');
			},
			setCustomer : function(val){
				return this.setSetting('customer',val);
			},
			clearCustomer : function(){
				return this.setSetting('customer',0);
			},
			getSetting : function(name){
				return _mico_global_session[name] ? _mico_global_session[name] : 0;
			},
			setSetting : function(name,val){
				_mico_global_session[name] = val;
			},
			go : function(url){
				this._location.path(url);
			},
			log : function(msg){
				console.log(msg);
			}
		}
		return helper;
	}
]);