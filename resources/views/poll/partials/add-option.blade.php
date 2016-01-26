<div id="pollAddOptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content" ng-controller="PollInfoCtrl">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add an Option</h4>
            </div>
            <div class="modal-body">
                <form class="login-form fade-in-effect" ng-submit="getProductInfo()">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="form-group">
                        <label for="" class="label-control">Product URL</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control required" ng-model="product_url" placeholder="http://productwebsite.com" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-sm">Continue</button>
                        <button type="button" class="btn btn-warning btn-sm" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>