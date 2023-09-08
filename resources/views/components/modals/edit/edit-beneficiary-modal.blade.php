<!-- The Modal -->
<div class="modal fade" id="editbeneficiaryModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Beneficiary</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-beneficiary'></div>
                    <form id="update-beneficiary" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="userid" name="beneficiary_id">
                                <input type="hidden" id="programid" name="program_id">
                                <label class="form-label fw-bold">Personal Information</label>

                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="name" class="form-control" id="edit-full-name" placeholder="Full Name" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <select name="gender" id="edit-gender" class="form-select p-2 w-50 rounded float-start text-s text-secondary">
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="" class="form-control text-secondary" value="Bontoc" readonly>
                                    <select name="address" class="form-select p-2 w-50 rounded float-start text-s text-secondary" id="edit-address">
                                        <option value="">Select Barangay</option>
                                        @foreach ($barangay as $brgy)
                                            <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="m-2">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control" id="edit-birthdate" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="contact_number" class="form-control" id="edit-contact-number" placeholder="Contact Number" required>
                                </div>

                                <label class="form-label fw-bold">Account Status</label>

                                <div class="input-group input-group-outline mb-4">
                                    <select name="status" class="form-select p-2 w-50 rounded float-start text-s text-secondary" id="edit-status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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