<?php $businesses = App\Business::where('user_id', $user->id)->get(); ?>
@foreach ($businesses as $business)
    <form method="POST" action="{{ url('/validar')}}">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" name="modo" value="select_empresa">
        <input type="hidden" name="business_id" value="{{$business->id}}">
        <button type="submit" class='btn btn-outline-dark btn-block'>
            <div class='row m-1'>
                <div class='squareElementContainer squareSizeS'>
                    <img src="{{$business->getBusinessImg()}}">
                </div>
                <div class='align-self-center h5 p-2 text-white'>
                    {{$business->nombre}}
                </div>
            </div>
        </button>
    </form><br>
@endforeach
<script>
    function submit(form) {
        form.submit();
    }
</script>
