<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="transaction-history"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Transaction History"></x-navbars.navs.auth>
    
        <div class="container-fluid py-4">
            <div class="row">
            <div class="col-12">
                        <div class="card my-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Transaction History</h6>
                                </div>
                            </div>
                        </div> 
                            <div class=" me-3 my-3 text-end">
                            <form method="GET" action="{{ route('search-transaction') }}">
                            @csrf
                                @if(Auth::user()->type == 1)
                                <select name="program_type" id="selected-program" class="form-select p-2 w-40 rounded float-start m-4 mb-0 mt-2 text-s text-secondary" required>
                                    <option value="0">Select Program...</option>
                                    @foreach ($programs as $pg)
                                        @if($pg->id == Session::get('program'))
                                            <option value="{{ $pg->id }}" selected="selected">{{ $pg->program }}</option>
                                        @endif
                                        @if($pg->id != Session::get('program'))
                                            <option value="{{ $pg->id }}">{{ $pg->program }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @endif
                                @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                                <select name="barangay" id="selected-barangay" class="form-select p-2 w-40 rounded float-start m-4 mb-0 mt-2 text-s text-secondary" required>
                                    <option value="0">All Beneficiaries</option>
                                    @foreach ($barangay as $brgy)
                                        @if($brgy->id == Session::get('brgy'))
                                            <option value="{{ $brgy->id }}" selected="selected">{{ $brgy->brgy }}</option>
                                        @endif
                                        @if($brgy->id != Session::get('brgy'))
                                            <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button class="btn bg-gradient-info float-start ms-4 mt-2"><i class="fas fa-search"></i></button>
                                @endif
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-0 mb-4">
                        <div class="card h-100 mb-4">
                            <div class="card-header pb-0 px-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Successful Transactions</h6>
                                    </div>
                                    <div
                                        class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                                        <i class="material-icons me-2 text-lg">date_range</i>
                                        @php date_default_timezone_set("Asia/Singapore");  @endphp
                                        <small>As of {{ date('F d, Y') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Beneficiaries</h6>
                                <form id="delete-transaction" action="">
                                @csrf
                                @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                                <input type="checkbox" id="check-all-pending" value='' class="ms-2">
                                <label class="m-2 check-program">Select All</label>
                                <button class="btn btn-danger p-2 text-capitalize"><i class="fas fa-trash px-2"></i></button>
                                
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search...</label>
                                    <input type="text" class="form-control" id="search-transaction-keyup">
                                </div>
                                @endif

                                <div class="table-responsive p-0 w-100 mt-4">
                                    @include('pages.tables.transaction-table')
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
            </div>
            <x-footers.auth></x-footer.auth>
        </div>
        
    </main>
    
        <x-plugins></x-plugins>
</x-layout>
