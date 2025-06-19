@if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-dismissible fade show  rounded mt-1" role="alert">
        <strong>{{ $msg }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            &times;
        </button>
    </div>
@endif


@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show  rounded mt-1" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            &times;
        </button>
    </div>
@endif


@if (session('resent'))
    <div class="alert alert-success alert-dismissible fade show rounded mt-1" role="alert">
        <strong> تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            &times;
        </button>
    </div>
@endif
