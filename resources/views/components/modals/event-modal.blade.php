<!-- The Modal -->
<div class="modal fade" id="createeventModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Event</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-event'></div>
                    <form id="create-event" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                               
                                <label class="form-label fw-bold">Event Information</label>

                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Event Title</label>
                                    <input type="text" name="event_title" class="form-control" required>
                                </div>
                                @if(Auth::user()->type == 1)
                                <select name="program_type" id="" class="form-select p-2 w-100 rounded float-start mb-4 mt-0 text-s text-secondary" required>
                                    <option value="">Select Program...</option>
                                    @foreach ($programs as $pg)
                                        <option value="{{ $pg->id }}">{{ $pg->program }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Time</label>
                                    <input type="text" name="event_time" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="event_location" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-4">
                                    <label class="m-2">Event Date</label>
                                    <input type="date" name="event_date" class="form-control" required>
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