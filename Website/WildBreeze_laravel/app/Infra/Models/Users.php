<?php

namespace App\Infra\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 */
class Users extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * @var array
     */

    protected $fillable = ['email', 'password', 'name', 'gender', 'phone', 'city', 'township', 'address', 'new_letter'];


    /**
     * @param int $id
     * @return Collection
     */
    public function findById(int $id): Users
    {
        return $this->find($id, 'id')->first();
    }

    public function getIdByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
