<?php

namespace App\Http\Controllers;

use phpseclib3\Net\SSH2;
use Illuminate\Http\Request;

class FormController extends Controller
{


        public function process(Request $request){


		    $request->validate([
			'ip' => 'required|ip',
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
                        throw new \Exception('Login failed');
                        }

		
		switch ($operation) {
			    case "list":
				$command = "display bgp all summary"; 
				$limit = 0;
				break;
			    case "route":
				$command = "display bgp routing-table $host $mask"; 
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
        			
			$info = "La red $host $mask no existe";
		
    		    }elseif(preg_match('/(TECNETSA|ATS|The max number of VTY users|The current login time|The last login time)/', $output_arr[$i])){
				unset ($output_arr[$i]);
			}
			
		}

	#	for ($i=0;$i<$limit;$i++){
			
	#		array_shift($output_arr);
	#	}


	
		#for ($i = 0; $i < $array_lenght; $i++) {
		    
		 #   if(preg_match('/(ATS|The max number of VTY users)/', $output_arr[$i])) {
        	#		unset ($output_arr[$i]);
    		#	}
		#}

		
		array_unshift($output_arr,$info);


                return view('welcome', compact('output_arr'));

		#return redirect()->route('welcome', compact('output_arr'));
                #return redirect()->route('welcome', [$output_arr]);


                #print_r($out_arr);




        }


   //
}
