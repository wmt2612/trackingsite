@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cloned Websites</h4>
                <p class="card-title-desc">Use <code>.table-striped</code> to add zebra-striping to any table row within
                    the <code>&lt;tbody&gt;</code>.</p>

                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Site Name</th>
                                <th>Status</th>
                                <th>Tracked Date</th>
                                <th>Action</th>
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
                                    @if($site->status == 1)
                                    <button class="btn btn-sm btn-success btn-rounded">Active</button>
                                    @else
                                    <button class="btn btn-sm btn-danger btn-rounded">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    {{ $site->created_at }}
                                </td>
                                <td>
                                    <a class="btn btn-primary">Details</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No data</td>
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