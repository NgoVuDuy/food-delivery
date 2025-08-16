<?php
namespace App\Repositories;

use App\Models\Option;

class OptionRepository extends CrudRepository {

    public function __construct(Option $model) {

        parent::__construct($model);
    }

}