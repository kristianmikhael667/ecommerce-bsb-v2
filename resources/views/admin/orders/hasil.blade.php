@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Hasil Analisa Apriori
        </h3>
    </div>
    <div class="card-body">
        {{-- Data Support Product --}}
        <div class="table-responsive">
            <h5>Data Support Produk
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Produk</th>
                        <th>Nama Produk</th>
                        <th>Total Transaksi</th>
                        <th>Perhitungan Support</th>
                        <th>Support</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataSupport as $supp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($supp -> kd_produk, 0, 5) }}</td>
                        <td>{{ $supp->dataProduk($supp->kd_produk)->name }}</td>
                        <td>{{ $supp -> totalTransaksi($supp->kd_produk) }}</td>
                        <td>
                            ({{ $supp->totalTransaksi($supp->kd_produk) }} / {{ $totalProduk }} ) * 100
                        </td>
                        <td>{{ $supp -> support }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Item yang memenuhi syarat --}}
        <div class="table-responsive">
            <h5>Item yang memenuhi syarat minimun support <b>{{ $dataPengujian -> min_supp }}%</b>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kd Produk</th>
                        <th>Nama Produk</th>
                        <th>Support</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataMinSupport as $minSupp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($minSupp->kd_produk, 0, 5) }}</td>
                        <td>{{ $minSupp->dataProduk($minSupp->kd_produk)->name }}</td>
                        <td>{{ $minSupp->support }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Kombinasi 2 itemsett --}}
        <div class="table-responsive">
            <h5>Kombinasi 2 itemset
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kd Kombinasi</th>
                        <th>Produk A</th>
                        <th>Produk B</th>
                        <th>Jumlah Transaksi</th>
                        <th>Perhitungan Support</th>
                        <th>Support</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKombinasiItemset as $is)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($is->kd_kombinasi, 0, 5) }}</td>
                        <td>{{ $is->dataProduk($is->kd_barang_a)->name }}</td>
                        <td>{{ $is->dataProduk($is->kd_barang_b)->name }}</td>
                        <td>{{ $is->jumlah_transaksi }}</td>
                        <td>( {{ $is->jumlah_transaksi }} / {{ $totalProduk }} ) * 100</td>
                        <td>{{ $is->support }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Kombinasi yang memenuhi minimum confidence --}}
        <div class="table-responsive">
            <h5>Kombinasi yang memenuhi minimum confidence > <b>{{ $dataPengujian->min_confidence }}%</b>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kd Kombinasi</th>
                        <th>Produk A</th>
                        <th>Produk B</th>
                        <th>Jumlah Transaksi</th>
                        <th>Perhitungan Support</th>
                        <th>Support</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataMinConfidence as $is)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($is->kd_kombinasi, 0, 5) }}</td>
                        <td>{{ $is->dataProduk($is->kd_barang_a)->name }}</td>
                        <td>{{ $is->dataProduk($is->kd_barang_b)->name }}</td>
                        <td>{{ $is->jumlah_transaksi }}</td>
                        <td>( {{ $is->jumlah_transaksi }} / {{ $totalProduk }} ) * 100</td>
                        <td>{{ $is->support }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pola hasil analisa --}}
        <div class="table-responsive">
            <h5>Pola hasil analisa
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pola</th>
                        <th>Confidence</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataMinConfidence as $is)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            Apabila pelanggan membeli <b>{{ $is->dataProduk($is -> kd_barang_a)->name }}</b>,
                            maka pelanggan juga akan membeli <b>{{ $is->dataProduk($is -> kd_barang_b)->name
                                }}</b>
                        </td>
                        <td>{{ $is->support }} %</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection