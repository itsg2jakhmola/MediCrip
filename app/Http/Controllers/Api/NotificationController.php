<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use Validator;
use View;
use Auth;
use DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
		$user = Auth::user();

		// add notification
		Notification::create(array(
			'receiver_id' => $user->id,
			'receiver_type' => 'foodie',
			'sender_id' => '0',
			'sender_type' => 'system',
			'object' => 'profile',
			'verb' => 'complete',
			'message' => "Hi {{name}}, Complete your profile. Be credible.",
			'metadata' => json_encode(array(
				'type' => 'profile_complete',
				'user_id' => $user->id,
				'name' => $user->first_name
			)),
		));

        return response()->json(["I'm in index"]);
    }

    //-----------------------------------------------------

    /**
     * Manage notification messages.
     *
     * @return Response
     */
    public function messages(Request $request)
    {
        $data = [];
        $extra = [];
        $post = $request->all();

        $validator = Validator::make($post, [
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = 'Parameter missing';

            return response()->json([
                'status' => 0,
                'error_code' => 1,
                'response_string' => $message,
                'data' => $data,
                'additionalData' => $extra,
            ]);
        }

        switch($post['type'])
        {
            case 'getlist':
            {
                $response = $this->_getNotificationList($post, $request);
            }
            break;
            case 'changestatus':
            {
                $response = $this->_changeNotificationStatus($post, $request);
            }
            break;
            default:
            {
                $message = 'Invalid type value';
                $response = response()->json([
                    'status' => 0,
                    'error_code' => 1,
                    'response_string' => $message,
                    'data' => $data,
                    'additionalData' => $extra,
                ]);
            }
            break;
        }

        return $response;
    }

    //-----------------------------------------------------

    /**
     * Display a listing of notification messages.
     *
     * @return Response
     */
    public function _getNotificationList($post, $request)
    {
        $data = [];
        $extra = [];
        $post = $request->all();

        $validator = Validator::make($post, [
            'type' => 'required',
            'receiver_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = 'Parameter missing';

            return response()->json([
                'status' => 0,
                'error_code' => 1,
                'response_string' => $message,
                'data' => $data,
                'additionalData' => $extra,
            ]);
        }

        // optional params
        $timestamp = $request->input('timestamp', '');
        $post['timestamp'] = date('Y-m-d H:i:s', strtotime($timestamp));

        // find notification messages
        $per_page = $request->input('per_page', 100);
        $notifications = Notification::where(function($query) use ($post) {
			$query->where('receiver_id', $post['receiver_id']);
			$query->where('created_at', '>', $post['timestamp']);
			})
            ->orderBy('id', 'desc')
            ->paginate($per_page);

        if($notifications->total() == 0) {
            $message = 'No notification message found';

            return response()->json([
                'status' => 1,
                'error_code' => 0,
                'response_string' => $message,
                'data' => $data,
                'additionalData' => $extra,
            ]);
        }

        $extra['timestamp'] = ['timestamp' => date('Y-m-d H:i:s')];

        foreach($notifications as $key => $val)
        {
			$sender = (($val->sender_type !== 'system') ? (($val->sender_type == 'foodie') ? $val->foodie('sender_id')->first() : $val->chef('sender_id')->first()) : 'FeastBy');
			$message = $val->message;
			$metadata = json_decode($val->metadata, true);

			// prepare pattern search
			$pattern['{{sender}}'] =  '<strong>' . (($val->sender_type !== 'system') ? (($val->sender_type == 'foodie') ? $sender->first_name : $sender->first_name) : $sender) . '</strong>';

            // prepare notification message
			$msg = strtr($message, $pattern);
            $notifications[$key]
                ->message = $msg;

            //// prepare pattern search
            //foreach($metadata as $key => $meta) {
				//$pattern['{{'.$key.'}}'] = $meta;
			//}

            //// prepare notification message unformatted
			//$msg2 = strtr($message, $pattern);
            //$notifications[$key]
                //->message_unformatted = $msg2;

        }

        $message = 'Success';
        $data = $notifications->toArray();
        $response_data = array_merge(array(
                'status' => 1,
                'error_code' => 0,
                'response_string' => $message,
                'additionalData' => $extra,
            ), $data);

        return response()->json($response_data);
    }

    //-----------------------------------------------------

    /**
     * Change a message status from notification list.
     *
     * @return Response
     */
    private function _changeNotificationStatus($post, $request)
    {
        $data = [];
        $extra = [];

        $validator = Validator::make($post, [
            'type' => 'required',
            'receiver_id' => 'required',
            'message_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = 'Parameter missing';

            return response()->json([
                'status' => 0,
                'error_code' => 1,
                'response_string' => $message,
                'data' => $data,
                'additionalData' => $extra,
            ]);
        }

        $message = 'Success';
        return response()->json([
            'status' => 1,
            'error_code' => 0,
            'response_string' => $message,
            'data' => $data,
            'additionalData' => $extra,
        ]);
    }

    //-----------------------------------------------------

	/**
	 * Display a listing of notification messages.
	 *
	 * @return Response
	 */
	public function getMessages(Request $request)
	{
		$data = [];
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;

		// find unread notification count
		//$unread = Notification::where(function($query) use ($input) {
		//	$query->where('receiver_id', $input['user_id']);
		//	$query->where('is_read', 0);
		//	})
		//	->count();
		$unread = Auth::user()->notification_count;

		// find notification messages
		$page = $request->input('page', 1);
		$per_page = $request->input('per_page', 5);
		$notifications = Notification::where(function($query) use ($input) {
			$query->where('receiver_id', $input['user_id']);
			})
			->orderBy('id', 'desc')
			->paginate($per_page);

		// prepare data
		$data['unread'] = $unread;
		$data['total'] = $notifications->total();
		$data['nextPage'] = $notifications->nextPageUrl();
		$data['notifications'] = [];
		// loop through notifications
		foreach($notifications as $key => $val)
		{
			$notification = clone $val;


			$sender = (($val->sender_type !== 'system') ? (($val->sender_type == 'foodie') ? $val->foodie('sender_id')->first() : $val->chef('sender_id')->first()) : config('app.name'));
			$message = $val->message;
			$metadata = json_decode($val->metadata, true);

			// prepare pattern search for sendor
			$pattern['{{sender}}'] =  (($val->sender_type !== 'system') ? (($val->sender_type == 'foodie') ? $sender->first_name : $sender->first_name) : $sender);

			// prepare pattern search for metadata
			foreach($metadata as $key => $meta) {
				$pattern['{{'.$key.'}}'] = $meta;
			}

			// prepare notification message unformatted
			$message = strtr($message, $pattern);

			$notification->message = $message;

			$data['notifications'][] = $notification;
		}

		$data['notificationsHTML'] = View::make('partials.notifications', compact('data'))->render();

		return response()->json($data);
	}

	//-----------------------------------------------------

	/**
	 * Show notification messages.
	 *
	 * @return Response
	 */
	public function showMessages(Request $request)
	{
		$data = [];
		$timestamp = date('Y-m-d H:i:s');
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;

		// Find user
		$user = User::find($input['user_id']);

		if(! $user) {
			return response()->json([
				'code' => 1,
				'status' => 'error',
				'data' => $data,
			]);
		}

		// update notification count
		$user->notification_count = 0;
		$user->save();

		return response()->json([
			'code' => 0,
			'status' => 'success',
			'data' => $data,
		]);
	}

	//-----------------------------------------------------

	/**
	 * Read a single notification message.
	 *
	 * @return Response
	 */
	public function readMessage(Request $request)
	{
		$data = [];
		$timestamp = date('Y-m-d H:i:s');
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;

		// Find notification
		$notification = Notification::where(function($query) use ($input) {
				$query->where('id', $input['nid']);
				$query->where('receiver_id', $input['user_id']);
			})
			->first();

		// prepare response
		if($notification)
		{
			$data = array_merge($data,
				$this->_prepareMessageCallback($notification));

			$update = ['is_read' => 1, 'read_at' => $timestamp];
			// update notification
			$notification->update($update);

			return response()->json([
				'code' => 0,
				'status' => 'success',
				'data' => $data,
			]);
		}

		return response()->json([
            'code' => 1,
            'status' => 'error',
            'data' => $data,
        ]);
	}

	//-----------------------------------------------------

	/**
	 * Read a single notification message.
	 *
	 * @return array
	 */
	private function _prepareMessageCallback(Notification $n)
	{
		$data = [];
		$type = $n->object . '_' . $n->verb;

		switch($type)
		{
			case 'welcome_message':
			{
				$content = '';
				$metadata = json_decode($n->metadata, true);

				if(array_key_exists('content', $metadata)) {
					$content = $metadata['content'];
					unset($metadata['content']);
				}

				// prepare pattern search for metadata
				foreach($metadata as $key => $meta) {
					$pattern['{{'.$key.'}}'] = $meta;
				}

				// prepare notification message unformatted
				$content = strtr($content, $pattern);

				$data['callback'] = 'popup';
				$data['content'] = $content;
			}
			break;
			case 'profile_complete':
			{
				$url = url('foodie/myprofile');

				$data['callback'] = 'url';
				$data['url'] = $url;
			}
			break;
			case 'request_approved':
			{
				$url = url('foodie/orders');

				$data['callback'] = 'url';
				$data['url'] = $url;
			}
			break;
			case 'request_rejected':
			{
				$url = url('feasts');

				$data['callback'] = 'url';
				$data['url'] = $url;
			}
			break;
			case 'inbox_message':
			{
				if($n->receiver_type == 'foodie'){
					$url = url('foodie/inbox');
				}else if($n->receiver_type == 'chef'){
					$url = url('chef/inbox');
				}

				$data['callback'] = 'url';
				$data['url'] = $url;
			}
      break;

      // Chef Notifications
      case 'booking_request':
			{
				if($n->receiver_type == 'foodie'){
					$url = '';//url('foodie/foodie-requests');
				}else if($n->receiver_type == 'chef'){
					$url = url('chef/foodie-requests');
				}

				$data['callback'] = 'url';
				$data['url'] = $url;
			}
			break;

	  case 'payment_success':
			{
				if($n->receiver_type == 'foodie'){
					$url = '';
				}else if($n->receiver_type == 'chef'){
					$url = url('chef/orders');	
				}
				$data['callback'] = 'url';
				$data['url'] = $url;
			}
			break;
	  case 'menu_change_approve' :
		  	{
		  		$url = url('chef/manage-feast/menu');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;
	  case 'menu_change_declined' :
		  	{
		  		$url = url('chef/manage-feast/menu');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;
	  case 'menu_item_change_approve' :
		  	{
		  		$url = url('chef/manage-feast/menu');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;
	  case 'menu_item_change_declined' :
		  	{
		  		$url = url('chef/manage-feast/menu');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;	

	  	case 'feast_info_approve' :
		  	{
		  		$url = url('chef/manage-feast/feasts');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;	

	  	case 'feast_info_declined' :
		  	{
		  		$url = url('chef/manage-feast/feasts');

				$data['callback'] = 'url';
				$data['url'] = $url;
		  	}
	  		break;	
			default:
			{
				$data['callback'] = 'url';
				$data['url'] = url('/');
			}
			break;
		}

		return $data;
	}
}
