<?php

class Chung_loaisController extends BaseController {

	/**
	 * Chung_loai Repository
	 *
	 * @var Chung_loai
	 */
	protected $chung_loai;

	public function __construct(Chung_loai $chung_loai)
	{
		$this->chung_loai = $chung_loai;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$chung_loais = $this->chung_loai->all();

		return View::make('chung_loais.index', compact('chung_loais'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('chung_loais.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Chung_loai::$rules);

		if ($validation->passes())
		{    
			$model=$this->chung_loai->create($input);
                        Logfileadmin::addData("Thêm", "Chủng Loại", $model->id, $model->tenchungloai);
			return Redirect::route('chung_loais.index');
		}

		return Redirect::route('chung_loais.create')
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
		$chung_loai = $this->chung_loai->findOrFail($id);

		return View::make('chung_loais.show', compact('chung_loai'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$chung_loai = $this->chung_loai->find($id);

		if (is_null($chung_loai))
		{
			return Redirect::route('chung_loais.index');
		}

		return View::make('chung_loais.edit', compact('chung_loai'));
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
		$validation = Validator::make($input, Chung_loai::$rules);

		if ($validation->passes())
		{       
			$chung_loai = $this->chung_loai->find($id);
                        //lay thong tin cu
                        $oldinfo=  Chung_loai::where('id','=',$chung_loai->id)->get()->toArray();
                          Logfileadmin::addData("Sửa", "Chủng Loại", $chung_loai->id, Input::get('tenchungloai'),$oldinfo);
			$chung_loai->update($input);
                      
			return Redirect::route('chung_loais.show', $id)->with('oldinfo',$oldinfo);
		}

		return Redirect::route('chung_loais.edit', $id)
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
	{       $model= $this->chung_loai->find($id);
                  Logfileadmin::addData("Xóa", "Chủng Loại", $model->id, $model->tenchungloai);
		$this->chung_loai->find($id)->delete();

		return Redirect::route('chung_loais.index');
	}
        
  

}
