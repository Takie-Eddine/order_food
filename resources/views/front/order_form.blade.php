<!doctype html>
<html lang="en">
  <head>
  	<title>Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('assets/persone/css/style.css')}}">



    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				{{-- <div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registration Form </h2>
				</div> --}}
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
								    {{-- <img width="200px" src="{{asset('assets/Image/logo.png')}}" > --}}
									<!--<h3 class="mb-4">Get in touch</h3>-->
									<br>
										<br>
									<div id="form-message-warning" class="mb-4">

                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <h5>Error Occured!</h5>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @include('alerts.errors')
                                    @include('alerts.success')
									<form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="row">

                                            <!--begin::Repeater-->
                                                <div id="kt_docs_repeater_nested">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="day">
                                                            <div data-repeater-item>
                                                                <div class="form-group row mb-12">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">التاريخ</label>
                                                                        <input type="date" class="form-control " class="form-control" name="date"  value ="{{old('date')}}" placeholder="Pick Date" required/>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="inner-repeater">
                                                                            <div data-repeater-list="meal" class="mb-5">
                                                                                <div data-repeater-item>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">الوجبة</label>
                                                                                        <div class="input-group pb-3">
                                                                                            <input type="text" class="form-control" name="food" placeholder=" Enter Food" value ="{{old('food')}}" required />
                                                                                            <button class="btn btn-outline-danger" data-repeater-delete type="button">
                                                                                                <i class="fa fa-trash-o"> </i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">الاشخاص</label>
                                                                                        <div>
                                                                                            <select class="form-control select " id="select-multi"  data-placeholder="الاشخاص"  name="persone" required>
                                                                                                <option value=""></option>
                                                                                                @forelse ($persones as $persone)
                                                                                                    <option value="{{$persone->name}}">{{$persone->name}}</option>
                                                                                                @empty
                                                                                                @endforelse
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="label" for="email">السعر</label>
                                                                                        <input type="text" class="form-control" name="price" id="" placeholder="Enter Price" value = "{{old('price')}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-outline-secondary" data-repeater-create type="button">
                                                                                <i class="ki-duotone ki-plus fs-5"></i>
                                                                                اضف اشخاص
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-outline-danger">
                                                                            <i class="fa fa-trash-o"> </i>
                                                                            حذف السطر
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--end::Form group-->

                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-outline-primary">
                                                            <i class="fa fa-plus-square-o"></i>
                                                            اضف سطر
                                                        </a>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->

                                            <div class="col-md-12 row" >
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="email">صورة الفاتورة</label>
                                                        <input type="file" class="form-control" name="image" required >
                                                    </div>
                                                </div>
                                            </div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Submit" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>

										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<!--<img src="{{asset('assets/Image/logo.png')}}" >Let's get in touch</img>-->
									<!--<p class="mb-4">We're open for any suggestion or just to have a chat</p>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-start">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-map-marker"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-phone"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-paper-plane"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-globe"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Website</span> <a href="#">yoursite.com</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('assets/persone/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/persone/js/popper.js')}}"></script>
        <script src="{{asset('assets/persone/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/persone/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/persone/js/main.js')}}"></script>
        <script src="{{asset('assets/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
        <script>
            $(function(){
                function matchStart(params, data) {

                    if ($.trim(params.term) === '') {
                        return data;
                    }


                    if (typeof data.children === 'undefined') {
                        return null;
                    }


                    var filteredChildren = [];
                    $.each(data.children, function (idx, child) {
                        if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                            filteredChildren.push(child);
                        }
                    });


                    if (filteredChildren.length) {
                        var modifiedData = $.extend({}, data, true);
                        modifiedData.children = filteredChildren;

                        return modifiedData;
                    }

                    return null;
                }

                $(".select2").select2({
                    tags: true,
                    closeOnSelect: false,
                    minimumResultsForSearch: Infinity,
                    matcher: matchStart
                });

            });
        </script>

        <script>

        </script>

        <script>
            $('#kt_docs_repeater_nested').repeater({
                repeaters: [{
                    selector: '.inner-repeater',
                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                }],

                show: function () {
                    $(this).slideDown();

                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }

            });
        </script>


	</body>
</html>
