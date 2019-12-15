@extends('admin.base')
@section('title')
Succulent
@endsection
@section('menu2')
active
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Succulent</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Succulent</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary float-sm-right" id="btnAdd">
                            Add
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th style="width:150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($succulent as $data)

                            <tr>
                                <td style="width:50px">{{ $data->id }}</td>
                                <td><img src="{{ url('img/') }}/{{ $data->image }}" style="width:150px"/></td>
                                <td>{{ $data->name }}</td>
                                <td style="width:150px">
                                    <button class="btn btn-info btn-flat btnShow" data-id="{{ $data->id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <span class="text">Show</span>
                                    </button>
                                    <button class="btn btn-info btn-flat btnEdit" data-id="{{ $data->id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                    <a href="/admin/succulent/delete/{{ $data->id }}" class="btn btn-danger btn-flat">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th style="width:150px">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('succulentAdd') }}" id="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Succulent</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input name="id" id="id" hidden>
                        <input class="form-control" name="name" id="name" placeholder="Name" required><br>
                        <input class="form-control" name="origin" id="origin" placeholder="Origin" required><br>
                        <input class="form-control" name="description" id="description" placeholder="Description" required><br>
                        <select class="form-control" name="family" id="family" placeholder="Family" required>
                        @foreach($family as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}
                        @endforeach
                        </select><br>
                        <select class="form-control" name="type" id="type" placeholder="Type" required>
                        @foreach($type as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}
                        @endforeach
                        </select><br>
                        <!-- <input class="form-control" name="family" id="family" placeholder="Family" required><br> -->
                        <!-- <input class="form-control" name="type" id="type" placeholder="Type" required><br> -->
                        <input class="form-control" name="mature_size" id="mature_size" placeholder="Mature Size" required><br>
                        <input class="form-control" name="hardiness_zone" id="hardiness_zone" placeholder="Hardiness Zone" required><br>
                        <input class="form-control" name="light" id="light" placeholder="Light" required><br>
                        <input class="form-control" name="water" id="water" placeholder="Water" required><br>
                        <input class="form-control" name="temperature" id="temperature" placeholder="Temperature" required><br>
                        <input class="form-control" name="soil" id="soil" placeholder="Soil" required><br>
                        <input class="form-control" name="soil_ph" id="soil_ph" placeholder="Soil pH" required><br>
                        <input class="form-control" name="flower_color" id="flower_color" placeholder="Flower Color" required><br>
                        <input class="form-control" name="special_features" id="special_features" placeholder="Special Features" required><br>
                        <input class="form-control" name="image" id="image" type="file" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-show">
        <div class="modal-dialog" style="min-width:100%; margin:0;min-height:100vh">
            <div class="modal-content" style="min-height:100vh">
                    <div class="modal-header">
                        <h4 class="show-modal-title">Add Succulent</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td style="width:50%"><img id="show_image" style="width:90%" data-url="{{ url('img') }}/" src=""/></td>
                                <td rowspan="2" style="width:50%">
                                <table>
                                        <tr>
                                            <td><b>Name:</b></td>
                                            <td><span id="show_name"></span></td>
                                        </tr>
                                            <tr><td><b>Origin:</b></td>
                                            <td><span id="show_origin"></span></td>
                                        </tr>
                                            <tr><td><b>Family:</b></td>
                                            <td><span id="show_family"></span></td>
                                        </tr>
                                            <tr><td><b>Type:</b></td>
                                            <td><span id="show_type"></span></td>
                                        </tr>
                                            <tr><td><b>Mature Size:</b></td>
                                            <td><span id="show_mature_size"></span></td>
                                        </tr>
                                            <tr><td><b>Hardiness Zone:</b></td>
                                            <td><span id="show_hardiness_zone"></span></td>
                                        </tr>
                                            <tr><td><b>Light:</b></td>
                                            <td><span id="show_light"></span></td>
                                        </tr>
                                            <tr><td><b>Water:</b></td>
                                            <td><span id="show_water"></span></td>
                                        </tr>
                                            <tr><td><b>Temperature:</b></td>
                                            <td><span id="show_temperature"></span></td>
                                        </tr>
                                            <tr><td><b>Soil:</b></td>
                                            <td><span id="show_soil"></span></td>
                                        </tr>
                                            <tr><td><b>Soil pH:</b></td>
                                            <td><span id="show_soil_ph"></span></td>
                                        </tr>
                                            <tr><td><b>Flower Color:</b></td>
                                            <td><span id="show_flower_color"></span></td>
                                        </tr>
                                            <tr><td><b>Special Features:</b></td>
                                            <td><span id="show_special_features"></span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:20px; width:50%"><p id="show_description"></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                    </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


</section>
<!-- /.content -->
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btnShow').click(function() {
        var id = $(this).data('id');
        $.get('/admin/succulent/edit/' + id, function(data) {
            $('.show-modal-title').html(data.name);
            $('#modal-show').modal('show');
            $('#show_name').html(data.name);
            $('#show_origin').html(data.origin);
            $('#show_description').html(data.description);
            $('#show_family').html(data.id_family);
            $('#show_type').html(data.id_type);
            $('#show_mature_size').html(data.mature_size);
            $('#show_hardiness_zone').html(data.hardiness_zone);
            $('#show_light').html(data.light);
            $('#show_water').html(data.water);
            $('#show_temperature').html(data.temperature);
            $('#show_soil').html(data.soil);
            $('#show_soil_ph').html(data.soil_ph);
            $('#show_flower_color').html(data.flower_color);
            $('#show_special_features').html(data.special_features);
            $('#show_image').attr('src', $('#show_image').data('url')+data.image);
        })
    });

    $('.btnEdit').click(function() {
        var id = $(this).data('id');
        $.get('/admin/succulent/edit/' + id, function(data) {
            $('.modal-title').html("Edit Succulent");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#origin').val(data.origin);
            $('#description').val(data.description);
            $('#family').val(data.id_family);
            $('#type').val(data.id_type);
            $('#mature_size').val(data.mature_size);
            $('#hardiness_zone').val(data.hardiness_zone);
            $('#light').val(data.light);
            $('#water').val(data.water);
            $('#temperature').val(data.temperature);
            $('#soil').val(data.soil);
            $('#soil_ph').val(data.soil_ph);
            $('#flower_color').val(data.flower_color);
            $('#special_features').val(data.special_features);
            $('#image').val(data.image);
        })
    });

    $('#btnAdd').click(function() {
        $('.modal-title').html("Add Succulent");
        $('#modal-default').modal('show');
        $('#id').val('');
        $('#name').val('');
        $('#origin').val('');
        $('#description').val('');
        $('#family').val('');
        $('#type').val('');
        $('#mature_size').val('');
        $('#hardiness_zone').val('');
        $('#light').val('');
        $('#water').val('');
        $('#temperature').val('');
        $('#soil').val('');
        $('#soil_ph').val('');
        $('#flower_color').val('');
        $('#special_features').val('');
        $('#image').val('');
    });
</script>
@endsection