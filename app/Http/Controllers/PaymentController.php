<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PembagianBuruh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show()
    {
        $payment = Payment::where("user_id", Auth::user()->id)->get();
        if (Auth::user()->role == 1) {
            $payment = Payment::get();
        }
        return view("page.payment.show", compact("payment"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "total" => "required"
        ]);
        $attr["nama"] = now();
        $attr["user_id"] = Auth::user()->id;


        $buruh = $request->buruh;
        $persen = 0;

        foreach ($buruh as $b) {
            $persen += $b;
        }

        if ($persen > 100) {
            return redirect()->route("show-bonus")->with("error", "Nilai persentasi tidak sama dengan 1000, pembagian bonus masihsalah");
        }
        $payment = Payment::create($attr);
        foreach ($buruh as $key => $b) {
            $attr["id_payment"] = $payment["id"];
            $attr["no_buruh"] = $key + 1;
            $attr["persentasi"] = $b;
            $attr["bonus"] = ($attr["total"] * $b) / 100;

            try {
                PembagianBuruh::create($attr);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->route("show-bonus")->with("error", "Something Error pls reload");
            }
        }
        return redirect()->route("show-bonus")->with("success", "Berhasil menambah data");
    }
    public function update(Request $request, Payment $payment)
    {

        $attr = $request->validate([
            "total" => "required"
        ]);
        $attr["nama"] = now();
        $payment->update($attr);

        $buruh = $request->buruh;

        $persen = 0;

        foreach ($buruh as $b) {
            $persen += $b;
        }

        if ($persen > 100) {
            return redirect()->route("show-bonus")->with("error", "Nilai persentasi tidak sama dengan 1000, pembagian bonus masihsalah");
        }
        PembagianBuruh::where("id_payment", $payment["id"])->delete();
        foreach ($buruh as $key => $b) {
            $attr["id_payment"] = $payment["id"];
            $attr["no_buruh"] = $key + 1;
            $attr["persentasi"] = $b;
            $attr["bonus"] = ($attr["total"] * $b) / 100;
            try {
                PembagianBuruh::where("id_payment", $payment["id"])->create($attr);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->route("show-bonus")->with("error", "Something Error pls reload");
            }
        }
        return redirect()->route("show-bonus")->with("success", "Berhasil mengupdate data");
    }
    public function destroy($id)
    {
        $delete = Payment::find($id);
        $delete->delete();
        return redirect()->route("show-bonus")->with("success", "Berhasil menghapus data");
    }
    public function detail(Request $request, Payment $payment)
    {
        if ($payment->user_id == Auth::user()->id || Auth::user()->role == 1) {
            return view("page.payment.detail", compact("payment"));
        }
        abort(404);
    }
    public function edit(Request $request, Payment $payment)
    {
        if ($payment->user_id == Auth::user()->id || Auth::user()->role == 1) {
            return view("page.payment.edit", compact("payment"));
        }
        abort(404);
    }
}
