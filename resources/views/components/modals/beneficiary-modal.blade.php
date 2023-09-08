<!-- The Modal -->
<div class="modal fade" id="createbeneficiaryModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Beneficiary</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-beneficiary'></div>
                    <form id="create-beneficiary" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                               
                                <label class="form-label fw-bold">Personal Information</label>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <select name="gender" class="form-select p-2 w-50 rounded float-start text-s text-secondary" id="">
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="" class="form-control text-secondary" value="Bontoc" readonly>
                                    <select name="address" class="form-select p-2 w-50 rounded float-start text-s text-secondary" id="">
                                        <option value="">Select Barangay</option>
                                        @foreach ($barangay as $brgy)
                                            <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="m-2">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control" required>
                                </div>

                                <label class="form-label fw-bold">Account Information</label>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Email/Username</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label fw-bold">Type of Program</label>

                                <div class=" mb-4">
                                    @foreach ($programs as $pg)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input type="checkbox" name='programtype[]' value='{{ $pg->id }}'>
                                            <label class="m-2 check-program">{{ $pg->program }}</label>
                                            <div class="number-{{ $pg->id }} input-group input-group-outline mb-4" style="display: none;">
                                                <label class="form-label" id="">Control Number</label>
                                                <input type="text" name='control_number[{{ $pg->id }}]' class="form-control">
                                            </div>
                                            @if($pg->id == 5)
                                            <div class="disability-{{ $pg->id }} input-group input-group-outline mb-4" style="display: none;">
                                                <label class="form-label" id="">Type of Disability</label>
                                                <input type="text" name='disability' class="form-control">
                                            </div>
                                            @endif
                                        </li>
                                    </ul>
                                    @endforeach
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