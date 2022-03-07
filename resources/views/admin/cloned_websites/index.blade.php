@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cloned Websites</h4>
                <p class="card-title-desc">
                    <i>" No pain, no gain "</i>
                </p>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ Session::get('success') }}</strong>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Site Name</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <th>Tracked Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clonedWebsites as $key => $site)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="https://{{ $site->site_name }}" target="_blank">{{ $site->site_name }}</a>
                                </td>
                                <td>
                                    <span>{{ $site->ip_address }}</span>
                                </td>
                                <td>
                                    @if($site->status == 1)
                                    <button class="btn btn-sm btn-success btn-rounded">Active</button>
                                    @else
                                    <button class="btn btn-sm btn-danger btn-rounded">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    {{ $site->created_at->format('H:i:s d-m-Y') }}
                                </td>
                                <td width="15%" class="text-center" style="font-size: 2rem">
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#sendMessageModalId{{ $site->id }}">
                                        <i class="ri-send-plane-fill"></i> 
                                    </a>
                                    @if($site->status == 1)
                                    <a class="btn btn-danger" href="{{ route('update_site', $site->id) }}"><i
                                            class="dripicons-wrong "></i></a>
                                    @else
                                    <a class="btn btn-success" href="{{ route('update_site', $site->id) }}"><i
                                            class="far fa-check-circle "></i></a>
                                    @endif

                                </td>
                                <div class="modal fade" id="sendMessageModalId{{ $site->id }}" tabindex="-1"
                                    aria-labelledby="sendMessageModalId{{ $site->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sendMessageModalId{{ $site->id }}Label">Send
                                                    alert to site {{ $site->site_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="mb-3">
                                                        <label for="message-text"
                                                            class="col-form-label">Message:</label>
                                                        <textarea class="form-control" id="message-text-{{ $site->id }}""
                                                            rows="6">Cảnh báo vi phạm bản quyền theme Wordpress từ Webmaster Việt Nam. Chúng tôi đã phát hiện website {{ $site->site_name }} đã sử dụng theme clone mà chưa có được sự cho phép từ chúng tôi. Vui lòng liên hệ lại với Webmaster Việt Nam qua SĐT 090.256.8666 để được giải quyết.</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary sendAlertMessageBtn" data-id="{{ $site->id }}">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Hasn't had data yet</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="float: right">
                                    {{ $clonedWebsites->withQueryString()->links('vendor.pagination.bootstrap-4') }}
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.sendAlertMessageBtn').click(function() {
                const alertMessage = $(`#message-text-${$(this).data('id')}`).val();
                const url = `/update-alert-message-site/${$(this).data('id')}`;
                $.ajax({
                    type: "PATCH",
                    url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        message: alertMessage,
                    },
                    success: function (response) {
                        console.log(response);
                        Swal.fire(
                            'Send alert message successfully !',
                            '',
                            'success'
                        );
                    },
                    error: function(err) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        })
                    }
                });
            });
        });
    </script>
@endpush