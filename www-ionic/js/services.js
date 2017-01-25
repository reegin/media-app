angular.module('services', ['ngResource'])
.factory('$services', ['$http','$resource',
	function($http,$resource){
		var services = {
			
			get : function(url,p){
				return this.getHttp(url,p);
			},
			post : function (url,p){
				return this.postHttp(url,p);
			},
			getHttp : function (url,p){
				this.log('getHttp->url=' + url);
				p = this.httpData(p);
				var ret = $http.jsonp(url,p);//for session
				ret.error(function(data, status, headers, config) {
					this.showError("Can't access to server");
				}.bind(this));
				return ret;
			},
			postHttp : function (url,p){
				return this.getHttp(url,p);//for session
			},
			httpData : function(p){
				var param ;
				if (p){
					param = p;
				}else{
					param = new Object();
				}
				param.callback = 'JSON_CALLBACK';
				//{callback: 'JSON_CALLBACK'};
				var ret = {
					cache	: false,
					params    : param,
					headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
				}
				if (p){
					//ret.data = $.param(p);
				}
				return ret;
			},
			fetch : function (url,p){
				this.log('fetch->url=' + url);
				return this.getHttp(url,p);
				p = this.httpData(p);
				var ret = $http.post(url,p);//for session
				ret.error(function(data, status, headers, config) {
					this.showError("Can't access to server");
				}.bind(this));
				return ret;
			},
			showError : function(msg){
				return this.alert(msg,"ERROR");
			},
			showMsg : function(msg){
				return this.alert(msg,"Message");
			},
			alert : function(msg,title){
				return  alert(msg,title);
			},
			log : function(msg){
				console.log(msg);
			}
		}
		return services;
	}
]);