<div id="pollEditOptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content" ng-controller="PollInfoCtrl">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit my Option</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" ng-submit="saveProductInfo(pollOption)">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="form-group">
                        <label for="" class="label-control col-lg-5">Product URL</label>
                        <div class="col-lg-7"><input type="text" ng-model="pollOption.product_url" class="form-control" /></div>
                    </div>

                    <div class="form-group">
                        <label for="" class="label-control col-lg-5">Product Name</label>
                        <div class="col-lg-7"><input type="text" ng-model="pollOption.title" class="form-control" /></div>
                    </div>

                    <div class="form-group">
                        <label for="" class="label-control col-lg-5">Product Picture</label>
                        <div class="col-lg-3">
                            <div class="thumbnail">
                                <img ng-src="<%pollOption.image_url%>" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-2"><a href="" ng-click="changePollPicture()" id="change_picture" class="btn btn-default btn-sm">Change Picture</a></div>
                    </div>

                    <div class="form-group">
                        <label for="" class="label-control col-lg-5">Product Description</label>
                        <div class="col-lg-7"><textarea class="form-control" ng-model="pollOption.description"></textarea></div>
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