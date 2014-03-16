<?php

class Nodes extends Eloquent {

    protected $fillable = array('name', 'notes', 'path', 'parent');

    public static function boot()
    {
        parent::boot();

        // Setup event bindings...
        Nodes::saved(function($node)
        {
            // Generate Path with id and parent path
            $id = $node->id;

            $parent_id = $node->parent;

            $parent = Nodes::find($parent_id);

            $path = "/{$id}";

            if ($parent)
            {
                $path = "{$parent->path}{$path}";
            }

            $node->path = $path;

            // save
            DB::table('nodes')
                ->where('id', $id)
                ->update(array('path' => $path));
        });
    }
}
