<div id="communityModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Communities</h4>
            </div>
            <div class="modal-body">
                <form method="post" role="form" id="communityForm" class="login-form fade-in-effect" action="{{ route('users.communities')}}">
                    <div class="errors-container">

                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <ul>
                        @foreach($communities as $community)
                        <li><input type="checkbox" name='communities[]' value="{{$community->id}}" />{{$community->name}}</li> 
                        @endforeach
                    </ul>

                    <button type="submit" class="btn btn-primary text-left">
                        Save List
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
