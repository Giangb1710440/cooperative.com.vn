@extends('server_view.master_admin')
@section('title','Gos-Cooperative')
@section('content')
    <main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Xin chào!</h2>
                    </div>
                    <div class="col-auto">
                        <form class="form-inline">
                            <div class="form-group d-none d-lg-inline">
                                <label for="reportrange" class="sr-only">Date Ranges</label>
                                <div id="reportrange" class="px-2 py-2 text-muted">
                                    <span class="small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mb-2 align-items-center">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mt-1 align-items-center">
                                <div class="col-12 col-lg-4 text-left pl-4">
                                    <p class="mb-1 small text-muted">KPI</p>
                                    <span class="h3"></span>
                                    <span class="small text-muted"></span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>

                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Hôm nay</p>
                                    <span class="h3"></span><br />
                                    <span class="small text-muted"></span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4 mb-2">
                                    <p class="mb-1 small text-muted">Mục tiêu</p>
                                    <span class="h3"></span><br />
                                    <span class="small text-muted"></span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Đã hoàn thành</p>
                                    <span class="h3"></span><br />

                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Doanh thu</p>
                                    <span class="h3"></span><br />
                                    <span class="small text-muted"></span>
                                    <span class="fe fe-arrow-down text-danger fe-12"></span>
                                </div>
                            </div>
                            <div class="chartbox mr-4">
                                <div id="areaChart"></div>
                            </div>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    @include('server_view.paner')
</main>
    <script>
        var msg = '{{Session::get('no_role')}}';
        var exist = '{{Session::has('no_role')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1200,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'Bạn không có quyền'
            })
        }
    </script>
@endsection
