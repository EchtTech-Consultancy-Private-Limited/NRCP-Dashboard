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
                                        Equipments
                                    </button>
                                    <table id="table_equipment" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>equipment</th>
                                                <th>Quantity</th>
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
                                            <h5 class="modal-title" id="addListingModal">Equipments</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="myForm" id="general_equipment">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="state">Equipment<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="equipment" id="equipment">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="equipment-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="district">Quantity<span
                                                                    class="star">*</span></label>
                                                            <input type="number" class="form-select"
                                                                aria-label="Default select example" name="quantity"
                                                                id="quantity">
                                                            </select>
                                                            <small id="quantity-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="fromYear">Year ofpurchase<span
                                                                    class="star">*</span></label>
                                                            <input type="date"t class="form-select"
                                                                aria-label="Default select example" name="year_of_purchase"
                                                                id="year_of_purchase">
                                                            <small id="year_of_purchase-error"
                                                                class="form-text text-muted">
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
                            <div class="modal fade" id="equipment_form" tabindex="-1" role="dialog"
                                aria-labelledby="editListingModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit">Equipments</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="myForm" id="equipment_modal">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="equipment_submit">
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="state">Equipment<span
                                                                    class="star">*</span></label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="equipment"
                                                                id="edit_equipment">
                                                                <option value=""> Select
                                                                </option>
                                                                <option value='yes'>Yes</option>
                                                                <option value='no'>No</option>
                                                            </select>
                                                            <small id="pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="district">Quantity<span
                                                                    class="star">*</span></label>
                                                            <input type="number" class="form-select"
                                                                aria-label="Default select example" name="quantity"
                                                                id="edit_quantity">
                                                            <small id="accredited_pt-error" class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-6">
                                                        <div class="form-group">
                                                            <label for="fromYear">Year of purchase<span
                                                                    class="star">*</span></label>
                                                            <input type="date"t class="form-select"
                                                                aria-label="Default select example"
                                                                name="year_of_purchase" id="edit_year_of_purchase">
                                                            <small id="supervisors_trained-error"
                                                                class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                        <div class=" apply-filter">
                                                            <button type="submit" id="submit-equipment"
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
