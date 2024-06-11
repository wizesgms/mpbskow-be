@extends('layouts.main')
@section('panel')
    <div class="row">
        <!-- Sales Overview-->
        <div class="col-xl-12 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Today Statistics</h5>
                        <small class="text-muted">Today Statistics</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-group"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($userays) }}</h5>
                                    <small>Total User</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-check"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useraysdp) }}</h5>
                                    <small>User Deposits</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-clock"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useraysxdp) }}</h5>
                                    <small>Users No Deposit</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-question-outline"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($userayslwd) }}</h5>
                                    <small>Users Withdraw</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($dpsuccys ,2) }}</h5>
                                    <small>Deposits Sucess</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($wdsuccys ,2) }}</h5>
                                    <small>Withdrawal Success</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="mdi mdi-cash-100"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($bonusys ,2) }}</h5>
                                    <small>Bonus Total</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-currency-usd-off"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($dprejys) }}</h5>
                                    <small>Deposit Rejected</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-currency-usd"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($profit ,2) }}</h5>
                                    <small>Total Profit</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sales Overview-->
    </div>

    <div class="row">
        <!-- Sales Overview-->
        <div class="col-xl-12 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Monthly Statistics</h5>
                        <small class="text-muted">Monthly Statistics</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-group"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useram) }}</h5>
                                    <small>Total User</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-check"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useramdp) }}</h5>
                                    <small>User Deposits</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-clock"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useramxdp) }}</h5>
                                    <small>Users No Deposit</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-question-outline"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useramlwd) }}</h5>
                                    <small>Users Withdraw</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($dpsuccm ,2) }}</h5>
                                    <small>Deposits Sucess</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($wdsuccm ,2) }}</h5>
                                    <small>Withdrawal Success</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="mdi mdi-cash-100"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($bonusm ,2) }}</h5>
                                    <small>Bonus Total</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-currency-usd-off"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($dprejm) }}</h5>
                                    <small>Deposit Rejected</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sales Overview-->
    </div>

    <div class="row">
        <!-- Sales Overview-->
        <div class="col-xl-12 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">Statistics</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-group"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($userall) }}</h5>
                                    <small>Total User</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-check"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($useralldp) }}</h5>
                                    <small>User Deposits</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-account-clock"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($userallxdp) }}</h5>
                                    <small>Users No Deposit</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="mdi mdi-account-question-outline"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($userallwd) }}</h5>
                                    <small>Users Withdraw</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($dpsuccall ,2) }}</h5>
                                    <small>Deposits Sucess</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-cash-multiple"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($wdsuccall ,2) }}</h5>
                                    <small>Withdrawal Success</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="mdi mdi-cash-100"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($bonusall ,2) }}</h5>
                                    <small>Bonus Total</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="mdi mdi-currency-usd-off"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ number_format($dprejall) }}</h5>
                                    <small>Deposit Rejected</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="mdi mdi-currency-usd"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">Rp. {{ number_format($profit ,2) }}</h5>
                                    <small>Total Profit</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sales Overview-->
    </div>
@endsection
