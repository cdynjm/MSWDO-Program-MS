<!-- The Modal -->
<div class="modal fade" id="editeventModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Event</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-event'></div>
                    <form id="update-event" action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                               
                                <label class="form-label fw-bold">Event Information</label>
                                <input type="hidden" id="edit-event-id" name="eventid">
                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" name="event_title" id="edit-event-title" placeholder="Event Title" class="form-control" required>
                                </div>
                                @if(Auth::user()->type == 1)
                                <select name="program_type" id="edit-event-program" class="form-select p-2 w-100 rounded float-start mb-4 mt-0 text-s text-secondary" required>
                                    <option value="">Select Program...</option>
                                    @foreach ($programs as $pg)
                                        <option value="{{ $pg->id }}">{{ $pg->program }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" id="edit-event-time" name="event_time" placeholder="Time" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-4">
                                    <input type="text" id="edit-event-location" name="event_location" placeholder="Location" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-4">
                                    <label class="m-2">Event Date</label>
                                    <input type="date" id="edit-event-date" name="event_date" class="form-control" required>
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