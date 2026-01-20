@extends('layouts.app')

@section('content')
     <div class="row justify-content-center">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4 class="card-title"> Tables without Borders </h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted">
                                    Add <code>.table-borderless</code> for a table without borders.
                                </p>

                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle mb-0">
                                        <thead class="align-middle thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th style="width: 1%;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bluetooth Speaker</td>
                                                <td>Audio</td>
                                                <td>$49.00</td>
                                                <td>200</td>
                                                <td>4.6 ★</td>
                                                <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown text-muted">
                                                        <a href="#" class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-eye me-1"></i> View</a>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="ti ti-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Leather Wallet</td>
                                                <td>Accessories</td>
                                                <td>$29.99</td>
                                                <td>150</td>
                                                <td>4.3 ★</td>
                                                <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown text-muted">
                                                        <a href="#" class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-eye me-1"></i> View</a>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="ti ti-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Fitness Tracker</td>
                                                <td>Wearables</td>
                                                <td>$89.00</td>
                                                <td>60</td>
                                                <td>4.1 ★</td>
                                                <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown text-muted">
                                                        <a href="#" class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-eye me-1"></i> View</a>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="ti ti-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div> <!-- end card-body-->
                        </div>
 
                       
        </div>
    </div>
@endsection

@section('script')
    <!-- jQuery (solo si NO está ya en el layout) -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Summernote Plugin Js -->
    <script src="/assets/plugins/summernote/summernote-bs5.min.js"></script>

    <!-- Summernote Init -->
    <script src="/assets/js/pages/form-summernote.js"></script>
@endsection
