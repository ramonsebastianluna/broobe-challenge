<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PageSpeedInsightService;
use App\Models\Category;
use App\Models\Strategy;


class RunMetricController extends Controller
{
    //inyeccion de dependencias
    protected $pageSpeedInsightService;

    public function __construct(PageSpeedInsightService $pageSpeedInsightService) {
        $this->pageSpeedInsightService = $pageSpeedInsightService;
    }

    public function index() {
        $categories = Category::all();
        $strategies = Strategy::all();

        return view('pages.run-metric', compact('categories', 'strategies'));
    }

    public function showMetricsFetched (Request $request) 
    {
        $request->validate([
            'url' => 'required|url|regex:/^https:\/\//',
        ]);

        $categories = $request->input('categories', []);
        $strategy = $request->strategy;
        $url = $request->url;
        
        $data = $this->pageSpeedInsightService->fetchPageSpeedData($url, $strategy, $categories);

        $categoryData = [];
        if (isset($data['lighthouseResult']['categories'])) {
            foreach ($data['lighthouseResult']['categories'] as $category) {
                $categoryData[] = [
                    'title' => $category['title'] ?? '',
                    'score' => $category['score'] ?? null,
                ];
            }
        }

        return response()->json($categoryData, 200);
    }
}
