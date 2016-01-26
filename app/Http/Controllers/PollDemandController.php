<?php

namespace App\Http\Controllers;

use App\Models\PollsDemand;
use App\Models\PollDemandsVote;
use App\Models\PollsDemandsDiscussion;
use Input;

class PollDemandController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function showPollVotes($slug, $id) {
        $poll = PollsDemand::find($id);
        return view('poll.index', compact('poll'));
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function pollCreate() {
        return view('poll.create');
    }

    public function demandCreate() {
        return view('poll.demand.create');
    }

    public function getProductInfo() {
        $product_url = Input::get('product_url');
        $ogInfo = \App\Helpers\UtilHelper::getUrlOgInfo($product_url);
        return response()->json($ogInfo);
    }

    public function store() {
        $user_id = \Auth::user()->id;
        $slug = str_slug(Input::get('title'));
        $poll = new PollsDemand();
        $poll->title = Input::get('title');
        $poll->default_image_url = Input::get('default_image_url');
        $poll->community_id = Input::get('community_id');
        $poll->owner_user_id = $user_id;
        $poll->slug = $slug;
        $poll->type = Input::get('poll_type');
        $poll->is_activated = true;
        $poll->save();

        $pollOptions = [];
        foreach (Input::get('pollOptions') as $pollOption) {
            if (isset($pollOption['title'])) {
                $pollOptions[] = array(
                    'polls_demand_id' => $poll->id,
                    'user_id' => $user_id,
                    'title' => $pollOption['title'],
                    'image_url' => $pollOption['image_url'],
                    'product_url' => $pollOption['product_url'],
                    'description' => $pollOption['description'],
                );
            }
        }
        $poll->details()->insert($pollOptions);
        return response()->json(['success' => true, 'redirect' => \URL::to('/') . '/vote/' . $slug . '/' . $poll->id]);
    }

    public function savePollOption($poll_id) {
        $pollsDemandsDetail = new \App\Models\PollsDemandsDetail();
        $pollsDemandsDetail->polls_demand_id = $poll_id;
        $pollsDemandsDetail->user_id = \Auth::user()->id;
        $pollsDemandsDetail->title = Input::get('title');
        $pollsDemandsDetail->image_url = Input::get('image_url');
        $pollsDemandsDetail->product_url = Input::get('product_url');
        $pollsDemandsDetail->description = Input::get('description');
        $pollsDemandsDetail->save();
        return response()->json(['success' => true]);
    }

    public function update($id) {
        return response()->json(['success' => true]);
    }

    public function voteDemand($id, $type) {
        $user_id = \Auth::user()->id;
        $isVote = ($type == 1);
        if ($isVote) {
            $pollDemandsVotes = new PollDemandsVote();
            $pollDemandsVotes->user_id = $user_id;
            $pollDemandsVotes->polls_demand_id = $id;
            $pollDemandsVotes->save();
        } else {

            PollDemandsVote::findOrNew(1)->where(array(
                'user_id' => $user_id,
                'polls_demand_id' => $id
            ))->delete();
        }

        $poll = PollsDemand::find($id);
        $poll->total_votes = ($isVote ? $poll->total_votes + 1 : $poll->total_votes - 1);
        $poll->save();
        return response()->json(['success' => true]);
    }

    public function votePoll($poll_id, $id, $type) {
        $user_id = \Auth::user()->id;
        $isVote = ($type == 1);

        $poll = PollsDemand::with('details')->findOrFail($poll_id);

        $pollDeamndVotes = PollDemandsVote::findOrNew(1)->where(array(
            'user_id' => $user_id,
            'polls_demand_id' => $poll_id
        ));

        foreach ($pollDeamndVotes->get() as $pollDeamndVote) {
            $detail = $poll->details->find($pollDeamndVote->polls_demands_details_id);
            $detail->total_votes = $detail->total_votes - 1;
            $detail->save();
        }

        $pollDeamndVotes->delete();

        if ($isVote) {
            $pollDemandsVotes = new PollDemandsVote();
            $pollDemandsVotes->user_id = $user_id;
            $pollDemandsVotes->polls_demand_id = $poll_id;
            $pollDemandsVotes->polls_demands_details_id = $id;
            $pollDemandsVotes->save();

            $detail = $poll->details->find($id);
            $detail->total_votes = $detail->total_votes + 1;
            $detail->save();
        }

        $total_count = 0;
        foreach ($poll->details as $detail) {
            $total_count += $detail->total_votes;
        }
        $poll->total_votes = $total_count;
        $poll->save();

        return response()->json(['success' => true]);
    }

    public function saveDiscussion() {
        $pollsDemandsDiscussion = new PollsDemandsDiscussion();
        $pollsDemandsDiscussion->comment = Input::get('comment');
        $pollsDemandsDiscussion->polls_demands_id = Input::get('poll_id');
        $pollsDemandsDiscussion->is_activated = true;
        $pollsDemandsDiscussion->user_id = \Auth::user()->id;
        $pollsDemandsDiscussion->save();
        return response()->json(['success' => true]);
    }

    public function loadDiscussions($poll_id) {
        $discussions = PollsDemandsDiscussion::with('user')->where('polls_demands_id', '=', $poll_id)->orderBy('created_at', 'desc')->paginate(50);
        return $discussions;
    }

    public function loadPollOptions($poll_id) {
        $poll = PollsDemand::with('details')->with(['votes' => function($q) use ($poll_id) {
                        $q->where('user_id', \Auth::user()->id);
                        $q->where('polls_demand_id', $poll_id);
                    }])->findOrFail($poll_id);
        return response()->json(['success' => true, 'data' => $poll]);
    }

}
