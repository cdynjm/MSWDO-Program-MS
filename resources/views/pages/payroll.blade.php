<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="payroll"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Payroll"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
            <div class="col-12">
                        <div class="card my-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Payroll</h6>
                                </div>
                                @if(Auth::user()->type == 2)
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" id="create-payroll" href="#"><i
                                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Payroll</a>
                                </div>
                                @endif
                            </div>
                        </div> 
                            <div class=" me-3 my-3 text-end">
                            <form method="GET" action="{{ route('search-payroll') }}">
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
                           
                                <button class="btn bg-gradient-info float-start mt-2 ms-4"><i class="fas fa-search"></i></button>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-0 mb-4">
                        <div class="card h-100 mb-4">
                            <div class="card-header pb-0 px-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Pending Transactions</h6>
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
                                <form id="release-cash" action="">
                                @csrf
                                <input type="checkbox" id="check-all-pending" value='' class="ms-2">
                                <label class="m-2 check-program">Select All</label>
                                
                                <button class="btn btn-success p-2 text-capitalize me-2"><i class="material-icons">check</i></button>
                                <button class="btn btn-danger p-2 text-capitalize" type="button" id="reset-cash"><i class="material-icons">close</i></button>

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search...</label>
                                    <input type="text" id="search-payroll-keyup" class="form-control">
                                </div>

                                <div class="table-responsive p-0 w-100 mt-4">
                                    @include('pages.tables.payroll-table')
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                
                
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
        
    </main>
    <x-plugins></x-plugins>

</x-layout>

@extends('components.modals.payroll-modal')
