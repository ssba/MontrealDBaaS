<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use Auth;
use DB;
use App\Database;
use App\RequestStats;
use App\Customer;
use CPUStats as CPUStatsHelper;
use CustomerActions as CustomerActionsHelper;
use RequestStats as RequestStatsHelper;
use Linfo\Linfo;

class UserController extends Controller
{

    /**
     *
     */
    public function home (string $userGUID,  Request $request){

        $linfo = new Linfo;
        $affectedID = [];
        $ram = $linfo->getParser()->getRam();

        $ram_used = round(($ram['free'] / $ram['total']) * 100);
        $databases = Database::where('customer', $userGUID)->get();
        foreach ($databases as $item)
            $affectedID[] = $item->id;

        $data = [
            "cpu" => CPUStatsHelper::getInterval30Minutes(),
            "ram" => $ram_used,
            "db" => Database::where('customer', $userGUID)->count(),
            "requests" => RequestStats::whereIn('database', $affectedID)->count(),
            "methods_sats" => RequestStatsHelper::getMethodsStats($affectedID, 7),
            "browsers" => RequestStatsHelper::getBrowserStats($affectedID, 7),
            "actions" => CustomerActionsHelper::getActions()
        ];

        $MonthlyVisitors = RequestStatsHelper::getMonthlyVisitors($affectedID);
        $osChartData = RequestStatsHelper::getOSStats($affectedID, 7);
        JavaScript::put([
            'MonthlyVisitorsTitle' => __('core.panel.tpl.home.monthly_attendance_report_bage'),
            'MonthlyVisitors_Days' => array_get($MonthlyVisitors, 'day', []),
            'MonthlyVisitors_Count' => array_get($MonthlyVisitors, 'count', []),
            'OsChartData_Colors' => array_get($osChartData, 'color', []),
            'OsChartData_Counts' => array_get($osChartData, 'count', []),
            'OsChartData_Labels' => array_get($osChartData, 'os', []),
            'Visitors_GEO' => RequestStatsHelper::getVisitorsGeolotaion($affectedID, 7, true)
        ]);

        return view('admin.user.home', ['data' => $data]);
    }

    /**
     *
     */
    public function stats (string $userGUID,  Request $request){

    }

    /**
     *
     */
    public function settings (string $userGUID,  Request $request){

    }

    /**
     *
     */
    public function saveSettings (string $userGUID, Request $request){

        $settings = Customer::where('id',$userGUID)->firstOrFail()->settings ;

        DB::transaction(function () use ($settings, $request) {

            $settingsRequest = $request->only( 'tpl_skin');
            if (!empty( array_filter($settingsRequest) )) {

                $settings_update = $settings->update( $settingsRequest );
                if(!$settings_update)
                    throw new ValidationException($settings_update->errors());

            }

        });

        return 1;
    }

    /**
     *
     */
    public function saveCurrentSettings (Request $request){

        return $this->saveSettings(Auth::user()->id, $request);




    }
}