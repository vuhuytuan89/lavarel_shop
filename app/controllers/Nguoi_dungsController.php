<?php

class Nguoi_dungsController extends BaseController {

	/**
	 * Nguoi_dung Repository
	 *
	 * @var Nguoi_dung
	 */
	protected $nguoi_dung;

	public function __construct(Nguoi_dung $nguoi_dung)
	{
		$this->nguoi_dung = $nguoi_dung;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$nguoi_dungs = $this->nguoi_dung->all();

		return View::make('nguoi_dungs.index', compact('nguoi_dungs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('nguoi_dungs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Nguoi_dung::$rules);

		if ($validation->passes())
		{
			$this->nguoi_dung->create($input);

			return Redirect::route('nguoi_dungs.index');
		}

		return Redirect::route('nguoi_dungs.create')
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
		$nguoi_dung = $this->nguoi_dung->findOrFail($id);

		return View::make('nguoi_dungs.show', compact('nguoi_dung'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$nguoi_dung = $this->nguoi_dung->find($id);

		if (is_null($nguoi_dung))
		{
			return Redirect::route('nguoi_dungs.index');
		}

		return View::make('nguoi_dungs.edit', compact('nguoi_dung'));
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
		$validation = Validator::make($input, Nguoi_dung::$rules);

		if ($validation->passes())
		{
			$nguoi_dung = $this->nguoi_dung->find($id);
			$nguoi_dung->update($input);

			return Redirect::route('nguoi_dungs.show', $id);
		}

		return Redirect::route('nguoi_dungs.edit', $id)
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
	{       $model=$this->nguoi_dung->find($id);
                Logfileadmin::addData("Xóa", "Thành Viên", $model->id, "Tên: ".$model->tennd."\n Tài khoản:".$model->taikhoan);
		$this->nguoi_dung->find($id)->delete();

		return Redirect::route('nguoi_dungs.index');
	}

}
