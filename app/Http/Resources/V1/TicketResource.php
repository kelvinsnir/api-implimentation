<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'type' => 'ticket',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->when(
                    $request->routeIs('tickets.show'),
                    $this->description
                ),
                'status'=> $this->status,
                'created_at'=>$this->created_at,
                'updatted_at' => $this->updated_at
            ],
            'relationships'=> [
                'author' => [
                    'type' => 'user',
                    'id' => $this->user_id
                ],
                'links' => [
                    'self' => route('users.show', ['user', $this->user_id])
                ],
            ],

            'includes' => new UserResource($this->whenLoaded('user')),
            
            'links' =>[
                'self' => route('tickets.show', ['tickets', $this->id])
            ]
        ];
    }
}
