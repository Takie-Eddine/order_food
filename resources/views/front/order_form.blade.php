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

                                            <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">التاريخ</label>
													<input type="date" class="form-control" name="date" id="date" placeholder="" value ="{{old('date')}}">
												</div>
											</div>

                                            <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">رقم الطلب</label>
													<input type="text" class="form-control" name="refrence" id="refrence" placeholder="" value ="{{old('refrence')}}">
												</div>
											</div>

                                            <div class="col-md-12 row" >
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="food">الوجبة </label>
                                                        <input type="text" class="form-control" name="food" id="food" placeholder="" value ="{{old('food')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="employe">الاشخاص </label>
                                                        <select class="form-control select2" multiple="multiple"  name="persone[]">
                                                            <option value="">Choose</option>
                                                            @isset($persones)
                                                                @foreach ($persones as $persones)
                                                                    <option value="{{$persones->name}}">{{$persones->name}}</option>
                                                                @endforeach
                                                            @endisset
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="email">السعر</label>
                                                        <input type="text" class="form-control" name="price" id="" placeholder="" value = "{{old('price')}}">
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="email">التوصيل</label>
                                                        <input type="text" class="form-control" name="delivery" id="" placeholder="" value = "{{old('delivery')}}">
                                                    </div>
                                                </div> --}}
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
        <script>
             $(function(){
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
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



	</body>
</html>
