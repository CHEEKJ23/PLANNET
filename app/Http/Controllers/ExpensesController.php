<?php

namespace App\Http\Controllers;
use Illuminate\Support\File;
use Illuminate\Http\Request;
use DB;
use App\Models\janExpense;
use App\Models\Income;
use App\Models\febExpense;
use App\Models\febIncome;
use App\Models\marExpense;
use App\Models\marIncome;
use App\Models\aprExpense;
use App\Models\aprIncome;
use App\Models\mayExpense;
use App\Models\mayIncome;
use App\Models\junExpense;
use App\Models\junIncome;
use App\Models\julExpense;
use App\Models\julIncome;
use App\Models\augExpense;
use App\Models\augIncome;
use App\Models\sepExpense;
use App\Models\sepIncome;
use App\Models\octExpense;
use App\Models\octIncome;
use App\Models\novExpense;
use App\Models\novIncome;
use App\Models\decExpense;
use App\Models\decIncome;


class ExpensesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');//construct require user login before access the controller function
    }
    
    public function addExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=janExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=Income::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }

    // public function view2() {
    //     $viewAll=Income::all();
    //     return view('dailyExpense',compact('incomes',$incomes));
    // }

    public function view() {
        $expenses=janExpense::all();
        $incomes=Income::all();
        return view('dailyExpense.dailyExpense',['expenses' => $expenses,'incomes'=>$incomes]);
        // return redirect()->route('dailyExpenses1');//when delete all will error
    }

    public function deleteExpense($id) {
        $deleteExpense=janExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deleteIncome($id) {
        $deleteIncome=Income::find($id);
        $deleteIncome->delete();
        return back();
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    public function editExpense($id) {
         $expense=janExpense::all()->where('id',$id);
       
        // select * from Expenses where id='$id'
        return view('dailyExpense.editExpense')->with('expenses',$expense);
    }

    public function updateExpense(){
        $r=request();//retrive submited form data
        $expenses =janExpense::find($r->expenseID);  //get the record based on expense ID      
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $expenses->image=$imageName;
        }         
        $expenses->name=$r->Exname;
        $expenses->description=$r->Exdescription;
        $expenses->amount=$r->Examount;
        $expenses->date=$r->Exdate;
        $expenses->category=$r->Excategory;
        $expenses->save();
        return redirect()->route('dailyExpenses1');
    }

    public function editIncome($id) {
        $income=Income::all()->where('id',$id);
        // select * from categories where id='$id'
        // return view('dailyExpense',compact('incomes'))->with($income);
        return view('dailyExpense.editIncome')->with('incomes',$income);

    }

    public function updateIncome(){
        $r=request();//retrive submited form data
        $incomes =Income::find($r->incomeID);  //get the record based on income ID      
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $incomes->image=$imageName;
        }         
        $incomes->name=$r->Inname;
        $incomes->description=$r->Indescription;
        $incomes->amount=$r->Inamount;
        $incomes->date=$r->Indate;
        $incomes->category=$r->Incategory;
        $incomes->save();
        return redirect()->route('dailyExpenses1');
    }
     // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
     public function addfebExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=febExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addfebIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=febIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }

    // public function view2() {
    //     $viewAll=Income::all();
    //     return view('dailyExpense',compact('incomes',$incomes));
    // }

    public function viewfeb() {
        $expenses=febExpense::all();
        $incomes=febIncome::all();
        return view('dailyExpense.febExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletefebExpense($id) {
        $deleteExpense=febExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletefebIncome($id) {
        $deleteIncome=febIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editfebExpense($id) {
        $expense=febExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editFebExpense')->with('expenses',$expense);
   }

   public function updatefebExpense(){
       $r=request();//retrive submited form data
       $expenses =febExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses2');
   }

   public function editfebIncome($id) {
       $income=febIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editFebIncome')->with('incomes',$income);

   }

   public function updatefebIncome(){
       $r=request();//retrive submited form data
       $incomes =febIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses2');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addmarExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=marExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addmarIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=marIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }

    // public function view2() {
    //     $viewAll=Income::all();
    //     return view('dailyExpense',compact('incomes',$incomes));
    // }

    public function viewmar() {
        $expenses=marExpense::all();
        $incomes=marIncome::all();
        return view('dailyExpense.marExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletemarExpense($id) {
        $deleteExpense=marExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletemarIncome($id) {
        $deleteIncome=marIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editmarExpense($id) {
        $expense=marExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editMarExpense')->with('expenses',$expense);
   }

   public function updatemarExpense(){
       $r=request();//retrive submited form data
       $expenses =marExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses3');
   }

   public function editmarIncome($id) {
       $income=marIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editMarIncome')->with('incomes',$income);

   }

   public function updatemarIncome(){
       $r=request();//retrive submited form data
       $incomes =marIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses3');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addaprExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=aprExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addaprIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=aprIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }

    // public function view2() {
    //     $viewAll=Income::all();
    //     return view('dailyExpense',compact('incomes',$incomes));
    // }

    public function viewapr() {
        $expenses=aprExpense::all();
        $incomes=aprIncome::all();
        return view('dailyExpense.aprExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deleteaprExpense($id) {
        $deleteExpense=aprExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deleteaprIncome($id) {
        $deleteIncome=aprIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editaprExpense($id) {
        $expense=aprExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editAprExpense')->with('expenses',$expense);
   }

   public function updateaprExpense(){
       $r=request();//retrive submited form data
       $expenses =aprExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses4');
   }

   public function editaprIncome($id) {
       $income=aprIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editAprIncome')->with('incomes',$income);

   }

   public function updateaprIncome(){
       $r=request();//retrive submited form data
       $incomes =aprIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpense4');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addmayExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=mayExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addmayIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=mayIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewmay() {
        $expenses=mayExpense::all();
        $incomes=mayIncome::all();
        return view('dailyExpense.mayExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletemayExpense($id) {
        $deleteExpense=mayExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletemayIncome($id) {
        $deleteIncome=mayIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editmayExpense($id) {
        $expense=mayExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editMayExpense')->with('expenses',$expense);
   }

   public function updatemayExpense(){
       $r=request();//retrive submited form data
       $expenses =mayExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses5');
   }

   public function editmayIncome($id) {
       $income=mayIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editMayIncome')->with('incomes',$income);

   }

   public function updatemayIncome(){
       $r=request();//retrive submited form data
       $incomes =mayIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses5');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addjunExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=junExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addjunIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=junIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewjun() {
        $expenses=mayExpense::all();
        $incomes=mayIncome::all();
        return view('dailyExpense.junExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletejunExpense($id) {
        $deleteExpense=junExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletejunIncome($id) {
        $deleteIncome=junIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editjunExpense($id) {
        $expense=junExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editJunExpense')->with('expenses',$expense);
   }

   public function updatejunExpense(){
       $r=request();//retrive submited form data
       $expenses =junExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses6');
   }

   public function editjunIncome($id) {
       $income=junIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editJunIncome')->with('incomes',$income);

   }

   public function updatejunIncome(){
       $r=request();//retrive submited form data
       $incomes =junIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses6');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addjulExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=julExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addjulIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=julIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewjul() {
        $expenses=julExpense::all();
        $incomes=julIncome::all();
        return view('dailyExpense.julExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletejulExpense($id) {
        $deleteExpense=julExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletejulIncome($id) {
        $deleteIncome=julIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editjulExpense($id) {
        $expense=julExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editJulExpense')->with('expenses',$expense);
   }

   public function updatejulExpense(){
       $r=request();//retrive submited form data
       $expenses =julExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses7');
   }

   public function editjulIncome($id) {
       $income=julIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editJulIncome')->with('incomes',$income);

   }

   public function updatejulIncome(){
       $r=request();//retrive submited form data
       $incomes =julIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses7');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addaugExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=augExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addaugIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=augIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewaug() {
        $expenses=augExpense::all();
        $incomes=augIncome::all();
        return view('dailyExpense.augExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deleteaugExpense($id) {
        $deleteExpense=augExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deleteaugIncome($id) {
        $deleteIncome=augIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editaugExpense($id) {
        $expense=augExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editAugExpense')->with('expenses',$expense);
   }

   public function updateaugExpense(){
       $r=request();//retrive submited form data
       $expenses =augExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses8');
   }

   public function editaugIncome($id) {
       $income=augIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editAugIncome')->with('incomes',$income);

   }

   public function updateaugIncome(){
       $r=request();//retrive submited form data
       $incomes =augIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses8');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addsepExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=sepExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addsepIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=sepIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewsep() {
        $expenses=sepExpense::all();
        $incomes=sepIncome::all();
        return view('dailyExpense.sepExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletesepExpense($id) {
        $deleteExpense=sepExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletesepIncome($id) {
        $deleteIncome=sepIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editsepExpense($id) {
        $expense=sepExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editSepExpense')->with('expenses',$expense);
   }

   public function updatesepExpense(){
       $r=request();//retrive submited form data
       $expenses =sepExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses9');
   }

   public function editsepIncome($id) {
       $income=sepIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editSepIncome')->with('incomes',$income);

   }

   public function updatesepIncome(){
       $r=request();//retrive submited form data
       $incomes =sepIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses9');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addoctExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=octExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addoctIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=octIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewoct() {
        $expenses=octExpense::all();
        $incomes=octIncome::all();
        return view('dailyExpense.octExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deleteoctExpense($id) {
        $deleteExpense=octExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deleteoctIncome($id) {
        $deleteIncome=octIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editoctExpense($id) {
        $expense=octExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editOctExpense')->with('expenses',$expense);
   }

   public function updateoctExpense(){
       $r=request();//retrive submited form data
       $expenses =octExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses10');
   }

   public function editoctIncome($id) {
       $income=octIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editOctIncome')->with('incomes',$income);

   }

   public function updateoctIncome(){
       $r=request();//retrive submited form data
       $incomes =octIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses10');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function addnovExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=novExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function addnovIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=novIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewnov() {
        $expenses=novExpense::all();
        $incomes=novIncome::all();
        return view('dailyExpense.novExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletenovExpense($id) {
        $deleteExpense=novExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletenovIncome($id) {
        $deleteIncome=novIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editnovExpense($id) {
        $expense=novExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editNovExpense')->with('expenses',$expense);
   }

   public function updatenovExpense(){
       $r=request();//retrive submited form data
       $expenses =novExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses11');
   }

   public function editnovIncome($id) {
       $income=novIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editNovIncome')->with('incomes',$income);

   }

   public function updatenovIncome(){
       $r=request();//retrive submited form data
       $incomes =novIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses11');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function adddecExpense(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName1=$image->getClientOriginalName();
        }
        else {
            $imageName1="noImage.png";//default image
        }
         $expenses=decExpense::create([
            'name'=>$r->Exname,
            'description'=>$r->Exdescription,
            'amount'=>$r->Examount,
            'date'=>$r->Exdate,
            'category'=>$r->Excategory,
            'image'=>$imageName1,
        ]);

        return back();
       // return redirect()->route('viewExpenses');
    }

    public function adddecIncome(){
        $r = request();
        if($r->file('image')!=''){
        $image=$r->file('image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.png";//default image
        }
         $incomes=decIncome::create([
            'name'=>$r->Inname,
            'description'=>$r->Indescription,
            'amount'=>$r->Inamount,
            'date'=>$r->Indate,
            'category'=>$r->Incategory,
            'image'=>$imageName,
        ]);

        return back();
       // return redirect()->route('viewExpenses');

    }


    public function viewdec() {
        $expenses=decExpense::all();
        $incomes=decIncome::all();
        return view('dailyExpense.decExpense',['expenses' => $expenses,'incomes'=>$incomes]);
    }

    public function deletedecExpense($id) {
        $deleteExpense=decExpense::find($id);
        $deleteExpense->delete();
        return back();
    }

    public function deletedecIncome($id) {
        $deleteIncome=decIncome::find($id);
        $deleteIncome->delete();
        return back();
    }

    public function editdecExpense($id) {
        $expense=decExpense::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('dailyExpense.editdecExpense')->with('expenses',$expense);
   }

   public function updatedecExpense(){
       $r=request();//retrive submited form data
       $expenses =decExpense::find($r->expenseID);  //get the record based on expense ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $expenses->image=$imageName;
       }         
       $expenses->name=$r->Exname;
       $expenses->description=$r->Exdescription;
       $expenses->amount=$r->Examount;
       $expenses->date=$r->Exdate;
       $expenses->category=$r->Excategory;
       $expenses->save();
       return redirect()->route('dailyExpenses12');
   }

   public function editdecIncome($id) {
       $income=decIncome::all()->where('id',$id);
       // select * from categories where id='$id'
       // return view('dailyExpense',compact('incomes'))->with($income);
       return view('dailyExpense.editdecIncome')->with('incomes',$income);

   }

   public function updatedecIncome(){
       $r=request();//retrive submited form data
       $incomes =decIncome::find($r->incomeID);  //get the record based on income ID      
       if($r->file('image')!=''){
           $image=$r->file('image');        
           $image->move('images',$image->getClientOriginalName());                   
           $imageName=$image->getClientOriginalName(); 
           $incomes->image=$imageName;
       }         
       $incomes->name=$r->Inname;
       $incomes->description=$r->Indescription;
       $incomes->amount=$r->Inamount;
       $incomes->date=$r->Indate;
       $incomes->category=$r->Incategory;
       $incomes->save();
       return redirect()->route('dailyExpenses12');
   }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
}