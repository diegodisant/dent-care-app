<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\ClinicalHistoryRequest;
use App\Models\ClinicalHistory;
use Illuminate\Http\Response;

class ClinicalHistoryController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(ClinicalHistoryRequest $request): Response
    {
        //
    }

    public function show(ClinicalHistory $clinicalHistory): Response
    {
        //
    }

    public function update(ClinicalHistoryRequest $request, ClinicalHistory $clinicalHistory): Response
    {
        //
    }

    public function destroy(ClinicalHistory $clinicalHistory): Response
    {
        //
    }
}
