<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request){
        $tag = new Tag;
        $tag->name = $request->name;
        //dd($tag);
        $tag->save();
		return response()->json([
			'status' => 200,
		]);
    }

    public function fetchAll() {
		$emps = Tag::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td>' . $emp->name . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editTagModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

    public function delete(Request $request) {
		    $id = $request->id;
		    $emp = Tag::find($id);
        Tag::destroy($id);
	  }

    // handle edit an tag ajax request
	public function edit(Request $request) {
		  $id = $request->id;
		  $emp = Tag::find($id);
		  return response()->json($emp);
	}

    // handle update an tag ajax request
    public function update(Request $request) { 

      $emp = Tag::find($request->id);
      $emp->name = $request->name;
      $emp->save();
      return response()->json([
          'status' => 200,
      ]);
    }
}
