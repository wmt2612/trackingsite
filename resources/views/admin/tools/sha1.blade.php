@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sha1 Tool</h4>
                <p class="card-title-desc">Encrypt</p>
                <form method="GET" action="{{ route('tools.sha1') }}" class="form-group">
                    <div style="width: 80%">
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control me-auto " type="text" @if(request()->has('text_encrypt'))
                                value="{{ request()->get('text_encrypt') }}" @endif name="text_encrypt" 
                                placeholder="Add your text here..."
                                aria-label="Add your text here...">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control me-auto" type="number" @if(request()->has('numbers_encrypt'))
                                value="{{ request()->get('numbers_encrypt') }}" @endif name="numbers_encrypt"
                                placeholder="Numbers of encrypt"
                                aria-label="Numbers of encrypt">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary">Encrypt</button>
                            </div>
                        </div>
                    </div>
                </form>
                @if(request()->has('text_encrypt'))
                <div class="mt-3">
                    <h5>Result: </h5>
                    <p class="h5 text-primary" id="sha1-encrypt-result">{{ $valueEncrypt }}</p>
                    <button class="btn btn-info mt-2" id="btn-copy">Copy</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#btn-copy').click(function() {
            copyToClipboard('#sha1-encrypt-result');
            $(this).html('Copied');
            setTimeout(() => {
                $(this).html('Copy');
            }, 3000);
        });
    });

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>
@endpush