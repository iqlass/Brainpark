// var invoice = angular.module('invoice', []);
 var invoice = angular.module('invoice', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
invoice.controller('InvoiceController', function($scope,$http){
  $scope.invoice = {
    items: [{
      name: '',
      qty: '',
      price: ''
    }]
  };
  $scope.add = function(){
    $scope.invoice.items.push({
      name: '',
      qty: '',
      price: ''
    });
  },
    $scope.remove = function(index){
    $scope.invoice.items.splice(index, 1);
  },
    $scope.total = function(){
	
    var total = 0;
    angular.forEach($scope.invoice.items, function(item,myValue){
      total += item.qty * $scope.myValue;
    })
    return total;
  },
   $scope.myFunc = function() {
	  
     $scope.myValue ='';
	  $http.get('get_met_price/' + $scope.invoice.items[0]['name']).then(function ($data) {
           console.log($data.data);
		  $scope.myValue =$data.data;
		 
        });
      }
	  
});