<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-dashboard">
                                <a href="#endpoints-GETapi-dashboard">GET api/dashboard</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan-keuangan">
                                <a href="#endpoints-GETapi-laporan-keuangan">GET api/laporan-keuangan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan-keuangan-semester--semester-">
                                <a href="#endpoints-GETapi-laporan-keuangan-semester--semester-">GET api/laporan-keuangan/semester/{semester}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan-keuangan-tahun--tahun_akademik-">
                                <a href="#endpoints-GETapi-laporan-keuangan-tahun--tahun_akademik-">GET api/laporan-keuangan/tahun/{tahun_akademik}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">
                                <a href="#endpoints-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">GET api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt-nim--nim-">
                                <a href="#endpoints-GETapi-mhs-ukt-nim--nim-">GET api/mhs-ukt/nim/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt-status--status-">
                                <a href="#endpoints-GETapi-mhs-ukt-status--status-">GET api/mhs-ukt/status/{status}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt-semester--semester-">
                                <a href="#endpoints-GETapi-mhs-ukt-semester--semester-">GET api/mhs-ukt/semester/{semester}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt-search--keyword-">
                                <a href="#endpoints-GETapi-mhs-ukt-search--keyword-">GET api/mhs-ukt/search/{keyword}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt--id--histori-pembayaran">
                                <a href="#endpoints-GETapi-mhs-ukt--id--histori-pembayaran">GET api/mhs-ukt/{id}/histori-pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kategori-ukt-prodi--id_prodi-">
                                <a href="#endpoints-GETapi-kategori-ukt-prodi--id_prodi-">Menampilkan kategori UKT berdasarkan id_prodi</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">
                                <a href="#endpoints-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">Menampilkan kategori UKT berdasarkan id_prodi dan jenjang</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">
                                <a href="#endpoints-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">Menampilkan pembayaran berdasarkan id_mhs_ukt
Endpoint: GET /api/pembayaran/mhs-ukt/{id_mhs_ukt}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembayaran-nim--nim-">
                                <a href="#endpoints-GETapi-pembayaran-nim--nim-">Menampilkan pembayaran berdasarkan NIM</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa-nim--nim-">
                                <a href="#endpoints-GETapi-beasiswa-nim--nim-">Menampilkan data beasiswa berdasarkan NIM</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa-master-nama--nama-">
                                <a href="#endpoints-GETapi-beasiswa-master-nama--nama-">Cari beasiswa berdasarkan nama</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">
                                <a href="#endpoints-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">Menampilkan status mahasiswa berdasarkan id_mhs_ukt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-status-mhs-nim--nim-">
                                <a href="#endpoints-GETapi-status-mhs-nim--nim-">Menampilkan status mahasiswa berdasarkan NIM</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kategori-ukt">
                                <a href="#endpoints-GETapi-kategori-ukt">Menampilkan semua kategori UKT
Bisa filter:
GET /api/kategori-ukt?id_prodi=7
GET /api/kategori-ukt?id_prodi=7&jenjang=D3</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-kategori-ukt">
                                <a href="#endpoints-POSTapi-kategori-ukt">Menyimpan kategori UKT baru</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kategori-ukt--id-">
                                <a href="#endpoints-GETapi-kategori-ukt--id-">Menampilkan detail kategori UKT</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-kategori-ukt--id-">
                                <a href="#endpoints-PUTapi-kategori-ukt--id-">Update kategori UKT</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-kategori-ukt--id-">
                                <a href="#endpoints-DELETEapi-kategori-ukt--id-">Hapus kategori UKT</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt">
                                <a href="#endpoints-GETapi-mhs-ukt">GET api/mhs-ukt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-mhs-ukt">
                                <a href="#endpoints-POSTapi-mhs-ukt">POST api/mhs-ukt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mhs-ukt--id-">
                                <a href="#endpoints-GETapi-mhs-ukt--id-">GET api/mhs-ukt/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-mhs-ukt--id-">
                                <a href="#endpoints-PUTapi-mhs-ukt--id-">PUT api/mhs-ukt/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-mhs-ukt--id-">
                                <a href="#endpoints-DELETEapi-mhs-ukt--id-">DELETE api/mhs-ukt/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembayaran">
                                <a href="#endpoints-GETapi-pembayaran">Menampilkan semua pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pembayaran">
                                <a href="#endpoints-POSTapi-pembayaran">Menyimpan pembayaran baru</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembayaran--id-">
                                <a href="#endpoints-GETapi-pembayaran--id-">Detail pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-pembayaran--id-">
                                <a href="#endpoints-PUTapi-pembayaran--id-">Update pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-pembayaran--id-">
                                <a href="#endpoints-DELETEapi-pembayaran--id-">Hapus pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa">
                                <a href="#endpoints-GETapi-beasiswa">Menampilkan semua data penerima beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-beasiswa">
                                <a href="#endpoints-POSTapi-beasiswa">Menyimpan data penerima beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa--id-">
                                <a href="#endpoints-GETapi-beasiswa--id-">Detail penerima beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-beasiswa--id-">
                                <a href="#endpoints-PUTapi-beasiswa--id-">Update data penerima beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-beasiswa--id-">
                                <a href="#endpoints-DELETEapi-beasiswa--id-">Hapus data penerima beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa-master">
                                <a href="#endpoints-GETapi-beasiswa-master">Menampilkan semua master beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-beasiswa-master">
                                <a href="#endpoints-POSTapi-beasiswa-master">Menyimpan master beasiswa baru</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-beasiswa-master--id-">
                                <a href="#endpoints-GETapi-beasiswa-master--id-">Menampilkan detail master beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-beasiswa-master--id-">
                                <a href="#endpoints-PUTapi-beasiswa-master--id-">Update master beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-beasiswa-master--id-">
                                <a href="#endpoints-DELETEapi-beasiswa-master--id-">Hapus master beasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-status-mhs">
                                <a href="#endpoints-GETapi-status-mhs">Menampilkan semua status mahasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-status-mhs">
                                <a href="#endpoints-POSTapi-status-mhs">Menyimpan status mahasiswa baru / update jika sudah ada</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-status-mhs--id-">
                                <a href="#endpoints-GETapi-status-mhs--id-">Menampilkan detail status mahasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-status-mhs--id-">
                                <a href="#endpoints-PUTapi-status-mhs--id-">Update status mahasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-status-mhs--id-">
                                <a href="#endpoints-DELETEapi-status-mhs--id-">Menghapus status mahasiswa</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 7, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-dashboard">GET api/dashboard</h2>

<p>
</p>



