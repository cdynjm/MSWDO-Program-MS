@php
    
use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;

$chat_count = ChMessage::where(['to_id' => Auth::user()->id])->where(['seen' => 0])->count();

@endphp

@props(['activePage'])

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-white"
    id="sidenav-main">
    <div class="sidenav-header text-center">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="align-items-center d-flex mt-4" href="{{ route('dashboard') }}">
            <img style="width: 50px; height: 50px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Seal_of_the_Department_of_Social_Welfare_and_Development.svg/1200px-Seal_of_the_Department_of_Social_Welfare_and_Development.svg.png" class="ms-4" alt="...">
            <span class="ms-3 font-weight-bold text-sm text-dark">{{ env('APP_NAME') }}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'program' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('program') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul"></i>
                    </div>
                    <span class="nav-link-text ms-1">Programs</span>
                </a>
            </li>
            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'beneficiary' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('beneficiary') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Beneficiary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'payroll' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('payroll') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Payroll</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'transaction-history' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('transaction-history') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-history"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction History</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'schedule' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('schedule') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <span class="nav-link-text ms-1">Schedule</span>
                </a>
            </li>
            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'gis' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('gis') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">GIS Map</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'chat' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('messages') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fab fa-rocketchat"></i>
                    </div>
                    <span class="nav-link-text ms-1">Chat</span>
                    <span class="mt-3 ms-4 translate-middle badge rounded-pill" style="background: red;">{{ $chat_count }}</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-user-circle"></i>
                    </div>
                    <span class="nav-link-text">Profile</span>
                </a>
            </li>
            @if(Auth::user()->type == 1)
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Settings</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'sms-configuration' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('sms-configuration') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem" class="fas fa-sms"></i>
                    </div>
                    <span class="nav-link-text">SMS Configuration</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
