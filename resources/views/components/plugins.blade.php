<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2 fs-4">person</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">

            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            
            <div class="text-center">
                <img src="{{ asset('storage/users-avatar/avatar.png') }}" alt="" class=" w-50 h-50">
            </div>
            <div class="text-center">
                
                @if(Auth::user()->type == 1)
                    <h5 class="mt-3 mb-0">{{ Auth::user()->name }}</h5>
                    <p>Administrator</p>
                @endif
                @if(Auth::user()->type == 2)
                    <h5 class="mt-3 mb-0">{{  Auth::user()->Program->FocalPerson->name }}</h5>
                    <p>Focal Person</p>
                    <p class="fw-bold">{{ Auth::user()->Program->program }}</p>
                    <p class="text-xs text-wrap">{{ Auth::user()->Program->description }}</p>
                @endif
                @if(Auth::user()->type == 3)
                    <h5 class="mt-3 mb-0">{{  Auth::user()->Beneficiary->name }}</h5>
                    <p>User</p>
                @endif
            </div>
            
        </div>
    </div>
</div>
