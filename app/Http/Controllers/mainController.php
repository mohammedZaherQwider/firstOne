<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\City;
use App\Models\Content;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class mainController extends Controller
{
    function index()
    {
        $specializations = Specialization::select('name', 'img')->limit(10)->get();
        $hostpials = Hospital::select('id', 'name', 'img', 'country_id', 'city_id')->with('ratings')->limit(3)->get();
        // $ratings = Rating::select('user_id', 'type', 'type_id', 'rating', 'date', 'comment')->get(   );
        $doctors = Doctor::with(['nationalitie', 'ratings'])->limit(4)->get();
        $offers = Offer::all();
        $contents = Content::all();
        return view('front_end.index', compact('specializations', 'hostpials', 'doctors', 'offers', 'contents'));
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
        $specializations = Specialization::select('name', 'img')->limit(10)->get();
        return view('front_end.specialization-details', compact('specialization','specializations'));
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
}
