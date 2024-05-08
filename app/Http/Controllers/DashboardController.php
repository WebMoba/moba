<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use App\Models\Quote;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        //QUOTES
        $totalQuotesCount = Quote::where('disable', false)->count();
        $currentQuotesCount = Quote::where('disable', false)
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Calcular el porcentaje de cambio de cotizaciones
        $yesterdayQuotesCount = Quote::where('disable', false)
            ->whereDate('created_at', Carbon::yesterday())
            ->count();

        if ($yesterdayQuotesCount > 0) {
            $percentageChangeQuotes = (($currentQuotesCount - $yesterdayQuotesCount) / $yesterdayQuotesCount) * 100;
        } else {
            $percentageChangeQuotes = 0; // Evitar división por cero
        }
        //FIN QUOTES

        //USERS
        $totalUsersCount = User::count();
        $currentUsersCount = User::whereDate('created_at', Carbon::today())->count();
        // Calcular el porcentaje de cambio de usuarios registrados
        $yesterdayUsersCount = User::whereDate('created_at', Carbon::yesterday())->count();

        if ($yesterdayUsersCount > 0) {
            $percentageChangeUsers = (($currentUsersCount - $yesterdayUsersCount) / $yesterdayUsersCount) * 100;
        } else {
            $percentageChangeUsers = 0; // Evitar división por cero
        }
        //FIN USERS

        //PURCHASES
        $totalPurchasesCount = Purchase::count();
        $currentPurchasesCount = Purchase::whereDate('created_at', Carbon::today())->count();
        // Calcular el porcentaje de cambio de usuarios registrados
        $yesterdayPurchasesCount = Purchase::whereDate('created_at', Carbon::yesterday())->count();

        if ($yesterdayPurchasesCount > 0) {
            $percentageChangePurchases = (($currentPurchasesCount - $yesterdayPurchasesCount) / $yesterdayPurchasesCount) * 100;
        } else {
            $percentageChangePurchases = 0; // Evitar división por cero
        }
        //FIN PURCHASES

        //SALES
        $totalSaleCount = Sale::count();
        $currentSaleCount = Sale::whereDate('created_at', Carbon::today())->count();
        // Calcular el porcentaje de cambio de usuarios registrados
        $yesterdaySaleCount = Sale::whereDate('created_at', Carbon::yesterday())->count();

        if ($yesterdaySaleCount > 0) {
            $percentageChangeSale = (($currentSaleCount - $yesterdaySaleCount) / $yesterdaySaleCount) * 100;
        } else {
            $percentageChangeSale = 0; // Evitar división por cero
        }
        //FIN SALES

        //ICONO
        $year = date('Y');
        $previousYear = $year - 1;

        // Obtener ventas por año
        $currentYearSales = Sale::whereYear('created_at', $year)->count();
        $previousYearSales = Sale::whereYear('created_at', $previousYear)->count();

        // Determinar el cambio porcentual
        if ($previousYearSales > 0) {
            $percentageChangeSales = (($currentYearSales - $previousYearSales) / $previousYearSales) * 100;
        } else {
            $percentageChangeSales = 0; // Evitar división por cero
        }

        
        // Determinar el ícono basado en el cambio porcentual
        if ($percentageChangeSales > 0) {
            $iconClass = 'fa fa-arrow-up text-success';
        } elseif ($percentageChangeSales < 0) {
            $iconClass = 'fa fa-arrow-down text-danger';
        } else {
            // En caso de que no haya cambio
            $iconClass = 'fa fa-minus text-muted';
        }
        //FIN ICONO
        
        //GRAFICA
        $salesByMonth = Sale::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();
        //FIN GRAFICA

        return view('pages.dashboard', [
            'totalQuotesCount' => $totalQuotesCount,
            'currentQuotesCount' => $currentQuotesCount,
            'percentageChangeQuotes' => $percentageChangeQuotes,
            'totalUsersCount' => $totalUsersCount,
            'currentUsersCount' => $currentUsersCount,
            'percentageChangeUsers' => $percentageChangeUsers,
            'totalPurchasesCount' => $totalPurchasesCount,
            'currentPurchasesCount' => $currentPurchasesCount,
            'percentageChangePurchases' => $percentageChangePurchases,
            'totalSaleCount' => $totalSaleCount,
            'currentSaleCount' => $currentSaleCount,
            'percentageChangeSale' => $percentageChangeSale,
            'salesByMonth' => $salesByMonth,
            'iconClass' => $iconClass
        ]);
    }
}
