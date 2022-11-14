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
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Original Price</th>
                                <th>Seller Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $key => $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>
                                    <img src="{{ $product->thumbnail }}" width="120" />
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->original_price }}</td>
                                <td>{{ $product->seller_stock }}</td>
                                <td width="15%" class="text-center" style="font-size: 2rem">
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#sendMessageModalId{{ $product->id }}">
                                        <i class="ri-send-plane-fill"></i> 
                                    </a>
                                    <a class="btn btn-success" href="@"><i
                                            class="far fa-check-circle "></i></a>

                                </td>
                                <div class="modal fade" id="sendMessageModalId{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="sendMessageModalId{{ $product->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sendMessageModalId{{ $product->id }}Label">
                                                    Send
                                                    alert to site {{ $product->site_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="mb-3">
                                                        <label for="message-text"
                                                            class="col-form-label">Message:</label>
                                                        <textarea class="form-control"
                                                            id="message-text-{{ $product->id }}""
                                                            rows="
                                                            6">Cảnh báo vi phạm bản quyền theme Wordpress từ Webmaster Việt Nam. Chúng tôi đã phát hiện website {{ $product->site_name }} đã sử dụng theme clone mà chưa có được sự cho phép từ chúng tôi. Vui lòng liên hệ lại với Webmaster Việt Nam qua SĐT 090.256.8666 để được giải quyết.</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary sendAlertMessageBtn"
                                                    data-id="{{ $product->id }}">Send message</button>
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
                                    {{ $products->withQueryString()->links('vendor.pagination.bootstrap-4') }}
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