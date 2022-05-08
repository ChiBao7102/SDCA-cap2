<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    {{-- <link rel="stylesheet" href="product.css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div style="text-align: center">
                <h3>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</h3>
                <h3>Độc lập - Tự do - Hạnh phúc</h3>
                <h4>---------------</h4>
            </div>
            <div style="text-align: center">
                <h2>HỢP ĐỒNG THUÊ XE TỰ LÁI</h2>
                <h4>(Số:......../HĐCTXTL)</h4>
            </div>

            <div>
                <div class="tenant">
                    <h5>Bên cho thuê (Bên A):</h5>
                    <ul>
                        <li>Người đại diện: ..............................<span>Chức vụ:.....................</span>
                        </li>
                        <li>dadadad chỉ:..........................................Code nhậnv </li>
                        <li>Điện thoại:.......................................Code nhap</li>
                        <li>Tài khoản số:.....................................</li>
                    </ul>
                </div>
                <div class="renter">
                    <h5>Bên thuê xe (Bên B):</h5>
                    <ul>
                        <li>Người đại diện: ..............................<span>Chức vụ:.....................</span>
                        </li>
                        <li>Địa chỉ:..........................................Code nhậnv </li>
                        <li>Điện thoại:.......................................Code nhap</li>
                        <li>Tài khoản số:.....................................</li>
                    </ul>
                </div>
               <p>Sau khi bàn bạc thống nhất, cả hai bên cùng đồng ý các điều kiện và điều khoản được quy định trong hợp đồng như sau:</p>
               <div class="option1">
                   <h4>ĐIỀU 1: NỘI DUNG CÔNG VIỆC</h4>
                   <ul>
                       <li>Bên A đồng ý cho bên B thuê xe ô tô theo hình thức tự lái. Xe ôtô Bên A đảm bảo là xe mới, chất lượng tốt, toàn bộ máy, bản táp lô điện và các linh kiện khác đều được dán tem bảo đảm.</li>
                       <li>Thời gian thuê xe: Từ ngày …………………..đến hết ngày ……………..</li>
                       <li>Địa điểm giao nhận xe: Code nhập vô</li>
                   </ul>
               </div>


            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>





<body>
    <div class="pd-wrap">
        <div class="container">
            <div class="heading-section">
                <h2>Product Details</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="slider" class="owl-carousel product-slider">

                        @foreach ($cars as $car)
                            @foreach ($car->images as $img)
                                <div class="item">
                                    <img src="{{ asset($img->img_car) }}" />
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                    <div id="thumb" class="owl-carousel product-thumb">
                        @foreach ($cars as $car)
                            @foreach ($car->images as $img)
                                <div class="item">
                                    <img src="{{ asset($img->img_car) }} " style="height: 76px;margin-top: 20px" />
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Thông tin xe</h4>

                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($cars as $car)
                                @php
                                    $id_car = $car->id;
                                @endphp
                                <div class="form-group">
                                    <label>Tên xe:</label>
                                    <label class="name">{{ $car->name }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Loại xe:</label>
                                    <label class="model">{{ $car->model }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Số ghế:</label>
                                    <label class="carrier_pep">{{ $car->carrier_pep }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Giá thuê:</label>
                                    <label class="price">{{ number_format($car->price) }}
                                        VND</label>
                                </div>
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            @foreach ($user as $tenant)
                                <div class="form-group">
                                    <label>Sđt liên hệ:</label>
                                    <label class="phone">{{ $tenant->phone }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <label class="address">{{ $tenant->address }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
            <div class="product-info-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                            aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                            aria-controls="review" aria-selected="false">Đăng ký thuê</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                        error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="review-heading">REVIEWS</div>
                        <p class="mb-20">There are no reviews yet.</p>
                        <form method="post" id="upload_form" enctype="multipart/form-data"
                            action="{{ route('transaction.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên đầy đủ:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="id_number">Số CMND/CCCD:</label>
                                <input type="text" class="form-control" id="id_number" name="id_number">
                            </div>
                            <div class="form-group">
                                <label for="id_driver_license">Bằng lái xe (ID):</label>
                                <input type="text" class="form-control" id="id_driver_license"
                                    name="id_driver_license">
                            </div>
                            <div class="form-group">
                                <label for="img_id">Hình chụp minh chứng CMND/CCCD:</label>
                                <input type="file" class="form-control" id="img_id" name="img_id[]" accept="image/*"
                                    multiple>
                            </div>
                            <div class="form-group">
                                <label for="img_license">Hình chụp minh chứng bằng lái xe:</label>
                                <input type="file" class="form-control" id="img_license" name="img_license[]"
                                    accept="image/*" multiple>
                            </div>
                            <input type="text" hidden name="id_car" id="id_car" value="{{ $id_car }}">

                            <button type="submit" class="btn btn-primary update">Đăng ký</button>
                            {{-- <button type="submit" class="btn btn-primary upload"
                               >Accept</button> --}}
                        </form>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Mẫu hợp đồng
                          </button>
                    </div>
                </div>
            </div>

            <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project
                at
                <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var slider = $("#slider");
        var thumb = $("#thumb");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;
        slider.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        }).on('changed.owl.carousel', syncPosition);
        thumb
            .on('initialized.owl.carousel', function() {
                thumb.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                item: 4,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage,
                navText: [
                    '<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ],
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            thumb
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumb.find('.owl-item.active').length - 1;
            var start = thumb.find('.owl-item.active').first().index();
            var end = thumb.find('.owl-item.active').last().index();
            if (current > end) {
                thumb.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                thumb.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                slider.data('owl.carousel').to(number, 100, true);
            }
        }
        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            slider.data('owl.carousel').to(number, 300, true);
        });


        $(".qtyminus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    now--;
                }
                $(".qty").val(now);
            }
        })
        $(".qtyplus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                $(".qty").val(parseInt(now) + 1);
            }
        });
    });
</script>
