<?php

class LitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('lits.index')
			->with('lits', Lit::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('lits.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		// Validation
		$rules = array(
			'title' => 'required',
			'author' => 'required',
			'description' => 'required'
		);

		$validator = Validator::make(Input::all(), 
			$rules);

		if ($validator->fails()) {
			return Redirect::to('/lits/create')
				->withinput(Input::get())
				->withErrors($validator);
		}

		// Create the lit
		$lit = new Lit;
		$lit->title = Input::get('title');
		$lit->author = Input::get('author');
		$lit->description = Input::get('description');
		$lit->link = Input::get('link');
		$lit->save();

		return Redirect::to('/')
			->with('flash_message', 'Your lit has been created successfully')
			->with('alert_class', 'alert-success');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$lit = Lit::find($id);

		if (!is_object($lit)) {
			return Redirect::to('/')
				->with('flash_message', 'Sorry, that Lit doesn\'t exist')
				->with('alert_class', 'alert-danger');
		}

		return View::make('lits.show')
			->with('lit', $lit);
	}

	// Add a lit to a user's library
	public function addLit($lit_id) {
		$lit = Lit::findOrFail($lit_id);
		$lit->pivot->lit_id = $lit_id;
		$lit->pivot->user_id = Auth::user()->id;
		$lit->pivot->mode = Input::get('mode');
		
			if (Input::get('mode') != 'to_read') {
				$lit->pivot->started = getdate();

				if (Input::get('mode') == 'have_read') {
					$lit->pivot->finished = getdate();
				}
			}

		$lit->pivot->save();
	}

}
