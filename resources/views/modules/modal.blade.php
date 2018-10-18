<div class="modal fade" id="{{$nombre_modal}}" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <h4>{{$modal_title}}</h4>
                        </div>
                        <form class="form-inline" method="get" action="{{$modal_action}}">
                            <div class="form-row">
                                {{$modal_content}}
                            </div>
                            <button type="submit" class="btn btn-goppBtn btn-{{auth()->user()->loggedAs}} mx-3">{{$modal_button}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal"></div>
