<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


{{-- {{ $errors }} --}}

@toastr_css
<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Car') }}
        </h2>

    </x-slot>
    <input type="text" hidden value="{{ Auth::user()->id }}" id="id-tenant">
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-time" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show alert-time" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Start modal show detail --}}
    <div class="modal fade" id="myModal">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail car</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="" id="fileUploadForm">
                        @csrf
                        <input type="hidden" id="id-car">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name-edit" name="name">
                        </div>
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" id="model-edit" name="model">
                        </div>
                        <div class="form-group">
                            <label for="license_plate">Number of carriers:</label>
                            <input type="text" class="form-control" id="license_plate-edit" name="license_plate">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price-edit" name="price">
                        </div>
                        <div class="form-group">
                            <label for="carrier_pep">Seats:</label>
                            <input type="text" class="form-control" id="carrier_pep-edit" name="carrier_pep">
                        </div>
                        <input type="hidden" id="user_id">
                        <button type="submit" class="btn btn-primary update-info" data-dismiss="modal">Accept</button>
                    </form>
                </div>
                <div class="img-hodel" style="display: flex; flex-wrap: wrap">
                    <h4>Hình xe của bạn</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End modal --}}


    {{-- Start modal update image --}}
    <div class="modal fade" id="myModalUpdate">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Image car</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <input type="text" hidden name="id-car" id="id-car">
                            <label for="img_car">Images:</label>
                            <input type="file" class="form-control" id="img_car" name="img_car[]" accept="image/*"
                                multiple>
                            <button type="submit" class="btn btn-primary update-img"
                                data-dismiss="modal">Accept</button>
                        </div>

                    </form>
                    <div class="show-img">

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{-- End modal --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Car</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('car.create') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p style="color: red"> {{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="model">Model:</label>
                                <input type="text" class="form-control" id="model" name="model"
                                    value="{{ old('model') }}">
                                @if ($errors->has('model'))
                                    <p style="color: red"> {{ $errors->first('model') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="license_plates">License plates:</label>
                                <input type="text" class="form-control" id="license_plates" name="license_plates"
                                    value="{{ old('license_plates') }}">
                                @if ($errors->has('licen_plates'))
                                    <p style="color: red"> {{ $errors->first('licen_plates') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <p style="color: red"> {{ $errors->first('price') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="carrier_pep">Number of carriers:</label>
                                <input type="text" class="form-control" id="carrier_pep" name="carrier_pep"
                                    value="{{ old('carrier_pep') }}">
                                @if ($errors->has('carrier_pep'))
                                    <p style="color: red"> {{ $errors->first('carrier_pep') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="img_car">Images:</label>
                                <input type="file" class="form-control" id="img_car" name="img_car[]" accept="image/*"
                                    multiple>
                            </div>
                            <input type="text" class="form-control" hidden id="user_id" name="user_id"
                                value="{{ Auth::user()->id }}">
                            <input type="text" class="form-control" hidden id="status" name="status" value="free">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-md-8">

                <div class="p-6 bg-white border-b border-gray-200 ">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>License plates</th>
                                    <th>Price</th>
                                    <th>Number of carriers</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $key => $car)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->license_plates }}</td>
                                        <td>{{ number_format($car->price) }} VND</td>
                                        <td style="text-align: center">{{ $car->carrier_pep }}</td>
                                        <td>
                                            @if ($car->status == 'free')
                                                <span class="badge badge-success" style="width: 50px">{{ $car->status }}</span>
                                            @else
                                                <span class="badge badge-warning" style="width: 50px">{{ $car->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="" class="btn btn-primary view" data-toggle="modal"
                                                data-target="#myModal" data-id="{{ $car->id }}">View</a>
                                            <a href="{{ route('car.destroy', ['id' => $car->id]) }}"
                                                class="btn btn-danger">
                                                Delete
                                            </a>
                                            <a href="" class="btn btn-info update" data-toggle="modal"
                                                data-target="#myModalUpdate" data-id="{{ $car->id }}">Update
                                                Image</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(".alert-time").fadeTo(1200, 500).slideUp(500, function() {
        $(".alert-time").slideUp(500);
    });
</script>
<script>
    $(document).ready(function() {
        $('.view').on('click', function() {
            var id = $(this).data('id');
            var img = ''
            $.ajax({
                url: '/car/showcar/' + id,
                type: 'get',
                success: function(res) {
                    $('#id-car').val(res.data.id)
                    $('#name-edit').val(res.data.name)
                    $('#model-edit').val(res.data.model)
                    $('#license_plate-edit').val(res.data.license_plates)
                    $('#price-edit').val(res.data.price)
                    $('#carrier_pep-edit').val(res.data.carrier_pep)
                    $('#user_id').val(res.data.user_id)
                    for (var i = 0; i <= res.data.images.length; i++) {
                        img += "<img src='" + res.data.images[i].img_car + "' >";
                        $('.img-hodel').html(img);
                    }
                }
            });
        })
        ///Ko đụng vô nữa ko nó buồn lỗi thì lại mệt
        $('.update-info').on('click', function(event) {
            event.preventDefault();
            var id = $('#id-car').val();
            var object = {
                'name': $('#name-edit').val(),
                'model': $('#model-edit').val(),
                'license_plates': $('#license_plate-edit').val(),
                'price': $('#price-edit').val(),
                'carrier_pep': $('#carrier_pep-edit').val(),
            };
            console.log(object)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/car/update/' + id,
                type: 'post',
                data: object,
                // contentType: "application/json",
                success: function() {
                    toastr.success('Update Success');
                    window.location.reload();
                }

            });
        });

        $('.update').on('click', function() {
            var id = $(this).data('id');
            var img = ''
            $.ajax({
                url: '/car/showcar/' + id,
                type: 'get',
                success: function(res) {
                    $('#id-car').val(res.data.id)

                    for (var i = 0; i <= res.data.images.length; i++) {
                        img += "<img src='" + res.data.images[i].img_car + "' >";
                        $('.show-img').html(img);
                    }
                }
            });
        });
        // $('.update-img').on('click', function() {
        //         var id = $('#id-car').val();
        //         var img = ''
        //         var object = {
        //             'name': $('#id-car').val(),
        //         };
        //         $.ajax({
        //                 url: '/car/updateImg/' + id,
        //                 type: 'post',
        //                 data: object
        //                 success: function() {

        //                 }
        //             }
        //         });
        // })





    });
</script>
@jquery
@toastr_js
@toastr_render
