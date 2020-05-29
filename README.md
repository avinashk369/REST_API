Laravel API Setup

	laravel new projectName
    cd projectName to go to the working directory as from now on any dependency will be injeted in the working directory
//passport is a tool to set up REST environment
	composer require laravel/passport
//this will create required table 
	php artisan migrate
//this will create client id and client secret
	php artisan passport:install
//in user model class add 
	use Laravel\Passport\HasApiTokens;[this will create accessToken]
	and add use HasApiTokens,Notifiable; as well
//add passport dependency in AuthServiceProvider class and map passport route in boot function
	use Laravel\Passport\Passport;
	app/Providers/AuthServiceProvider.php
	Passport::routes();
//add this line into config/auth.php
	'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],
//add this into route/api.php
	Route::post('register', 'API\RegisterController@register');
	Route::post('login', 'API\RegisterController@login');

	
// use this middlewere to authenticate request
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//use following code into App/exception/handler.php to handle exception like wrong route name
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller as Controller;

    public function render($request, Throwable $exception)
        {
            if ($exception instanceof NotFoundHttpException) {
                return response()->json(['message'=>'invalid request'], 403);
            }
            return parent::render($request, $exception);
        }
        
//create a baseController file and add following code
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
 
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}

//in user contoller use this line to create accesstoken
	$user->createToken('access_token')->accessToken;
//in config/database.php make sure to have follwing details in mysql connection property
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',

NOTE* 
In case if you want to change your default user auth class eloquoent or model to some custom eloquent or model
open config/auth.php
and modify providers section at the bottom of page
'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,// put your custom class name along with path
        ],

NOTE*
DB transaction doesn't work with default db engine, so make sure to add 'innodb' in engine parameter into db configuration section



Thats all 
you configured your api
run php artisan serve command to start the server and start hitting api endpoint like this
http://localhost:8000/api/register
