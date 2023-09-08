<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="sms-configuration"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="SMS Configuration"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">    
                    
                    <div class="card card-body mx-3 mx-md-4">
                        <form action="" id="sms-configuration">
                        @csrf
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Pushbullet Account Settings (SMS)</h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-wrap text-justify text-sm">Pushbullet's API enables developers to build on the Pushbullet infrastructure. Our goal is to provide a full API that enables anything to tap into the Pushbullet network.
                                    The Pushbullet API lets you send/receive pushes and do everything else the official Pushbullet clients can do. To access the API you'll need an access token so the server knows who you are. You can get one from your <a href="https://www.pushbullet.com/" target="_blank" class="text-info text-decoration-underline">Account Settings</a> page.
                                    </p>
                                </div>

                                @foreach ($smstoken as $st)
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">URL</label>
                                        <input type="text" name="url" class="form-control border border-2 p-2 text-info text-decoration-underline" value='{{ $st->url }}'>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Access Token</label>
                                        <input type="text" name="access_token" class="form-control border border-2 p-2 fw-bold" value='{{ $st->access_token }}'>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Mobile Identity</label>
                                        <input type="text" name="mobile_identity" class="form-control border border-2 p-2 fw-bold" value='{{ $st->mobile_identity }}'>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <button class="btn bg-gradient-success mt-2">Update</button>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>