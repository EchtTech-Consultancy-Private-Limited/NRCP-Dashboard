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
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addTestModal">
                                        Details of the Rabies Test Carried out
                                    </button>
                                    <table id="table_detail_out" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Nuber of Patients</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be loaded here using AJAX -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal fade" id="addTestModal" tabindex="-1" role="dialog"
                                aria-labelledby="editListingModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addTestModal">Details of the Rabies Test Carried out
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="myForm" id="rabies_detail_test">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="state">Date<span class="star">*</span></label>
                                                            <input type="date"t class="form-select"
                                                                aria-label="Default select example" name="date"
                                                                id="date">
                                                            <small id="pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="district">Number of Patients<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="number_of_patients" id="number_of_patients">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="accredited_pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="fromYear">Numbers of Sample Recieves<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="numbers_of_sample_recieved"
                                                                id="numbers_of_sample_recieved">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="supervisors_trained-error"
                                                                class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Type of Sample<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="type" id="type">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="diseasesSyndromes">Method of Diagnosis<span
                                                                class="star">*</span></label>
                                                        <select class="form-select" name="method_of_diagnosis"
                                                            id="method_of_diagnosis">
                                                            <option value=""> Select
                                                            </option>
                                                            <option value='yes'>Yes</option>
                                                            <option value='no'>No</option>
                                                        </select>
                                                        <small id="lims-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Numbers of Test Conducted<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_test"
                                                                id="numbers_of_test">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Total Numbers of Positives<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_positives"
                                                                id="numbers_of_positives">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Numbers Entered into the
                                                                IHIP<span class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_intered_ihip"
                                                                id="numbers_of_intered_ihip">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                        <div class=" apply-filter">
                                                            <button type="submit" id="submit"
                                                                class="btn  bg-primary text-light apply-filter button border-0 mr-2">Save</button>

                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal fade" id="edit_detail" tabindex="-1" role="dialog"
                                aria-labelledby="editListingModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_detail">Edit Details of the Rabies Test
                                                Carried out</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="myForm" id="edit_modal">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="edit_detail_out">
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="state">Date<span
                                                                    class="star">*</span></label>
                                                            <input type="date"t class="form-select"
                                                                aria-label="Default select example" name="date"
                                                                id="edit_date">
                                                            <small id="pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="district">Number of Patients<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="number_of_patients" id="edit_number_of_patients">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="accredited_pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="fromYear">Numbers of Sample Recieves<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="numbers_of_sample_recieved"
                                                                id="edit_numbers_of_sample_recieved">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="supervisors_trained-error"
                                                                class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Type of Sample<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="type" id="edit_type">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="diseasesSyndromes">Method of Diagnosis<span
                                                                class="star">*</span></label>
                                                        <select class="form-select" name="method_of_diagnosis"
                                                            id="edit_method_of_diagnosis">
                                                            <option value=""> Select
                                                            </option>
                                                            <option value='yes'>Yes</option>
                                                            <option value='no'>No</option>
                                                        </select>
                                                        <small id="lims-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Numbers of Test Conducted<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_test"
                                                                id="edit_numbers_of_test">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Total Numbers of Positives<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_positives"
                                                                id="edit_numbers_of_positives">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="diseasesSyndromes">Numbers Entered into the
                                                                IHIP<span class="star">*</span></label>
                                                            <select class="form-select" name="numbers_of_intered_ihip"
                                                                id="edit_numbers_of_intered_ihip">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="lims-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                        <div class=" apply-filter">
                                                            <button type="submit" id="submit_edit"
                                                                class="btn  bg-primary text-light apply-filter button border-0 mr-2">Save</button>

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
