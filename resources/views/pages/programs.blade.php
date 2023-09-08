<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="program"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Programs"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                    
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Programs</h6>
                                </div>
                                @if(Auth::user()->type == 4)
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" id="create-program" href="#"><i
                                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Program</a>
                                </div>
                                @endif
                            </div>
                        </div> 
                        
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-4">
                            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                            <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Program Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Description</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Focal Person</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Contact No.</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Address
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $cnt = 1; @endphp
                                        @foreach ($programs as $pg)
                                            <tr>
                                                <td programid='{{ $pg->id }}'>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{ $cnt }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td program='{{ $pg->program }}'>
                                                    <div class="d-flex flex-column text-left">
                                                        <h6 class="mb-0 text-sm text-wrap">{{ $pg->program }}</h6>
                                                    </div>
                                                </td>
                                                <td description='{{ $pg->description }}'>
                                                    <p class="text-s text-secondary mb-0 text-wrap">{{ $pg->description }}</p>
                                                </td>
                                                <td focalperson='{{ $pg->FocalPerson->name }}' class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column text-center">
                                                        <h6 class="mb-0 text-sm">{{ $pg->FocalPerson->name }}</h6>
                                                    </div>
                                                </td>
                                                <td focalpersonid='{{ $pg->focal_person }}' hidden></td>
                                                <td contactnumber='{{ $pg->FocalPerson->contact_number }}' class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $pg->FocalPerson->contact_number }}</span>
                                                </td>
                                                <td address='{{ $pg->FocalPerson->address }}' class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0 text-wrap">{{ $pg->FocalPerson->address }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-center">
                                                        <a rel="tooltip" class="text-info"
                                                            href="#" data-original-title=""
                                                            title="" id="edit-program">
                                                            <i class="material-icons">edit</i>
                                                            
                                                        </a>
                                                        @if(Auth::user()->type == 1)
                                                        <a rel="tooltip" class="text-danger"
                                                            href="#" data-original-title=""
                                                            title="" id="delete-program">
                                                            <i class="material-icons">delete</i>
                                                            
                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $cnt += 1; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                                @if(Auth::user()->type == 3)
                            <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Program Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Description</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Focal Person</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Contact No.</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Address
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $cnt = 1; @endphp
                                        @foreach ($programs as $pg)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{ $cnt }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column text-left">
                                                        <h6 class="mb-0 text-sm text-wrap">{{ $pg->Program->program }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-s text-secondary mb-0 text-wrap">{{ $pg->Program->description }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column text-center">
                                                        <h6 class="mb-0 text-sm">{{ $pg->Program->FocalPerson->name }}</h6>
                                                    </div>
                                                </td>
                                                
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $pg->Program->FocalPerson->contact_number }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0 text-wrap">{{ $pg->Program->FocalPerson->address }}</p>
                                                </td>
                                                
                                            </tr>
                                            @php $cnt += 1; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>

@extends('components.modals.program-modal')
@extends('components.modals.edit.edit-program-modal')
