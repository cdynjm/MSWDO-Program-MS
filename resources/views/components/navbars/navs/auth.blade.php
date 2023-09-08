@php
    
use Illuminate\Support\Facades\Auth;
use App\Models\Notify;

$notify = Notify::where(['userid' => Auth::user()->userid])->limit(10)->orderBy('created_at', 'DESC')->get();
$notify_count = Notify::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();

@endphp

@props(['titlePage'])

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $titlePage }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">{{ $titlePage }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                @csrf
            </form>
            <ul class="navbar-nav  justify-content-end">
                @if(Auth::user()->type == 1)
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->type == 2)
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->Program->FocalPerson->name }}</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->type == 3)
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->Beneficiary->name }}</span>
                    </a>
                </li>
                @endif
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                @if(Auth::user()->type == 3)
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="notifications"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                        <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger" id="notif-count">{{ $notify_count }}</span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4 overflow-auto" style="height: 75vh"
                        aria-labelledby="notifications">
                        @foreach ($notify as $notif)
                        @if($notif->type == 1)
                        @if($notif->status == 1)
                        <li class="mb-2 bg-light">
                        @endif
                        @if($notif->status == 0)
                        <li class="mb-2">
                        @endif
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ $notif->Event->title }}</span>
                                            <p class="text-xs text-info mb-1">{{ $notif->Program->program }}</p>
                                            <p class="text-xs text-success mb-2">Date Schedule: {{ date('M. d, Y', strtotime($notif->date)) }}</p>
                                            <p class="text-xs text-dark mb-1">Time: {{ $notif->Event->time }}</p>
                                            <p class="text-xs text-dark mb-1">Location: {{ $notif->Event->location }}</p>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            {{ date('M. d, Y h:i A', strtotime($notif->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif
                        @if($notif->type == 2)
                        @if($notif->status == 1)
                        <li class="mb-2 bg-light">
                        @endif
                        @if($notif->status == 0)
                        <li class="mb-2">
                        @endif
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">credit_card</i></button>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">₱ {{ number_format($notif->cash, 2) }}</span>
                                            <p class="text-xs text-info mb-1">{{ $notif->Program->program }}</p>
                                            <p class="text-xs text-success mb-2">{{ $notif->title }}</p>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            {{ date('M. d, Y h:i A', strtotime($notif->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
