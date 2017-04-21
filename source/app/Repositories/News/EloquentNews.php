<?php

namespace Vanguard\Repositories\News;

use Vanguard\News;

class EloquentNews implements NewsRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $bd = new News();
        $bd->title = $data['title'];
        $bd->summary = $data['summary'];
        $bd->description = $data['description'];
        $bd->thumb = $data['thumb'];
        $bd->status = News::STATUS_ACTIVED;

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = News::find($id);
        $bd->title = $data['title'];
        $bd->summary = $data['summary'];
        $bd->description = $data['description'];
        if($data['thumb'] != null){
            $bd->thumb = $data['thumb'];
        }else{
            $bd->thumb = $bd->thumb;
        }

        $bd->save();
    }


    public function delete($id)
    {
        $bd = News::find($id);
        $bd->status = News::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = News::query();

        if ($status && $status != "All") {
            $query->where('status', $status);
        }
        $result = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
