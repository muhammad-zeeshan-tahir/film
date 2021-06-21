



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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Name </label>
                                       {{  $data['name'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone-ex" class="control-label">Description</label>
                                        {{  $data['description'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="tax-id" class="control-label">Release Date</label>
                                        {{  $data['release_date'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="ssn" class="control-label">Rating</label>
                                        {{  $data['rating'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="product-key" class="control-label">Ticket Price</label>
                                        {{  $data['ticket_price'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="product-key" class="control-label">Country</label>
                                        {{  $data['country'] }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="product-key" class="control-label">Genre</label>
                                        {{  $data['genre_name'] }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="photo" class="control-label">Photo</label>
                                        <img with="200px" height="200px" src="{{url('public/upload_photos/').'/'.$data['photo']}}" />
                                    </div>
                                </div>
                            </div>
                            <?php

                                   foreach($data['comment'] as $row)
                                   {
                            ?>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="photo" class="control-label">{{  $row['name'] }}</label>
                                                    {{  $row['comment'] }}
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                            ?>

                            {!! Form::close() !!}

                            {!! Form::model([], ['url' => url('frontend/film/comment/store', []),'files'=> true, 'method'=>'post']) !!}

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Name</label>
                                        <input name="name" type="text" id="name" class="form-control">
                                        <span class="text-danger">{{$errors->getBag('default')->first('name')}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone-ex" class="control-label">Comment</label>
                                        <input name="comment" type="text" id="description" class="form-control">
                                        <span class="text-danger">{{$errors->getBag('default')->first('comment')}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-8 col-sm-12 text-right">
                                    <button class="btn btn-primary" type="submit">Add comment</button>
                                </div>
                            </div>

                            {!! Form::close() !!}


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
            });

        });
    </script>

@endsection
