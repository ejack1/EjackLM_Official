<?php

namespace App\Http\Controllers;

use App\Models\RPO;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RPOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpos = RPO::latest()->paginate(5);

        return view('rpo.index',compact('rpos'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    public function RPO_delete($id)
    {
        // dd(auth()->user()->role_id);

        $rpo = RPO::find($id);
        // dd($rpo);
        unlink("images/".$rpo->unique_id_pic);

        // Storage::delete('images/'.$rpo->uni.'');

        // Storage::disk('s3')->delete('images/."".');
        // Storage::delete(['upload/test.png', 'upload/test2.png']);

        $rpo->delete();
        return back()->with("success", "Image deleted successfully.");
    }

    public function RPO_search(Request $request)
    {
        // $RPOs = RPO::where
        $RPOs = RPO::where('unique_id','like','%'.$request->search.'%')->orderBy('id')->paginate(6);
        return view('rpo.search_result',['RPOs' => $RPOs]);
        // 

        // dd($request->search);
    }

    public function rpo_create()
    {
        return view('rpo.create_rpo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unique_id' => 'required|unique:rpos',
        ]);

        
        $rpo = new RPO();
        $rpo->unique_id  = $request->unique_id  ;
        $rpo->city = $request->city ;
        $rpo->route_code = $request->route_code ;
        $rpo->driver = $request->driver ;
        $rpo->supplier = $request->supplier ;
        $rpo->status_done = $request->status_done ;
        $rpo->status_total = $request->status_total ;

        //for image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $rpo->unique_id_pic = $imageName ;

        $rpo->save();


        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RPO  $rPO
     * @return \Illuminate\Http\Response
     */
    public function show(RPO $rPO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RPO  $rPO
     * @return \Illuminate\Http\Response
     */
    public function edit(RPO $rPO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RPO  $rPO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RPO $rPO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RPO  $rPO
     * @return \Illuminate\Http\Response
     */
    public function destroy(RPO $rPO)
    {
        //
    }

    public function RPO_status_update($id)
    {
        $rpo = RPO::find($id);
        // dd($rpo);
        return view('rpo.status_update', ['data' => $rpo] );
    }

    public function RPO_status_updated(Request $request, $id)
    {
        // dd($request->status_done);
        $rpo = RPO::find($id);
        $rpo->status_done  = $request->status_done;
        $rpo->status_total = $request->status_total;
        $rpo->update();

        return redirect()->back()->with('status','Student Updated Successfully');

        // $data = $req->input();
        // dd($data);
    }

    public function RPO_PRINT($id)
    {
        // dd($id);

        // return view('/');
        // $rpos = RPO::latest()->paginate(5);

        // return view('rpo.index',compact('rpos'));
        $rpo = RPO::find($id)->first();
        if($rpo)
        {
            $data = [
                'title' => $rpo->unique_id,
                'date' => $rpo->created,
                'city' =>  $rpo->city,
                'route' => $rpo->route_code,
                'driver' => $rpo->driver,
                'supplier' => $rpo->supplier,
                'status_done' => $rpo->status_done,
                'status_total' => $rpo->status_total,
                'unique_id_pic' => $rpo->unique_id_pic,
            ];
              
            $pdf = PDF::loadView('myPDF', $data);
        
            return $pdf->download('itsolutionstuff.pdf');
        }
        dd('No RPO Found');
    }

    public function RPO_detail($id)
    {
// dd('hi');
        //detailed view.
        $data = RPO::find($id);
        // dd($data);
        // return view();
        // return view('rpo.index',['data' => 'data']);
        // return View::make('rpo.details', ['data' => 'data']);
        return view('rpo.details',compact('data'));
    }

    public function RPO_PENDINGS()
    {
        // dd("hi");
        // $rpos = RPO::all()->where('status_done','-','status_total','=',0)->get(5);
        $rpos = RPO::all();
        // $array = array(1,2);
        $array[] = 0;
        array_pop($array);
        // array_pop($array);
        // dd($array);
        foreach($rpos as $r)
        {
            $dif = $r->status_total - $r->status_done;
            // dd($dif);
            if( $dif > 0)
            {
                // dd($dif);
                // dd($r->status_total - $r->status_done);
                array_push($array,$r);
            }
            // dd('hi');
        }
        // dd($array);
        // dd($rpos);
        // ->paginate(5);

        return view('rpo.RPO_pendings',compact('array'));
    }

}
