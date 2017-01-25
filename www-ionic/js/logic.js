angular.module('logic', ['services'])
.factory('$logic', ['$services',
	function($services){
		var logic = {
			setting : _global_setting,
			// saveProduct : function(param){
			// 	param.act = 'save';
			// 	return this.post(
			// 				'product.php',
			// 				param);
			// },
			selectProduct : function(id){
				var param = {'act':'get','id':id};
				return this.get(
							'product.php',
							param);
			},

			getCategory : function (param) {
				return this.get('selectListCategory.php',param);//request on server
			},

			getArtist : function (param) {
				return this.get('selectListArtist.php', param);
			},

			getSong : function (param) {
				return this.get('selectListSong.php',param);
			},
			
			selectProducts : function(id){
				var param = {'act':'list','id':id};
				return this.get(
							'product.php',
							param);
			},
			categoryList : function(){
				var param = {'act':'list'};
				return this.get(
							'category.php',
							param);
			},
			listProduct : function(id){
				var param = {'id':id};
				return this.get(
							'list.php',
							param);
			},
			listArt : function(id) {
				var param = {'id':id};
				return this.get(
							'listArt.php',
							param);
			},
			
			/* ham co ban */
			parserList : function (data){
				if (data 
					&& (data.ret == 1)
					&& data.datas){
					return data.datas;
				}
				return 0;
			},
			parserOne : function (data){
				if (data 
					&& (data.ret == 1)
					&& data.data){
					return data.data;
				}
				return 0;
			},
			parserError : function (data){
				if (data 
					&& (data.ret == 1)){
					return data.error ? data.error : '';
				}
				return "Can't connect to server"
			},
			get : function(url,param){
				return $services.get(this.url(url),param);
			},
			post : function(url,param){
				return $services.post(this.url(url),param);
			},
			url : function (path){
				return this.setting.domain + path;
			},
			log : function(msg){
				console.log(msg);
			}
		}
		return logic;
	}
]);