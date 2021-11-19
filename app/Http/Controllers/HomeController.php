<?php

namespace App\Http\Controllers;

use phpseclib3\Net\SSH2;
use Illuminate\Http\Request;

class HomeController extends Controller
{

        public function process(Request $request){


		#dd($request->all());

		    $request->validate([
			'ip' => 'required|ip',
            		'g-recaptcha-response' => 'required|captcha',
		    ],
		    [
			'ip.required' => 'Ingresa una direccion ip valida!'
		    ]);


                $host = $request->input('ip');
                $mask = $request->input('mask');
                $operation = $request->input('operation');
		
		$router_ip = env('APP_IP');
		$port = env('APP_PORT');
		$pass = env('APP_PSW');
		$user = env('APP_USER');

                $ssh = new SSH2($router_ip,$port);
                        if (!$ssh->login($user,$pass)) {

			return view('welcome')->withErrors('Las credenciales para acceder al router no son validas(revise el archivo .env)');
	
                        }

		switch ($operation) {
			    case "list":
				$command = "display bgp all summary"; 
				$limit = 0;
				break;
			    case "route":
				$command = "display bgp routing-table $host $mask | no-more"; 
				$limit = 7;
				break;
			    case "adv":
				$command = "display bgp all summary"; 
				break;
			    case "rec":
				$command = "display bgp all summary"; 
				break;
			    case "ping":
				$command = "ping $host"; 
				$limit = 5;
				break;
			    case "trace":
				$command = "tracert $host"; 
				$limit = 0;
				break;
		}

	
                $out = $ssh->exec($command);
                $output_arr = explode("\n", $out);

		$info="";
		
		#take info from output
		$array_lenght = count($output_arr);
		for ($i = 0; $i < $array_lenght; $i++) {
		    if(preg_match('/The network does not exist/', $output_arr[$i])) {
        			
			$info = "La red $host $mask no existe (puede probar otra mascara de red?)";
			unset ($output_arr[$i]);
	
    		    }elseif(preg_match('/(network does not exist|TECNETSA|<R_LUJ_HUA>|ATS|The max number of VTY users|The current login time|The last login time)/', $output_arr[$i])){
				unset ($output_arr[$i]);
			}
			
		}
		
		array_unshift($output_arr,$info);
                return view('home', compact('output_arr'));


        }

}
