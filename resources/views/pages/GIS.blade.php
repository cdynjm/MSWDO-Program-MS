<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="gis"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="GIS Map"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
                        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
                        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

	<style>
		.leaflet-container {
			width: 95%;
            align-items: center;
            height: 100vh;
		}
	</style>


                    <div class="card my-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">GIS Map
                                    @if(Auth::user()->type == 2)
                                        ({{ Auth::user()->Program->program }})
                                    @endif
                                    </h6>
                                </div>
                                
                            </div>
                        </div> 
                            <div class=" me-3 my-3 text-end">
                            <form method="GET" action="{{ route('search-map-beneficiary') }}">
                            @csrf
                                @if(Auth::user()->type == 1)
                                <select name="program_type" id="" class="form-select p-2 w-50 rounded float-start m-4 mb-0 mt-2 text-s text-secondary" required>
                                    <option value="">Select Program...</option>
                                    @foreach ($programs as $pg)
                                        @if($pg->id == Session::get('program'))
                                            <option value="{{ $pg->id }}" selected="selected">{{ $pg->program }}</option>
                                        @endif
                                        @if($pg->id != Session::get('program'))
                                            <option value="{{ $pg->id }}">{{ $pg->program }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button class="btn bg-gradient-info float-start ms-4 mt-2"><i class="fas fa-search"></i></button>
                                @endif
                            </form>
                            </div>
                        </div>
                    </div>

<center>
<div id="map" class="leaflet-container rounded mb-4 leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;">
    <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-225px, 0px, 0px);">
        <div class="leaflet-pane leaflet-tile-pane">
            <div class="leaflet-layer " style="z-index: 1; opacity: 1;">      
        </div>
    
        <div class="leaflet-pane leaflet-overlay-pane"></div>
        
        <div class="leaflet-pane leaflet-tooltip-pane"></div>
        
        <div class="leaflet-pane leaflet-popup-pane"></div>

        <div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(54621px, 99498px, 0px) scale(512);"></div>

    </div>
    <div class="leaflet-control-container">
        <div class="leaflet-top leaflet-left">
            <div class="leaflet-control-zoom leaflet-bar leaflet-control">
                <a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false">
                    <span aria-hidden="true">+</span>
                </a>
                
                <a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false">
                    <span aria-hidden="true">−</span>
                </a>
            </div>
        </div>
        
        <div class="leaflet-top leaflet-right">
            <div class="leaflet-control-layers leaflet-control" aria-haspopup="true">
                <a class="leaflet-control-layers-toggle" href="#" title="Layers" role="button"></a>
                <section class="leaflet-control-layers-list">
                    <div class="leaflet-control-layers-base">
                        <label>
                            <span>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_55" checked="checked">
                                <span> OpenStreetMap</span>
                            </span>
                        </label>
                        
                        <label>
                            <span>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_55">
                                <span> Hybrid</span>
                            </span>
                        </label>
                        
                    </div>

                  
                </section>
            </div>
        </div>
        <div class="leaflet-bottom leaflet-left"></div>
        <div class="leaflet-bottom leaflet-right">
            <div class="leaflet-control-attribution leaflet-control">
                <a href="https://leafletjs.com" title="A JavaScript library for interactive maps">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag">
                        <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                        <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                        <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                    </svg> Leaflet</a> 
                    
                    <span aria-hidden="true">|</span> 
                    "©"
                    <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>
                </div>
            </div>
        </div>
    </div>

        <script src="./lib/leaflet.browser.print.min.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<div>
</center>
<script>
const barangay = L.layerGroup();

var barangayIcon = L.icon({
    iconUrl: 'https://png.pngtree.com/png-clipart/20220510/original/pngtree-3d-location-icon-design-symbol-png-transparent-background-png-image_7692906.png',

    iconSize:     [50, 50], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


            <?php foreach($barangay as $brgy) { ?>

            var latitude = parseFloat(<?php echo $brgy->latitude; ?>);
            var longitude = parseFloat(<?php echo $brgy->longitude; ?>);
            <?php if($default == 0) {?>
                var information = '<?php echo $brgy->brgy ?>';
            <?php } ?>
            <?php if($default != 0) {?>
                <?php $count = 0; ?>
                <?php foreach($programtype as $pg) {?>
                <?php 
                    if($brgy->id == $pg->address) {
                        $count += 1;
                    }
                ?>
                <?php } ?>
                var information = '<?php echo $brgy->brgy."<center><h5>".$count."</h5></center>"; ?>';
            <?php } ?>

            var marker_<?php echo $brgy->id ?> = new L.marker([longitude, latitude], {icon: barangayIcon}).addTo(barangay).bindPopup(information, {closeOnClick:false,closeButton:false,autoClose:false, zoomControl:false}).openPopup(); 
        
            setTimeout(() => {
                marker_<?php echo $brgy->id ?>.openPopup();
            }, 500);
           
    <?php } ?>
        
</script>
<script>


	const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
	const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
 
	const streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

    const hybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
         maxZoom: 20,
         subdomains:['mt0','mt1','mt2','mt3']
        });

	const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

	const map = L.map('map', {
		center: [10.3426, 124.9638],
		zoom: 15,
		layers: [osm, barangay, hybrid]
	});

	const baseLayers = {
		
        'Hybrid': hybrid,
        'OpenStreetMap': osm,
	};

	const overlays = {
		'Barangay': barangay,
	};

	const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
	

	const satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
	

     //search geo
     L.Control.geocoder().addTo(map);


       //map print
       L.control.browserPrint().addTo(map);
</script>


                   
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
