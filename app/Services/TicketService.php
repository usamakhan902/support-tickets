<?php

namespace App\Services;

use App\Models\Tickets;
use App\Models\Comments;
use Illuminate\Http\JsonResponse;


use Illuminate\Pagination\Paginator;

class TicketService
{
    protected $model;

    public function __construct(Tickets $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with(['user', 'updatedBy', 'comments.commentuser'])->paginate(10);
    }


    function createCommet($data)
    {
        return Comments::create($data);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function details($id)
    {
        return $this->model->with(['user', 'updatedBy'])->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function updatestatus($id, $data)
    {
        $model = $this->getById($id);
        $model->status = $data['status'];
        $model->save();
        return $model;
    }

    function ticketList($id)
    {
        $perPage = 20; // Define the number of records per page
        $query = $this->model->with(['user', 'updatedBy', 'comments.commentuser'])->where('created_by', $id);

        $results = $query->paginate($perPage);
        return $results;
    }
}
