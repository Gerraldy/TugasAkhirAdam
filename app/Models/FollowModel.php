<?php

namespace App\Models;

use CodeIgniter\Model;



class FollowModel extends Model
{
  protected $table = 'follow';
  protected $primaryKey = "ID_Follow";
  protected $allowedFields = ['Follower','Following'];

}
