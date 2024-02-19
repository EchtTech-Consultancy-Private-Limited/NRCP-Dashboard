@extends('layouts.main') @section('content')
    <style>
        @media print {

            /* Add styles for print here */
            #container {
                /* Adjust map styles for print */
                width: 100%;
                /* Adjust as needed */

            }

            .detailsDatas {
                /* Adjust table styles for print */
                width: 100%;
                /* Adjust as needed */
            }

            /* Add other print-specific styles as needed */
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="clearfix hidden-md-up"></div>
            <div class="col-md-12">
                <div class="card card-primary dashboard">
                    <div class="form-tab">
                        <div class="bootstrap-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addListingModal">
                                        GeneralProfile
                                    </button>
                                    <div id="general_profile_success"></div>
                                            <table id="table_general_profile" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>State</th>
                                                        <th>date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Data will be loaded here using AJAX -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="addListingModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editListingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addListingModal">GeneralProfile</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="myForm" id="general_profile">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="state">State<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="state" id="state" />
                                                                    <small id="state-error" class="form-text text-muted">
                                                                    </small><span class="text-danger error-text state_error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="district">Hospital<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="hospital" id="hospital" />
                                                                    <small id="hospital-error" class="form-text text-muted">
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="fromYear">Nodal Officer<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="designation"
                                                                        id="designation" />
                                                                    <small id="designation-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="toYear">Contact Number<span
                                                                            class="star">*</span></label>
                                                                    <input type="number" name="contact_number"
                                                                        id="contact_number" />
                                                                    <small id="contact_number-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="diseasesSyndromes">Mou<span
                                                                            class="star">*</span></label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example" name="mou"
                                                                        id="mou" onChange="handleFilterValue()">
                                                                        <option value=""> Select </option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    <small id="mou-error" class="form-text text-muted">
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="formType">Joining Date of NRCP<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="date_of_joining"
                                                                        id="date_of_joining" />
                                                                    <small id="date_of_joining-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                                <div class="apply-filter">
                                                                    <button type="submit" id="submit"
                                                                        class="btn bg-primary text-light apply-filter button border-0 mr-2">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal fade" id="edit_general_profile" tabindex="-1" role="dialog"
                                        aria-labelledby="editListingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_general_profile">GeneralProfile</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="myForm" id="general_profile_submit">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" id="general_profile_update" />
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="state">State<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="state"
                                                                        id="edit_state" />
                                                                    <small id="state-error" class="form-text text-muted">
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="district">Hospital<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="hospital"
                                                                        id="edit_hospital" />
                                                                    <small id="hospital-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="fromYear">Nodal Officer<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="designation"
                                                                        id="edit_designation" />
                                                                    <small id="designation-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="toYear">Contact Number<span
                                                                            class="star">*</span></label>
                                                                    <input type="number" name="contact_number"
                                                                        id="edit_contact_number" />
                                                                    <small id="contact_number-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="diseasesSyndromes">Mou<span
                                                                            class="star">*</span></label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example" name="mou"
                                                                        id="edit_mou" onChange="handleFilterValue()">
                                                                        <option value=""> Select </option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    <small id="mou-error" class="form-text text-muted">
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="form-group">
                                                                    <label for="formType">Joining Date of NRCP<span
                                                                            class="star">*</span></label>
                                                                    <input type="text" name="date_of_joining"
                                                                        id="edit_date_of_joining" />
                                                                    <small id="date_of_joining-error"
                                                                        class="form-text text-muted"> </small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                                <div class="apply-filter">
                                                                    <button type="submit" id="submit-btn"
                                                                        class="btn bg-primary text-light apply-filter button border-0 mr-2">Save
                                                                        Change</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
