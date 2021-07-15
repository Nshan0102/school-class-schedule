<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClass\SchoolClassDestroyRequest;
use App\Http\Requests\SchoolClass\SchoolClassEditRequest;
use App\Http\Requests\SchoolClass\SchoolClassIndexRequest;
use App\Http\Requests\SchoolClass\SchoolClassStoreRequest;
use App\Http\Requests\SchoolClass\SchoolClassUpdateRequest;
use App\Http\Requests\SchoolClass\SchoolClassViewRequest;
use App\Repositories\Contracts\SchoolClassRepositoryInterface;
use App\Repositories\SchoolClassRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SchoolClassController extends Controller
{
    /**
     * @var SchoolClassRepository
     */
    private $schoolClassRepository;

    public function __construct()
    {
        $this->schoolClassRepository = app(SchoolClassRepositoryInterface::class);
    }

    /**
     * Display a listing of the resource.
     * @param SchoolClassIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(SchoolClassIndexRequest $request)
    {
        return view(
            'school-class.index',
            [
                'schoolClasses' => $this->schoolClassRepository->all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view(
            'school-class.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param SchoolClassStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolClassStoreRequest $request)
    {
        $schoolClass = $this->schoolClassRepository->create($request->validated());
        return redirect(route("admin-school-classes.show", $schoolClass->id));
    }

    /**
     * Display the specified resource.
     * @param SchoolClassViewRequest $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(SchoolClassViewRequest $request, int $id)
    {
        $schoolClass = $this->schoolClassRepository->getById($id);
        return view(
            'school-class.show',
            [
                'schoolClass' => $schoolClass,
                'schedules' => $schoolClass->schedules
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     * @param SchoolClassEditRequest $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(SchoolClassEditRequest $request, int $id)
    {
        return view(
            'school-class.edit',
            [
                'schoolClass' => $this->schoolClassRepository->getById($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolClassUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SchoolClassUpdateRequest $request, int $id)
    {
        $this->schoolClassRepository->update($id, $request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param SchoolClassDestroyRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(SchoolClassDestroyRequest $request, int $id)
    {
        $this->schoolClassRepository->destroy($id);
        return redirect()->back();
    }
}
