<?php
namespace App\Http\Controllers\Api;
use App\Models\Article;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/8
 * Time: 9:46
 */

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',10);
        $page = $request->input('page',1);
        $where = $request->all();

        $offset = ($page-1) * $limit;
        $orderby = 'id';
        $sort = 'asc';
        $title = '';

        extract($where);
        $query = Article::when($title!=='', function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
        $query->orderBy($orderby,$sort);
        $total = $query->count();
        $data = $query ->offset($offset)->limit($limit)->get();
        return $this->success(['list'=>$data,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Article::create($request->all());
        if($model){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Article::where('id',$id)->first();
        if($res){
            return $this->success($res);
        }
        return $this->failed('失败');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $model = Article::findOrFail($id);
        $res = $model->update($request->only('content','content_short','is_pulish','title','markdown'));
        if($res){
            return $this->success('成功');
        }
        return $this->failed('失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}