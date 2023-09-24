<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;


class PayController extends Controller
{
    public function payPage()
    {
        $user = auth()->user();
        return view('UserSec.donation',compact('user'));
    }
    public function makePayment()
    {
        
        $data = request()->validate([
            'purpose' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'image' => ['image'],
        ]);
        //dd("hello");
        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(940,940);
        $image->save();
         
        auth()->user()->payments()->create([
            'purpose' => $data['purpose'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'image' => $imagePath,
            'type' => "cr",
        ]);
       //dd($data);
        return redirect('profile/'.auth()->user()->id);
    }
    public function waitinglist()
    {
        $user = auth()->user();
        $payments = Payment::whereNull('approved_at')->get();
       // return view('/pages/members');
      // $users =['hello','hi'];
        return view('/AdminSec/approvePayment', compact('payments','user'));
    }
    public function approve($payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $payment->update(['approved_at' => now()]);

        return redirect()->route('admin.payment')->withMessage('Payment approved successfully');
    }
    public function reject($payment_id)
    {
        $payment = Payment::where('id', $payment_id)->firstorfail()->delete();
          return redirect()->route('admin.payment')->withMessage('Payment Rejected');
        }
        public function expensePage()
        {
            $user = auth()->user();
            return view('AdminSec.expense',compact('user'));
        }
        public function makeExpense()
        {
            
            $data = request()->validate([
                'purpose' => 'required',
                'description' => 'required',
                'amount' => 'required',
                'image' => ['image'],
            ]);
            //dd("hello");
            $imagePath = request('image')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(940,940);
            $image->save();
             
            auth()->user()->payments()->create([
                'purpose' => $data['purpose'],
                'description' => $data['description'],
                'amount' => $data['amount'],
                'image' => $imagePath,
                'type' => "dr",
                'approved_at' => now(),
            ]);
           //dd($data);
           $user = auth()->user();
            return view('AdminSec.expense',compact('user'));
        }
        public function donationReport()
        {
            $user = auth()->user();
            return view('UserSec.donationReport',compact('user'));
        }
        public function donationReportGenerate()
        {
            $users = auth()->user()->id;
            $payments = Payment::where('user_id',$users)
            ->whereNotNull('approved_at')
            ->get();
            //dd($payments);
            $user = auth()->user();
            return view('UserSec.generateDonationReport',compact('payments','user'));
        }
        
        public function donationReportBetween()
        {
            $data = request();
            $users = auth()->user()->id;
            $payments = Payment::where('user_id',$users)
            ->whereBetween('created_at', [$data['startDate'], $data['endingDate']])
            ->get();
            
            //dd($payments);
            $user = auth()->user();
            return view('UserSec.generateDonationReport',compact('payments','user'));
        }
        public function adminReport()
        {
            $user = auth()->user();
            $payments =  DB::table('payments')
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
           // dd($expenses);
            return view('AdminSec.allReport',compact('payments','expenses','user'));
        }
        public function adminIncome()
        {
            $users = auth()->user()->id;
            $payments = Payment::where('type','cr')
            ->whereNotNull('approved_at')
            ->get();
            //dd($payments);
            $user = auth()->user();
            return view('AdminSec.incomeReport',compact('payments','user'));
        }
        public function adminExpense()
        {
            $users = auth()->user()->id;
            $payments = Payment::where('type','dr')->get();
            //dd($payments);
            $user = auth()->user();
            return view('AdminSec.expenseReport',compact('payments','user'));
        }

}