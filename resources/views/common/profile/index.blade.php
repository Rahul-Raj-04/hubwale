@extends('welcome.app')
@section('content')
<div class="d-flex justify-content-center">
	<div class="col-lg-8 card">
		<div class="card-body p-2">
			<!-- ROW-1 OPEN -->
			<div class="row" id="user-profile">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<a href="{{route('profile.edit', $user->id)}}" class="btn btn-sm btn-primary profile-edit-button">
								<i class="fa fa-pencil me-1"></i>Edit
							</a>
							<div class="profile-cover__img">
								<div class="profile-img-1">
									<img src="{{ $user->image ? $user->image : Avatar::create($user->name)->toBase64() }}" alt="img">
								</div>
								<div class="profile-img_content text-dark text-start">
									<div class="text-dark">
										<h3 class="h3 mb-2">{{ $user->name }}</h3>
										<h5 class="text-muted">{{ $user->company ? $user->company->company_name : ''}}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
	
			{{-- Contact details --}}
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card panel-theme">
							<div class="card-header">
								<div class="float-start">
									<h3 class="card-title">Contact</h3>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="card-body no-padding">
								<ul class="list-group no-margin">
									<li class="list-group-item d-flex ps-3">
										<div class="social social-profile-buttons me-2">
											<a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
										</div>
										<a href="javascript:void(0)" class="my-auto">{{ $user->email }}</a>
									</li>
									@if($user->company && $user->company->website)
										<li class="list-group-item d-flex ps-3">
											<div class="social social-profile-buttons me-2">
												<a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-globe"></i></a>
											</div>
											<a href="{{ $user->company->website }}" class="my-auto" target="_blank">{{ $user->company->website }}</a>
										</li>
									@endif
									<li class="list-group-item d-flex ps-3">
										<div class="social social-profile-buttons me-2">
											<a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
										</div>
										<a href="javascript:void(0)" class="my-auto">{{ $user->mobile }}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- Contact details end --}}
	
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Plans</div>
						</div>
						<div class="card-body">
							@if($user->user_plan)
							<div class="row">
								<div class="col-sm-6">
									<div>
										<span class="fw-semibold text-dark">Name</span> 
										<p>
											{{ $user->user_plan->plan->name }}
										</p>
									</div>
									
									<div class="mt-5">
										<span class="fw-semibold text-dark">Description</span>
										<p>
											{{ $user->user_plan->plan->description }}
										</p>
									</div>
	
									<div class="mt-5">
										<span class="fw-semibold text-dark">Price</span>
										<p>
											{{ $user->user_plan->plan->monthly_price ? $user->user_plan->plan->monthly_price : $user->user_plan->plan->yearly_price }}
										</p>
									</div>
	
									<div class="mt-5">
										<span class="fw-semibold text-dark">Image download limit</span>
										<p>
											{{ $user->user_plan->plan->fi_download_limit }}
										</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div>
										<span class="fw-semibold text-dark">Plan type</span>
										<p>
											{{ $user->user_plan->plan->festival_image ? 'Festival image' : '' }}
										</p>
									</div>
									
									<div class="mt-5">
										<span class="fw-semibold text-dark">Watermark</span>
										<p>
											{{ $user->user_plan->plan->fi_watermark ? 'Yes' : 'No' }}
										</p>
									</div>
	
									<div class="mt-5">
										<span class="fw-semibold text-dark">Ad</span> 
										<p>
											{{ $user->user_plan->plan->fi_ad ? 'Yes' : 'No' }}
										</p>
									</div>
	
									<div class="mt-5">
										<span class="fw-semibold text-dark">Your downloads</span> 
										<p>
											{{ $user->user_plan->usage_plan->fi_downloads}}
										</p>
									</div>
								</div>    
							</div>   	
							@else 
								You don't have plan yet.
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
</div>
@endsection
@section('customCss')
<style>
	@media (max-width: 347px)
	{
		.profile-cover__img {
			margin-right: 4%;
		}

		.profile-cover__img .profile-img_content {
			margin-top: 0px !important;
			text-align: center !important;
			display: block !important;
		}

		.profile-edit-button {
			float: unset !important;
		}
	}

	@media only screen and (max-width: 460px){
		.profile-cover__img .profile-img-1 > img {
			margin-left: -1% !important;
		}
	}

	.profile-cover__img {
	  	position: relative !important;
	  	top: unset !important;
	  	left: 2% !important;
	}

	.profile-cover__img .profile-img-1 > img {
  		margin-top: unset !important;
	}

	.profile-cover__img .profile-img_content {
		margin-top: 41px;
		display: flex;
	}

	.profile-edit-button {
		float: right;
	}
</style>
@endsection