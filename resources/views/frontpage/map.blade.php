<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG Distan Kab. Buleleng</title>
    <link rel="icon" href="https://distan.bulelengkab.go.id/public/assets/image/logo_buleleng_100.png" type="image/gif"
      sizes="16x16">
    <!-- tailwind css -->
    {{-- <link href="{{ asset("./src/css/globals.css") }}" rel="stylesheet"> --}}
    @vite("resources/css/app.css")
    <!-- css leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- icon awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- leaflet draw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <!-- css sidebar -->
    {{-- <link rel="icon" href="{{ asset("frontpage/assets/icons/icon_web_wefgis.ico") }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset("./src/css/sidebar.css") }}">
    <!-- SAEARCH GEOCODER -->
    <link rel="stylesheet" href="{{ asset("/src/assets/css-leaflet/leaflet-control-geocoder.Geocoder.css") }}">
    <!-- NAVIGASI BAR -->
    <link rel="stylesheet" href="{{ asset("/src/assets/css-leaflet/Leaflet.NavBar.css") }}">
    {{-- <link rel="stylesheet" href="css/sidebar.css"> --}}

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  </head>

  <body class="">
    <!-- NAVBAR -->
    <nav class="navbar-top border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="/" class="flex items-center space-x-1 sm:space-x-3 rtl:space-x-reverse">
          <img src="https://distan.bulelengkab.go.id/public/assets/image/logo_buleleng_100.png" class="h-12"
            alt="Logo" />
          <div class="flex flex-col gap-0">
            <span class="self-start text-xs sm:text-lg sm:font-medium dark:text-white">Sistem Informasi
              Geografis</span>
            <span class="self-start sm:text-2xl font-semibold dark:text-white">Dinas
              Pertanian Kab. Buleleng</span>
          </div>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
            <li>
              <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:p-0 "
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:p-0 "
                aria-current="page">About</a>
            </li>
            <li>
              <a href="/login" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:p-0 "
                aria-current="page">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Sidebar basemap -->
    <div class="sidebar-basemap bg-gray-50 mt-0" id="sidebar-basemap">
      <h5 class="text-center">Basemap</h5>
      <div class="border mb-2"></div>
      {{-- <div class="flex-row">
        <div class="columns-2 my-2">
          <div class="form-check">
            <input class="form-checkbox itemCheckbox border" type="checkbox" value="" id="googleMapsLabel"
              data-layer="markerGroup1">
            <label class="form-check-label" for="googleMapsLabel">
              Label
            </label>
          </div>
        </div>
      </div> --}}
      <div class="flex-row">
        <div class="columns-2">
          <div class="basemap-options">
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/openstreetmap_blackandwhite.png") }}"
                alt="OpenStreetMap" class="w-32 h-28 object-cover">
              <input class="form-radio" type="radio" name="basemap" value="openStreetMap" checked>
              OSM
            </label>
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/google-streets.png") }}" alt="GoogleStreetMap"
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="googleStreetMap">
              Street
            </label>

          </div>
        </div>

        <div class="columns-2">
          <div class="basemap-options">
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/here_satelliteday.png") }}" alt="Satellite "
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="satelliteMap">
              Satelite
            </label>
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/google-hibrid.png") }}" alt="Satellite "
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="googleHibridMap">
              Hibrid
            </label>
          </div>
        </div>
      </div>
      <div class="flex-row">
        <div class="columns-2">
          <div class="basemap-options">
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/esri-street.png") }}" alt="Esri"
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="esriWorldStreetMap">
              Esri Street
            </label>
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/topo-map.png") }}" alt="OpenTopoMap"
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="openTopoMap">
              TopoMap
            </label>
          </div>
        </div>

        <div class="columns-2">
          <div class="basemap-options">
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/esri-satelite.png") }}" alt="Esri "
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="esriSatelite">
              Esri Satelite
            </label>
            <label>
              <img src="{{ asset("/src/assets/icons/icon-basemap/google-earth.png") }}" alt="Thunderforest "
                class="w-32 h-28 object-cover">
              <input class="form-check-input" type="radio" name="basemap" value="googleEarth">
              Earth
            </label>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar layer -->
    <div class="sidebar-layer bg-white mt-0 pb-5" id="sidebar-layer">
      <h5 class="text-center">Layer</h5>
      <div class="border"></div>
      <div class="mt-4">
        <div class="border rounded">
          <!-- <div class="border-top"></div> -->
          <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Administrasi</p>
          <div class="p-2">
            <div class="form-check">
              <input name="batas-kecamatan"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                type="checkbox" value="" id="batas-kecamatan" data-layer="batas-kecamatan">
              <label class="form-check-label" for="batas-kecamatan">
                Batas Kecamatan
              </label>
            </div>
          </div>

          <!-- Tambahkan item lain di sini -->
        </div>
        <div class="border rounded mt-4">
          <!-- <div class="border-top"></div> -->
          <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Pertanian</p>
          <div class="p-2">
            <div class="form-check">
              <input name="kelompok-tani"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                type="checkbox" value="" id="kelompok-tani" data-layer="kelompok-tani">
              <label class="form-check-label" for="kelompok-tani">
                Kelompok Tani
              </label>
            </div>
            <div class="form-check">
              <input name="layer_onther"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                type="checkbox" value="" id="layer_onther" data-layer="layer_onther">
              <label class="form-check-label" for="layer_onther">
                Layer Lainnya...
              </label>
            </div>

          </div>

          <!-- Tambahkan item lain di sini -->
        </div>
      </div>

    </div>

    <!-- Sidebar legend -->
    <div class="container sidebar-legend bg-white mt-0 pb-5" id="sidebar-legend">
      <h5 class="text-center">Legenda</h5>
      <div class="border mb-2"></div>
      <div class="col">
        <div class="border rounded mt-2">
          <!-- <div class="border-top"></div> -->
          <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Legenda Informasi Pertanian</p>
          <div class="p-2">
            <div class="">
              <img class="rounded float-left" src="{{ asset("/src/assets/icons/icon-marker/corn.png") }}"
                alt="">
              Jagung
              </label>
            </div>
            <div class="">
              <img class="rounded float-left" src="{{ asset("/src/assets/icons/icon-marker/paddy.png") }}"
                alt="">
              Padi
              </label>
            </div>
          </div>

          <!-- Tambahkan item lain di sini -->
        </div>
      </div>
    </div>

    </div>

    <!-- Sidebar analisis -->
    <div class="container sidebar-analisis bg-white mt-0 pb-5" id="sidebar-analisis">
      <h5 class="text-center">Information</h5>
      <div class="border mb-2"></div>

    </div>

    <!-- MAP -->
    <div id="map-frontpage" class="map-container">

    </div>
  </body>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <!-- SEEARCH FEATURE -->
  <script src="{{ asset("/src/assets/js-leaflet/leaflet-control-geocoder.Geocoder.js") }}"></script>
  <!-- HASH IN URL -->
  <script src="{{ asset("/src/assets/js-leaflet/leaflet-hash.js") }}"></script>
  <!-- NAVIGASI BAR -->
  <script src="{{ asset("/src/assets/js-leaflet/Leaflet.NavBar.js") }}"></script>
  <!-- MAIN JS -->
  <script src="{{ asset("/src/js/map.js") }}"></script>
  <!-- sidebar js -->
  <script src="{{ asset("/src/js/sidebar.js") }}"></script>

  <!-- leaflet js draw -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
  <!-- turf and axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>

  <!-- feature draw -->
  <script src="{{ asset("/src/js/draw.js") }}"></script>

</html>
