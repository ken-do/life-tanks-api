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
        return $this->model::all();
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
                return $record;
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
                return $this->model::whereId($id)->first();
        } 
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
                $this->model::whereId($id)->update($request->post());
                return $this->model::whereId($id)->first();
            } 
        }
        catch (\Exception $e){
            return json_encode([
                'status_code' => 500,
                'message' => $e->getMessage()
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