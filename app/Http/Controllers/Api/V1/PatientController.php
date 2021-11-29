<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Models\Patient;
use Illuminate\Http\Request;
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

    public function store(Request $request): Response
    {
        //
    }

    public function show(Patient $patient): Response
    {
        //
    }

    public function update(Request $request, Patient $patient): Response
    {
        //
    }

    public function destroy(Patient $patient): Response
    {
        //
    }
}
