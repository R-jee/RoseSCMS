<?php

namespace App\Repositories\Focus\market;

use App\Models\market\SalesChannel;
use DB;
use Carbon\Carbon;
use App\Models\additional\Additional;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdditionalRepository.
 */
class MarketRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = SalesChannel::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {

        return $this->query()
            ->get(['id','name','created_at']);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
         $input['name']=strip_tags($input['name']);
        if (SalesChannel::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.additionals.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Additional $additional
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(SalesChannel $additional, array $input)
    {
        $input['name']=strip_tags($input['name']);
    	if ($additional->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.additionals.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Additional $additional
     * @throws GeneralException
     * @return bool
     */
    public function delete(SalesChannel $additional)
    {
        if ($additional->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.additionals.delete_error'));
    }
}
