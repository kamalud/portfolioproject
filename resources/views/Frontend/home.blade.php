<!DOCTYPE html>
<html>
<header>
	<meta name="viewport" content="widht=device-width ,initial-scale=1,0">
	<title>My fortfolio</title>

	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/font/font.css">
	<script type="text/javascript" src="{{asset('frontend/')}}/js/jquery.js"></script>
</header>
<body>
<div id="container">
	 <header>
	 	<div id="logo">
			<h2>{{$about->name}}</h2>
	 		<h4>{{$about->title}}</h4>
	 	</div>
		<div class="socila_icon_container">

			<span class="socila_text">
              <button class="pulse_button" id="share" ><i class="fa fa-share"></i>
				</button>
			</span>

			<ul class="social_icon" id="facebook">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			</ul>

		</div>
	 </header>

	 <section id="content">
	 	<div id="profile">
	 		<div class="about">
	 			<div class="photo_inner">
					<ul>
						<li><img src="{{url('/uploads/profile/'.$user->image)}}"/></li>
					</ul>
	 			</div>
				<div class="paragraph">
					<h1>{{$about->name}}</h1>
					<h3>{{$about->title}}</h3>
					<p>
                        {!!$about->description !!}
					 </p>
				</div>
	 		</div>

			<ul class="personal_info">
				<li><label>name</label><span>{{$biodata->name}}</span></li>
				<li><label>mobile</label><span>{{$biodata->mobile}}</span></li>
				<li><label>Birthday</label><span>{{$biodata->birthday}}</span></li>
				<li><label>address</label><span>{{$biodata->address}}</span></li>
				<li><label>Nationalty</label><span>{{$biodata->nationality}}</span></li>
				<li><label>Relisgim</label><span>{{$biodata->relisgim}}</span></li>
				<li><label>Email</label><span>{{$biodata->email}}</span></li>
				<li><label>Gender</label><span>{{$biodata->gender}}</span></li>
			</ul>



	 	</div>
	 </section>

	 <nav class="menu">
	 	<ul class="tabs">
			<li class="tmenu"><a href="#profile" class="tab-profile active"><i class="fa fa-user"></i>PROFILE</a></li>
			<li class="tmenu"><a href="#resume" class="tab-profile"><i class="fa fa-wpexplorer"></i>RESUME</a></li>
			<li class="tmenu"><a href="#portfolio" class="tab-profile" ><i class="fa fa-eercast"></i>PORTFOLIO</a></li>
	 		<li class="tmenu"><a href="#contact" class="tab-profile" ><i class="fa fa-telegram"></i>CONTACT</a></li>
	 	</ul>
	 </nav>

	 <section id="resume" class="content">
		 <div class="color_btn">
            <ul>
				
			    <button id="setting"><i class="fa fa-cog fa-spin"></i></button>
                  <div class="hideShow">
					  <button class="btn btn-info" id="blue_btn" ></button>
					  <button class="btn btn-primary" id="primary_btn"></button>
					  <button class="btn btn-danger" id="danger_btn"></button>
					  <button class="btn btn-warning" id="warning_btn"></button>
				  </div>
			</ul>
		 </div>
		 <div class="row">
			 <div class="col-md-6 col-lg-6 col-6">
                <div class="my_background">
					<div class="background">
						<h3>{{$about->name}}</h3>
						<h6>{{$about->title}}</h6>
						<p>{!! $about->description !!}</p>
					</div>
					<div class="Address">
						<ul>
							<li><a href="#" target="_blank"><i class="fa fa-phone"></i><span>{{$biodata->mobile}}</span></a></li>
							<li><a href="#" target="_blank"><i class="fa fa-envelope"></i><span>{{$biodata->email}}</span></a></li>
							<li><a href="#" target="_blank"><i class="fa fa-map-marker"></i><span>{{$biodata->address}}</span></a></li>
						  </ul>
					</div>
					<div class="expart">
						<h3>Experence</h3>
						@foreach($abouts as $data)
						<div class="col-md-12 col-lg-12 col-12">
							<h4>{{$data->date}}</h4>
							<h5>{{$data->title}}</h5>
							<p>{!! $data->description !!}</p>
						</div>
						@endforeach
					</div>
				</div>
			 </div>
			 <div class="col-md-6 col-lg-6 col-6">
				<div class="skills">
					<div class="my_skil">
						<ul>ss
							@foreach($skills as $skill)
							<li>{{ $skill->name }}</li>
							@endforeach
						</ul>
						<div class="skill_bar">
							<h3>My Skill</h3>
						</div>
						<div class="mY_experence">
						@foreach($skills as $skill)
							<div class="row">
								<label class="label" class="col-md-4">{{ $skill->name }}</label>
								<div class="col-md-8">
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: {{$skill->parsent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$skill->parsent}}%</div>
									  </div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
					<div class="intersted">
						<h3>intersted</h3>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-plane" aria-hidden="true"></i><br>
								<label for="">Travel</label>
							</div>

							<div class="col-md-4">
								<i class="fa fa-headphones" aria-hidden="true"></i><br>
								<label for="">Music</label>
							</div>

							<div class="col-md-4">
								<i class="fa fa-file-video-o" aria-hidden="true"></i><br>
								<label for="">Video</label>
							</div>

							<div class="col-md-4">
								<i class="fa fa-bicycle" aria-hidden="true"></i><br>
								<label for="">Cyckling</label>
							</div>

							<div class="col-md-4">
								<i class="fa fa-spoon" aria-hidden="true"></i><br>
								<label for="">Cooking</label>
							</div>

							<div class="col-md-4">
								<i class="fa fa-pied-piper-alt" aria-hidden="true"></i><br>
								<label for="">Sports</label>
							</div>
						</div>

						
					</div>
					<div class="eduction">
							<h3>Educations</h3>
							<div class="col-md-12 col-lg-12 col-12">
								<table class="table table-hover table-bordered">
									<tr>
										<th>Exam name</th>
										<th>Group name</th>
										<th>Board name</th>
										<th>Exam Result</th>
									</tr>
									@foreach($educations as $education)
									<tr>
										<td>{{$education->name}}</td>
										<td>{{$education->group}}</td>
										<td>{{$education->board}}</td>
										<td>{{$education->result}}</td>
									</tr>
									@endforeach
								</table>
							</div>
					</div>
					<div class="usally">
						<div class="row">
							<div class="col-md-4">
								<img src="{{asset('frontend/')}}/images/qr.png" alt="">
							</div>
							<div class="col-md-8">
								<ul>
									<li><i class="fa fa-phone"></i><span>{{$biodata->mobile}}</span></li>
									<li><i class="fa fa-envelope"></i><span>{{$biodata->email}}</span></li>
									<li><i class="fa fa-map-marker"></i><span>{{$biodata->address}}</span></li>
								  </ul>
							</div>
						</div>
					</div>
				</div>

			 </div>
		 </div>
	 </section>


	 <section id="portfolio" class="content">
		<div class="container-fluied">
			<ul class="cat_filter" id="profile_filter">
				<li class="nav-item">
				  <a class="currect transtion"data-filter="*" href="#">All</a>
				</li>
			  @foreach($Portfolio as $data)
				<li class="nav-item">
					<a class="transtion"data-filter=".{{$data->category->name}}" href="#">{{$data->category->name}}</a>
				</li>
				@endforeach

			  </ul>

			  <div class="extra_text">
				  Some of the project i am proud with
			  </div>
			  <ul id="portfolio_list">
			  @foreach($Portfolios as $data)
				<li class="{{$data->category->name}} print">
				<a href="" class="folio">
					<img src="{{url('/uploads/portfolio/'.$data->image)}}" alt="">
					<h3 class="title">{{$data->name}}</h3>
				</a>
				</li>
				@endforeach



			  </ul>
		</div>
	 </section>
	 <span class="text-white text-center bg-primary"style="font-size:40px">{{($errors->has('email'))?($errors->first('email')):''}}</span>

	 <h3 class="text-success">{{Session::get('success')}}</h3>
	 <section id="contact" class="content">
		 <div class="container">
			 <div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116289.07204796349!2d88.5359747043212!3d24.380137953964343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefa96a38d031%3A0x10f93a950ed6f410!2z4Kaw4Ka-4Kac4Ka24Ka-4Ka54KeA!5e0!3m2!1sbn!2sbd!4v1636972187044!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen=""
				 loading="lazy"></iframe>
			 </div>
			  <div class="form">
				<h3>Contact me</h3>

				  <form action="{{route('contact.store')}}" method="post" id="quickForm">
					  @csrf
					<div class="row">
						<div class="col-md-4">
						  <label for="">First name</label>
						  <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="textHelp">
						  <span class="text-danger">{{($errors->has('first_name'))?($errors->first('first_name')):''}}</span>
						</div>
						<div class="col-md-4">
						  <label for="">Last name</label>
						  <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp">
						  <span class="text-danger">{{($errors->has('last_name'))?($errors->first('last_name')):''}}</span>
						</div>
						<div class="col-md-4">
						  <label for="">Phone number</label>
						  <input type="number" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">
						  <span class="text-danger">{{($errors->has('phone'))?($errors->first('phone')):''}}</span>
						</div>
						<div class="col-md-4">
						  <label for="">Email number</label>
						  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
						  <span class="text-danger">{{($errors->has('email'))?($errors->first('email')):''}}</span>
						</div>
						<div class="col-md-8">
						  <label for="">Your comment</label>
						  <textarea name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
						  <span class="text-danger">{{($errors->has('comment'))?($errors->first('comment')):''}}</span>
						</div>
					</div>
                    <div class="buuton">
						<input type="submit" class="btn btn-primary" value="Sign In">
						<button type="reset" class="btn btn-danger float-right">Reset</button>
					</div>
					  
				  </form>
			  </div>
		 </div>
	 </section>
	 <div class="gotoup">
		<h3><i class="fa fa-arrow-up"></i></h2>
	  </div>

