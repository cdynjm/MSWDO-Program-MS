<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="schedule"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Schedule"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                <div class="card my-4">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Event Schedule</h6>
                            </div>
                            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" id="create-event" href="#"><i
                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Event</a>
                            </div>
                            @endif
                        </div>
                    </div> 
                </div>
<style>
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 100%;
		background-color: #FFFFFF;
		border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}
</style>

<div class="table-responsive p-0 mb-4">
    <div id='wrap'>
    <div id='calendar' class="p-4"></div>
    <div style='clear:both'></div>
    
</div>

<div class="card my-4 m-4">
	<div class="card-body pt-4 p-3">
		<div class="col-6 d-flex align-items-center mb-3">
			<h6 class="mb-0">Scheduled Events</h6>
		</div>
		<div class="table-responsive p-0 mb-4">
			<table class="table align-items-center mb-0">
			@foreach ($event as $ev) 
				<tr>
					<td eventid='{{ $ev->id }}' hidden></td>
					<td program='{{ $ev->Program->id }}' hidden></td>
					<td title='{{ $ev->title }}'>
					<div class="d-flex align-items-center">
						@if($ev->program == 1)
						<button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
						@endif
						@if($ev->program == 2)
						<button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
						@endif
						@if($ev->program == 3)
						<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
						@endif
						@if($ev->program == 4)
						<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
						@endif
						@if($ev->program == 5)
						<button class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">date_range</i></button>
						@endif
						<div class="d-flex flex-column">
							<h6 class="mb-1 text-dark text-sm">{{ $ev->title }}</h6>
							<h6 class="text-success text-xs">{{ $ev->Program->program }}</h6>
						</div>
					</div>
					</td>
					<td date='{{ $ev->date }}'>
					<div class="d-flex align-items-center text-s ms-4 me-4 font-weight-bold">
						<span class="text-info text-gradient">{{ date('M. d, Y', strtotime($ev->date)) }}</span>
					</div>
					</td>
					<td time='{{ $ev->time }}' >{{ $ev->time }}</td>
					<td location='{{ $ev->location }}' class="fw-bold">{{ $ev->location }}</td>
					@if(Auth::user()->type == 1)
					<td>
						<div class="text-center">
							<a rel="tooltip" class="text-info"
								href="#" id="edit-event" data-original-title=""
								title="" id="">
								<i class="material-icons">edit</i>
								
							</a>
							<a rel="tooltip" class="text-danger"
								href="#" data-original-title=""
								title="" id="delete-event">
								<i class="material-icons">delete</i>
								
							</a>
						</div>
            		</td>
					@endif

					@if(Auth::user()->type == 2)
						<td>
						@if($ev->Program->id == Auth::user()->Program->id)
							<div class="text-center">
								<a rel="tooltip" class="text-info"
									href="#" id="edit-event" data-original-title=""
									title="" id="">
									<i class="material-icons">edit</i>
									
								</a>
								<a rel="tooltip" class="text-danger"
									href="#" data-original-title=""
									title="" id="delete-event">
									<i class="material-icons">delete</i>
									
								</a>
							</div>
							@endif
						</td>
					@endif
					
				</tr>   
			@endforeach
			</table>
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
@extends('pages.calendar.calendar-script')
@extends('components.modals.event-modal')
@extends('components.modals.edit.edit-event-modal')