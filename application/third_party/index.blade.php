@extends('layouts.app')

@section('title', 'Analitik')

@section('content')
    <div class="page-breadcrumb">
        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ __('Daftar Project') }}</h3>
    </div>
    <div class="container-fluid">
        <div class="project-box">
            <div class="bg-white rounded-m w-100 p-4 shadow-sm">
                <form id="form-project">
                    <div class="d-flex m-1">
                        <input class="project-analitik mx-3 mr-3" type="text" name="project" id="project"
                            placeholder="Create Your Project">
                        <button type="submit" class="btn btn-success rounded-s">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="justiy-content-center text-center loader d-none"><img src="{{ asset('assets/img/spinner.svg') }}"
                alt="spinner"></div>
        <div class="no-data text-center">
            <img class="m-3" src="{{ asset('assets/img/not_found.svg') }}" alt="Not Found" width="40%">
            <h2 class="text-dark font-weight-bold">Data Kosong</h2>
        </div>
        <div class="mt-4">
            <a href="" class="btn btn-primary btn-sm btn-compare rounded d-none">Compare</a>
        </div>
        <div class="result">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="table_project" style="width:100%"
                            class="table align-items-center align-items-center table-custom">
                            <thead>
                                <tr>
                                    <th class="border-0" style="width:5%"></th>
                                    <th class="border-0" style="width:10%"></th>
                                    <th class="border-0"></th>
                                    <th class="border-0"></th>
                                    <th class="border-0"></th>
                                    <th class="border-0"></th>
                                </tr>
                            </thead>
                            <tbody id="bodyList">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    {{-- <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css"></script> --}}
@endsection
@section('js')
    <script src="{{ asset('/assets/libs/chart.js/dist/Chart.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script> --}}

    <script>
        // window.location.href = "{{ route('maintenance') }}";
        $('#table_project').addClass('d-none');
        $('#table_project').DataTable({
            "paging": true,
            "searching": false,
            "ordering": false,
            "bLengthChange": false,
            "autoWidth": false,
            // "pageLength": 5,
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-angle-left"></i>',
                    "next": '<i class="fas fa-angle-right"></i>'
                }
            }
        })
        // $('#project').tagsinput({
        //     trimValue: true,
        //     confirmKeys: [13, 44, 32],
        //     focusClass: 'my-focus-class'
        // });
        let loader =
            '<div class="justiy-content-center text-center loader"><img src="{{ asset('assets/img/spinner.svg') }}" alt="spinner"></div>';
        let ip = 'http://103.15.226.105:4000/api/v1/';
        reloadList();
        $('#form-project').on('submit', function(e) {
            e.preventDefault()
            var keyword = $('#project').val()
            $.ajax({
                type: 'post',
                url: ip + 'keyword/add',
                data: JSON.stringify({
                    "keyword": keyword,
                }),
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Project has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    reloadList();
                }
            });
        });

        function reloadList() {
            $.ajax({
                type: 'get',
                url: ip + 'keyword/list',
                beforeSend: function() {
                    // $('.result').append(loader)
                    $('.loader').removeClass('d-none');
                },
                success: function(data) {
                    console.log(data);
                    $('.loader').addClass('d-none')
                    $('#table_project').removeClass('d-none');
                    let result = '';
                    $.each(data.data, function(index, value) {
                        if (Array.isArray(data.data) && data.data.length) {
                            $('.no-data').addClass('d-none')
                            var key = encodeURIComponent(value.keyword_name);

                            result +=
                                '<tr><td><div class="custom-control custom-checkbox" style="margin-left: 20%;"><input type="checkbox" class="custom-control-input" name="select[]" id="check_' +
                                value.keyword_name + '" value="' + value.keyword_name +
                                '" onclick="keywordSelect()"><label class="custom-control-label" for="check_' +
                                value.keyword_name +
                                '"></label></div></td><td><div class="card-list-icon bg-secondary d-flex m-auto "><img src="{{ asset('/assets/img/icons-add-list.svg') }}" alt="Icon List"></div></td>' +
                                '<td><a href="analitik/show/' + key +
                                '"><small class="card-list-item-head-val">Keyword</small><p class="card-list-item-val">' +
                                value.keyword_name + '</p></a> </td>' +
                                '<td><small class="card-list-item-head-val">Tweet</small><p class="card-list-item-val">' +
                                Number(value.keyword_data_count).toLocaleString("id-ID") + '</p></td>' +
                                '<td><small class="card-list-item-head-val">Positive</small><p class="card-list-item-val text-success">' +
                                Number(value.total_positif).toLocaleString("id-ID") + '</p></td>' +
                                '<td><small class="card-list-item-head-val">Negative</small><p class="card-list-item-val text-danger">' +
                                Number(value.total_negatif).toLocaleString("id-ID") + '</p></td></tr>'
                        } else {
                            $('.no-data').removeClass('d-none')
                        }
                    });
                    $('#bodyList').html(result);
                }
            });
        }

        function keywordSelect() {
            let val = $('.custom-control-input').val()
            let keyword_val = [];
            $(':checkbox:checked').each(function(i) {
                keyword_val[i] = $(this).val();
            });
            if (keyword_val.length >= 2) {
                $('.btn-compare').removeClass('d-none')
                key = keyword_val.join(",")
                $('.btn-compare').attr("href", "analitik/show/" + key)
            } else {
                $('.btn-compare').addClass('d-none')
            }
        }
    </script>
@endsection
