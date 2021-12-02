<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\PatientRequest;
use App\Http\Resources\PatientCollection;
use App\Http\Resources\PatientResource;
use App\Http\Response\Api\ApiResponseInterface;
use App\Http\Response\Api\FailedCreationResponse;
use App\Http\Response\Api\FailedUpdateResponse;
use App\Http\Response\Api\NotFoundErrorResponse;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PatientController extends ApiController
{
    public function index(): JsonResponse
    {
        $patients = DB::table(Patient::TABLE_NAME)
            ->paginate(self::PAGINATION_PAGE_SIZE);

        if ($patients === null) {
            return new JsonResponse([]);
        }

        $patientsCollection = new PatientCollection($patients);

        $patientsCollection->additional(
            $this->buildPaginationData($patients)
        );

        return new JsonResponse($patientsCollection);
    }

    public function store(PatientRequest $request): JsonResponse
    {
        $newPatient = new Patient($request->all());
        $wasSaved = $newPatient->save();

        if (!$wasSaved) {
            return new FailedCreationResponse(
                Patient::class
            );
        }

        $patientResource = new PatientResource($newPatient);

        return new JsonResponse($patientResource);
    }

    public function show(Patient $patient): JsonResponse
    {
        $patientId = (int) $patient->id;

        $storedPatient = DB::table(Patient::TABLE_NAME)
            ->find($patientId);

        if ($storedPatient === null) {
            return new NotFoundErrorResponse(
                Patient::class,
                $patientId
            );
        }

        return new JsonResponse(new PatientResource($storedPatient));
    }

    public function update(PatientRequest $request, Patient $patient): JsonResponse
    {
        $storedPatient = DB::table(Patient::TABLE_NAME)
            ->find($patient->id);

        if ($storedPatient === null) {
            return new NotFoundErrorResponse(
                Patient::class,
                $patient->id
            );
        }

        $updatedRows = $storedPatient->update($request->all());
        $wasUpdated = $updatedRows > 0;

        if (!$wasUpdated) {
            return new FailedUpdateResponse(
                PatientController::class,
                $patient->id,
                $storedPatient
            );
        }

        return new JsonResponse(new PatientResource($storedPatient));
    }

    public function destroy(Patient $patient): JsonResponse
    {
        $patient->delete();

        return new JsonResponse(
            null,
            ApiResponseInterface::HTTP_STATUS_OK
        );
    }
}
