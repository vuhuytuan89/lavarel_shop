<?php

class LoaisController extends BaseController {

	/**
	 * Loai Repository
	 *
	 * @var Loai
	 */
	protected $loai;

	public function __construct(Loai $loai)
	{
		$this->loai = $loai;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{  $loais = $this->loai->paginate(10);
		
		return View::make('loais.index', compact('loais'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
              
                $chungloai=  Chung_loai::get();
                $hang=  Hang::get();
		return View::make('loais.create')->with('chungloai', $chungloai)
                                                 ->with('hang', $hang);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{         $loais = $this->loai->all();
                $chungloai=  Chung_loai::get();
                 $hang=  Hang::get();
		$input = Input::all();
		$validation = Validator::make($input, Loai::$rules);

		if ($validation->passes())
		{
			$model=$this->loai->create($input);
                        Logfileadmin::addData("Thêm", "Loại", $model->id, $model->tenloai);
			return Redirect::route('loais.index');
		}

		return Redirect::route('loais.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.')
                        ->with('chungloai', $chungloai)
                        ->with('hang', $hang);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$loai = $this->loai->findOrFail($id);

		return View::make('loais.show', compact('loai'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$loai = $this->loai->find($id);
                 $chungloai=  Chung_loai::get();
                 $hang=  Hang::get();
		if (is_null($loai))
		{
			return Redirect::route('loais.index');
		}

		return View::make('loais.edit', compact('loai'))
                                  ->with('chungloai', $chungloai)
                                 ->with('hang', $hang);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{         $chungloai=  Chung_loai::get();
                 $hang=  Hang::get();
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Loai::$rules);

		if ($validation->passes())
		{
			$loai = $this->loai->find($id);
                           //lay thong tin cu
                        $oldinfo= Loai::where('id','=',$loai->id)->get()->toArray();
                        Logfileadmin::addData("Sửa", "Loại", $loai->id, Input::get('tenloai'),$oldinfo);
			$loai->update($input);

			return Redirect::route('loais.show', $id);
		}

		return Redirect::route('loais.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.')
                          ->with('chungloai', $chungloai)
                        ->with('hang', $hang);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{        $sanpham=  Sanpham::where('id_loai','=',$id)->count();
                if($sanpham>0){
                    return Redirect::to('loais')->with('errorDelete', "Thất bại.Loại này đang tồn tại sản phẩm");
                }
               
                $model=$this->loai->find($id);
                Logfileadmin::addData("Xóa", "Loại", $model->id, $model->tenloai);
		$this->loai->find($id)->delete();

		return Redirect::route('loais.index');
               
	}

}
