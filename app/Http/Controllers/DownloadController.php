<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use PDF;
use Illuminate\Http\Request;
use DB;

class DownloadController extends Controller
{
    public function downfunc(){
        $downloads = User::whereNull('approved_at')->get();
        
        return view('download.viewfile',compact('downloads'));
    }
    function downloadFile($file_name){
              return response()->download('/storage/$file_name');
    }
public function pdfviewe(Request $request)
{
    $user = auth()->user()->id;
    $items = Payment::where('user_id',$user)->get();
view()->share('items',$items);
if($request->has('download')){
$pdf = PDF::loadView('UserSec.test');
return $pdf->download('pdfview.pdf');
}
return view('UserSec.test');
}
public function pdfview()
{
    // $data = [
    //     'title' => 'Welcome to ItSolutionStuff.com',
    //     'date' => date('m/d/Y')
    // ];
      
    // $pdf = PDF::loadView('UserSec.test', $data);

    // return $pdf->download('itsolutionstuff.pdf');
    $user = auth()->user()->id;
    $users = auth()->user();
    $date = date('m/d/Y');
    $payments = Payment::where('user_id',$user)->get();
    //dd($payments);
    $pdf = PDF::loadview('UserSec.report',compact('payments','users','date'));
    return $pdf->download($users->name."_"."donation".".pdf");
}
public function pdfIncome()
{
    
    $user = auth()->user()->id;
    $users = auth()->user();
    $date = date('m/d/Y');
    $payments = Payment::where('type','cr')
    ->whereNotNull('approved_at')
    ->get();
    //dd($payments);
    $pdf = PDF::loadview('AdminSec.pdfIncome',compact('payments','users','date'));
    return $pdf->download("CSEAA_Income.pdf");
}
public function pdfExpense()
{
    
    $user = auth()->user()->id;
    $users = auth()->user();
    $date = date('m/d/Y');
    $payments = Payment::where('type','dr')
    ->whereNotNull('approved_at')
    ->get();
    //dd($payments);
    $pdf = PDF::loadview('AdminSec.pdfExpense',compact('payments','users','date'));
    return $pdf->download("CSEAA_Expense.pdf");
}
public function pdfAll()
{
    
    $user = auth()->user()->id;
    $users = auth()->user();
    $date = date('m/d/Y');
    $incomes =  DB::table('payments')
    ->select(DB::raw('purpose as purpose'), DB::raw('sum(amount) as amount'))
       ->groupBy(DB::raw('purpose') )
       ->where('type','cr')
       ->whereNotNull('approved_at')
       ->get();
   $expenses = DB::table('payments')
     ->select(DB::raw('purpose as purpose'), DB::raw('sum(amount) as amount'))
        ->groupBy(DB::raw('purpose') )
        ->where('type','dr')
        ->whereNotNull('approved_at')
        ->get();
    //dd($incomes);
    $pdf = PDF::loadview('AdminSec.pdfAllReport',compact('incomes','expenses','users','date'));
    return $pdf->download("CSEAA_All_Report.pdf");
}
}