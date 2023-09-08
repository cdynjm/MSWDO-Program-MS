<table class="table align-items-center mb-0" id="search-transaction-result">
    @foreach($transaction_history as $th)
        <tr>
            <td>
            <div class="d-flex align-items-center">
                <button type="button"
                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                        class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">
                        @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                            <input type="checkbox" name="transaction_id[]" value='{{ $th->id }}' class="me-2">
                        @endif
                        {{ $th->Beneficiary->name }}</h6>
                    <span class="text-xs">Control Number: {{ $th->ProgramType->control_number }}, {{ $th->Beneficiary->Address->brgy }},  Bontoc, Southern Leyte</span>
                    <h6 class="text-info text-xs">{{ $th->Program->program }}</h6>
                </div>
            </div>
            </td>
            <td>
            <div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
                <span class="text-secondary text-xs me-2">Cash Released:</span> 
                <span class="text-success text-gradient">₱ {{ number_format($th->cash, 2) }}</span>
            </div>
            </td>

            <td>
            <div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
                <span class="text-secondary text-xs me-2">Date:</span> 
                <span class="text-secondary text-xs">{{ date('M d, Y', strtotime($th->created_at)) }}</span>
            </div>
            </td>
            
        </tr>   
    @endforeach
</table>
                