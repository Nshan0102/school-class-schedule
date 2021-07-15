<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedule\ScheduleDestroyRequest;
use App\Http\Requests\Schedule\ScheduleEditRequest;
use App\Http\Requests\Schedule\ScheduleIndexRequest;
use App\Http\Requests\Schedule\ScheduleStoreRequest;
use App\Http\Requests\Schedule\ScheduleUpdateRequest;
use App\Http\Requests\Schedule\ScheduleViewRequest;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\SchoolClassRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\ScheduleRepository;
use App\Repositories\SchoolClassRepository;
use App\Repositories\UserRepository;
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

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var SchoolClassRepository
     */
    private $schoolClassRepository;

    public function __construct()
    {
        $this->scheduleRepository = app(ScheduleRepositoryInterface::class);
        $this->userRepository = app(UserRepositoryInterface::class);
        $this->schoolClassRepository = app(SchoolClassRepositoryInterface::class);
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
                'schedules' => $this->scheduleRepository->all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $teachers = $this->userRepository->getTeachers();
        $schoolClasses = $this->schoolClassRepository->all(true);
        return view(
            'schedule.create',
            [
                'teachers' => $teachers,
                'schoolClasses' => $schoolClasses,
            ]
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
        return redirect(route("admin-schedules.show", $schoolClass->id));
    }

    /**
     * Display the specified resource.
     * @param ScheduleViewRequest $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(ScheduleViewRequest $request, int $id)
    {
        $schedule = $this->scheduleRepository->getById($id);
        return view(
            'schedule.show',
            [
                'schedule' => $schedule,
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
