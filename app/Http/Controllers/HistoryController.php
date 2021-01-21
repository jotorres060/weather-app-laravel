<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Src\History\Infrastructure\GetHistoryController;

class HistoryController extends Controller
{
    private GetHistoryController $getHistoryController;

    /**
     * HistoryController constructor.
     * @param GetHistoryController $getHistoryController
     */
    public function __construct(GetHistoryController $getHistoryController)
    {
        $this->getHistoryController = $getHistoryController;
    }

    /**
     * Display the main view.
     */
    public function index()
    {
        $histories = $this->getHistoryController->__invoke();
        return view("History.index", compact("histories"));
    }

    /**
     * It truncates the histories table.
     */
    public function clear()
    {
        DB::table('histories')->truncate();
        return $this->index();
    }
}
