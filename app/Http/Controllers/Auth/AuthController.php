<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\LoginDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Events\LoginEvent;

  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Check if the credentials are valid
    if (Auth::attempt($credentials)) {
        // Get the authenticated user
        $user = Auth::user();

        // Fire the login event
        event(new LoginEvent($user));

        // Redirect to the intended page with a success message
        return redirect()->intended('dashboard')->withSuccess('You have successfully logged in.');
    }

    // If authentication fails, redirect back with an error message
    return redirect("login")->withErrors(['email' => 'Oops! You have entered invalid credentials.']);
}

      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $exists = User::where('email', $request->email)->exists();
    if($exists){
        return redirect()->back()->with('error', 'this email already exists. Please try newone.');
    }else{

       // Create a new user instance
    $users = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Make sure to hash the password
    ]);

    // Fire the LoginEvent
    // event(new LoginEvent($users));

// Log the user in
    Auth::login($users); 
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
}
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('newdashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
//     use Illuminate\Http\JsonResponse;

// public function checkEmail(Request $request): JsonResponse
// {
//     $request->validate(['email' => 'required|email']);
    
//     $exists = User::where('email', $request->email)->exists();
    
//     return response()->json(['exists' => $exists]);
// }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}