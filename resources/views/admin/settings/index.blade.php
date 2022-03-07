@extends('layout')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Settings</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active mb-2" id="v-pills-left-home-tab" data-bs-toggle="pill"
                                href="#v-pills-left-home" role="tab" aria-controls="v-pills-left-home"
                                aria-selected="true">
                                <i class="dripicons-home me-2 align-middle"></i> SMTP
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content mt-4 mt-sm-0">
                            <div class="tab-pane fade show active" id="v-pills-left-home" role="tabpanel"
                                aria-labelledby="v-pills-left-home-tab">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title">SMTP Mail Setting</h4>
                                                <p class="card-title-desc"></p>

                                                <form action="{{ route('update_settings') }}" method="POST" class="custom-validation">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <div>
                                                            <input type="email" name="smtp_email" class="form-control" required
                                                                data-parsley-minlength="6" placeholder="Email" value="{{ setting('smtp_email') }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">App Password</label>
                                                        <div>
                                                            <input type="password" name="smtp_password" class="form-control" required
                                                                data-parsley-minlength="6" placeholder="Password" value="{{ setting('smtp_password') }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Mail To</label>
                                                        <div>
                                                            <input type="text" name="mail_to" class="form-control" required
                                                               placeholder="Mail to" value="{{ setting('mail_to') }}"/>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p><b>Add CC Mail:</b> <i class="text-primary">webmaster@gmail.com, info@webmaster.com.vn</i></p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Subject</label>
                                                        <div>
                                                            <input type="text" name="mail_to_subject" class="form-control" required
                                                               placeholder="Mail to subject" value="{{ setting('mail_to_subject') }}"/>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light me-1">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<!-- parsleyjs -->
<script src="assets/libs/parsleyjs/parsley.min.js"></script>
<!-- validation init -->
<script src="assets/js/pages/form-validation.init.js"></script>

<script src="assets/js/app.js"></script>
@endpush