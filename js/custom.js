//nama module mApp diikuti dengan nama library ngRoute
var mApp = angular.module("mApp", ["ngRoute"])
    .config(function($routeProvider){
          $routeProvider
              .when("/siswa", {
                  templateUrl : "template/siswa.html",
                  controller  : "cSiswa"   
              })      
              .when("/siswa/:siswaid", {
                  templateUrl : "template/detailsiswa.html",
                  controller  : "cDetailSiswa"   
              })   
              .when("/guru", {
                  templateUrl : "template/guru.html",
                  controller  : "cGuru"   
              })
              //halaman pertaman yang tampil
              .when("/", {
                  templateUrl : "template/siswa.html",
                  controller  : "cSiswa"   
              })
              .otherwise({
                  redirectTo  : "/siswa"
              })  
     }); 

//service data siswa 
mApp.service("srvDataSiswa", function($http) {
    this.ambilDataSiswa = function() {
        return $http.get("php/datasiswa.php");
    }
});    

//service data guru 
mApp.service("srvDataGuru", function($http) {
    this.ambilDataGuru = function() {
        return $http.get("php/dataguru.php");
    }
});    


mApp.controller("cSiswa", function($scope,srvDataSiswa) {
    $scope.pesan = "Data Siswa";

    //array data kosong siswa ini nantiny akan diisikan perintah berdasarkan pengambilan data kedatabase
    $scope.datasiswa = [];

    //view data siswa
    $scope.lihatDataSiswa = function() 
    {
         /* 
         srvDataSiswa.ambilDataSiswa().then(function(response) {
            $scope.datasiswa = response.data;
         });
         */
         //dengan reponse success
          srvDataSiswa.ambilDataSiswa().then(function success(response) {
              $scope.datasiswa = response.data;
         }, function error(response) {
              console.lof(response);
         });

    }//end function lihatdatasiswa

    $scope.lihatDataSiswa();


}) 

mApp.controller("cGuru", function($scope,srvDataGuru) {
    $scope.pesan = "Data Guru";

    $scope.dataguru = [];

    $scope.lihatDataGuru = function() 
    {
        srvDataGuru.ambilDataGuru().then(function success(response) {
            $scope.dataguru = response.data; 
        }, function error(response) {
            console.log(response);
        });  
     
   
    }

    $scope.lihatDataGuru();


}) 

 mApp.controller("cDetailSiswa", function($scope,$http,$routeParams) {
    $scope.pesan = "Detail Siswa";

    //array data kosong siswa ini nantiny akan diisikan perintah berdasarkan pengambilan data kedatabase
    $scope.detaildatasiswa = [];

    //view data siswa
    $scope.lihatDetailDataSiswa = function() 
    {
     
         $http({
              method: "GET",
              url: "php/datasiswadetail.php",
              params: {siswaid:$routeParams.siswaid}  
         //jika success     
         }).then(function success(response) {
              $scope.detaildatasiswa = response.data;
         }, function error(response){
              console.log(response);
         }); 
    }

    $scope.lihatDetailDataSiswa();


}) 

