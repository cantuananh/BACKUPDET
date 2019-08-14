<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age', 'hours_worked', 'period_first_at', 
        'technology', 'period_second_at', 'expected_to_end', 'manager_period_2', 'parts_tracking',
        'trainning_state', 'learning_state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'learning_state' => 'array'
    ];

    public static function getAllUser($params = []){
        $conditions = [];

        if (!empty($params['trainning_state'])) {
            array_push($conditions, ['trainning_state', 'like', '%' .$params['trainning_state']. '%' ]);
        }

        if (!empty($params['learning_state'])) {
            array_push($conditions, ['learning_state', 'like', '%' .$params['learning_state']. '%' ]);
        }

        return User::select('*')
            ->where($conditions)
            ->orderBy('id', 'desc')->paginate(10);
    }
}
