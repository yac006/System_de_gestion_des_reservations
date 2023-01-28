<?php

namespace App\Http\Controllers\jasperReoprt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use JasperPHP;

class Report_controller extends Controller
{
    


        public function get_database_config()
        {
            $jdbc_dir = base_path('/vendor/cossou/jasperphp/src/JasperStarter/jdbc');
            return [
                'driver' => 'generic',
                'host' => env('DB_HOST'),
                'port' => env('DB_PORT'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'database' => env('DB_DATABASE'),
                'jdbc_driver' => 'com.microsoft.sqlserver.jdbc.SQLServerDriver',
                'jdbc_url' => 'jdbc:sqlserver://'.env('DB_HOST').':1433;databaseName='.env('DB_DATABASE').'',
                'jdbc_dir' => $jdbc_dir,
            ];
        }


        public function generateReport()
        {
            JasperPHP::compile(base_path('/public/reports/hello_world.jrxml'))->execute();

            JasperPHP::process(
                        base_path('/public/reports/hello_world.jasper'),
                        false,
                        array('pdf'),
                        array('php_version' => phpversion()),
                        $this->get_database_config(),

                    )->execute();

                    $file = base_path('/public/reports/hello_world.pdf');
                   //dd($file);

                    if (!file_exists($file)) {
                        abort(404);
                    }

                    return response()->file($file);
        }


}
