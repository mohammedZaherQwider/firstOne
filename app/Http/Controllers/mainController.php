<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\City;
use App\Models\Content;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class mainController extends Controller
{
    function index()
    {
        $specializations = Specialization::select('name','id')->limit(10)->get();
        $hostpials = Hospital::select('id', 'name', 'country_id', 'city_id')->with('ratings')->limit(3)->get();
        $doctors = Doctor::with(['nationalitie', 'ratings'])->limit(4)->get();
        $offers = Offer::all();
        $contents = Content::all();

        $specs = $specializations->shuffle()->take(3)->map(fn($s) => [
            'type' => 'specialization',
            'name' => $s->name,
        ]);

        $hosps = $hostpials->shuffle()->take(2)->map(fn($h) => [
            'type' => 'hospital',
            'name' => $h->name,
            'country' => $h->country->name ?? '-',
            'description' => $h->description ?? 'No description available',
        ]);

        $docs = $doctors->shuffle()->take(4)->map(fn($d) => [
            'type' => 'doctor',
            'name' => $d->name,
            'specialization' => $d->specialization->name ?? '-',
            'hospital' => $d->hospital->name ?? '-',
            'bio' => $d->bio ?? 'No bio available',
        ]);
        $mixedData = collect()
            ->merge($specs)
            ->merge($hosps)
            ->merge($docs)
            ->shuffle();

        return view('front_end.index', compact('specializations', 'hostpials', 'doctors', 'offers', 'contents', 'mixedData'));
    }
    function hostpial(Request $request)
    {
        $query = Hospital::with('ratings');
        $specializations = Specialization::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $cities = City::select('id', 'name')->get();

        if ($request->filled('hospital_name')) {
            $query->where('name', 'like', '%' . $request->hospital_name . '%');
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('specialization_id')) {
            $query->where('specialization_id', $request->specialization_id);
        }

        $hostpials = $query->paginate(5)->appends(request()->query());
        return view('front_end.hospitals', compact('hostpials', 'specializations', 'countries', 'cities'));
    }
    function doctors(Request $request)
    {
        $query = Doctor::with('ratings');
        $specializations = Specialization::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $hostpials = Hospital::select('id', 'name')->get();

        if ($request->filled('doctor_name')) {
            $query->where('name', 'like', '%' . $request->doctor_name . '%');
        }

        if ($request->filled('hospital_id')) {
            $query->where('hospital_id', $request->hospital_id);
        }

        if ($request->filled('specialization_id')) {
            $query->where('specialization_id', $request->specialization_id);
        }

        $doctors = $query->paginate(5)->appends(request()->query());
        return view('front_end.doctors', compact('doctors', 'specializations', 'countries', 'hostpials'));
    }
    function specializations(Request $request)
    {
        $query = Specialization::query();

        if ($request->filled('specialization_name')) {
            $query->where('name', 'like', '%' . $request->specialization_name . '%');
        }

        $specializations = $query->select('id', 'name', 'created_at')->paginate(5)->appends($request->query());

        return view('front_end.specializations', compact('specializations'));
    }
    function hostpial_details(Hospital $hostpial)
    {
        $hostpial->load(['ratings', 'country', 'city', 'specializations']);
        $hostpials = Hospital::select('id', 'name', 'img', 'country_id', 'city_id')
            ->withAvg('ratings', 'rating')
            ->orderByDesc('ratings_avg_rating')
            ->take(3)
            ->get();
        return view('front_end.hospital-details', compact('hostpial', 'hostpials'));
    }
    function doctor_details(Doctor $doctor)
    {
        $doctor->load(['ratings', 'hospital', 'nationalitie', 'specialization']);
        $doctors = Doctor::withAvg('ratings', 'rating')
            ->orderByDesc('ratings_avg_rating')
            ->take(3)
            ->get();
        return view('front_end.doctor-details', compact('doctor', 'doctors'));
    }
    function specialization_details(Specialization $specialization)
    {
        $specializations = Specialization::select('name')->limit(10)->get();
        $doctors = Doctor::select('name')->limit(10)->get();
        return view('front_end.specialization-details', compact('specialization', 'specializations','doctors'));
    }

    function register()
    {
        $countries = Country::select('id', 'name')->get();
        return view('front_end.register', compact('countries'));
    }
    public function register_add(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'phone'     => 'required|min:10|max:14',
            'country_id' => 'required|exists:countries,id',
        ]);
        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => bcrypt($validated['password']),
            'phone'      => $validated['phone'],
            'country_id' => $validated['country_id'],
            'email_verified_at' => now()
        ]);
        //   هنا بدي اعمل بعد ما اسيف الداتا انو سجل دخول ع     Auth::login($user);
        return redirect()->route('index');
    }
    function login()
    {
        return view('front_end.login');
    }
    function login_add(Request $request)
    {
        //  هنا نعنل فلديشن  عشان م اعمل الشرط الي تحت
        $user = User::where('email', $request->login)
            ->orWhere('phone', $request->login)
            ->first();
        // dd($user->password);
        if ($user && Hash::check($request->password, $user->password)) {
            $countries = Country::select('id', 'name')->get();
            return view('front_end.profile', compact('countries', 'user'));
        } else
            return redirect()->route('login')->with('msg', 'error in email/phone or password .');
    }
    function profile()
    {
        $user = User::first();
        $countries = Country::select('id', 'name')->get();
        return view('front_end.profile', compact('countries', 'user'));
    }

    function forgetpassword()
    {
        return view('front_end.forgetpassword');
    }
    function forgetpassword_add(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     return back()->withErrors(['email' => 'البريد غير موجود']);
        // }
        $user = User::where('email', $request->email)->first();
        $token = Str::random(10);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );
        Mail::to($user->email)->send(new ResetPasswordMail($token));
        return view('front_end.token', compact('user'));
    }

    // public function get_token() {
    //     return view('front_end.token', compact('user'));
    // }
    function token()
    {
        return view('front_end.token');
    }
    function token_add(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);
        $reset = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();
        if ($reset) {
            $email = $reset->email;
            return view('front_end.resetPassword', compact('email'));
        } else {
            // مش شغالة
            return redirect()->route('token')->withErrors(['token' => ' التوكين غير صحيح ']);
        }
    }
    function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ]);
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'تم تغيير كلمة المرور بنجاح.');
    }
    function pay(Offer $offer)
    {
        $price = number_format($offer->price * (1 - $offer->discount_value / 100), 2);
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174d0595bb014d05d829cb01cd" .
            "&amount=" . $price .
            "&currency=USD" .
            "&paymentType=DB" .
            "&integrity=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        // return $responseData;
        $id = $responseData['id'];
        return view('front_end.pay', compact('offer', 'id'));
    }
    function status(Request $request, Offer $offer)
    {
        // dump($offer);
        $resourcePath = $request->resourcePath;
        // dd($resourcePath);
        $url = "https://eu-test.oppwa.com" . $resourcePath;
        // dd($url);
        $url .= "?entityId=8a8294174d0595bb014d05d829cb01cd";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        // return $responseData;

        $responseData = json_decode($responseData, true);

        $code = $responseData['result']['code'];
        $price = number_format($offer->price * (1 - $offer->discount_value / 100), 2);
        $transactionId = $response['id'] ?? null;

        if ($code == '800.900.300') {
            // ✅ Payment Success
            Payment::create([
                'offer_id'       => $offer->id,
                'amount'         => $price,
                'currency'       => 'ILS',
                'payment_method' => 'hyperpay',
                'transaction_id' => $transactionId,
                'status'         => 'paid',
                'paid_at'        => Carbon::now(),
            ]);
            return view('front_end.resulte');
        } else {
            Payment::create([
                'offer_id'       => $offer->id,
                'amount'         => $price,
                'currency'       => 'ILS',
                'payment_method' => 'hyperpay',
                'transaction_id' => $transactionId,
                'status'         => 'failed',
            ]);
            return redirect()->route('/')
                ->with('msg', 'فشلت العملية يحب حاول تاني');
        }
    }
}
