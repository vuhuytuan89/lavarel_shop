<?php

class VanchuyensController extends BaseController {

	/**
	 * Vanchuyen Repository
	 *
	 * @var Vanchuyen
	 */
	protected $vanchuyen;

	public function __construct(Vanchuyen $vanchuyen)
	{
		$this->vanchuyen = $vanchuyen;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vanchuyens = $this->vanchuyen->all();

		return View::make('vanchuyens.index', compact('vanchuyens'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vanchuyens.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Vanchuyen::$rules);

		if ($validation->passes())
		{
			$this->vanchuyen->create($input);

			return Redirect::route('vanchuyens.index');
		}

		return Redirect::route('vanchuyens.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vanchuyen = $this->vanchuyen->findOrFail($id);

		return View::make('vanchuyens.show', compact('vanchuyen'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vanchuyen = $this->vanchuyen->find($id);

		if (is_null($vanchuyen))
		{
			return Redirect::route('vanchuyens.index');
		}

		return View::make('vanchuyens.edit', compact('vanchuyen'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Vanchuyen::$rules);

		if ($validation->passes())
		{
			$vanchuyen = $this->vanchuyen->find($id);
			$vanchuyen->update($input);

			return Redirect::route('vanchuyens.show', $id);
		}

		return Redirect::route('vanchuyens.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->vanchuyen->find($id)->delete();

		return Redirect::route('vanchuyens.index');
	}

}