<footer>
   <div class="">
   	copyright: Copy & copy 2021 {{$user->name}}
   </div>
</footer>
</div>



<script src="{{asset('frontend/')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('frontend/')}}/plugins/jquery-validation/additional-methods.min.js"></script>


<script type="text/javascript" src="{{asset('frontend/')}}/js/easyTabs.js"></script>
<script type="text/javascript" src="{{asset('frontend/')}}/js/isotop.js"></script>
<script type="text/javascript" src="{{asset('frontend/')}}/js/carofredsel.js"></script>
<script type="text/javascript" src="{{asset('frontend/')}}/js/custom.js"></script>
<script type="text/javascript" src="{{asset('frontend/')}}/js/bootstrap.min.js"></script>
<style>
	table tr th{
		color:white;
		text-transform:uppercase;
	}
	table tr td{
		color:white;
		text-transform:uppercase;
	}
</style>
<script type="text/javascript">
 $(document).ready(function () {
  
  $('#quickForm').validate({
    rules: {
      first_name: {
        required: true,
      },
	  last_name: {
        required: true,
      },
	  phone: {
        required: true,
      },
	  comment: {
        required: true,
      },
	  email: {
        required: true,
        email: true,
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      first_name: {
        required: "Please enter your First_name",
      },
	  last_name: {
        required: "Please enter your Last_name",
      },
	  phone: {
        required: "Please enter your Phone number",
      },
	  comment: {
        required: "Please enter your Comment",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>

