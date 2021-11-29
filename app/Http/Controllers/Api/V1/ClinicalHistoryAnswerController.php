<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ClinicalHistoryAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClinicalHistoryAnswerController extends Controller
{
    public function index(): Response
    {
        //
    }

    public function store(Request $request): Response
    {
        //
    }

    public function show(ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }

    public function update(Request $request, ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }

    public function destroy(ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }
}
