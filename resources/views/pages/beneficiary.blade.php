<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="beneficiary"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Beneficiary"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Beneficiaries</h6>
                                </div>
                                
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" id="create-beneficiary" href="#"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Beneficiary</a>
                                </div>
                                
                            </div>
                        </div> 
                            <div class=" me-3 mt-2 text-end">
                            <form method="GET" action="{{ route('search-beneficiary') }}">
                            @csrf
                            @if(Auth::user()->type == 1)
                                <select name="program_type" id="selected-program" class="form-select w-40 p-2 rounded float-start m-4 mb-0 mt-2 text-s text-secondary" required>
                                    <option value="">Select Program...</option>
                                    <option value="6" 
                                    @if(Session::get('program') == 6)
                                    selected="selected"
                                    @endif>Update Beneficiary Program</option>
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
                                <button class="btn bg-gradient-info float-start ms-4 mt-2"><i class="fas fa-search"></i></button>
                            </form>
                            </div>
                            
                            <div class="card-body px-0">
                            @if(Auth::user()->type == 1)
                                @if(Session::get('program') == 0)
                                <div class="alert bg-secondary opacity-5 alert-dismissible text-white text-center m-4 mt-0" role="alert">
                                    <span class="text-sm">Select a Program to display records...</span>
                                </div>
                                @endif
                            @endif

                            <div class="card-body pt-0 p-4">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search...</label>
                                    <input type="text" id="search-beneficiary-keyup" class="form-control">
                                </div>
                            </div>
                                @if(Session::get('program') == 1)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.aics-table')
                                    </div>
                                @endif

                                @if(Session::get('program') == 2)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.eccd-table')
                                    </div>
                                @endif

                                @if(Session::get('program') == 3)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.senior-citizen-table')
                                    </div>
                                @endif

                                @if(Session::get('program') == 4)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.solo-parent-table')
                                    </div>
                                @endif

                                @if(Session::get('program') == 5)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.pwd-table')
                                    </div>
                                @endif
                                    
                                @if(Session::get('program') == 6)
                                    <div class="table-responsive p-0">
                                        @include('pages.tables.all-programs-table')
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>

@extends('components.modals.beneficiary-modal')
@extends('components.modals.edit.edit-beneficiary-modal')
