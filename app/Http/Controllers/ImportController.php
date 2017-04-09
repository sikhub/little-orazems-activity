<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Http\Requests\ImportRequest;
use App\Schedules;
use Excel;
use Maatwebsite\Excel\Exceptions\LaravelExcelException;
use Carbon\Carbon;
use DB;

class ImportController extends Controller
{
    /**
     * Render file upload form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('import.create');
    }

    /**
     * Validate request and parse CSV into DB
     * Rollback DB if exception is thrown
     *
     * @param ImportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImportRequest $request)
    {
        try {
            Excel::load($request->file('csv'), function ($reader) {
                DB::beginTransaction();

                $rows = $reader->get();

                if ($rows->isEmpty()) {
                    abort(400, 'Problem s podatki');
                }

                $activity = null;
                $schedules = [];
                $rows->each(function ($items, $key) use ($activity, $schedules) {
                    foreach ($items->toArray() as $index => $item) {
                        if ($index == 0) {
                            $activity = Activities::create([
                                'name' => $item,
                                'slug' => str_slug($item),
                            ]);
                        } else {
                            $schedules = [
                                'activity_id' => $activity->id,
                                'activity_start' => Carbon::parse($item)->format('Y-m-d H:i:s'),
                            ];
                            $activity->schedules()->create($schedules);
                        }
                    }
                });

                DB::commit();
            });

            return redirect()->route('home');

        } catch (LaravelExcelException $e) {
            dump($e->getMessage());
        } catch (Exception $e) {
            dump($e->getMessage());
        } finally {
            DB::rollBack();
        }
    }
}
