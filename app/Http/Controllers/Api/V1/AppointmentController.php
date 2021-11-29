<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Response;

class AppointmentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(AppointmentRequest $request): Response
    {
        //
    }

    public function show(Appointment $appointment): Response
    {
        //
    }

    public function update(AppointmentRequest $request, Appointment $appointment): Response
    {
        //
    }

    public function destroy(Appointment $appointment): Response
    {
        //
    }
}
