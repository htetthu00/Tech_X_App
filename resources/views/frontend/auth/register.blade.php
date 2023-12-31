@extends('frontend.layouts.app')

@section('content')
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2 b-heigh">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2" style="padding-top: 100px">
                                <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">Register</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item text-white">register</li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <div class="py-5 mx-2 my-5 row">
        <div class="card mx-auto rounded shadow col-md-6 col-sm-12">
            <div class="card-body p-4">
                <h2 class="my-2"><u>Register Form</u></h2>
                @include('frontend.layouts.page_info')
                <form action="{{ route('user.store') }}" class="form-v" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3 col-md-6 col-sm-12">
                            <label for="email" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3 col-md-6 col-sm-12">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" data-v-min-length="8" id="password1">
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="con-password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" id="con-password" data-v-equal="#password1" data-v-message="Password and Confirm Password does not match." data-v-min-length="8" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="gender">Gender <span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address"></textarea>
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" id="dob" name="dob" class="form-control w-100">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="profile">Profile</label>
                            <div class="custom-file">
                                <input type="file" name="profile" class="custom-file-input" id="profile">
                                <label class="custom-file-label" for="profile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg mt-4 mb-0">Sign up</button>
                    </div>
                </form>
                <div class="text-center pt-3 px-lg-2 px-1">
                    <p class="text-sm mx-auto">
                        Already have account?
                        <a href="{{ route('user.get.login') }}" class="text-primary text-gradient font-weight-bold">Log in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@push('script')
    <script>
        $(function () {
            $('#dob').datepicker({ footer: true, modal: true })
        });
    </script>
@endpush