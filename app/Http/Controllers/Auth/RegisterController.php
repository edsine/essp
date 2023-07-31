<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmployerRegisteredMail;
use App\Models\Branch;
use App\Models\State;
use App\Providers\RouteServiceProvider;
use App\Models\Employer;
use App\Notifications\EmployerRegistrationNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'branch_id' => ['required'],
            'contact_surname' => ['required', 'string', 'max:255'],
            'contact_firstname' => ['required', 'string', 'max:255'],
            'contact_middlename' => ['required', 'string', 'max:255'],
            'contact_position' => ['required', 'string', 'max:255'],
            'company_phone' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],

            'company_state' => ['required', 'string', 'max:255'],
            'company_localgovt' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],

            //'company_name' => ['required', 'string', 'max:255'],

            'business_area' => ['required', 'string', 'max:255'],

            'company_rcnumber' => ['required', 'string', 'max:255'],
            'cac_reg_year' => ['required', 'date', 'max:255'],

            'company_address' => ['required', 'string'],

            'company_email' => ['required', 'string', 'email', 'max:255',], // 'unique:employers'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'certificate_of_incorporation' => ['required', 'file', 'mimes:pdf'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Employer
     */
    protected function create(array $data)
    {
        unset($data['password_confirmation']);
        $data['user_id'] = 1;
        $data['password'] = Hash::make($data['password']);

        if ($data['employer_status'] == "new") {
            $last_ecs = Employer::get()->last();

            if ($last_ecs) {
                //if selected ecs belongs to another employer
                do {
                    $ecs = $last_ecs['ecs_number'] + 1;
                    $employer_exists = Employer::where('ecs_number', $ecs)->get()->last();
                } while ($employer_exists);
            } else {
                $ecs = '1000000001';
            }

            $data['ecs_number'] = $ecs;
        }

        //record ECS registration payment for OLD Employers
        if($data['employer_status'] != "new") {
            $data['paid_registration'] = 1;
        }

        $employer = Employer::updateOrCreate(['ecs_number' => $data['ecs_number']], $data); //new employer

        //send notification
        //$employer->notify(new EmployerRegistrationNotification($employer));
        //send email
        Mail::to($employer->company_email)->send(new EmployerRegisteredMail($employer, $data['password']));

        return $employer;
    }


    public function showRegistrationForm()
    {
        //$region = Region::all();
        $branches = Branch::all();
        $states = State::all();
        return view('auth.register', compact('branches', 'states'));
    }
}
