<?php

namespace App\Helpers\RequestStats;

use DB;
use \DateTime;
use App\RequestStats as RequestStatsModel;

class RequestStats
{
    private $browsers = [
        'Chrome' => ['Chrome'],
        'Opera' => ['Opera'],
        'Microsoft Edge' => ['Edge'],
        'Internet Explorer' => ['IE'],
        'Firefox' => ['Firefox'],
        'Safari' => ['Safari'],
        'Other' => [
            'Dolfin',
            'Skyfire',
            'Bolt',
            'TeaShark',
            'Blazer',
            'UCBrowser',
            'baiduboxapp',
            'baidubrowser',
            'DiigoBrowser',
            'Puffin',
            'Mercury',
            'ObigoBrowser',
            'ObigoBrowser',
            'NetFront',
            'GenericBrowser',
            'PaleMoon',
        ]
    ];

    private $os = [
        'Android' => [
            'color' => '#77B900',
            'os' => [
                'AndroidOS',
            ]
        ],
        'WindowsMOBILE' => [
            'color' => '#4617B4',
            'os' => [
                'WindowsMobileOS',
                'WindowsPhoneOS',
            ]
        ],
        'iOS' => [
            'color' => '#FF6384',
            'os' => [
                'iOS'
            ]
        ],
        'Windows' => [
            'color' => '#7200AC',
            'os' => [
                'Windows',
                'Windows NT',
            ]
        ],
        'MacOS' => [
            'color' => '#36A2EB',
            'os' => [
                'OS X',
            ]
        ],
        'Linux' => [
            'color' => '#1FAEFF',
            'os' => [
                'Linux',
                'OpenBSD',
                'Ubuntu',
                'Debian',
            ]
        ],
        'Other' => [
            'color' => '#FE7C22',
            'os' => [
                'BlackBerryOS',
                'PalmOS',
                'SymbianOS',
                'MeeGoOS',
                'MaemoOS',
                'JavaOS',
                'webOS',
                'badaOS',
                'BREWOS',
                'Macintosh',
                'ChromeOS',
            ]
        ]
    ];

    public function getBrowsers(){
        return $this->browsers;
    }

    public function getOS(){
        return $this->os;
    }

    public function getMonthlyVisitors($databases = [])
    {

        $formatedData = [];
        $stats = RequestStatsModel::select(DB::raw('created_at ,COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL 1 MONTH'))
            ->whereIn('database', $databases)->groupBy(DB::raw('day(created_at)'))->get();

        foreach ($stats as $key => $value) {

            $dateTime = new DateTime($value['created_at']);
            $formatedData['day'][] = (string)$dateTime->format('Y-m-d');
            $formatedData['count'][] = $value['count'];

        }

        return $formatedData;
    }

    public function getVisitorsGeolotaion($databases = [], $interval = 30, $prepareForJVectormap = false)
    {

        $stats = RequestStatsModel::select("city", "lat", "lon")
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . (int)$interval . ' DAY'))
            ->whereIn('database', $databases)->get();

        if ($prepareForJVectormap) {
            $array = [];
            foreach ($stats as $item) {
                $array[] = [
                    "latLng" => [$item['lat'], $item['lon']],
                    "name" => $item['city']
                ];
            }
            return $array;
        }
        return $stats;
    }

    public function getMethodsStats($databases = [], $interval = 30)
    {
        $stats = RequestStatsModel::select(DB::raw('method ,COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . $interval . ' DAY'))
            ->whereIn('database', $databases)->groupBy(DB::raw('method'))->get();

        $_100persent = RequestStatsModel::select(DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . $interval . ' DAY'))
            ->whereIn('database', $databases)->firstOrFail()->count;

        $data = [];
        foreach ($stats as $item) {
            $data[$item['method']] = [
                "count" => $item['count'],
                "persentage" => round(($item['count'] / $_100persent) * 100)
            ];
        }

        return $data;
    }

    public function getOSStats($databases = [], $interval = 30)
    {
        $formattedData = [];
        $stats = RequestStatsModel::select(DB::raw('os ,COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . $interval . ' DAY'))
            ->whereIn('database', $databases)->groupBy('os')->get();


        foreach ($stats as $item) {
            $formattedData['os'][] = $item['os'];
            $formattedData['count'][] = $item['count'];
            $formattedData['color'][] = $this->os[$item['os']]['color'];
        }

        return $formattedData;
    }

    public function getBrowserStats($databases = [], $interval = 30)
    {
        $stats = RequestStatsModel::select(DB::raw('browser ,COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . $interval . ' DAY'))
            ->whereIn('database', $databases)->groupBy('browser')->get();

        $_100persent = RequestStatsModel::select(DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', DB::raw('CURDATE() - INTERVAL ' . $interval . ' DAY'))
            ->whereIn('database', $databases)->firstOrFail()->count;

        $data = [];
        foreach ($stats as $item) {
            $data[$item['browser']] = [
                "count" => $item['count'],
                "percentage" => round(($item['count'] / $_100persent) * 100)
            ];
        }

        return $data;
    }

}