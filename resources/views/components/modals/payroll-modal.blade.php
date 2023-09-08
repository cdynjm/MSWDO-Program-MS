<!-- The Modal -->
<div class="modal fade" id="createpayrollModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Payroll</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-payroll'></div>
                    <form id="create-payroll" action="">
                        @csrf
                        <div class="row">
                            <label class="form-label fw-bold">Cash Amount</label>
                            <div class="col-lg-1 ms-1"> 
                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" class="form-control text-center fs-6" value="₱" readonly>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="input-group input-group-outline mb-2">
                                    <label class="form-label">Amount to be Received per Beneficiary</label>
                                    <input type="number" name="cash" class="form-control" required>
                                </div>
                                <label class="form-label fw-bold">Select Beneficiaries</label>
                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="" class="form-control text-secondary w-5" value="Bontoc" readonly>
                                    <select name="address" class="form-select p-2 w-50 rounded float-start text-s text-secondary" id="search-address">
                                        <option value="">Select Barangay</option>
                                        <option value="0">All Beneficiaries</option>
                                        @foreach ($barangay as $brgy)
                                            <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <input type="checkbox" id="check-all" value='' class="ms-2">
                                <label class="m-2 check-program">Select All</label>
                                
                                <button type="submit" class="btn btn-success ms-2 mb-2 float-end"> Create</button>
                        
                                <div class="table-responsive p-0 mb-4 w-100">
                                    @include('pages.tables.payroll-beneficiary-table')
                                </div>

                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 