<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\View;
use App\Models\Review;
use App\Models\Purchase;
use App\Models\AddonUser;

class DashboardController extends Controller
{
    public function show()
    {
        $number_of_subscribers = User::select(DB::raw("(COUNT(*)) as count, role"),DB::raw("YEAR(created_at) as year"))
        ->whereIn('role', ['escort', 'customer'])
        ->groupBy(['year', 'role'])
        ->get();

        $girls_per_city = User::select(DB::raw("(COUNT(*)) as count"), 'city_id')
        ->whereIn('role', ['escort'])
        ->groupBy(['city_id'])
        ->get();

        $global_visitors_y = [
                                $this->getViews(1),
                                $this->getViews(7),
                                $this->getViews(30),
                                $this->getViews(183),
                                $this->getViews(365),
                            ];

        $global_visitors_x  = array('24 Hours', '7 days', '30 days', '6 months', '12 months');
        $general_report_x   = array('Number of Reviews', 'Girls (Paused)', 'Total Subscriptions');
        
        $general_report_y = array(
                                    Review::pluck("id")->flatten()->unique()->count(),
                                    AddonUser::whereNotNull('paused_at')->pluck("user_id")->flatten()->unique()->count(),
                                    User::whereIn('role', ['escort'])->whereNotNull('plan_id')->pluck("id")->flatten()->unique()->count(),
                                );
        
        $purchase_revenue_y = [
                                $this->getPurchases(1),
                                $this->getPurchases(7),
                                $this->getPurchases(30),
                                $this->getPurchases(183),
                                $this->getPurchases(365),
                            ];

        $purchase_revenue_x = array('Last 24 Hours', 'Last 7 days', 'Last 30 days', 'Last 6 months', 'Last 12 months');


        //dd($purchase_revenue_y);

        return view('admin.dashboard', compact(
                                                'number_of_subscribers', 
                                                'girls_per_city', 
                                                'global_visitors_x', 
                                                'global_visitors_y',
                                                'general_report_x',
                                                'general_report_y',
                                                'purchase_revenue_x',
                                                'purchase_revenue_y'
                                            )
                    );
    }   

    public function getViews($timeFrame = NULL)
    {
        return View::where([
                                ['created_at', '>', ($timeFrame ? Carbon::now()->subDays($timeFrame) : Carbon::createFromTimestamp(0))],
                            ])->pluck("id")->flatten()->unique()->count();
    }

    public function getPurchases($timeFrame = NULL)
    {
        return Purchase::where([
                                ['created_at', '>', ($timeFrame ? Carbon::now()->subDays($timeFrame) : Carbon::createFromTimestamp(0))],
                            ])->get()->sum('total_price');
    } 
}
