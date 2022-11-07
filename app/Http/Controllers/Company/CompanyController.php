<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Gate;
use App\User;
use App\Course;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Seting;
use App\Models\Product;
use Illuminate\Support\Str;
use DateTime;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
    return view('company.index');
    }
}
