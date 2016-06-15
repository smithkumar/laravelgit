app.controller("schoolMasterController", ["$scope","$http",  function($scope,$http) {
         $scope.schools = {}
        
        // Master List Calling
        $scope.schoolMasterList  = function(){
            $http.get("/admin/home/list").success(function(response){
                    $scope.schoolMastersList = response.data.schoolMaster;
                }).error(function(response,status){
                    toastr.error('Error While loading service master list.');
                });
        }
        $scope.schoolMasterList();
        $scope.enableForm = false;
        $scope.update = false;
        
        $scope.editSchoolMasterDetail = function(schoolMasterDetail, index){
            $scope.currentIndex = index;
            $scope.schools = schoolMasterDetail;
            $scope.update = true;
            $scope.enableForm = true;
            document.getElementById("school_name").focus();
        }
        $scope.addSchoolMaster = function(){
            $scope.enableForm = true;
            $scope.update     = false;
            $scope.schools = {};
            $scope.submitted = undefined;
            $scope.serviceMasterList();
            $scope.schoolMasterForm.$setPristine();
        }

        //New schoolMaster Creation
        $scope.createSchoolMaster = function(newSchoolMaster){
            if(!$scope.schoolMasterForm.$invalid){
                $http.post("/admin/home/create",newSchoolMaster).success(function(response){
                    // toastr.success("School Master successfully Created.")
                $.notify({
                    icon: 'pe-7s-gift',
                    message: "Successfully Completed"
                },{
                    type: 'info',
                    timer: 1000
                });

                    $scope.addSchoolMaster();
                }).error(function(response,status){
                    toastr.error('Error in New schoolMaster Creation.Please Retry.')
                });
                $scope.addSchoolMaster();
            }
        }

        // //Update Master Details
        // $scope.updateServiceMaster = function(serviceMasterId, serviceMasterDetails) {
        //     serviceMasterDetails.id = serviceMasterId;
        //     if(!$scope.serviceMasterForm.$invalid){
        //         $http({method:'PUT',url:'/admin/service-master/update/',data: serviceMasterDetails}).success(function(response){
        //             $scope.addServiceMaster();
        //             toastr.success("service Master details updated successfully.")
        //         }).error(function(err)
        //         {
        //             toastr.error('Error While updating service master details.');
        //         });
        //     }
        // }

        // //Delete Particular Master
        // $scope.deleteServiceMaster = function(serviceMasterId)
        // {
        //     $http({method:'POST',url:'/admin/service-master/delete/', data:{'id' : serviceMasterId}}).success(function(response){
        //         toastr.success("service Master details successfully deleted.")
        //         $scope.addServiceMaster();
        //     }).error(function(err)
        //     {
        //         toastr.error('Error While deleting service master details.');
        //     });
        // }
    }])

            
