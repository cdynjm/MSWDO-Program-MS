
    <table class="table align-items-center mb-0" id="search-beneficiary-result">
    <th
        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
        Checkbox</th>
    <th
        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
        Control Number</th>
    <th
        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
        Name</th>
    <th
        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
        Address</th>
    <th
        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
        Status</th>

    @if($default == 1)

        @foreach ($beneficiary as $bn)
            
            <tr>
                <td>
                    <div><input type="checkbox" name="userid[]" value="{{ $bn->userid }}" class="ms-2"></div>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="text-s text-secondary ms-2 mb-0 text-wrap">{{ $bn->control_number }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-s font-weight-bold mb-0">{{ $bn->Beneficiary->name }}</p>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="text-s text-secondary ms-2 mb-0 text-wrap">{{ $bn->Beneficiary->Address->brgy }}, Bontoc</p>
                        </div>
                    </div>
                </td>
                @if($bn->status == 1)
                <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success text-wrap">Active</span>
                </td>
                @endif
                @if($bn->status == 0)
                <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-danger text-wrap">Inactive</span>
                </td>
                @endif
            </tr>
           
        @endforeach

    @endif
</table>