<span id="example-requests-GETapi-dashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dashboard"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboard">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data dashboard berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;mahasiswa&quot;: {
            &quot;total_mahasiswa&quot;: 14,
            &quot;total_aktif&quot;: 7,
            &quot;total_nonaktif&quot;: 2
        },
        &quot;pembayaran&quot;: {
            &quot;total_lunas&quot;: 5,
            &quot;total_cicilan&quot;: 3,
            &quot;total_belum_lunas&quot;: 6
        },
        &quot;beasiswa&quot;: {
            &quot;total_penerima_beasiswa&quot;: 7
        },
        &quot;keuangan&quot;: {
            &quot;total_tagihan&quot;: 26100000,
            &quot;total_pemasukan&quot;: 1250000,
            &quot;total_tunggakan&quot;: 24850000
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dashboard" data-method="GET"
      data-path="api/dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboard"
                    onclick="tryItOut('GETapi-dashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboard"
                    onclick="cancelTryOut('GETapi-dashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-laporan-keuangan">GET api/laporan-keuangan</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan-keuangan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan-keuangan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan-keuangan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan-keuangan">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Laporan keuangan berhasil diambil&quot;,
    &quot;filter&quot;: {
        &quot;semester&quot;: null,
        &quot;tahun_akademik&quot;: null
    },
    &quot;data&quot;: {
        &quot;ringkasan_keuangan&quot;: {
            &quot;total_tagihan&quot;: 26100000,
            &quot;total_pemasukan&quot;: 1250000,
            &quot;total_tunggakan&quot;: 25050000,
            &quot;total_potongan_beasiswa&quot;: 28650000
        },
        &quot;ringkasan_pembayaran&quot;: {
            &quot;total_lunas&quot;: 5,
            &quot;total_cicilan&quot;: 3,
            &quot;total_belum_lunas&quot;: 6
        },
        &quot;ringkasan_status_mahasiswa&quot;: {
            &quot;total_aktif&quot;: 7,
            &quot;total_nonaktif&quot;: 7
        },
        &quot;mahasiswa_menunggak&quot;: [
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 1,
                    &quot;nim&quot;: &quot;C030324033&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 4,
                    &quot;id_prodi&quot;: 1,
                    &quot;kategori&quot;: &quot;UKT 4&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 3000000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 3000000,
                    &quot;total_bayar&quot;: 200000,
                    &quot;sisa_tagihan&quot;: 2800000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                    &quot;status_mhs&quot;: &quot;AKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 2,
                    &quot;nim&quot;: &quot;C030324032&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 5,
                    &quot;id_prodi&quot;: 1,
                    &quot;kategori&quot;: &quot;UKT 5&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 4000000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 4000000,
                    &quot;total_bayar&quot;: 200000,
                    &quot;sisa_tagihan&quot;: 3800000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                    &quot;status_mhs&quot;: &quot;AKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 4,
                    &quot;nim&quot;: &quot;C030324038&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 12,
                    &quot;id_prodi&quot;: 3,
                    &quot;kategori&quot;: &quot;UKT 2&quot;,
                    &quot;jenjang&quot;: &quot;D4&quot;,
                    &quot;nominal_ukt&quot;: 1000000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 1000000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 1000000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 5,
                    &quot;nim&quot;: &quot;C030324044&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 23,
                    &quot;id_prodi&quot;: 5,
                    &quot;kategori&quot;: &quot;UKT 3&quot;,
                    &quot;jenjang&quot;: &quot;D4&quot;,
                    &quot;nominal_ukt&quot;: 2900000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 2900000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 2900000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 6,
                    &quot;nim&quot;: &quot;C030324045&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 26,
                    &quot;id_prodi&quot;: 6,
                    &quot;kategori&quot;: &quot;UKT 1&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 500000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 500000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 500000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 8,
                    &quot;nim&quot;: &quot;C030324095&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 36,
                    &quot;id_prodi&quot;: 7,
                    &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 5700000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                    &quot;potongan_persen&quot;: 50,
                    &quot;potongan_nominal&quot;: 2850000
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 2850000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 2850000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 9,
                    &quot;nim&quot;: &quot;C030324094&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 36,
                    &quot;id_prodi&quot;: 7,
                    &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 5700000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                    &quot;potongan_persen&quot;: 50,
                    &quot;potongan_nominal&quot;: 2850000
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 2850000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 2850000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 10,
                    &quot;nim&quot;: &quot;C030324097&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 36,
                    &quot;id_prodi&quot;: 7,
                    &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 5700000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                    &quot;potongan_persen&quot;: 50,
                    &quot;potongan_nominal&quot;: 2850000
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 2850000,
                    &quot;total_bayar&quot;: 0,
                    &quot;sisa_tagihan&quot;: 2850000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                    &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
                }
            },
            {
                &quot;mahasiswa_ukt&quot;: {
                    &quot;id_mhs_ukt&quot;: 14,
                    &quot;nim&quot;: &quot;C030324044&quot;,
                    &quot;semester&quot;: 4,
                    &quot;tahun_akademik&quot;: &quot;20252&quot;
                },
                &quot;kategori_ukt&quot;: {
                    &quot;id_kategori_ukt&quot;: 36,
                    &quot;id_prodi&quot;: 7,
                    &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                    &quot;jenjang&quot;: &quot;D3&quot;,
                    &quot;nominal_ukt&quot;: 5700000
                },
                &quot;beasiswa&quot;: {
                    &quot;nama_beasiswa&quot;: null,
                    &quot;potongan_persen&quot;: 0,
                    &quot;potongan_nominal&quot;: 0
                },
                &quot;tagihan&quot;: {
                    &quot;total_tagihan&quot;: 5700000,
                    &quot;total_bayar&quot;: 200000,
                    &quot;sisa_tagihan&quot;: 5500000
                },
                &quot;status&quot;: {
                    &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                    &quot;status_mhs&quot;: &quot;AKTIF&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan-keuangan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan-keuangan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan-keuangan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan-keuangan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan-keuangan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan-keuangan" data-method="GET"
      data-path="api/laporan-keuangan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan-keuangan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan-keuangan"
                    onclick="tryItOut('GETapi-laporan-keuangan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan-keuangan"
                    onclick="cancelTryOut('GETapi-laporan-keuangan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan-keuangan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan-keuangan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan-keuangan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan-keuangan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-laporan-keuangan-semester--semester-">GET api/laporan-keuangan/semester/{semester}</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan-keuangan-semester--semester-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan-keuangan/semester/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan-keuangan/semester/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan-keuangan-semester--semester-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Laporan keuangan berhasil diambil&quot;,
    &quot;filter&quot;: {
        &quot;semester&quot;: &quot;consequatur&quot;,
        &quot;tahun_akademik&quot;: null
    },
    &quot;data&quot;: {
        &quot;ringkasan_keuangan&quot;: {
            &quot;total_tagihan&quot;: 0,
            &quot;total_pemasukan&quot;: 0,
            &quot;total_tunggakan&quot;: 0,
            &quot;total_potongan_beasiswa&quot;: 0
        },
        &quot;ringkasan_pembayaran&quot;: {
            &quot;total_lunas&quot;: 0,
            &quot;total_cicilan&quot;: 0,
            &quot;total_belum_lunas&quot;: 0
        },
        &quot;ringkasan_status_mahasiswa&quot;: {
            &quot;total_aktif&quot;: 0,
            &quot;total_nonaktif&quot;: 0
        },
        &quot;mahasiswa_menunggak&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan-keuangan-semester--semester-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan-keuangan-semester--semester-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan-keuangan-semester--semester-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan-keuangan-semester--semester-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan-keuangan-semester--semester-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan-keuangan-semester--semester-" data-method="GET"
      data-path="api/laporan-keuangan/semester/{semester}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan-keuangan-semester--semester-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan-keuangan-semester--semester-"
                    onclick="tryItOut('GETapi-laporan-keuangan-semester--semester-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan-keuangan-semester--semester-"
                    onclick="cancelTryOut('GETapi-laporan-keuangan-semester--semester-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan-keuangan-semester--semester-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan-keuangan/semester/{semester}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan-keuangan-semester--semester-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan-keuangan-semester--semester-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>semester</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="semester"                data-endpoint="GETapi-laporan-keuangan-semester--semester-"
               value="consequatur"
               data-component="url">
    <br>
<p>The semester. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-laporan-keuangan-tahun--tahun_akademik-">GET api/laporan-keuangan/tahun/{tahun_akademik}</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan-keuangan-tahun--tahun_akademik-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan-keuangan/tahun/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan-keuangan/tahun/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan-keuangan-tahun--tahun_akademik-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Laporan keuangan berhasil diambil&quot;,
    &quot;filter&quot;: {
        &quot;semester&quot;: null,
        &quot;tahun_akademik&quot;: &quot;consequatur&quot;
    },
    &quot;data&quot;: {
        &quot;ringkasan_keuangan&quot;: {
            &quot;total_tagihan&quot;: 0,
            &quot;total_pemasukan&quot;: 0,
            &quot;total_tunggakan&quot;: 0,
            &quot;total_potongan_beasiswa&quot;: 0
        },
        &quot;ringkasan_pembayaran&quot;: {
            &quot;total_lunas&quot;: 0,
            &quot;total_cicilan&quot;: 0,
            &quot;total_belum_lunas&quot;: 0
        },
        &quot;ringkasan_status_mahasiswa&quot;: {
            &quot;total_aktif&quot;: 0,
            &quot;total_nonaktif&quot;: 0
        },
        &quot;mahasiswa_menunggak&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan-keuangan-tahun--tahun_akademik-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan-keuangan-tahun--tahun_akademik-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan-keuangan-tahun--tahun_akademik-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan-keuangan-tahun--tahun_akademik-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan-keuangan-tahun--tahun_akademik-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan-keuangan-tahun--tahun_akademik-" data-method="GET"
      data-path="api/laporan-keuangan/tahun/{tahun_akademik}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan-keuangan-tahun--tahun_akademik-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan-keuangan-tahun--tahun_akademik-"
                    onclick="tryItOut('GETapi-laporan-keuangan-tahun--tahun_akademik-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan-keuangan-tahun--tahun_akademik-"
                    onclick="cancelTryOut('GETapi-laporan-keuangan-tahun--tahun_akademik-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan-keuangan-tahun--tahun_akademik-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan-keuangan/tahun/{tahun_akademik}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan-keuangan-tahun--tahun_akademik-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan-keuangan-tahun--tahun_akademik-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tahun_akademik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun_akademik"                data-endpoint="GETapi-laporan-keuangan-tahun--tahun_akademik-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">GET api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan-keuangan/semester/consequatur/tahun/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan-keuangan/semester/consequatur/tahun/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Laporan keuangan berhasil diambil&quot;,
    &quot;filter&quot;: {
        &quot;semester&quot;: &quot;consequatur&quot;,
        &quot;tahun_akademik&quot;: &quot;consequatur&quot;
    },
    &quot;data&quot;: {
        &quot;ringkasan_keuangan&quot;: {
            &quot;total_tagihan&quot;: 0,
            &quot;total_pemasukan&quot;: 0,
            &quot;total_tunggakan&quot;: 0,
            &quot;total_potongan_beasiswa&quot;: 0
        },
        &quot;ringkasan_pembayaran&quot;: {
            &quot;total_lunas&quot;: 0,
            &quot;total_cicilan&quot;: 0,
            &quot;total_belum_lunas&quot;: 0
        },
        &quot;ringkasan_status_mahasiswa&quot;: {
            &quot;total_aktif&quot;: 0,
            &quot;total_nonaktif&quot;: 0
        },
        &quot;mahasiswa_menunggak&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-" data-method="GET"
      data-path="api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
                    onclick="tryItOut('GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
                    onclick="cancelTryOut('GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>semester</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="semester"                data-endpoint="GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
               value="consequatur"
               data-component="url">
    <br>
<p>The semester. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tahun_akademik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun_akademik"                data-endpoint="GETapi-laporan-keuangan-semester--semester--tahun--tahun_akademik-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt-nim--nim-">GET api/mhs-ukt/nim/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt-nim--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/nim/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/nim/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt-nim--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Data mahasiswa UKT tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt-nim--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt-nim--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt-nim--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt-nim--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt-nim--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt-nim--nim-" data-method="GET"
      data-path="api/mhs-ukt/nim/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt-nim--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt-nim--nim-"
                    onclick="tryItOut('GETapi-mhs-ukt-nim--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt-nim--nim-"
                    onclick="cancelTryOut('GETapi-mhs-ukt-nim--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt-nim--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/nim/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-mhs-ukt-nim--nim-"
               value="consequatur"
               data-component="url">
    <br>
<p>The nim. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt-status--status-">GET api/mhs-ukt/status/{status}</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt-status--status-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/status/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/status/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt-status--status-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data mahasiswa UKT berdasarkan status berhasil diambil&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt-status--status-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt-status--status-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt-status--status-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt-status--status-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt-status--status-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt-status--status-" data-method="GET"
      data-path="api/mhs-ukt/status/{status}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt-status--status-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt-status--status-"
                    onclick="tryItOut('GETapi-mhs-ukt-status--status-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt-status--status-"
                    onclick="cancelTryOut('GETapi-mhs-ukt-status--status-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt-status--status-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/status/{status}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt-status--status-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt-status--status-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-mhs-ukt-status--status-"
               value="consequatur"
               data-component="url">
    <br>
<p>The status. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt-semester--semester-">GET api/mhs-ukt/semester/{semester}</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt-semester--semester-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/semester/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/semester/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt-semester--semester-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data mahasiswa UKT berdasarkan semester berhasil diambil&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt-semester--semester-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt-semester--semester-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt-semester--semester-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt-semester--semester-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt-semester--semester-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt-semester--semester-" data-method="GET"
      data-path="api/mhs-ukt/semester/{semester}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt-semester--semester-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt-semester--semester-"
                    onclick="tryItOut('GETapi-mhs-ukt-semester--semester-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt-semester--semester-"
                    onclick="cancelTryOut('GETapi-mhs-ukt-semester--semester-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt-semester--semester-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/semester/{semester}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt-semester--semester-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt-semester--semester-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>semester</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="semester"                data-endpoint="GETapi-mhs-ukt-semester--semester-"
               value="consequatur"
               data-component="url">
    <br>
<p>The semester. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt-search--keyword-">GET api/mhs-ukt/search/{keyword}</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt-search--keyword-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/search/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/search/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt-search--keyword-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data mahasiswa UKT berhasil dicari&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt-search--keyword-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt-search--keyword-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt-search--keyword-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt-search--keyword-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt-search--keyword-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt-search--keyword-" data-method="GET"
      data-path="api/mhs-ukt/search/{keyword}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt-search--keyword-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt-search--keyword-"
                    onclick="tryItOut('GETapi-mhs-ukt-search--keyword-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt-search--keyword-"
                    onclick="cancelTryOut('GETapi-mhs-ukt-search--keyword-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt-search--keyword-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/search/{keyword}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt-search--keyword-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt-search--keyword-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>keyword</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keyword"                data-endpoint="GETapi-mhs-ukt-search--keyword-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt--id--histori-pembayaran">GET api/mhs-ukt/{id}/histori-pembayaran</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt--id--histori-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/1/histori-pembayaran" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/1/histori-pembayaran"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt--id--histori-pembayaran">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Histori pembayaran berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;mahasiswa_ukt&quot;: {
            &quot;id_mhs_ukt&quot;: 1,
            &quot;nim&quot;: &quot;C030324033&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;
        },
        &quot;kategori_ukt&quot;: {
            &quot;id_kategori_ukt&quot;: 4,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        &quot;beasiswa&quot;: {
            &quot;id_beasiswa_mhs&quot;: null,
            &quot;id_beasiswa&quot;: null,
            &quot;nama_beasiswa&quot;: null,
            &quot;potongan_persen&quot;: 0,
            &quot;potongan_nominal&quot;: 0
        },
        &quot;tagihan&quot;: {
            &quot;total_tagihan&quot;: 3000000,
            &quot;total_bayar&quot;: 200000,
            &quot;sisa_tagihan&quot;: 2800000
        },
        &quot;status&quot;: {
            &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
            &quot;status_mhs&quot;: &quot;AKTIF&quot;
        },
        &quot;histori_pembayaran&quot;: [
            {
                &quot;id_pembayaran&quot;: 1,
                &quot;jumlah_bayar&quot;: 200000,
                &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
                &quot;keterangan&quot;: &quot;Cicilan pertama&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt--id--histori-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt--id--histori-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt--id--histori-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt--id--histori-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt--id--histori-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt--id--histori-pembayaran" data-method="GET"
      data-path="api/mhs-ukt/{id}/histori-pembayaran"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt--id--histori-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt--id--histori-pembayaran"
                    onclick="tryItOut('GETapi-mhs-ukt--id--histori-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt--id--histori-pembayaran"
                    onclick="cancelTryOut('GETapi-mhs-ukt--id--histori-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt--id--histori-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/{id}/histori-pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt--id--histori-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt--id--histori-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-mhs-ukt--id--histori-pembayaran"
               value="1"
               data-component="url">
    <br>
<p>The ID of the mhs ukt. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-kategori-ukt-prodi--id_prodi-">Menampilkan kategori UKT berdasarkan id_prodi</h2>

<p>
</p>



<span id="example-requests-GETapi-kategori-ukt-prodi--id_prodi-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/kategori-ukt/prodi/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt/prodi/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kategori-ukt-prodi--id_prodi-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data kategori UKT berdasarkan prodi berhasil diambil&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kategori-ukt-prodi--id_prodi-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kategori-ukt-prodi--id_prodi-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kategori-ukt-prodi--id_prodi-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kategori-ukt-prodi--id_prodi-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kategori-ukt-prodi--id_prodi-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kategori-ukt-prodi--id_prodi-" data-method="GET"
      data-path="api/kategori-ukt/prodi/{id_prodi}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kategori-ukt-prodi--id_prodi-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kategori-ukt-prodi--id_prodi-"
                    onclick="tryItOut('GETapi-kategori-ukt-prodi--id_prodi-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kategori-ukt-prodi--id_prodi-"
                    onclick="cancelTryOut('GETapi-kategori-ukt-prodi--id_prodi-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kategori-ukt-prodi--id_prodi-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kategori-ukt/prodi/{id_prodi}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_prodi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_prodi"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">Menampilkan kategori UKT berdasarkan id_prodi dan jenjang</h2>

<p>
</p>



<span id="example-requests-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/kategori-ukt/prodi/consequatur/jenjang/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt/prodi/consequatur/jenjang/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data kategori UKT berdasarkan prodi dan jenjang berhasil diambil&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-" data-method="GET"
      data-path="api/kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
                    onclick="tryItOut('GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
                    onclick="cancelTryOut('GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_prodi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_prodi"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>jenjang</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="jenjang"                data-endpoint="GETapi-kategori-ukt-prodi--id_prodi--jenjang--jenjang-"
               value="consequatur"
               data-component="url">
    <br>
<p>The jenjang. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">Menampilkan pembayaran berdasarkan id_mhs_ukt
Endpoint: GET /api/pembayaran/mhs-ukt/{id_mhs_ukt}</h2>

<p>
</p>



<span id="example-requests-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembayaran/mhs-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran/mhs-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data pembayaran mahasiswa berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;mahasiswa_ukt&quot;: {
            &quot;id_mhs_ukt&quot;: 1,
            &quot;nim&quot;: &quot;C030324033&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;
        },
        &quot;kategori_ukt&quot;: {
            &quot;id_kategori_ukt&quot;: 4,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        &quot;beasiswa&quot;: {
            &quot;nama_beasiswa&quot;: null,
            &quot;potongan_persen&quot;: 0,
            &quot;potongan_nominal&quot;: 0
        },
        &quot;tagihan&quot;: {
            &quot;total_tagihan&quot;: 3000000,
            &quot;total_bayar&quot;: 200000,
            &quot;sisa_tagihan&quot;: 2800000
        },
        &quot;status&quot;: {
            &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
            &quot;status_mhs&quot;: &quot;AKTIF&quot;
        },
        &quot;riwayat_pembayaran&quot;: [
            {
                &quot;id_pembayaran&quot;: 1,
                &quot;jumlah_bayar&quot;: 200000,
                &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
                &quot;keterangan&quot;: &quot;Cicilan pertama&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-" data-method="GET"
      data-path="api/pembayaran/mhs-ukt/{id_mhs_ukt}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembayaran-mhs-ukt--id_mhs_ukt-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
                    onclick="tryItOut('GETapi-pembayaran-mhs-ukt--id_mhs_ukt-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
                    onclick="cancelTryOut('GETapi-pembayaran-mhs-ukt--id_mhs_ukt-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembayaran/mhs-ukt/{id_mhs_ukt}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_mhs_ukt</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_mhs_ukt"                data-endpoint="GETapi-pembayaran-mhs-ukt--id_mhs_ukt-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-pembayaran-nim--nim-">Menampilkan pembayaran berdasarkan NIM</h2>

<p>
</p>



<span id="example-requests-GETapi-pembayaran-nim--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembayaran/nim/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran/nim/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembayaran-nim--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Data mahasiswa UKT tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembayaran-nim--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembayaran-nim--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembayaran-nim--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembayaran-nim--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembayaran-nim--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembayaran-nim--nim-" data-method="GET"
      data-path="api/pembayaran/nim/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembayaran-nim--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembayaran-nim--nim-"
                    onclick="tryItOut('GETapi-pembayaran-nim--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembayaran-nim--nim-"
                    onclick="cancelTryOut('GETapi-pembayaran-nim--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembayaran-nim--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembayaran/nim/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembayaran-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembayaran-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-pembayaran-nim--nim-"
               value="consequatur"
               data-component="url">
    <br>
<p>The nim. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-beasiswa-nim--nim-">Menampilkan data beasiswa berdasarkan NIM</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa-nim--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa/nim/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa/nim/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa-nim--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Data beasiswa mahasiswa tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa-nim--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa-nim--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa-nim--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa-nim--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa-nim--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa-nim--nim-" data-method="GET"
      data-path="api/beasiswa/nim/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa-nim--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa-nim--nim-"
                    onclick="tryItOut('GETapi-beasiswa-nim--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa-nim--nim-"
                    onclick="cancelTryOut('GETapi-beasiswa-nim--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa-nim--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa/nim/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-beasiswa-nim--nim-"
               value="consequatur"
               data-component="url">
    <br>
<p>The nim. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-beasiswa-master-nama--nama-">Cari beasiswa berdasarkan nama</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa-master-nama--nama-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa-master/nama/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master/nama/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa-master-nama--nama-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data beasiswa berhasil dicari&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa-master-nama--nama-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa-master-nama--nama-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa-master-nama--nama-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa-master-nama--nama-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa-master-nama--nama-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa-master-nama--nama-" data-method="GET"
      data-path="api/beasiswa-master/nama/{nama}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa-master-nama--nama-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa-master-nama--nama-"
                    onclick="tryItOut('GETapi-beasiswa-master-nama--nama-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa-master-nama--nama-"
                    onclick="cancelTryOut('GETapi-beasiswa-master-nama--nama-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa-master-nama--nama-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa-master/nama/{nama}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa-master-nama--nama-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa-master-nama--nama-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nama</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama"                data-endpoint="GETapi-beasiswa-master-nama--nama-"
               value="consequatur"
               data-component="url">
    <br>
<p>The nama. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">Menampilkan status mahasiswa berdasarkan id_mhs_ukt</h2>

<p>
</p>



<span id="example-requests-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/status-mhs/mhs-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs/mhs-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Status mahasiswa berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id_status&quot;: 1,
        &quot;mahasiswa_ukt&quot;: {
            &quot;id_mhs_ukt&quot;: 1,
            &quot;nim&quot;: &quot;C030324033&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;
        },
        &quot;status&quot;: {
            &quot;status_mhs&quot;: &quot;AKTIF&quot;,
            &quot;keterangan&quot;: &quot;aktif&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-" data-method="GET"
      data-path="api/status-mhs/mhs-ukt/{id_mhs_ukt}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-status-mhs-mhs-ukt--id_mhs_ukt-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
                    onclick="tryItOut('GETapi-status-mhs-mhs-ukt--id_mhs_ukt-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
                    onclick="cancelTryOut('GETapi-status-mhs-mhs-ukt--id_mhs_ukt-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/status-mhs/mhs-ukt/{id_mhs_ukt}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_mhs_ukt</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_mhs_ukt"                data-endpoint="GETapi-status-mhs-mhs-ukt--id_mhs_ukt-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-status-mhs-nim--nim-">Menampilkan status mahasiswa berdasarkan NIM</h2>

<p>
</p>



<span id="example-requests-GETapi-status-mhs-nim--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/status-mhs/nim/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs/nim/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-status-mhs-nim--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Status mahasiswa berdasarkan NIM tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-status-mhs-nim--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-status-mhs-nim--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-status-mhs-nim--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-status-mhs-nim--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-status-mhs-nim--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-status-mhs-nim--nim-" data-method="GET"
      data-path="api/status-mhs/nim/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-status-mhs-nim--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-status-mhs-nim--nim-"
                    onclick="tryItOut('GETapi-status-mhs-nim--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-status-mhs-nim--nim-"
                    onclick="cancelTryOut('GETapi-status-mhs-nim--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-status-mhs-nim--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/status-mhs/nim/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-status-mhs-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-status-mhs-nim--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-status-mhs-nim--nim-"
               value="consequatur"
               data-component="url">
    <br>
<p>The nim. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-kategori-ukt">Menampilkan semua kategori UKT
Bisa filter:
GET /api/kategori-ukt?id_prodi=7
GET /api/kategori-ukt?id_prodi=7&amp;jenjang=D3</h2>

<p>
</p>



<span id="example-requests-GETapi-kategori-ukt">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/kategori-ukt" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kategori-ukt">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data kategori UKT berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_kategori_ukt&quot;: 1,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 450000
        },
        {
            &quot;id_kategori_ukt&quot;: 2,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 950000
        },
        {
            &quot;id_kategori_ukt&quot;: 3,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 2000000
        },
        {
            &quot;id_kategori_ukt&quot;: 4,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        {
            &quot;id_kategori_ukt&quot;: 5,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 4000000
        },
        {
            &quot;id_kategori_ukt&quot;: 6,
            &quot;id_prodi&quot;: 2,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 450000
        },
        {
            &quot;id_kategori_ukt&quot;: 7,
            &quot;id_prodi&quot;: 2,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 950000
        },
        {
            &quot;id_kategori_ukt&quot;: 8,
            &quot;id_prodi&quot;: 2,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 2000000
        },
        {
            &quot;id_kategori_ukt&quot;: 9,
            &quot;id_prodi&quot;: 2,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        {
            &quot;id_kategori_ukt&quot;: 10,
            &quot;id_prodi&quot;: 2,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 4000000
        },
        {
            &quot;id_kategori_ukt&quot;: 11,
            &quot;id_prodi&quot;: 3,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 12,
            &quot;id_prodi&quot;: 3,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 13,
            &quot;id_prodi&quot;: 3,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 14,
            &quot;id_prodi&quot;: 3,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 15,
            &quot;id_prodi&quot;: 3,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 16,
            &quot;id_prodi&quot;: 4,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 17,
            &quot;id_prodi&quot;: 4,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 18,
            &quot;id_prodi&quot;: 4,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 19,
            &quot;id_prodi&quot;: 4,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 20,
            &quot;id_prodi&quot;: 4,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 21,
            &quot;id_prodi&quot;: 5,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 22,
            &quot;id_prodi&quot;: 5,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 23,
            &quot;id_prodi&quot;: 5,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 24,
            &quot;id_prodi&quot;: 5,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 25,
            &quot;id_prodi&quot;: 5,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D4&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 26,
            &quot;id_prodi&quot;: 6,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 27,
            &quot;id_prodi&quot;: 6,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 28,
            &quot;id_prodi&quot;: 6,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 29,
            &quot;id_prodi&quot;: 6,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 30,
            &quot;id_prodi&quot;: 6,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 31,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 32,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 33,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 34,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 35,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 36,
            &quot;id_prodi&quot;: 7,
            &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 5700000
        },
        {
            &quot;id_kategori_ukt&quot;: 37,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 500000
        },
        {
            &quot;id_kategori_ukt&quot;: 38,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 1000000
        },
        {
            &quot;id_kategori_ukt&quot;: 39,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 2900000
        },
        {
            &quot;id_kategori_ukt&quot;: 40,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3900000
        },
        {
            &quot;id_kategori_ukt&quot;: 41,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 4900000
        },
        {
            &quot;id_kategori_ukt&quot;: 42,
            &quot;id_prodi&quot;: 8,
            &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 7000000
        },
        {
            &quot;id_kategori_ukt&quot;: 43,
            &quot;id_prodi&quot;: 9,
            &quot;kategori&quot;: &quot;UKT 1&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 450000
        },
        {
            &quot;id_kategori_ukt&quot;: 44,
            &quot;id_prodi&quot;: 9,
            &quot;kategori&quot;: &quot;UKT 2&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 950000
        },
        {
            &quot;id_kategori_ukt&quot;: 45,
            &quot;id_prodi&quot;: 9,
            &quot;kategori&quot;: &quot;UKT 3&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 2000000
        },
        {
            &quot;id_kategori_ukt&quot;: 46,
            &quot;id_prodi&quot;: 9,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        {
            &quot;id_kategori_ukt&quot;: 47,
            &quot;id_prodi&quot;: 9,
            &quot;kategori&quot;: &quot;UKT 5&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 4000000
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kategori-ukt" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kategori-ukt"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kategori-ukt"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kategori-ukt" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kategori-ukt">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kategori-ukt" data-method="GET"
      data-path="api/kategori-ukt"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kategori-ukt', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kategori-ukt"
                    onclick="tryItOut('GETapi-kategori-ukt');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kategori-ukt"
                    onclick="cancelTryOut('GETapi-kategori-ukt');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kategori-ukt"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kategori-ukt</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kategori-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kategori-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-kategori-ukt">Menyimpan kategori UKT baru</h2>

<p>
</p>



<span id="example-requests-POSTapi-kategori-ukt">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/kategori-ukt" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_prodi\": 11613.31890586,
    \"kategori\": \"consequatur\",
    \"nominal_ukt\": 45,
    \"jenjang\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_prodi": 11613.31890586,
    "kategori": "consequatur",
    "nominal_ukt": 45,
    "jenjang": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-kategori-ukt">
</span>
<span id="execution-results-POSTapi-kategori-ukt" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-kategori-ukt"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-kategori-ukt"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-kategori-ukt" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-kategori-ukt">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-kategori-ukt" data-method="POST"
      data-path="api/kategori-ukt"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-kategori-ukt', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-kategori-ukt"
                    onclick="tryItOut('POSTapi-kategori-ukt');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-kategori-ukt"
                    onclick="cancelTryOut('POSTapi-kategori-ukt');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-kategori-ukt"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/kategori-ukt</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-kategori-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-kategori-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_prodi</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_prodi"                data-endpoint="POSTapi-kategori-ukt"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="POSTapi-kategori-ukt"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nominal_ukt</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nominal_ukt"                data-endpoint="POSTapi-kategori-ukt"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>jenjang</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="jenjang"                data-endpoint="POSTapi-kategori-ukt"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-kategori-ukt--id-">Menampilkan detail kategori UKT</h2>

<p>
</p>



<span id="example-requests-GETapi-kategori-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/kategori-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kategori-ukt--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail kategori UKT berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id_kategori_ukt&quot;: 1,
        &quot;id_prodi&quot;: 1,
        &quot;kategori&quot;: &quot;UKT 1&quot;,
        &quot;jenjang&quot;: &quot;D3&quot;,
        &quot;nominal_ukt&quot;: 450000
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kategori-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kategori-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kategori-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kategori-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kategori-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kategori-ukt--id-" data-method="GET"
      data-path="api/kategori-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kategori-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kategori-ukt--id-"
                    onclick="tryItOut('GETapi-kategori-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kategori-ukt--id-"
                    onclick="cancelTryOut('GETapi-kategori-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kategori-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kategori-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-kategori-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the kategori ukt. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-kategori-ukt--id-">Update kategori UKT</h2>

<p>
</p>



<span id="example-requests-PUTapi-kategori-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/kategori-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_prodi\": 11613.31890586,
    \"kategori\": \"consequatur\",
    \"nominal_ukt\": 45,
    \"jenjang\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_prodi": 11613.31890586,
    "kategori": "consequatur",
    "nominal_ukt": 45,
    "jenjang": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-kategori-ukt--id-">
</span>
<span id="execution-results-PUTapi-kategori-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-kategori-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-kategori-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-kategori-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-kategori-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-kategori-ukt--id-" data-method="PUT"
      data-path="api/kategori-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-kategori-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-kategori-ukt--id-"
                    onclick="tryItOut('PUTapi-kategori-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-kategori-ukt--id-"
                    onclick="cancelTryOut('PUTapi-kategori-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-kategori-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/kategori-ukt/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/kategori-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the kategori ukt. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_prodi</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_prodi"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nominal_ukt</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nominal_ukt"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>jenjang</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="jenjang"                data-endpoint="PUTapi-kategori-ukt--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-kategori-ukt--id-">Hapus kategori UKT</h2>

<p>
</p>



<span id="example-requests-DELETEapi-kategori-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/kategori-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/kategori-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-kategori-ukt--id-">
</span>
<span id="execution-results-DELETEapi-kategori-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-kategori-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-kategori-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-kategori-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-kategori-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-kategori-ukt--id-" data-method="DELETE"
      data-path="api/kategori-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-kategori-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-kategori-ukt--id-"
                    onclick="tryItOut('DELETEapi-kategori-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-kategori-ukt--id-"
                    onclick="cancelTryOut('DELETEapi-kategori-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-kategori-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/kategori-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-kategori-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-kategori-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the kategori ukt. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mhs-ukt">GET api/mhs-ukt</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data mahasiswa UKT berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_mhs_ukt&quot;: 1,
            &quot;nim&quot;: &quot;C030324033&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 4,
                &quot;id_prodi&quot;: 1,
                &quot;kategori&quot;: &quot;UKT 4&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 3000000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 3000000,
                &quot;total_bayar&quot;: 200000,
                &quot;sisa_tagihan&quot;: 2800000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 2,
            &quot;nim&quot;: &quot;C030324032&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 5,
                &quot;id_prodi&quot;: 1,
                &quot;kategori&quot;: &quot;UKT 5&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 4000000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 4000000,
                &quot;total_bayar&quot;: 200000,
                &quot;sisa_tagihan&quot;: 3800000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 3,
            &quot;nim&quot;: &quot;C030324036&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 6,
                &quot;id_prodi&quot;: 2,
                &quot;kategori&quot;: &quot;UKT 1&quot;,
                &quot;jenjang&quot;: &quot;D4&quot;,
                &quot;nominal_ukt&quot;: 450000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 450000,
                &quot;total_bayar&quot;: 450000,
                &quot;sisa_tagihan&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 4,
            &quot;nim&quot;: &quot;C030324038&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 12,
                &quot;id_prodi&quot;: 3,
                &quot;kategori&quot;: &quot;UKT 2&quot;,
                &quot;jenjang&quot;: &quot;D4&quot;,
                &quot;nominal_ukt&quot;: 1000000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 1000000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 1000000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 5,
            &quot;nim&quot;: &quot;C030324044&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 23,
                &quot;id_prodi&quot;: 5,
                &quot;kategori&quot;: &quot;UKT 3&quot;,
                &quot;jenjang&quot;: &quot;D4&quot;,
                &quot;nominal_ukt&quot;: 2900000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 2900000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 2900000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 6,
            &quot;nim&quot;: &quot;C030324045&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 26,
                &quot;id_prodi&quot;: 6,
                &quot;kategori&quot;: &quot;UKT 1&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 500000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 500000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 500000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 7,
            &quot;nim&quot;: &quot;C030324046&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 9,
                &quot;id_prodi&quot;: 2,
                &quot;kategori&quot;: &quot;UKT 4&quot;,
                &quot;jenjang&quot;: &quot;D4&quot;,
                &quot;nominal_ukt&quot;: 3000000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 2,
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100,
                &quot;potongan_nominal&quot;: 3000000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 0,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 8,
            &quot;nim&quot;: &quot;C030324095&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 1,
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50,
                &quot;potongan_nominal&quot;: 2850000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 2850000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 2850000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 9,
            &quot;nim&quot;: &quot;C030324094&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 4,
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50,
                &quot;potongan_nominal&quot;: 2850000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 2850000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 2850000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 10,
            &quot;nim&quot;: &quot;C030324097&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 5,
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50,
                &quot;potongan_nominal&quot;: 2850000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 2850000,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 2850000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;BELUM_LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 11,
            &quot;nim&quot;: &quot;C030324098&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 7,
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100,
                &quot;potongan_nominal&quot;: 5700000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 0,
                &quot;total_bayar&quot;: 200000,
                &quot;sisa_tagihan&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 12,
            &quot;nim&quot;: &quot;C030324099&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 3,
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100,
                &quot;potongan_nominal&quot;: 5700000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 0,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 13,
            &quot;nim&quot;: &quot;C030324111&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: 6,
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100,
                &quot;potongan_nominal&quot;: 5700000
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 0,
                &quot;total_bayar&quot;: 0,
                &quot;sisa_tagihan&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_mhs_ukt&quot;: 14,
            &quot;nim&quot;: &quot;C030324044&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;,
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa_mhs&quot;: null,
                &quot;id_beasiswa&quot;: null,
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0,
                &quot;potongan_nominal&quot;: 0
            },
            &quot;tagihan&quot;: {
                &quot;total_tagihan&quot;: 5700000,
                &quot;total_bayar&quot;: 200000,
                &quot;sisa_tagihan&quot;: 5500000
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt" data-method="GET"
      data-path="api/mhs-ukt"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt"
                    onclick="tryItOut('GETapi-mhs-ukt');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt"
                    onclick="cancelTryOut('GETapi-mhs-ukt');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-mhs-ukt">POST api/mhs-ukt</h2>

<p>
</p>



<span id="example-requests-POSTapi-mhs-ukt">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/mhs-ukt" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nim\": \"consequatur\",
    \"id_kategori_ukt\": \"consequatur\",
    \"semester\": 11613.31890586,
    \"tahun_akademik\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nim": "consequatur",
    "id_kategori_ukt": "consequatur",
    "semester": 11613.31890586,
    "tahun_akademik": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mhs-ukt">
</span>
<span id="execution-results-POSTapi-mhs-ukt" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mhs-ukt"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mhs-ukt"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mhs-ukt" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mhs-ukt">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mhs-ukt" data-method="POST"
      data-path="api/mhs-ukt"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mhs-ukt', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mhs-ukt"
                    onclick="tryItOut('POSTapi-mhs-ukt');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mhs-ukt"
                    onclick="cancelTryOut('POSTapi-mhs-ukt');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mhs-ukt"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mhs-ukt</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mhs-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mhs-ukt"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="POSTapi-mhs-ukt"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_kategori_ukt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_kategori_ukt"                data-endpoint="POSTapi-mhs-ukt"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_kategori_ukt</code> of an existing record in the kategori_ukt table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>semester</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="semester"                data-endpoint="POSTapi-mhs-ukt"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tahun_akademik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun_akademik"                data-endpoint="POSTapi-mhs-ukt"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-mhs-ukt--id-">GET api/mhs-ukt/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-mhs-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mhs-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mhs-ukt--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail mahasiswa UKT berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id_mhs_ukt&quot;: 1,
        &quot;nim&quot;: &quot;C030324033&quot;,
        &quot;semester&quot;: 4,
        &quot;tahun_akademik&quot;: &quot;20252&quot;,
        &quot;kategori_ukt&quot;: {
            &quot;id_kategori_ukt&quot;: 4,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        &quot;beasiswa&quot;: {
            &quot;id_beasiswa_mhs&quot;: null,
            &quot;id_beasiswa&quot;: null,
            &quot;nama_beasiswa&quot;: null,
            &quot;potongan_persen&quot;: 0,
            &quot;potongan_nominal&quot;: 0
        },
        &quot;tagihan&quot;: {
            &quot;total_tagihan&quot;: 3000000,
            &quot;total_bayar&quot;: 200000,
            &quot;sisa_tagihan&quot;: 2800000
        },
        &quot;status&quot;: {
            &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
            &quot;status_mhs&quot;: &quot;AKTIF&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mhs-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mhs-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mhs-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mhs-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mhs-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mhs-ukt--id-" data-method="GET"
      data-path="api/mhs-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mhs-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mhs-ukt--id-"
                    onclick="tryItOut('GETapi-mhs-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mhs-ukt--id-"
                    onclick="cancelTryOut('GETapi-mhs-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mhs-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mhs-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-mhs-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the mhs ukt. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-mhs-ukt--id-">PUT api/mhs-ukt/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-mhs-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/mhs-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nim\": \"consequatur\",
    \"id_kategori_ukt\": \"consequatur\",
    \"semester\": 11613.31890586,
    \"tahun_akademik\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nim": "consequatur",
    "id_kategori_ukt": "consequatur",
    "semester": 11613.31890586,
    "tahun_akademik": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-mhs-ukt--id-">
</span>
<span id="execution-results-PUTapi-mhs-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-mhs-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mhs-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-mhs-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mhs-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-mhs-ukt--id-" data-method="PUT"
      data-path="api/mhs-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-mhs-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-mhs-ukt--id-"
                    onclick="tryItOut('PUTapi-mhs-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-mhs-ukt--id-"
                    onclick="cancelTryOut('PUTapi-mhs-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-mhs-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/mhs-ukt/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/mhs-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the mhs ukt. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_kategori_ukt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_kategori_ukt"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_kategori_ukt</code> of an existing record in the kategori_ukt table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>semester</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="semester"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tahun_akademik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun_akademik"                data-endpoint="PUTapi-mhs-ukt--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-mhs-ukt--id-">DELETE api/mhs-ukt/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-mhs-ukt--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/mhs-ukt/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mhs-ukt/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-mhs-ukt--id-">
</span>
<span id="execution-results-DELETEapi-mhs-ukt--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-mhs-ukt--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mhs-ukt--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mhs-ukt--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mhs-ukt--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mhs-ukt--id-" data-method="DELETE"
      data-path="api/mhs-ukt/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mhs-ukt--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mhs-ukt--id-"
                    onclick="tryItOut('DELETEapi-mhs-ukt--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mhs-ukt--id-"
                    onclick="cancelTryOut('DELETEapi-mhs-ukt--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mhs-ukt--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mhs-ukt/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mhs-ukt--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-mhs-ukt--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the mhs ukt. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-pembayaran">Menampilkan semua pembayaran</h2>

<p>
</p>



<span id="example-requests-GETapi-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembayaran" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembayaran">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data pembayaran berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_pembayaran&quot;: 1,
            &quot;jumlah_bayar&quot;: 200000,
            &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
            &quot;keterangan&quot;: &quot;Cicilan pertama&quot;,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 1,
                &quot;nim&quot;: &quot;C030324033&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 4,
                &quot;id_prodi&quot;: 1,
                &quot;kategori&quot;: &quot;UKT 4&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 3000000
            },
            &quot;beasiswa&quot;: {
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_pembayaran&quot;: 2,
            &quot;jumlah_bayar&quot;: 200000,
            &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
            &quot;keterangan&quot;: &quot;Cicilan pertama&quot;,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 2,
                &quot;nim&quot;: &quot;C030324032&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 5,
                &quot;id_prodi&quot;: 1,
                &quot;kategori&quot;: &quot;UKT 5&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 4000000
            },
            &quot;beasiswa&quot;: {
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_pembayaran&quot;: 3,
            &quot;jumlah_bayar&quot;: 450000,
            &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
            &quot;keterangan&quot;: &quot;LUNAS&quot;,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 3,
                &quot;nim&quot;: &quot;C030324036&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 6,
                &quot;id_prodi&quot;: 2,
                &quot;kategori&quot;: &quot;UKT 1&quot;,
                &quot;jenjang&quot;: &quot;D4&quot;,
                &quot;nominal_ukt&quot;: 450000
            },
            &quot;beasiswa&quot;: {
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_pembayaran&quot;: 4,
            &quot;jumlah_bayar&quot;: 200000,
            &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
            &quot;keterangan&quot;: &quot;Cicilan pertama&quot;,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 11,
                &quot;nim&quot;: &quot;C030324098&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;LUNAS&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        },
        {
            &quot;id_pembayaran&quot;: 5,
            &quot;jumlah_bayar&quot;: 200000,
            &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
            &quot;keterangan&quot;: &quot;Cicilan pertama&quot;,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 14,
                &quot;nim&quot;: &quot;C030324044&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;kategori_ukt&quot;: {
                &quot;id_kategori_ukt&quot;: 36,
                &quot;id_prodi&quot;: 7,
                &quot;kategori&quot;: &quot;JALUR KERJASAMA&quot;,
                &quot;jenjang&quot;: &quot;D3&quot;,
                &quot;nominal_ukt&quot;: 5700000
            },
            &quot;beasiswa&quot;: {
                &quot;nama_beasiswa&quot;: null,
                &quot;potongan_persen&quot;: 0
            },
            &quot;status&quot;: {
                &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
                &quot;status_mhs&quot;: &quot;AKTIF&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembayaran" data-method="GET"
      data-path="api/pembayaran"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembayaran"
                    onclick="tryItOut('GETapi-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembayaran"
                    onclick="cancelTryOut('GETapi-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-pembayaran">Menyimpan pembayaran baru</h2>

<p>
</p>



<span id="example-requests-POSTapi-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pembayaran" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_mhs_ukt\": \"consequatur\",
    \"jumlah_bayar\": 45,
    \"tgl_pembayaran\": \"2026-06-07T12:09:08\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_mhs_ukt": "consequatur",
    "jumlah_bayar": 45,
    "tgl_pembayaran": "2026-06-07T12:09:08"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pembayaran">
</span>
<span id="execution-results-POSTapi-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pembayaran" data-method="POST"
      data-path="api/pembayaran"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pembayaran"
                    onclick="tryItOut('POSTapi-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pembayaran"
                    onclick="cancelTryOut('POSTapi-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_mhs_ukt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_mhs_ukt"                data-endpoint="POSTapi-pembayaran"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_mhs_ukt</code> of an existing record in the mhs_ukt table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>jumlah_bayar</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="jumlah_bayar"                data-endpoint="POSTapi-pembayaran"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tgl_pembayaran</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tgl_pembayaran"                data-endpoint="POSTapi-pembayaran"
               value="2026-06-07T12:09:08"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-06-07T12:09:08</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="POSTapi-pembayaran"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-pembayaran--id-">Detail pembayaran</h2>

<p>
</p>



<span id="example-requests-GETapi-pembayaran--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembayaran/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembayaran--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail pembayaran berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id_pembayaran&quot;: 1,
        &quot;jumlah_bayar&quot;: 200000,
        &quot;tgl_pembayaran&quot;: &quot;2026-05-12&quot;,
        &quot;keterangan&quot;: &quot;Cicilan pertama&quot;,
        &quot;mahasiswa_ukt&quot;: {
            &quot;id_mhs_ukt&quot;: 1,
            &quot;nim&quot;: &quot;C030324033&quot;,
            &quot;semester&quot;: 4,
            &quot;tahun_akademik&quot;: &quot;20252&quot;
        },
        &quot;kategori_ukt&quot;: {
            &quot;id_kategori_ukt&quot;: 4,
            &quot;id_prodi&quot;: 1,
            &quot;kategori&quot;: &quot;UKT 4&quot;,
            &quot;jenjang&quot;: &quot;D3&quot;,
            &quot;nominal_ukt&quot;: 3000000
        },
        &quot;beasiswa&quot;: {
            &quot;nama_beasiswa&quot;: null,
            &quot;potongan_persen&quot;: 0
        },
        &quot;status&quot;: {
            &quot;status_pembayaran&quot;: &quot;CICILAN&quot;,
            &quot;status_mhs&quot;: &quot;AKTIF&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembayaran--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembayaran--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembayaran--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembayaran--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembayaran--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembayaran--id-" data-method="GET"
      data-path="api/pembayaran/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembayaran--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembayaran--id-"
                    onclick="tryItOut('GETapi-pembayaran--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembayaran--id-"
                    onclick="cancelTryOut('GETapi-pembayaran--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembayaran--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembayaran/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-pembayaran--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-pembayaran--id-">Update pembayaran</h2>

<p>
</p>



<span id="example-requests-PUTapi-pembayaran--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/pembayaran/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"jumlah_bayar\": 73,
    \"tgl_pembayaran\": \"2026-06-07T12:09:08\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "jumlah_bayar": 73,
    "tgl_pembayaran": "2026-06-07T12:09:08"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-pembayaran--id-">
</span>
<span id="execution-results-PUTapi-pembayaran--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-pembayaran--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-pembayaran--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-pembayaran--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-pembayaran--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-pembayaran--id-" data-method="PUT"
      data-path="api/pembayaran/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-pembayaran--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-pembayaran--id-"
                    onclick="tryItOut('PUTapi-pembayaran--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-pembayaran--id-"
                    onclick="cancelTryOut('PUTapi-pembayaran--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-pembayaran--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/pembayaran/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/pembayaran/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-pembayaran--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>jumlah_bayar</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="jumlah_bayar"                data-endpoint="PUTapi-pembayaran--id-"
               value="73"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>73</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tgl_pembayaran</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tgl_pembayaran"                data-endpoint="PUTapi-pembayaran--id-"
               value="2026-06-07T12:09:08"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-06-07T12:09:08</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="PUTapi-pembayaran--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-pembayaran--id-">Hapus pembayaran</h2>

<p>
</p>



<span id="example-requests-DELETEapi-pembayaran--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/pembayaran/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembayaran/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-pembayaran--id-">
</span>
<span id="execution-results-DELETEapi-pembayaran--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-pembayaran--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-pembayaran--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-pembayaran--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-pembayaran--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-pembayaran--id-" data-method="DELETE"
      data-path="api/pembayaran/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-pembayaran--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-pembayaran--id-"
                    onclick="tryItOut('DELETEapi-pembayaran--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-pembayaran--id-"
                    onclick="cancelTryOut('DELETEapi-pembayaran--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-pembayaran--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/pembayaran/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-pembayaran--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-beasiswa">Menampilkan semua data penerima beasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data beasiswa berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_beasiswa_mhs&quot;: 1,
            &quot;nim&quot;: &quot;C030324095&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 2,
            &quot;nim&quot;: &quot;C030324046&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 3,
            &quot;nim&quot;: &quot;C030324099&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 4,
            &quot;nim&quot;: &quot;C030324094&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 5,
            &quot;nim&quot;: &quot;C030324097&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 1,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
                &quot;potongan_persen&quot;: 50
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 6,
            &quot;nim&quot;: &quot;C030324111&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100
            }
        },
        {
            &quot;id_beasiswa_mhs&quot;: 7,
            &quot;nim&quot;: &quot;C030324098&quot;,
            &quot;keterangan&quot;: null,
            &quot;beasiswa&quot;: {
                &quot;id_beasiswa&quot;: 2,
                &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
                &quot;potongan_persen&quot;: 100
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa" data-method="GET"
      data-path="api/beasiswa"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa"
                    onclick="tryItOut('GETapi-beasiswa');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa"
                    onclick="cancelTryOut('GETapi-beasiswa');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-beasiswa">Menyimpan data penerima beasiswa</h2>

<p>
</p>



<span id="example-requests-POSTapi-beasiswa">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/beasiswa" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nim\": \"consequatur\",
    \"id_beasiswa\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nim": "consequatur",
    "id_beasiswa": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-beasiswa">
</span>
<span id="execution-results-POSTapi-beasiswa" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-beasiswa"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-beasiswa"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-beasiswa" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-beasiswa">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-beasiswa" data-method="POST"
      data-path="api/beasiswa"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-beasiswa', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-beasiswa"
                    onclick="tryItOut('POSTapi-beasiswa');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-beasiswa"
                    onclick="cancelTryOut('POSTapi-beasiswa');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-beasiswa"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/beasiswa</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-beasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-beasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="POSTapi-beasiswa"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_beasiswa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_beasiswa"                data-endpoint="POSTapi-beasiswa"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_beasiswa</code> of an existing record in the beasiswa table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="POSTapi-beasiswa"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-beasiswa--id-">Detail penerima beasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail beasiswa berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id_beasiswa_mhs&quot;: 1,
        &quot;nim&quot;: &quot;C030324095&quot;,
        &quot;keterangan&quot;: null,
        &quot;beasiswa&quot;: {
            &quot;id_beasiswa&quot;: 1,
            &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
            &quot;potongan_persen&quot;: 50
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa--id-" data-method="GET"
      data-path="api/beasiswa/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa--id-"
                    onclick="tryItOut('GETapi-beasiswa--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa--id-"
                    onclick="cancelTryOut('GETapi-beasiswa--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-beasiswa--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the beasiswa. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-beasiswa--id-">Update data penerima beasiswa</h2>

<p>
</p>



<span id="example-requests-PUTapi-beasiswa--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/beasiswa/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nim\": \"consequatur\",
    \"id_beasiswa\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nim": "consequatur",
    "id_beasiswa": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-beasiswa--id-">
</span>
<span id="execution-results-PUTapi-beasiswa--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-beasiswa--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-beasiswa--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-beasiswa--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-beasiswa--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-beasiswa--id-" data-method="PUT"
      data-path="api/beasiswa/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-beasiswa--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-beasiswa--id-"
                    onclick="tryItOut('PUTapi-beasiswa--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-beasiswa--id-"
                    onclick="cancelTryOut('PUTapi-beasiswa--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-beasiswa--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/beasiswa/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/beasiswa/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-beasiswa--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the beasiswa. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-beasiswa--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_beasiswa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_beasiswa"                data-endpoint="PUTapi-beasiswa--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_beasiswa</code> of an existing record in the beasiswa table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="PUTapi-beasiswa--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-beasiswa--id-">Hapus data penerima beasiswa</h2>

<p>
</p>



<span id="example-requests-DELETEapi-beasiswa--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/beasiswa/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-beasiswa--id-">
</span>
<span id="execution-results-DELETEapi-beasiswa--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-beasiswa--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-beasiswa--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-beasiswa--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-beasiswa--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-beasiswa--id-" data-method="DELETE"
      data-path="api/beasiswa/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-beasiswa--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-beasiswa--id-"
                    onclick="tryItOut('DELETEapi-beasiswa--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-beasiswa--id-"
                    onclick="cancelTryOut('DELETEapi-beasiswa--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-beasiswa--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/beasiswa/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-beasiswa--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-beasiswa--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the beasiswa. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-beasiswa-master">Menampilkan semua master beasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa-master">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa-master" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa-master">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data beasiswa berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_beasiswa&quot;: 1,
            &quot;nama_beasiswa&quot;: &quot;Beasiswa Prestasi&quot;,
            &quot;keterangan&quot;: &quot;Potongan setengah UKT&quot;,
            &quot;potongan_persen&quot;: 50
        },
        {
            &quot;id_beasiswa&quot;: 2,
            &quot;nama_beasiswa&quot;: &quot;Beasiswa KIP KULIAH&quot;,
            &quot;keterangan&quot;: &quot;FULL POTONGAN UKT&quot;,
            &quot;potongan_persen&quot;: 100
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa-master" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa-master"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa-master"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa-master" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa-master">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa-master" data-method="GET"
      data-path="api/beasiswa-master"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa-master', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa-master"
                    onclick="tryItOut('GETapi-beasiswa-master');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa-master"
                    onclick="cancelTryOut('GETapi-beasiswa-master');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa-master"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa-master</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa-master"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa-master"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-beasiswa-master">Menyimpan master beasiswa baru</h2>

<p>
</p>



<span id="example-requests-POSTapi-beasiswa-master">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/beasiswa-master" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama_beasiswa\": \"consequatur\",
    \"potongan_persen\": 13
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama_beasiswa": "consequatur",
    "potongan_persen": 13
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-beasiswa-master">
</span>
<span id="execution-results-POSTapi-beasiswa-master" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-beasiswa-master"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-beasiswa-master"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-beasiswa-master" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-beasiswa-master">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-beasiswa-master" data-method="POST"
      data-path="api/beasiswa-master"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-beasiswa-master', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-beasiswa-master"
                    onclick="tryItOut('POSTapi-beasiswa-master');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-beasiswa-master"
                    onclick="cancelTryOut('POSTapi-beasiswa-master');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-beasiswa-master"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/beasiswa-master</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-beasiswa-master"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-beasiswa-master"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_beasiswa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama_beasiswa"                data-endpoint="POSTapi-beasiswa-master"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>potongan_persen</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="potongan_persen"                data-endpoint="POSTapi-beasiswa-master"
               value="13"
               data-component="body">
    <br>
<p>Must be at least 0. Must not be greater than 100. Example: <code>13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="POSTapi-beasiswa-master"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-beasiswa-master--id-">Menampilkan detail master beasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-beasiswa-master--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/beasiswa-master/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-beasiswa-master--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Beasiswa] consequatur&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-beasiswa-master--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-beasiswa-master--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-beasiswa-master--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-beasiswa-master--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-beasiswa-master--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-beasiswa-master--id-" data-method="GET"
      data-path="api/beasiswa-master/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-beasiswa-master--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-beasiswa-master--id-"
                    onclick="tryItOut('GETapi-beasiswa-master--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-beasiswa-master--id-"
                    onclick="cancelTryOut('GETapi-beasiswa-master--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-beasiswa-master--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/beasiswa-master/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-beasiswa-master--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the beasiswa master. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-beasiswa-master--id-">Update master beasiswa</h2>

<p>
</p>



<span id="example-requests-PUTapi-beasiswa-master--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/beasiswa-master/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama_beasiswa\": \"consequatur\",
    \"potongan_persen\": 13
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama_beasiswa": "consequatur",
    "potongan_persen": 13
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-beasiswa-master--id-">
</span>
<span id="execution-results-PUTapi-beasiswa-master--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-beasiswa-master--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-beasiswa-master--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-beasiswa-master--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-beasiswa-master--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-beasiswa-master--id-" data-method="PUT"
      data-path="api/beasiswa-master/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-beasiswa-master--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-beasiswa-master--id-"
                    onclick="tryItOut('PUTapi-beasiswa-master--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-beasiswa-master--id-"
                    onclick="cancelTryOut('PUTapi-beasiswa-master--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-beasiswa-master--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/beasiswa-master/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/beasiswa-master/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-beasiswa-master--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the beasiswa master. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_beasiswa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama_beasiswa"                data-endpoint="PUTapi-beasiswa-master--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>potongan_persen</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="potongan_persen"                data-endpoint="PUTapi-beasiswa-master--id-"
               value="13"
               data-component="body">
    <br>
<p>Must be at least 0. Must not be greater than 100. Example: <code>13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="PUTapi-beasiswa-master--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-beasiswa-master--id-">Hapus master beasiswa</h2>

<p>
</p>



<span id="example-requests-DELETEapi-beasiswa-master--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/beasiswa-master/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/beasiswa-master/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-beasiswa-master--id-">
</span>
<span id="execution-results-DELETEapi-beasiswa-master--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-beasiswa-master--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-beasiswa-master--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-beasiswa-master--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-beasiswa-master--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-beasiswa-master--id-" data-method="DELETE"
      data-path="api/beasiswa-master/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-beasiswa-master--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-beasiswa-master--id-"
                    onclick="tryItOut('DELETEapi-beasiswa-master--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-beasiswa-master--id-"
                    onclick="cancelTryOut('DELETEapi-beasiswa-master--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-beasiswa-master--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/beasiswa-master/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-beasiswa-master--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-beasiswa-master--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the beasiswa master. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-status-mhs">Menampilkan semua status mahasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-status-mhs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/status-mhs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-status-mhs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data status mahasiswa berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id_status&quot;: 1,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 1,
                &quot;nim&quot;: &quot;C030324033&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;aktif&quot;
            }
        },
        {
            &quot;id_status&quot;: 2,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 2,
                &quot;nim&quot;: &quot;C030324032&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;aktif&quot;
            }
        },
        {
            &quot;id_status&quot;: 3,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 3,
                &quot;nim&quot;: &quot;C030324036&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;aktif&quot;
            }
        },
        {
            &quot;id_status&quot;: 4,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 7,
                &quot;nim&quot;: &quot;C030324046&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;aktif&quot;
            }
        },
        {
            &quot;id_status&quot;: 5,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 10,
                &quot;nim&quot;: &quot;C030324097&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;,
                &quot;keterangan&quot;: &quot;Mahasiswa belum melakukan pembayaran UKT&quot;
            }
        },
        {
            &quot;id_status&quot;: 6,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 11,
                &quot;nim&quot;: &quot;C030324098&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;Mahasiswa aktif karena mendapat beasiswa penuh&quot;
            }
        },
        {
            &quot;id_status&quot;: 7,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 12,
                &quot;nim&quot;: &quot;C030324099&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;NONAKTIF&quot;,
                &quot;keterangan&quot;: &quot;Mahasiswa belum melakukan pembayaran UKT&quot;
            }
        },
        {
            &quot;id_status&quot;: 8,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 13,
                &quot;nim&quot;: &quot;C030324111&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;Mahasiswa aktif karena mendapat beasiswa penuh&quot;
            }
        },
        {
            &quot;id_status&quot;: 9,
            &quot;mahasiswa_ukt&quot;: {
                &quot;id_mhs_ukt&quot;: 14,
                &quot;nim&quot;: &quot;C030324044&quot;,
                &quot;semester&quot;: 4,
                &quot;tahun_akademik&quot;: &quot;20252&quot;
            },
            &quot;status&quot;: {
                &quot;status_mhs&quot;: &quot;AKTIF&quot;,
                &quot;keterangan&quot;: &quot;Mahasiswa aktif karena sudah melakukan pembayaran UKT&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-status-mhs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-status-mhs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-status-mhs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-status-mhs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-status-mhs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-status-mhs" data-method="GET"
      data-path="api/status-mhs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-status-mhs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-status-mhs"
                    onclick="tryItOut('GETapi-status-mhs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-status-mhs"
                    onclick="cancelTryOut('GETapi-status-mhs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-status-mhs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/status-mhs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-status-mhs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-status-mhs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-status-mhs">Menyimpan status mahasiswa baru / update jika sudah ada</h2>

<p>
</p>



<span id="example-requests-POSTapi-status-mhs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/status-mhs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_mhs_ukt\": \"consequatur\",
    \"status\": \"NONAKTIF\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_mhs_ukt": "consequatur",
    "status": "NONAKTIF"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-status-mhs">
</span>
<span id="execution-results-POSTapi-status-mhs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-status-mhs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-status-mhs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-status-mhs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-status-mhs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-status-mhs" data-method="POST"
      data-path="api/status-mhs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-status-mhs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-status-mhs"
                    onclick="tryItOut('POSTapi-status-mhs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-status-mhs"
                    onclick="cancelTryOut('POSTapi-status-mhs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-status-mhs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/status-mhs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-status-mhs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-status-mhs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_mhs_ukt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_mhs_ukt"                data-endpoint="POSTapi-status-mhs"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id_mhs_ukt</code> of an existing record in the mhs_ukt table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-status-mhs"
               value="NONAKTIF"
               data-component="body">
    <br>
<p>Example: <code>NONAKTIF</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>AKTIF</code></li> <li><code>NONAKTIF</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="POSTapi-status-mhs"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-status-mhs--id-">Menampilkan detail status mahasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-status-mhs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/status-mhs/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-status-mhs--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\StatusMhs] consequatur&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-status-mhs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-status-mhs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-status-mhs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-status-mhs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-status-mhs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-status-mhs--id-" data-method="GET"
      data-path="api/status-mhs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-status-mhs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-status-mhs--id-"
                    onclick="tryItOut('GETapi-status-mhs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-status-mhs--id-"
                    onclick="cancelTryOut('GETapi-status-mhs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-status-mhs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/status-mhs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-status-mhs--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the status mh. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-status-mhs--id-">Update status mahasiswa</h2>

<p>
</p>



<span id="example-requests-PUTapi-status-mhs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/status-mhs/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"AKTIF\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "AKTIF"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-status-mhs--id-">
</span>
<span id="execution-results-PUTapi-status-mhs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-status-mhs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-status-mhs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-status-mhs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-status-mhs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-status-mhs--id-" data-method="PUT"
      data-path="api/status-mhs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-status-mhs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-status-mhs--id-"
                    onclick="tryItOut('PUTapi-status-mhs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-status-mhs--id-"
                    onclick="cancelTryOut('PUTapi-status-mhs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-status-mhs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/status-mhs/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/status-mhs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-status-mhs--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the status mh. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-status-mhs--id-"
               value="AKTIF"
               data-component="body">
    <br>
<p>Example: <code>AKTIF</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>AKTIF</code></li> <li><code>NONAKTIF</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>keterangan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keterangan"                data-endpoint="PUTapi-status-mhs--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-status-mhs--id-">Menghapus status mahasiswa</h2>

<p>
</p>



<span id="example-requests-DELETEapi-status-mhs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/status-mhs/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/status-mhs/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-status-mhs--id-">
</span>
<span id="execution-results-DELETEapi-status-mhs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-status-mhs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-status-mhs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-status-mhs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-status-mhs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-status-mhs--id-" data-method="DELETE"
      data-path="api/status-mhs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-status-mhs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-status-mhs--id-"
                    onclick="tryItOut('DELETEapi-status-mhs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-status-mhs--id-"
                    onclick="cancelTryOut('DELETEapi-status-mhs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-status-mhs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/status-mhs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-status-mhs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-status-mhs--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the status mh. Example: <code>consequatur</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
