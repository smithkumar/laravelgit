@extends('layouts.dashboard-layout')
@section('content')
<div  ng-controller="schoolMasterController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Add School</h4>
                </div>
                <div class="content">
                    <form name="schoolMasterForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error' : (schoolMasterForm.school_name.$dirty || submitted) && schoolMasterForm.school_name.$error.required}">
                                    <label>School Name</label>
                                    <input type="text" class="form-control" id="school_name" name="school_name" ng-model="schools.school_name" ng-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error' : (schoolMasterForm.contact_no.$dirty || submitted) && schoolMasterForm.contact_no.$error.required}">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_no" ng-model="schools.contact_no" ng-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error' : (schoolMasterForm.no_of_credit.$dirty || submitted) && schoolMasterForm.no_of_credit.$error.required}">
                                    <label>No of Credit</label>
                                    <input type="text" class="form-control" name="no_of_credit" ng-model="schools.no_of_credit" ng-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error' : (schoolMasterForm.address.$dirty || submitted) && schoolMasterForm.address.$error.required}">
                                    <label>Address</label>
                                    <textarea rows="3" class="form-control" name="address" ng-model="schools.school_address" ng-required="true"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <button  class="btn btn-warning btn-fill" ng-click="addSchoolMaster()">Reset</button>
                            <button  class="btn btn-primary btn-fill" ng-hide="update" ng-click="submitted=true;createSchoolMaster(schools)">Create</button>
                            <button  class="btn btn-primary btn-fill"  ng-show="update" ng-click="submitted=true;updateSchoolMaster(schools.id,schools)">Update</button>
                        </div>
          
                        <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button> -->
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">School List</h4>
                </div>
                <div class="content">
                    <table class="table table-hover mb0">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>School Name</th>
                              <th>School Contact No</th>
                              <th>No of Credits</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr ng-repeat="schoolMaster in schoolMastersList" ng-hide="serviceMastersList.length<=0">
                              <th scope="row">[[$index+1]]</th>
                              <td>[[schoolMaster.school_name]]</td>
                              <td>[[schoolMaster.contact_no]]</td>
                              <td>[[schoolMaster.no_of_credit]]</td>
                              <td>
                                  <button class="btn btn-primary btn-xs" ng-click="editSchoolMasterDetail(schoolMaster, $index)"><i class="fa fa-pencil-square-o"></i></button>
                                  <button class="btn btn-danger btn-xs" ng-click="deleteServiceMaster(serviceMaster.id)"><i class="fa fa-trash-o"></i></button>
                              </td>
                          </tr>
                          <tr ng-show="!schoolMastersList">
                              <td colspan="4" ><center>Loading, Please wait ...</center></td>
                          </tr>
                          <tr ng-show="schoolMastersList.length<=0 ">
                              <td colspan="4" ><center>No records Found.</center></td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>    
</div>
@endsection