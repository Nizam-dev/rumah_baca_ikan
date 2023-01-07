<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class SliderController extends Controller
{
    public function index()
    {
        //
        $Slider = Slider::orderBy('id','desc')->get();
        
       
        return view('admin.Slider.index',compact('Slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $namaFiles = '';
        //
        // $this->validate($request, [
        //     // check validtion for image or file
        //           'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //       ]);


            $tujuan_upload = public_path('gambar-Slider');
            $file = $request->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
      

         Slider::create([
            'gambar' => $namaFiles

        ]);
        return redirect()->back()->with('message', 'Berita Slider Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Slider = Slider::find($id);
        $Slider->gambar =url('public/gambar-Slider/'.$Slider->gambar);
        return view('admin.Slider.edit',compact('Slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $namaFiles = '';
        //
        if($request->hasFile('gambar')){


            $tujuan_upload = public_path('gambar-Slider');
            $file = $request->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            FacadesFile::delete($tujuan_upload . '/' . Slider::find($id)->gambar);
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
      

         Slider::where('id',$id)->update([
        
            'gambar' => $namaFiles

        ]);
        return redirect('admin-slider')->with('message', 'Berita Slider Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Slider::destroy($id);
        $tujuan_upload = public_path('gambar-Slider');
        $s = Slider::where('id', $id)->first();

        if ($s) {

            FacadesFile::delete($tujuan_upload . '/' . $s->gambar);
            Slider::destroy($id);
        }
        return redirect()->back()->with('message', 'Berita Slider Berhasil Dihapus');
    }
}
