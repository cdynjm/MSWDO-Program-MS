<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                @if(Auth::user()->type == 1)
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $count_program }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">PROGRAMS</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $count_person }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">FOCAL PERSONS</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $count_beneficiary }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">BENEFICIARIES</span></p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6 mt-4 mb-4">
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
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Recent</h6>
                                <div class="table-responsive p-0 w-100 mt-4">
                                <table class="table align-items-center mb-0" id="search-payroll-result">
                                    @foreach ($payroll_list as $pl)
                                            <tr>
                                                <td payroll_id={{ $pl->Payroll->id }}>
                                                <div class="d-flex align-items-center">
                                                    <button type="button"
                                                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                            class="material-icons text-lg">expand_less</i></button>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark text-sm">{{ $pl->Beneficiary->name }}</h6>
                                                        <span class="text-xs text-wrap">Control Number: {{ $pl->control_number }}, {{ $pl->Beneficiary->Address->brgy }}, Bontoc, Southern Leyte</span>
                                                        <h6 class="text-success text-xs">{{ $pl->Program->program }}</h6>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                <div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
                                                    <span class="text-secondary text-xs me-2">Account Balance:</span> 
                                                    <span class="text-info text-gradient">₱ {{ number_format($pl->Payroll->balance, 2) }}</span>
                                                </div>
                                                </td>
                                                
                                            </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 mb-4">
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
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Recent</h6>
                                <div class="table-responsive p-0 w-100 mt-4">
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
                                                            {{ $th->Beneficiary->name }}</h6>
                                                        <span class="text-xs text-wrap">Control Number: {{ $th->ProgramType->control_number }}, {{ $th->Beneficiary->Address->brgy }},  Bontoc, Southern Leyte</span>
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
                                            </tr>   
                                        @endforeach
                                    </table>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
                @endif
                @if(Auth::user()->type == 2)
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $count_beneficiary }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">BENEFICIARIES</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $active }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">ACTIVE</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $inactive }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">INACTIVE</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mb-4">
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
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Recent</h6>
                                <div class="table-responsive p-0 w-100 mt-4">
                                <table class="table align-items-center mb-0" id="search-payroll-result">
                                    @foreach ($payroll_list as $pl)
                                        @if($pl->Payroll->status == 1)
                                            <tr>
                                                <td payroll_id={{ $pl->Payroll->id }}>
                                                <div class="d-flex align-items-center">
                                                    <button type="button"
                                                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                            class="material-icons text-lg">expand_less</i></button>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark text-sm">{{ $pl->Beneficiary->name }}</h6>
                                                        <span class="text-xs text-wrap">Control Number: {{ $pl->control_number }}, {{ $pl->Beneficiary->Address->brgy }}, Bontoc, Southern Leyte</span>
                                                        <h6 class="text-success text-xs">{{ $pl->Program->program }}</h6>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                <div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
                                                    <span class="text-secondary text-xs me-2">Account Balance:</span> 
                                                    <span class="text-info text-gradient">₱ {{ number_format($pl->Payroll->balance, 2) }}</span>
                                                </div>
                                                </td>
                                                
                                            </tr>   
                                        @endif
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 mb-4">
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
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Recent</h6>
                                <div class="table-responsive p-0 w-100 mt-4">
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
                                                            {{ $th->Beneficiary->name }}</h6>
                                                        <span class="text-xs text-wrap">Control Number: {{ $th->ProgramType->control_number }}, {{ $th->Beneficiary->Address->brgy }},  Bontoc, Southern Leyte</span>
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
                                            </tr>   
                                        @endforeach
                                    </table>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
                @endif

                @if(Auth::user()->type == 3)
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-history opacity-10"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total</p>
                                <h4 class="mb-0">{{ $count_transaction }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">TRANSACTION HISTORY</span></p>
                        </div>
                    </div>
                </div>
                @foreach ($balance as $bal)
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-money-check opacity-10"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Account Balance</p>
                               
                                    <h4 class="mb-0">₱ {{ number_format($bal->balance, 2) }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">{{ $bal->Program->program }}</span></p>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-md-12 mt-0 mb-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Cash to be Received</h6>
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
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Beneficiary</h6>
                            
                            

                            <div class="table-responsive p-0 w-100 mt-4">
                                
                                <table class="table align-items-center mb-0" class="search-payroll-result">
                                @foreach ($balance as $bal)
                                    @if($bal->status == 1)
                                        <tr>
                                            <td>
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="material-icons text-lg">expand_less</i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">{{ $bal->Beneficiary->name }}</h6>
                                                    <span class="text-xs">Control Number: {{ $bal->ProgramType->control_number }}, {{ $bal->Beneficiary->Address->brgy }}, Bontoc, Southern Leyte</span>
                                                    <h6 class="text-success text-xs">{{ $bal->Program->program }}</h6>
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
                                                <span class="text-secondary text-xs me-2">Account Balance:</span> 
                                                <span class="text-info text-gradient">₱ {{ number_format($bal->balance, 2) }}</span>
                                            </div>
                                            </td>
                                            
                                        </tr>   
                                    
                                    @endif
                                @endforeach
                                </table>
                
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
    @endpush
</x-layout>
