 var app = angular.module('MyApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
        app.controller('MyController', function ($scope,$http) {
         
            $scope.IsVisible = false;
            $scope.Show = true;
            $scope.ShowHide = function () {
             
                 $scope.IsVisible = $scope.IsVisible ? false : true;
                 $scope.Show = $scope.Show ? false : true;
				
            }
			
			$scope.insert = function() {
				$http.post(
                "addcategories", {
                    'name': $scope.cname,
                    'metatitle': $scope.metatitle,
                    'metadisp': $scope.metadisp,
                    'metakey': $scope.metakey,
                    
                }
            ).then(function success(data) {
				alert("Insert Successfully");
                console.log(data);
                $scope.cname = null;
                $scope.metatitle = null;
                $scope.metadisp = null;
                $scope.metakey = null;
                $scope.btnName = "Insert";
				 $scope.show_data();
				  $scope.IsVisible = false;
            $scope.Show = true;
                
            });
			}
			
			$scope.show_data = function() {
				 $http.get('Show_cat').then(function ($data) {
            $scope.customers = $data.data;
            console.log($scope.customers);
            console.log($scope.customers);
            console.log($scope.customers.length);
           
        });
        // $http.get("Show_cat")
            // .success(function(data) {
                // $scope.names = data;
				// console.log(names);
            // });
    }
	$scope.update_data = function(x) {
		
		     $scope.IsVisible = true;
            $scope.Show = false;
          $scope.Cate_id = x.Cate_id;
          $scope.cname = x.Cate_name;
          $scope.metatitle = x.Cate_meta_title;
          $scope.metadisp = x.Cate_meta_discription;
          $scope.metakey = x.Cate_meta_Key;
    }
	$scope.delete_data = function(x){
					 $http.get('del_cat').then(function ($data) {
            $scope.customers = $data.data;
            console.log($scope.customers);
            console.log($scope.customers);
            console.log($scope.customers.length);
           
        });	
			}
	$scope.show_data();
        });