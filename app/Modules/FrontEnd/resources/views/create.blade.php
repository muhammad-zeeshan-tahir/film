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

            @if (Session::has('flash_message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i>
                        {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">

                            {!! Form::model([], ['url' => url('frontend/film/store', []),'files'=> true, 'method'=>'post']) !!}

                                <div class="row clearfix">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">Name </label>
                                                    <input name="name" type="text" id="name" class="form-control">
                                                    <span class="text-danger">{{$errors->getBag('default')->first('name')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone-ex" class="control-label">Description</label>
                                                    <input name="description" type="text" id="description" class="form-control">
                                                    <span class="text-danger">{{$errors->getBag('default')->first('description')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="tax-id" class="control-label">Release Date</label>
                                                    <input name="release_date" type="text" id="release_date" class="form-control">
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('release_date') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="ssn" class="control-label">Rating</label>
                                                    <select name="rating" id="single-selection"  class="form-control multiselect multiselect-custom">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('rating') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="product-key" class="control-label">Ticket Price</label>
                                                    <input name="ticket_price"  type="text" id="ticket_price" class="form-control">
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('ticket_price') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="product-key" class="control-label">Country</label>
                                                    <input name="country" type="text" id="country" class="form-control">
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('country') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="product-key" class="control-label">Genre</label>
                                                    <select name="genre_id" id="single-selection"  class="form-control multiselect multiselect-custom">
                                                        <?php
                                                                foreach($genre as $row)
                                                                {
                                                        ?>
                                                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                                        <?php
                                                                }
                                                        ?>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('genre_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="photo" class="control-label">Photo</label>
                                                    <input name='photo' type="file" id="photo" class="form-control">
                                                    <span class="text-danger">{{ $errors->getBag('default')->first('photo') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-8 col-sm-12 text-right">
                                                    <button class="btn btn-primary" type="submit">Add</button>
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
