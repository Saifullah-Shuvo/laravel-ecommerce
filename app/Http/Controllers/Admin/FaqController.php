<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::latest()->get();
        return view('admin.faqs.index',compact('faqs'));
    }

    public function add(){
        return view('admin.faqs.add');
    }

    public function store(Request $request){
        $request->validate([
            'question' => 'required',
            'answer'=> 'required',
        ]);

        $faqs = new Faq();
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->status = $request->status;
        $faqs->save();

        $notification = array('message' => "FAQ Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('faq.all')->with($notification);
    }

    public function edit($id){
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit',compact('faq'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faqs = Faq::findOrFail($id);
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->status = $request->status;

        $faqs->save();

        $notification = array('message' => "FAQ Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('faq.all')->with($notification);
    }

    public function destroy($id){
        $faq = Faq::findOrFail($id);
        $faq->delete();

        $notification = array('message' => "FAQ Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // faq status
    public function status_enable($id)
    {
        $data = Faq::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function status_disable($id)
    {
        $data = Faq::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }
}
