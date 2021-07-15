<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClass\SchoolClassStoreRequest;
use App\Http\Requests\SchoolClass\SchoolClassUpdateRequest;
use App\Repositories\Contracts\SchoolClassRepositoryInterface;
use App\Repositories\SchoolClassRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Application|Factory|View
     */
    public function index()
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
        return redirect(route("school-classes.show", $schoolClass->id));
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
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
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->schoolClassRepository->destroy($id);
        return redirect()->back();
    }
}
