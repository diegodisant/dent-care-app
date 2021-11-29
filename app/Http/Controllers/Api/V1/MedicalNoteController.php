<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\MedicalNoteRequest;
use App\Models\MedicalNote;
use Illuminate\Http\Response;

class MedicalNoteController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(MedicalNoteRequest $request): Response
    {
        //
    }

    public function show(MedicalNote $medicalNote): Response
    {
        //
    }

    public function update(MedicalNoteRequest $request, MedicalNote $medicalNote): Response
    {
        //
    }

    public function destroy(MedicalNote $medicalNote): Response
    {
        //
    }
}
