<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\View\View;
use Illuminate\Http\Response;

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
