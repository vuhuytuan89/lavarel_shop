<?php

class TrangthaisController extends BaseController {

	/**
	 * Trangthai Repository
	 *
	 * @var Trangthai
	 */
	protected $trangthai;

	public function __construct(Trangthai $trangthai)
	{
		$this->trangthai = $trangthai;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$trangthais = $this->trangthai->all();

		return View::make('trangthais.index', compact('trangthais'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trangthais.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Trangthai::$rules);

		if ($validation->passes())
		{
			$this->trangthai->create($input);

			return Redirect::route('trangthais.index');
		}

		return Redirect::route('trangthais.create')
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
		$trangthai = $this->trangthai->findOrFail($id);

		return View::make('trangthais.show', compact('trangthai'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$trangthai = $this->trangthai->find($id);

		if (is_null($trangthai))
		{
			return Redirect::route('trangthais.index');
		}

		return View::make('trangthais.edit', compact('trangthai'));
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
		$validation = Validator::make($input, Trangthai::$rules);

		if ($validation->passes())
		{
			$trangthai = $this->trangthai->find($id);
			$trangthai->update($input);

			return Redirect::route('trangthais.show', $id);
		}

		return Redirect::route('trangthais.edit', $id)
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
		$this->trangthai->find($id)->delete();

		return Redirect::route('trangthais.index');
	}

}
