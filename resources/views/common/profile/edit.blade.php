@extends('welcome.app')
@section('customCss')
	<style type="text/css">
		.camera-image {
		   	position: absolute;
  			top: 30px;
  			left: 27px;
  			width: 25px;
		}
	</style>
@endsection
@section('content')
<div class="d-flex justify-content-center">
	<div class="col-lg-8 card">
		<div class="card-body p-2">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Edit Profile</div>
							<div class="col-auto ms-auto d-print-none d-flex pe-0">
								<div class="btn-list">
									<a href="{{ route('profile.index') }}" class="btn btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
									<a href="{{ route('profile.index') }}" class="btn btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
								</div>
								<div class="btn-list">
									<label for="profileFormSubmit" class="btn btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save Profile</label>
									<label for="profileFormSubmit" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
								</div>                        
							</div>                        
						</div>
						<div class="card-body">
							<form action="{{route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">  
								@csrf
								@method('put')
								@error('image')
									<span class="alert alert-danger small wow flash">{{ $message }}</span>
								@enderror  
								<div class="text-center chat-image mb-5">
									<div class="avatar avatar-xxl chat-profile mb-3 brround">
										<input type="file" name="image" class="d-none" accept="image/png, image/jpeg, image/jpg" id="inputImage" onchange="loadFile(event)">
										<label for="inputImage" class="rounded-circle" style="cursor: pointer;">
											<img src="{{ asset('img/profile/cameras-clipart.png') }}" class="camera-image">
											<img alt="avatar" src="{{ $user->image ? $user->image : Avatar::create($user->name)->toBase64() }}" id="outputImage" class="brround" style="opacity: 0.5;">
										</label>
									</div>
									<div class="{{--main-chat-msg-name--}}">
										<a href="{{route('profile.index')}}">
											<h5 class="mb-1 text-dark fw-semibold">{{$user->name}}</h5>
										</a>
										<p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $user->company ? $user->company->company_name : ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="inputname">Name</label>
									<input type="text" name="name" class="form-control" id="inputname" value="{{ old('name') ? old('name') : $user->name }}" placeholder="Name" required>
									@error('name')
										<span class="text-danger small wow flash">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="inputnumber">Contact Number</label>
									<input type="number" name="mobile" class="form-control" value="{{ old('mobile') ? old('mobile') : $user->mobile }}" id="inputnumber" placeholder="Contact number" required>
									@error('mobile')
										<span class="text-danger small wow flash">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<input type="submit" class="d-none" id="profileFormSubmit">
								</div>
							</form>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<div class="card-title">Edit Password</div>
						</div>
						<div class="card-body">
							<form action="{{route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">  
								@csrf
								@method('put')
								<input name="EditPasswordForm" class="d-none">
								<div class="form-group">
									<label class="form-label">Current Password</label>
									<div class="wrap-input100 validate-input input-group" id="Password-toggle">
										<a href="javascript:void(0)" class="input-group-text bg-white text-muted">
											<i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
										</a>
										<input class="input100 form-control" type="password" name="current_password" placeholder="Current Password" autocomplete="current-password" required>
									</div>
									@error('current_password')
										<span class="text-danger small wow flash">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-label">New Password</label>
									<div class="wrap-input100 validate-input input-group" id="Password-toggle1">
										<a href="javascript:void(0)" class="input-group-text bg-white text-muted">
											<i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
										</a>
										<input class="input100 form-control" type="password" name="new_password" placeholder="New Password" autocomplete="new-password" required>
									</div>
									@error('new_password')
										<span class="text-danger small wow flash">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-label">Confirm Password</label>
									<div class="wrap-input100 validate-input input-group" id="Password-toggle2">
										<a href="javascript:void(0)" class="input-group-text bg-white text-muted">
											<i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
										</a>
										<input class="input100 form-control" type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="new-password" required>
									</div>
									@error('confirm_password')
										<span class="text-danger small wow flash">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<input type="submit" class="d-none" id="passwordFormSubmit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
    	</div>
    </div>
</div>
@endsection

@section('customJs')
	<script>
		var loadFile = function(event) {
			var image = document.getElementById('outputImage');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>
@endsection
