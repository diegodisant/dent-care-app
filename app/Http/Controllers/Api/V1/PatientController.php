<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Response;

class PatientController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(PatientRequest $request): Response
    {
        //
    }

    public function show(Patient $patient): Response
    {
        //
    }

    public function update(PatientRequest $request, Patient $patient): Response
    {
        //
    }

    public function destroy(Patient $patient): Response
    {
        //
    }
}
