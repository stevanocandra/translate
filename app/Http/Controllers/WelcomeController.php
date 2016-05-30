<?php namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\TranslateClient;
use Log;
use Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$data = $tr->translate('Hello World!');
		//$data = TranslateClient::translate('en', 'id', 'Hello again');

		Log::info('part 1');

		return view('welcome');
	}

	public function indexTranslate()
	{
		Log::info('part 2');
		$input = Request::all();
		Log::info('inputan -> '.json_encode($input));
		$arr;
		if (!empty($input)){
			Log::info('selectlang -> '.$input['selectlang'].', quote -> '.$input['quote']);
			$quote = $input['quote'];
			$data = TranslateClient::translate('en', $input['selectlang'], $quote);
			$arr = array('err'=>false, 'data'=>$data);
		}
		else{
			$arr = array('err' => true);
		}
		echo json_encode($arr);
	}
}
