



@extends('layouts.app')

@section('content')


    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Film Management</h2>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-lg-12 col-md-8 col-sm-12 text-right">
                                <a href="{{url('frontend/film/create')}}" >
                                    <button class="btn btn-primary" type="submit">Add</button>
                                </a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="film-grid" class="table table-bordered table-hover dataTable table-custom">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Release Date </th>
                                        <th>Rating</th>
                                        <th>Ticket Price</th>
                                        <th>Country</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('script')

<script>
    $(document).ready(function() {

        var dataTable = $('#film-grid').DataTable( {
            columnDefs: [
                {
                    orderable: false,
                    className: '',
                    targets:   0
                }
            ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
            "processing": true,
            "serverSide": true,
            "lengthMenu": [ 25, 50, 100],
            "ajax":{
                url :"{{ url('films') }}", // json datasource
                type: "get",  // method  , by default get
                complete:function(type)
                {

                },
                error: function(){  // error handling

                }
            },
            pageLength: 0,
            lengthMenu: [1, 5, 10, 20, 50, 100, 200, 500],
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    className: 'center'
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'center'
                },
                {
                    data: 'release_date',
                    name: 'release_date',
                    className: 'center'
                },
                {
                    data: 'rating',
                    name: 'rating',
                    className: 'center'
                },
                {
                    data: 'ticket_price',
                    name: 'ticket_price',
                    className: 'center'
                },
                {
                    data: 'country',
                    name: 'country',
                    className: 'center'
                },
            ],
            columnDefs: [
                {
                    targets:0, // Start with the last
                    render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                            data = '<a href="<?php echo Url(''); ?>/frontend/films/' + encodeURIComponent(data) + '">'+data+'</a>';
                        }
                        return data;
                    }
                }
            ]
        });

    });
</script>

@endsection
