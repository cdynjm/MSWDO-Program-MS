<!-- The Modal -->
<div class="modal fade" id="editprogramModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Program</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-program'></div>
                    <form id="update-program" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                               
                                <label class="form-label fw-bold">Program Information</label>
                                <input id='edit-program-id' type="hidden" name="programid">
                                <input id='edit-focalperson-id' type="hidden" name="focalpersonid">
                                <div class="input-group input-group-outline mb-4">
                                    <input id='edit-program-name' placeholder="Program Name" type="text" name="program" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline">
                                    <textarea style="height: 235px;" id='edit-description' placeholder="Description" class="form-control" name="description" type="text" required></textarea>
                                </div>
                                </div>
                                <div class="col-lg-6">

                                <label class="form-label fw-bold">Focal Person Account</label>

                                <div class="input-group input-group-outline mb-4">
                                    <input id='edit-focalperson' placeholder="Focal Person" type="text" name="full_name" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <input id='edit-address' type="text" placeholder="Address" name="address" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <input id='edit-contactnumber' placeholder="Contact Number" type="text" name="contact_number" class="form-control" required>
                                </div>
                            </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mt-4"> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 