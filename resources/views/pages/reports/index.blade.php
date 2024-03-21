@extends('layouts.app')

@section('title', 'Reports')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Transaction</a></div>
                    {{-- <div class="breadcrumb-item">All Products</div> --}}
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>History Orders</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <h5>List Orders</h5>
                                </div>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('reports.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Kasir</th>
                                            <th>Total Order</th>
                                            <th>Total Item</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Jumlah Uang</th>
                                            <th>Tanggal Transaksi</th>
                                        </tr>
                                        @foreach ($reports as $report)
                                            <tr>

                                                <td>{{ $report->nama_kasir }}
                                                </td>
                                                <td>
                                                    {{ 'Rp. ' . number_format($report->total, 0, ',', '.') }}
                                                </td>
                                                
                                                <td>
                                                    {{ $report->total_item }}
                                                </td>
                                                <td>
                                                    {{ $report->payment_method }}
                                                </td>
                                                <td>
                                                    {{ 'Rp. ' . number_format($report->payment_amount, 0, ',', '.' )}}
                                                </td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($report->transaction_time)) }}</td>


                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $reports->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush