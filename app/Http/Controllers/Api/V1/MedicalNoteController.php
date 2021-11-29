<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MedicalNote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalNoteController extends Controller
{
    public function index(): Response
    {
        //
    }

    public function store(Request $request): Response
    {
        //
    }

    public function show(MedicalNote $medicalNote): Response
    {
        //
    }

    public function update(Request $request, MedicalNote $medicalNote): Response
    {
        //
    }

    public function destroy(MedicalNote $medicalNote): Response
    {
        //
    }
}
