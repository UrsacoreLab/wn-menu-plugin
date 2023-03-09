<?php

namespace UrsacoreLab\Menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            //'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'slug'        => $this->slug,
            'is_external' => $this->is_external,
            'link_target' => $this->link_target,
            //'status'      => $this->status,
            //'parent_id'   => $this->parent_id,
            //'nest_left'   => $this->nest_left,
            //'nest_right'  => $this->nest_right,
            //'nest_depth'  => $this->nest_depth,
            'children'    => MenuResource::collection($this->children),
        ];
    }
}
