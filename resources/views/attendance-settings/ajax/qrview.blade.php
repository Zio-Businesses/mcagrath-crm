


<link rel="icon" type="image/png" sizes="16x16" href="{{ companyOrGlobalSetting()->favicon_url }}">



<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="card card-success text-center">

    <div class="card-body">
        <div class="col-lg-12 alert-box">
            <figure class="icon">
                <img src="{{ asset('img/thumbup.png') }}" alt="customer-feedback" class="img-fluid" style="width: 52px; height: auto;transform: rotate(-21deg);">
            </figure>

            {{-- <h1 class="alert alert-success text-center">
                {{ $message }}<br>
                {{ now()->format('h:i A') }} <br>

            </h1> --}}
{{-- @dd($message) --}}

@if(isset($outtimeDate) && isset($totalWorkingTime))
<div class="card-body">
    <h5 class="card-title">{{ $message }}</h5>
    <p class="card-text">Clock out At - <time>{{ $outtimeDate }}</time></p>
    <p class="card-text">Total Working Time: {{ $totalWorkingTime }}</p>
</div>
@else
<div class="card-body">
    @if($message == 'Maximum check-ins reached.')
        <h5 class="card-title">{{ $message }}</h5>
    @else
        <h5 class="card-title">{{ $message }}</h5>
        <p class="card-text">Clock In At - <time>{{ $time }}</time></p>
        {{-- Additional content --}}
    @endif
</div>
@endif


            <a href="{{ route('dashboard') }}" class="btn">Go to Dashboard<img src="share.png" alt="" style="filter: contrast(0.1);"></a>
        </div>

    </div>


</div>



<style>
    body{
        background: #f2f4f7;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .card-success{
        width: 100%;
        max-width: 600px;
        margin: auto 10px;
        background: #fff;
        border: 4px solid #ffc200;
        border-radius: 16px;
        position: relative;
    }

    .card-body{
        padding: 50px 20px 10px 20px;
    }
    .card-title{
        font-size: 30px;
        font-weight: 500;
        color: #000;
        margin: 20px;
    }
    .card-text{
        background: #eee;
        padding: 4px 20px;
        border-radius: 4px;
        font-size: 18px;
        font-weight: 500;
        width: 371px;
        max-width: 100%;
        margin: auto;
        margin-bottom: 20px;
    }
    .card-success .btn{
        font-size: 16px;
        font-weight: 400;
        color: #ccc;
        display: inline-block;
        margin-top: 30px;
    }

    @media screen and (max-width: 600px) {
        .card-body{padding: 10px 0 0 0;}
        .card-title{font-size: 18px;}
        .card-text{font-size: 12px; width: 190px;}
    }

</style>

<script>
    @if (session('success'))
            Swal.fire({
                icon: 'success',
                text: '{{ session('success') }}',
                toast: true,
                position: "top-end",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                },
                showClass: {
                    popup: "swal2-noanimation",
                    backdrop: "swal2-noanimation",
                },
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                text: '{{ session('error') }}',
                toast: true,
                position: "top-end",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                },
                showClass: {
                    popup: "swal2-noanimation",
                    backdrop: "swal2-noanimation",
                },
            });
        @endif
</script>
