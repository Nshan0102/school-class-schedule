<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedule\ScheduleDestroyRequest;
use App\Http\Requests\Schedule\ScheduleEditRequest;
use App\Http\Requests\Schedule\ScheduleIndexRequest;
use App\Http\Requests\Schedule\ScheduleStoreRequest;
use App\Http\Requests\Schedule\ScheduleUpdateRequest;
use App\Http\Requests\Schedule\ScheduleViewRequest;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\ScheduleRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    /**
     * @var ScheduleRepository
     */
    private $scheduleRepository;

    public function __construct()
    {
        $this->scheduleRepository = app(ScheduleRepositoryInterface::class);
    }

    /**
     * Display a listing of the resource.
     * @param ScheduleIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(ScheduleIndexRequest $request)
    {
        return view(
            'schedule.index',
            [
                'schoolClasses' => $this->scheduleRepository->all()
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
            'schedule.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param ScheduleStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ScheduleStoreRequest $request)
    {
        $schoolClass = $this->scheduleRepository->create($request->validated());
        return redirect(route("schedule.show", $schoolClass->id));
    }

    /**
     * Display the specified resource.
     * @param ScheduleViewRequest $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(ScheduleViewRequest $request, int $id)
    {
        $schoolClass = $this->scheduleRepository->getById($id);
        return view(
            'schedule.show',
            [
                'schoolClass' => $schoolClass,
                'schedules' => $schoolClass->schedules
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     * @param ScheduleEditRequest $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(ScheduleEditRequest $request, int $id)
    {
        return view(
            'schedule.edit',
            [
                'schoolClass' => $this->scheduleRepository->getById($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ScheduleUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ScheduleUpdateRequest $request, int $id)
    {
        $this->scheduleRepository->update($id, $request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param ScheduleDestroyRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(ScheduleDestroyRequest $request, int $id)
    {
        $this->scheduleRepository->destroy($id);
        return redirect()->back();
    }
}
