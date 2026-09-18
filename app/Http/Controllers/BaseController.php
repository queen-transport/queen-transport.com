<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BaseController extends Controller
{
    public function __construct(
        protected BaseService $baseService
    ) {}

    public function index(): View
    {
        return view('home', $this->baseService->getDataForLandingPage());
    }

    public function sitemap(): Response
    {
        return $this->baseService->getSitemap();
    }
}
