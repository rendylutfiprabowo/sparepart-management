<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Sample PDF</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 14px;
        }

        table {
            border: 2px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        .container,
        body {
            padding: 2rem;
            margin: auto;
        }

        caption {
            font-weight: bold;
            padding: 0.8rem;
            text-align: center;
            border: 2px solid;
        }

        ul {
            list-style: square inside url("sqpurple.gif");
        }

        td {
            padding: 0.5rem;
        }

        table th:first-child {
            font-size: small;
        }

        .page-break {
            page-break-after: always;
        }

        @page {
            size: legal;
            margin: 0;
        }

        .button-download {
            /* background-color: #e7e7e7; */
            border: none;
            color: white;
            padding: 7px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 7px;
        }

        canvas {
            border: 1px solid #ddd;
            /* Gaya border untuk canvas */
            display: block;
            /* Agar canvas dapat menyesuaikan ukuran parent */
            margin: 20px auto;
            /* Membuat margin agar tampilan lebih baik */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="p-2">
            <img src="{{ asset('Asset/LogoTrafoindo.png') }}" width="120" height="50" class="d-inline-block"
                alt="LOGO">
        </div>
        <div style="text-align: right;">
            <a href="#" class="button-download" onclick="downloadPDF()">Download PDF</a>

            <script>
                function downloadPDF() {
                    // Fungsi untuk mencetak halaman
                    window.print();
                }
            </script>
        </div>
        <div>
            <!-- SAMPLE FURAN -->
            <table border="1">
                <caption>
                    ANALISIS FURAN PADA TRANSFORMATOR DENGAN METODE KROMATOGRAFI CAIRAN KINERJA TINGGI
                </caption>
                <tr>
                    <td>Klien/Proyek</td>
                    <td> : {{ $sample['furan'] ? $sample['furan']->history->project->nama_project : 'N/A' }}</td>
                    <td> Tegangan </td>
                    <td> : {{ $sample['furan'] ? $sample['furan']->history->trafo->voltage : 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Pabrikan/Tahun</td>
                    <td>:
                        {{ $sample['furan'] ? ($sample['furan']->history->trafo->pabrikan ?? 'N/A') . '/' . ($sample['furan']->history->trafo->year ?? 'N/A') : 'N/A' }}

                    </td>
                    <td>Minyak</td>
                    <td>: {{ $sample['furan'] ? $sample['furan']->history->trafo->kapasitas_minyak : 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Nomor Seri</td>
                    <td>: {{ $sample['furan'] ? $sample['furan']->history->trafo->serial_number : 'N/A' }}</td>
                    <td>Catatan</td>
                    <td>: {{ $sample['furan'] ? $sample['furan']->history->trafo->catatan : 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Rated Power</td>
                    <td> : {{ $sample['furan'] ? $sample['furan']->history->trafo->kva : 'N/A' }}</td>
                </tr>
                <tr>
                    <th rowspan="5" style="background-color: skyblue; color: black; font-weight: bold;">Parameter
                    </th>
                    <th colspan="3">
                        <h4>Hasil Uji</h4>
                        <p>(Nilai Konsentrasi Dalam Parts Billion [ppb])</p>
                    </th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th rowspan="4">
                        <h4>BATAS TRANSFORMER 2FAL STANDARD FIST-3-31:2003</h4>
                    </th>
                </tr>
                <tr>
                    <td style="text-align: center;">Tanggal Sampling <br>
                        <span>{{ $sample['furan'] != null ? $sample['furan']->tanggal_sampling : null }}</span>
                    </td>
                    <td style="text-align: center;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">Tanggal Terima <br>
                        <span>{{ $sample['furan'] != null ? $sample['furan']->tanggal_kedatangan : null }}</span>
                    </td>
                    <td style="text-align: center;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">Tanggal Pengujian <br>
                        <span>{{ $sample['furan'] != null ? $sample['furan']->tanggal_pengujian : null }}</span>
                    </td>
                    <td style="text-align: center;">
                    </td>
                </tr>

                <tr>
                    <th>5HMF <br>
                        <span>(5-hydromethyl-2-furakhydel)</span>
                    </th>
                    <td style="text-align: center;">{{ $value['furan'] != null ? $value['furan']['5hmf'] : 'N/A' }}
                    </td>
                    <th> </th>
                    <th rowspan="5" style="text-align: center;">
                        <p>0-292 pbd Normal Aging Rate</p>
                        <br>
                        <p>293-2021 ppb: Accelerated Aging rate</p>
                        <br>
                        <p>2022-3277 ppb: Excessive Aging rate</p>
                        <br>
                        <p>3278-4524 ppb: High Risk of failure</p>
                        <br>
                        <p>4525-7337 ppb: End of Expected Life of Paper Insulation and of the Transformer</p>
                    </th>
                </tr>
                <tr>
                    <th>2FOL <br>
                        <span>(5-hydromethyl-2-furakhydel)</span>
                    </th>
                    <td style="text-align: center;">{{ $value['furan'] != null ? $value['furan']['2fol'] : 'N/A' }}
                    </td>
                    <th></th>
                </tr>
                <tr>
                    <th>2FAL <br>
                        <span>(5-hydromethyl-2-furakhydel)</span>
                    </th>
                    <td style="text-align: center;">{{ $value['furan'] != null ? $value['furan']['2fal'] : 'N/A' }}
                    </td>
                    <th></th>
                </tr>
                <tr>
                    <th>2ACF <br>
                        <span>(5-hydromethyl-2-furakhydel)</span>
                    </th>
                    <td style="text-align: center;">{{ $value['furan'] != null ? $value['furan']['2acf'] : 'N/A' }}
                    </td>
                    <th></th>
                </tr>
                <tr>
                    <th>5MEF <br>
                        <span>(5-hydromethyl-2-furakhydel)</span>
                    </th>
                    <td style="text-align: center;">{{ $value['furan'] != null ? $value['furan']['5mef'] : 'N/A' }}
                    </td>
                    <th></th>
                </tr>
                <tr>
                    <th>Total 2FAL</th>
                    <td style="text-align: center;">
                        {{ $value['furan'] != null ? $value['furan']['Total 2 FAL'] : 'N/A' }}</td>
                    <th></th>
                    <th style="background-color: skyblue; text-align: left;">5* Faktor Koreksi</th>
                </tr>
                <tr>
                    <th>Total Furan</th>
                    <td style="text-align: center;">
                        {{ $value['furan'] != null ? $value['furan']['Total Furan'] : 'N/A' }}</td>
                    <th></th>
                    <th style="background-color: skyblue;">-</th>
                </tr>
                <tr>
                    <th>Estimate DP</th>
                    <td style="text-align: center;">
                        {{ $value['furan'] != null ? $value['furan']['Estimate DP'] : 'N/A' }}</td>
                    <th></th>
                    <th style="background-color: skyblue;">-</th>
                </tr>
                <!-- Footer -->
                <tr style="border: none;">
                    <td colspan="4">
                        <ul>
                            <li>{{ $value['furan'] != null ? $value['furan']['Kategori Hasil Furan'] : 'N/A' }}</li>
                            <li>{{ $value['furan'] != null ? $value['furan']['Remaining Life Time'] : 'N/A' }}</li>
                            <li>{{ $value['furan'] != null ? $value['furan']['Rekomendasi Furan'] : 'N/A' }}</li>
                        </ul>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="border: none;">
                        Tangerang,
                        <span>{{ $sample['furan'] != null ? $sample['furan']->tanggal_cetaklaporan : null }}</span>
                        <br>
                    </td>
                </tr>
                <tr style="text-align: center;" style="border: none;">
                    <td colspan="2" style="border: none;">
                        Diuji Oleh :
                        <br>
                        <img src="{{ asset('img/farhan.png') }}" style="width: 150px; height: auto;">
                        <br>
                        Farhan Aditya <br>
                        (Analis Laboratorium)
                    </td>
                    <td style="border: none;">
                        Diperiksa Oleh :
                        <br>
                        <img src="{{ asset('img/kabag.png') }}" style="width: 100px; height: auto;">
                        <br>
                        Ahmad Kharis <br>
                        (KaBag In House Service)
                    </td>
                    <td style="border: none;">
                        Disetujui Oleh :
                        <br>
                        <img src="{{ asset('img/manager.png') }}" style="width: 100px; height: auto;">
                        <br>
                        Ahmad Sujarwo <br>
                        (Manager In House Service)
                    </td>
                </tr>
            </table>
        </div>
    </div>



    <!-- SAMPLE OA -->
    <div style="page-break-after: always;"></div>
    <div class="container">
        <div class="p-2">
            <img src="{{ asset('Asset/LogoTrafoindo.png') }}" width="120" height="50" class="d-inline-block"
                alt="LOGO">
        </div>
        <br>
        <table border="1">
            <!-- BAGIAN 1 -->
            <tr>
                <th colspan="6" style="padding-bottom: 2rem; border: none;">
                    TEST RESULT OF OIL ANALYSIS <br>
                </th>
                <th rowspan="3" colspan="4" style="font-weight: normal; text-align: left;">
                    <ul style="list-style-type: none;">
                        <li>No. Documen : TP/V.3221-01/22</li>
                        <li>Tgl/Rev. Form : 0/20-12-2022</li>
                        <li>Tgl/Rev. Isi Dok : 1/08-02-2023</li>
                        <li>Halaman : 1 dari 1</li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th colspan="6" style="border: none; font-weight: normal; text-align: left;">Customer : Edo Laksana
                    Widodo</th>
            </tr>
            <tr>
                <th colspan="6" style="border: none; font-weight: normal; text-align: left;">Project
                    :{{ $sample['oa'] ? $sample['oa']->history->project->nama_project : 'N/A' }}
                </th>
            </tr>
            <!-- BAGIAN 2 -->
            <tr>
                <th colspan="10" style="text-align: center; background-color: grey;">
                    DATA TEKNIS TRANSFORMATOR
                </th>
            </tr>
            <tr>
                <th style="border: none;">Merk</th>
                <td style="border: none;">: {{ $sample['oa'] ? $sample['oa']->history->trafo->merk : 'N/A' }}</td>
                <th style="border: none;">Tegangan</th>
                <td style="border: none;">:{{ $sample['oa'] ? $sample['oa']->history->trafo->voltage : 'N/A' }}</td>
                <th style="border: none;">Tahun</th>
                <td style="border: none;">: {{ $sample['oa'] ? $sample['oa']->history->trafo->year : 'N/A' }}</td>
                <th style="border: none;">Catatan</th>
                <td style="border: none;">:{{ $sample['oa'] ? $sample['oa']->history->trafo->catatan : 'N/A' }}</td>
            </tr>
            <tr>
                <th style="border: none;">Kapasistas Power</th>
                <td style="border: none;">:{{ $sample['oa'] ? $sample['oa']->history->trafo->kva : 'N/A' }}</td>
                <th style="border: none;">Tag No</th>
                <td style="border: none;">{{ $sample['oa'] ? $sample['oa']->history->trafo->tag_number : 'N/A' }}</td>
                <th style="border: none;">VG</th>
                <td style="border: none;">: {{ $sample['oa'] ? $sample['oa']->history->trafo->vg : 'N/A' }}</td>
            </tr>
            <tr>
                <th style="border: none;">No Seri</th>
                <td style="border: none;">: {{ $sample['oa'] ? $sample['oa']->history->trafo->serial_number : 'N/A' }}
                </td>
                <th style="border: none;">Temp. Oil</th>
                <td style="border: none;">:{{ $sample['oa'] ? $sample['oa']->history->trafo->temperatur_oil : 'N/A' }}
                </td>
                <th style="border: none;">Jumlah Oil</th>
                <td style="border: none;">:
                    {{ $sample['oa'] ? $sample['oa']->history->trafo->kapasitas_minyak : 'N/A' }}</td>
            </tr>
            <!-- BAGIAN 3 -->
            <tr style="text-align: center;">
                <th colspan="10" style="background-color: grey;">HASIL PENGUJIAN OIL ANALYSIS</th>
            </tr>
            <tr style="text-align: center;">
                <th rowspan="8" colspan="2">
                    STANDAR QUALITY OF OIL ANALYSIS
                </th>
                <th rowspan="8">
                    METHOD
                </th>
            </tr>
            <tr style="text-align: center;">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th rowspan="6" colspan="4">
                    BATASAN NILAI PENGUNJIAN
                </th>
            </tr>
            <tr>
                <th>Tanggal Sampling</th>
                <th>Tanggal Sampling</th>
                <th>Tanggal Sampling</th>
            </tr>
            <tr>
                <th>{{ $sample['oa'] != null ? $sample['oa']->tanggal_sampling : null }}
                </th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tanggal Terima</th>
                <th>Tanggal Terima</th>
                <th>Tanggal Terima</th>
            </tr>
            <tr>
                <th>{{ $sample['oa'] != null ? $sample['oa']->tanggal_kedatangan : null }}
                </th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tanggal Pengujian</th>
                <th>Tanggal Pengujian</th>
                <th>Tanggal Pengujian</th>
            </tr>
            <tr style="text-align: center;">
                <th>{{ $sample['oa'] != null ? $sample['oa']->tanggal_pengujian : null }}
                </th>
                <th></th>
                <th></th>
                <th>Poor</th>
                <th>Pair</th>
                <th>Good</th>
                <th>Condition</th>
            </tr>
            <!-- BAGIAN 4 -->
            <tr>
                <td>Color / Appereance</td>
                <td>ASTM Color</td>
                <td>ASTM D1500</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['Color / Appreance'] : 'N/A' }}
                </td>
                <td></td>
                <td></td>
                <td style="text-align: center;">>3.5</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;"><3.5 </td>
                <td style="background-color: red; font-weight: bold;">Poor</td>
            </tr>
            <tr>
                <td>Breakdown Voltage (Dielectric Strength)</td>
                <td>Kv</td>
                <td>IEC 60156</td>
                <td style="text-align: center;">
                    {{ $value['oa'] != null ? $value['oa']['Breakdown Voltage (Dieclectric Strength)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td style="text-align: center;"><30 </td>
                <td style="text-align: center;">30-40</td>
                <td style="text-align: center;">>40</td>
                <td style="background-color: red; font-weight: bold;">Poor</td>
            </tr>
            <tr>
                <td>Interfacial Tension</td>
                <td>Mn/M</td>
                <td>ASTM D971</td>
                <td style="text-align: center;">
                    {{ $value['oa'] != null ? $value['oa']['Interfacial Tension'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td style="text-align: center;"><22</td>
                <td style="text-align: center;">20-28</td>
                <td style="text-align: center;">>28</td>
                <td></td>
            </tr>
            <tr>
                <td>Total Acid Number (TAN)</td>
                <td>mg Koh/g</td>
                <td>IEC 62021-2</td>
                <td style="text-align: center;">
                    {{ $value['oa'] != null ? $value['oa']['Total Acid Number (TAN)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td style="text-align: center;">>0.3</td>
                <td style="text-align: center;">15-0.3</td>
                <td style="text-align: center;">>15</td>
                <td style="background-color: yellow; font-weight: bold;">Fair</td>
            </tr>
            <tr>
                <td>Water Content</td>
                <td>ppm</td>
                <td>IEC-60814</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['Water Content'] : 'N/A' }}
                </td>
                <td></td>
                <td></td>
                <td style="text-align: center;">>40</td>
                <td style="text-align: center;">30-40</td>
                <td style="text-align: center;"><30</td>
                <td style="background-color: red; font-weight: bold;">Poor</td>
            </tr>
            <tr>
                <td>Oil Quality Index (OQIN)</td>
                <td>-</td>
                <td>WP-222</td>
                <td style="text-align: center;">
                    {{ $value['oa'] != null ? $value['oa']['Oil Quality Index (OQIN)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td style="text-align: center;"><160</td>
                <td style="text-align: center;">160-300</td>
                <td style="text-align: center;">>300</td>
                <td></td>
            </tr>
            <tr>
                <td>Sediment & Sludge</td>
                <td>%</td>
                <td>IEC 60422</td>
                <td style="text-align: center;">
                    {{ $value['oa'] != null ? $value['oa']['Sendiment & Sludge'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;">No Sediment or precitipitable sludge. Result below 0.02% by mass may be neglected</td>
                <td></td>
            </tr>
            <tr>
                <td>Density</td>
                <td>g/Ml</td>
                <td>ISO 3675</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['Density'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;">Max 0.895 at 29.5*C</td>
                <td></td>
            </tr>
            <tr>
                <td>PCB</td>
                <td>g/Ml</td>
                <td>ISO-2</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['PCB'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;">
                    < 2bpm</td>
                <td></td>
            </tr>
            <tr>
                <td>Corrosive Sulfur</td>
                <td>-</td>
                <td>ASTM D1275</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['Corrosive Sulfur'] : 'N/A' }}
                </td>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;">Not Corrosive</td>
                <td></td>
            </tr>
            <tr>
                <td>Flash Point</td>
                <td>*C</td>
                <td>ISO 2719</td>
                <td style="text-align: center;">{{ $value['oa'] != null ? $value['oa']['Flash Point'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;"> 135*C</td>
                <td style="background-color: green; font-weight: bold;">Good</td>
            </tr>
            <!-- FOOTER TABLE -->
            <tr style="text-align: left">
                <th colspan="10" style="border: none;">
                    <h3>Kesimpulan :</h3>
                    <p style="font-weight:normal;">
                        {{ $value['oa'] != null ? $value['oa']['Kategori Hasil OA'] : 'N/A' }}
                    </p>
                    <br>
                </th>
            </tr>
            <tr style="text-align: left">
                <th colspan="10" style="border: none;">
                    <h4>Rekomendasi :</h4>
                    <p style="font-weight:normal;">
                        {{ $value['oa'] != null ? $value['oa']['Rekomendasi OA'] : 'N/A' }}
                    </p>
                    <br>
                </th>
            </tr>
            <tr style="text-align: left">
                <th colspan="10" style="border: none;">
                    <h4>Tangerang,
                        <span>{{ $sample['oa'] != null ? $sample['oa']->tanggal_cetaklaporan : null }}</span>
                    </h4>
                    <br>
                    <br>
                </th>
            </tr>
            <tr style="text-align: center;">
                <th colspan="3" style="border: none; font-weight: normal;">
                    Di uji Oleh:
                    <br>
                    <img src="{{ asset('img/farhan.png') }}" style="width: 150px; height: auto;">
                    <br>
                    Farhan Aditya <br>
                    (Analis Laboratorium)
                </th>
                <th colspan="3" style="border: none; font-weight: normal;">
                    Di Periksa Oleh:
                    <br>
                    <img src="{{ asset('img/kabag.png') }}" style="width: 100px; height: auto;">
                    <br>
                    Ahmad Kharis <br>
                    (kaBag. In House Service)
                </th>
                <th colspan="4" style="border: none; font-weight: normal;">
                    Di Setujui Oleh:
                    <br>
                    <img src="{{ asset('img/manager.png') }}" style="width: 100px; height: auto;">
                    <br>
                    Ahmad Sujarwo <br>
                    (Manager In House Service)
                </th>
            </tr>
        </table>
    </div>

    <!-- SAMPLE DGA -->
    <div style="page-break-after: always;"></div>
    <div class="container">
        <div class="p-2">
            <img src="{{ asset('Asset/LogoTrafoindo.png') }}" width="120" height="50" class="d-inline-block"
                alt="LOGO">
        </div>
        <br>
        <table border="1">
            <caption>ANALISIS GAS TERLARUT PADA TRANSFORMATOR DENGAN METODE KROMATOGRAFI GAS</caption>
            <!-- BAGIAN 1 -->
            <tr>
                <th colspan="1">Klien/Proyek</th>
                <td colspan="6"> {{ $sample['dga'] ? $sample['dga']->history->project->nama_project : 'N/A' }}</td>
                <th colspan="2">Tegangan</th>
                <td colspan="2">{{ $sample['dga'] ? $sample['dga']->history->trafo->voltage : 'N/A' }}</td>
            </tr>
            <tr>
                <th colspan="1">Pabrikan/tahun</th>
                <td colspan="6">
                    {{ $sample['dga'] ? ($sample['dga']->history->trafo->pabrikan ?? 'N/A') . '/' . ($sample['dga']->history->trafo->year ?? 'N/A') : 'N/A' }}
                </td>
                <th colspan="2">Kapasistas Minyak</th>
                <td colspan="2">{{ $sample['dga'] ? $sample['dga']->history->trafo->kapasitas_minyak : 'N/A' }}
                </td>
            </tr>
            <tr>
                <th colspan="1">Umur Trafo</th>
                <td colspan="6">{{ $sample['dga'] ? $sample['dga']->history->trafo->umur_trafo : 'N/A' }}</td>
                <th colspan="2">Catatan</th>
                <td colspan="2">{{ $sample['dga'] ? $sample['dga']->history->trafo->catatan : 'N/A' }}</td>
            </tr>
            <tr>
                <th colspan="1">Nomor Seri</th>
                <td colspan="6">{{ $sample['dga'] ? $sample['dga']->history->trafo->serial_number : 'N/A' }}</td>
            </tr>
            <tr>
                <th colspan="1">Rated Power</th>
                <td colspan="6">{{ $sample['dga'] ? $sample['dga']->history->trafo->kva : 'N/A' }}</td>
            </tr>
            <!-- BAGIAN 2 -->
            <tr>
                <th colspan="7">HASIL UJI</th>
                <th rowspan="2" colspan="4">STANDARD IEEE</th>
            </tr>
            <tr>
                <th colspan="7">(Nilai Konsentrasi dalam parts per million [ppm])</th>
            </tr>
            <!-- BAGIAN 3   -->
            <tr>
                <th>TANGGAL</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th rowspan="5">Delta [Δ] (ppm)</th>
                <th rowspan="5">Rates (ppm/year)</th>
                <th rowspan="5">Tabel 1 (ppm)</th>
                <th rowspan="5">Tabel 2 (ppm)</th>
                <th rowspan="5">Tabel 3 (ppm)</th>
                <th rowspan="5">Tabel 4 (ppm/year)</th>
            </tr>
            <tr>
                <th>Tanggal Sampling</th>
                <td>{{ $sample['dga'] != null ? $sample['dga']->tanggal_sampling : null }}
                </td>
                <td></td>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tanggal Terima</th>
                <td>{{ $sample['dga'] != null ? $sample['dga']->tanggal_kedatangan : null }}
                </td>
                <td></td>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tanggal Pengujian</th>
                <td>{{ $sample['dga'] != null ? $sample['dga']->tanggal_pengujian : null }}
                </td>
                <td></td>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="5">GAS PARAMETER</th>
            </tr>

            <!-- bagian 4 -->
            <tr style="text-align: center;">
                <th>Hidrogen</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Hidrogen (H2)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>40</td>
                <td>90</td>
                <td>25</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Etana</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Etana (C2H6)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>15</td>
                <td>40</td>
                <td>7</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Etilena</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Etilena (C2H4)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>60</td>
                <td>125</td>
                <td>20</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Asetilena</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Asetilena (C2H2)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>2</td>
                <td>7</td>
                <td>0</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Karbon Dioksida</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Karbon Dioksida (CO2)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>5500</td>
                <td>8000</td>
                <td>1750</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Metana</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Metana (CH4)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>20</td>
                <td>30</td>
                <td>10</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>Karbon Monoksida</th>
                <td>{{ $value['dga'] != null ? $value['dga']['Karbon Monoksida (CO)'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
                <td>N/A</td>
                <td>500</td>
                <td>600</td>
                <td>175</td>
                <td>N/A</td>
            </tr>
            <tr style="text-align: center;">
                <th>CO2/CO ratio</th>
                <td>{{ $value['dga'] != null ? $value['dga']['CO2/CO ratio'] : 'N/A' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <th colspan="6">Note: The Ratio for normal cellulosic decomposition (healthy) = 3 to 10</th>
            </tr>

            <!-- bagian 5 -->
            <tr style="text-align: center;">
                <th rowspan="3" colspan="2">DGA Status</th>
                <td>DGA Status 1</td>
                <td colspan="2">Rates < Tabel 4</td>
                <td colspan="2">Delta < Tabel 3</td>
                <td colspan="2">IG < Tabel 1</td>
                <th colspan="2" rowspan="3">DGA Status 3</th>
            </tr>
            <tr style="text-align: center;">
                <td>DGA Status 1</td>
                <td colspan="2">Rates < Tabel 4</td>
                <td colspan="2">Delta < Tabel 3</td>
                <td colspan="2">Tabel 1 < IG < Tabel 2</td>
            </tr>
            <tr style="text-align: center;">
                <td>DGA Status 1</td>
                <td colspan="2">Rates < Tabel 4</td>
                <td colspan="2">Delta < Tabel 3</td>
                <td colspan="2">IG < Tabel 2</td>
            </tr>

            <!-- bagian 6 -->
            <tr>
                <th colspan="7">key Gas Analysis</th>
                <td colspan="4"><strong>Keterangan : </strong></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="7" rowspan="4">
                    <canvas id="gasAnalysisChart" width="400" height="200"></canvas>
                </td>
                <td colspan="4"> Thermal-Oil Decomposition: Gas Utama Etilena (C2H4)</td>
            </tr>
            <tr>
                <td colspan="4"> Thermal-Cellulose: Gas Utama Karbon Monoksida (CO)</td>
            </tr>
            <tr>
                <td colspan="4"> Electrial-Partial Discharge: Gas Utama-Hidrogen (H2)</td>
            </tr>
            <tr>
                <td colspan="4"> Electrial-Arcing: Gas Utama Asetilena (C2H2)</td>
            </tr>

            <!-- bagian 7 -->
            <tr>
                <th colspan="7">Duval Pentagon Analysis</th>
                <td colspan="4"><strong>Keterangan : </strong></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="7" rowspan="1">
                    <canvas id="duvalPentagonChart" width="200" height="200"></canvas>
                </td>
                <td colspan="4">
                    <ul>
                        <li>PD : Corona partial discharge</li>
                        <li>D1 : Low Energy Discharge</li>
                        <li>D2 : High Energy Discharge</li>
                        <li>T3 : Thermal Faults > 700°C</li>
                        <li>T1 : Thermal Faults < 300°C</li>
                        <li>S : Stray Gassing S of Mineral Oil at 120 and 200°C</li>
                    </ul>
                </td>
            </tr>

            {{-- BAGIAN 8 --}}
            <tr>
                <th colspan="11" style=" border: none; font-weight: normal;">
                    <span style="font-weight: bold;">Head Office :</span> Jl. Hayam Wuruk 4 FX, Jakarta 10120, Phone :
                    (62-21) 385 07030, 386 1865, 351 7113, 345 1384 (Hunting) Fax:(62-21) 385 0702, 386 1865, SMS
                    Hotline Service : 0815 1729 0000 Email : trafo@gtrafoindonesia.com marketing@trafoindonesia.com
                    www.trafoindonesia.com
                </th>
            </tr>
            <tr>
                <th colspan="11" style="border: none; font-weight: normal;">
                    <span style="font-weight: bold;">Factory :</span> Jl.Raya Siliwangi RT 001/001 Kel.Gembor,
                    Kec.Periuk, Tanggerang, Banten - Indonesia Phone : (62-21) 593 19002-05
                </th>
            </tr>
            <tr>
                <th colspan="11">Analisa</th>
            </tr>
            <tr>
                <th colspan="11" style="font-weight: normal;">
                    {{ $value['dga'] != null ? $value['dga']['Analisa'] : 'N/A' }}
                </th>
            </tr>
            {{-- <tr>
                <th colspan="11" style="font-weight: normal;">Hasil DGA trafo melebihi batas standar, perlu
                    dilakukan peningkatan pemantauan
                    terhadap kenaikan gas</th>
            </tr> --}}
            <tr>
                <th colspan="11">Kesimpulan</th>
            </tr>
            <tr>
                <th colspan="11" style="font-weight: normal;">
                    {{ $value['dga'] != null ? $value['dga']['Kesimpulan'] : 'N/A' }}
                </th>
            </tr>
            <tr>
                <th colspan="11">Rekomendasi</th>
            </tr>
            <tr>
                <th colspan="11" style="font-weight: normal;">
                    {{ $value['dga'] != null ? $value['dga']['Rekomendasi'] : 'N/A' }}
                </th>
            </tr>
            <tr>
                <th colspan="11" align="left" style="border: none;">
                    <br>
                    <h4>Tanggerang,
                        <span>{{ $sample['dga'] != null ? $sample['dga']->tanggal_cetaklaporan : null }}</span>
                    </h4>
                    <br>
                    <br>
                </th>
            </tr>
            <br>
            <tr style="text-align: center;">
                <th colspan="4" style="border: none; font-weight: normal;">
                    Di uji Oleh:
                    <br>
                    <img src="{{ asset('img/farhan.png') }}" style="width: 150px; height: auto;">
                    <br>
                    Farhan Aditya <br>
                    (Analis Laboratorium)
                </th>
                <th colspan="3" style="border: none; font-weight: normal;">
                    Di Periksa Oleh:
                    <br>
                    <img src="{{ asset('img/kabag.png') }}" style="width: 100px; height: auto;">
                    <br>
                    Ahmad Kharis <br>
                    (kaBag. In House Service)
                </th>
                <th colspan="4" style="border: none; font-weight: normal;">
                    Di Setujui Oleh:
                    <br>
                    <img src="{{ asset('img/manager.png') }}" style="width: 100px; height: auto;">
                    <br>
                    Ahmad Sujarwo <br>
                    (Manager In House Service)
                </th>
            </tr>
        </table>
    </div>
    <!-- chart keygas -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sample gas analysis data (replace with your actual data)
            var gasData = {
                labels: ['C2H4', 'CO', 'H2', 'C2H2'],
                datasets: [{
                    label: 'Gas Concentration (%)',
                    data: [2, 3, 18, 75],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                }]
            };

            // Initialize Gas Analysis chart
            var ctx = document.getElementById('gasAnalysisChart').getContext('2d');
            var gasAnalysisChart = new Chart(ctx, {
                type: 'line', // You can change this to 'bar' or other chart types
                data: gasData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
        });
    </script>

    <!-- chart doval pentagon -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Dummy values, replace with your actual data
            var duvalValues = [4, 2, 3, 5, 1];

            // Initialize Duval Pentagon chart
            var ctx = document.getElementById('duvalPentagonChart').getContext('2d');
            var duvalPentagonChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['H2', 'C2H2', 'C2H4', 'CH4', 'C2H5'],
                    datasets: [{
                        data: duvalValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                        pointRadius: 4,
                        pointHoverRadius: 5,
                    }]
                },
                options: {
                    scale: {
                        ticks: {
                            min: 1,
                            max: 5,
                            stepSize: 1
                        }
                    }
                }
            });
        });
    </script>
    </div>
</body>
