<table class="table align-items-center mb-0" id="search-beneficiary-result">
    <thead>
        <tr>
            <th
                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                No.</th>
            <th
                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                Name</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Program 1</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Program 2</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Program 3</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Program 4</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Program 5</th>
            <th
                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                Action</th>
        </tr>
    </thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach ($beneficiary as $ben)

        <form action="" id="update-beneficiary-program">
        @csrf
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                        <p class="text-s text-secondary ms-2 mb-0 text-wrap">{{ $count }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $ben->name }}</p>
            </td>
            <input type="hidden" name="userid" value="{{ $ben->id }}">
            <input type="hidden" name="address" value="{{ $ben->address }}">
            @foreach ($programs as $pg)
            
                <td class="align-middle text-center">
                    <p class="text-xs text-secondary ms-2 mb-0 text-wrap">
                        <input type="checkbox" name="check_program[]" value="{{ $pg->id }}"
                        
                        @foreach($programtype as $pt)
                            
                            @if($pt->program == $pg->id && $pt->userid == $ben->id)

                                checked="checked"
                                
                            @endif
                            
                        @endforeach

                        > 

                        {{ $pg->program }}
                        
                        <input type="text" name="control_number[{{ $pg->id }}]" placeholder="Control Number" class="form-control border border-2 p-2"  
                        
                        @foreach($programtype as $pt)
                            
                            @if($pt->program == $pg->id && $pt->userid == $ben->id)

                                value='{{ $pt->control_number }}'
                            
                            @endif
                            
                        @endforeach
                        
                        >
                        @if($pg->id == 5) 

                        <input type="text" name="disability" placeholder="Type of Disability" class="form-control border border-2 p-2 mt-2"  
                        value='{{ $ben->ProgramType->disability }}'>

                        @endif
                        
                    </p>
                </td>

                @endforeach
            
                <td>
                    <div class="text-center">
                        <button class="btn bg-gradient-warning p-2 text-xs shadow" type="submit">Update</button>
                    </div>
                </td>
        </tr>
        </form>
        
        @php $count += 1; @endphp
        @endforeach
    </tbody>
</table>