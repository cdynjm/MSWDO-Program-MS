<!-- The Modal -->
<div class="modal fade" id="createprogramModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Program</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-program'></div>
                    <form id="create-program" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                               
                                <label class="form-label fw-bold">Program Information</label>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Program Name</label>
                                    <input type="text" name="program" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline">
                                    <textarea style="height: 235px;" class="form-control" name="description" type="text" placeholder="Description" required></textarea>
                                </div>
                                </div>
                                <div class="col-lg-6">

                                <label class="form-label fw-bold">Focal Person Account</label>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Email/Username</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mt-4"> Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 