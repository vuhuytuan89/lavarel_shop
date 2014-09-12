<?php

class HangsController extends BaseController {

	/**
	 * Hang Repository
	 *
	 * @var Hang
	 */
	protected $hang;

	public function __construct(Hang $hang)
	{
		$this->hang = $hang;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hangs = $this->hang->all();

		return View::make('hangs.index', compact('hangs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hangs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Hang::$rules);

		if ($validation->passes())
		{
			$model=$this->hang->create($input);
                         Logfileadmin::addData("Thêm", "Hãng", $model->id, $model->tenhang);
			return Redirect::route('hangs.index');
		}

		return Redirect::route('hangs.create')
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
		$hang = $this->hang->findOrFail($id);

		return View::make('hangs.show', compact('hang'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hang = $this->hang->find($id);

		if (is_null($hang))
		{
			return Redirect::route('hangs.index');
		}

		return View::make('hangs.edit', compact('hang'));
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
		$validation = Validator::make($input, Hang::$rules);

		if ($validation->passes())
		{
			$hang = $this->hang->find($id);
                        //lay thong tin cu
                        $oldinfo= Hang::where('id','=',$hang->id)->get()->toArray();
                        Logfileadmin::addData("Sửa", "Hãng", $hang->id, Input::get('tenhang'),$oldinfo);
			$hang->update($input);

			return Redirect::route('hangs.show', $id);
		}

		return Redirect::route('hangs.edit', $id)
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
                $model=$this->hang->find($id);
                 Logfileadmin::addData("Xóa", "Hãng", $model->id, $model->tenhang);
		$this->hang->find($id)->delete();

		return Redirect::route('hangs.index');
	}

}
