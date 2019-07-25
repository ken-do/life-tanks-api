<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Http\Request;


trait CRUDTrait {
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode([
            'status_code' => 200,
            'data' =>  $this->model::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
                $record = new $this->model($request->post());
                $record->save();
                return json_encode([
                    'status_code' => 200,
                    'data' => $record
                ]);
        } 
        catch (\Exception $e)
        {
            return json_encode([
                'status_code' => 500,
                'message' =>  $e->getMessage()//'An error occured while creating a new record.'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->model::whereId($id)->first()){
                return json_encode([
                    'status_code' => 200,
                    'data' => $this->model::find($id)->first()
                ]);
        } 
        return json_encode([
            'status_code' => 204,
            'data' => json_encode([])
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try 
        {
            if($this->model::whereId($id)->first()){
                $this->model::find($id)->update($request->post());
                return $this->model::whereId($id)->first();
            } 
            return json_encode([
                'status_code' => 400,
                'message' => 'This record does not exist.'
            ]);
        }
        catch (\Exception $e){
            return json_encode([
                'status_code' => 500,
                'message' => 'An error occured while updating the record.'
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $message = '';
        if(is_array($id)){
            $this->model::whereIn($id)->delete();
            $message = count($id).' users have been removed.';
        } else {
            $this->model::whereId($id)->delete();
            $message = 'The user has been removed.';
        }

        return json_encode([
            'status_code' => '200',
            'messages'    => $message
        ]);
    }
}