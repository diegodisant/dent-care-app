<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ClinicalHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClinicalHistoryController extends Controller
{
    public function index(): Response
    {
        //
    }

    public function store(Request $request): Response
    {
        //
    }

    public function show(ClinicalHistory $clinicalHistory): Response
    {
        //
    }

    public function update(Request $request, ClinicalHistory $clinicalHistory): Response
    {
        //
    }

    public function destroy(ClinicalHistory $clinicalHistory): Response
    {
        //
    }
}
