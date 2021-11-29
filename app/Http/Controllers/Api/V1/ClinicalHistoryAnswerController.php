<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\ClinicalHistoryAnswerRequest;
use App\Models\ClinicalHistoryAnswer;
use Illuminate\Http\Response;

class ClinicalHistoryAnswerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(ClinicalHistoryAnswerRequest $request): Response
    {
        //
    }

    public function show(ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }

    public function update(ClinicalHistoryAnswerRequest $request, ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }

    public function destroy(ClinicalHistoryAnswer $clinicalHistoryAnswer): Response
    {
        //
    }
}
