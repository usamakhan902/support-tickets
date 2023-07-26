<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\TicketsListRequest;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{

    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }



    public function index()
    {
        $ticketsData = $this->ticketService->getAll();
        return view('admin.pages.tickets.index', ['tickets' => $ticketsData]);
    }



    function createTicket(TicketRequest $ticketRequest)
    {
        $data = $ticketRequest->validated();
        $userId = Auth::id();
        $data['created_by'] = $userId;
        $ticket =  $this->ticketService->create($data);
        if ($ticket) {
            return response()->json(['ticket' => $ticket, 'message' => 'Ticket Created Successfully', 'status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something Went Wrong Please Contact Support']);
    }



    function view($id)
    {
        $details = $this->ticketService->details($id);
        return view('admin.pages.tickets.view_ticket', ['details' => $details]);
    }



    function create_comment(CommentRequest $request)
    {
        $data = $request->validated();
        $comment =  $this->ticketService->createCommet($data);
        if ($comment) {
            return redirect()->back()->with('success', 'Comment Created Successfull!');
        }
        return redirect()->back()->with('error', 'Something Went Wrong. Please Contact Support!');
    }


    function updateStatus(Request $request)
    {
        $data = $request->input();
        $update =  $this->ticketService->updatestatus($data['id'], $data);
        if ($update) {
            return redirect()->back()->with('success', 'Status Updated Successfull!');
        }
        return redirect()->back()->with('error', 'Something Went Wrong. Please Contact Support!');
    }



    function statusUpdate(Request $request)
    {
        $data = $request->input();
        $update =  $this->ticketService->updatestatus($data['id'], $data);
        if ($update) {
            return response()->json(['success' => 'Status Updated Successfull!']);
        }
        return response()->json(['error' => 'Something Went Wrong. Please Contact Support!']);
    }


    function ticketlist()
    {
        $id = Auth::id();
        $data =  $this->ticketService->ticketList($id);
        return response()->json(['data' => $data, 'status' => 'success']);
    }
}
