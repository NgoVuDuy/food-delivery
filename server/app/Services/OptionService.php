<?php

namespace App\Services;

use App\Repositories\Interfaces\OptionRepositoryInterface;

class OptionService {

    private OptionRepositoryInterface $optionRepositoryInterface;

    public function __construct(OptionRepositoryInterface $optionRepositoryInterface) {
        
        $this->optionRepositoryInterface = $optionRepositoryInterface;
    }

    public function getAllOptions() {

        return $this->optionRepositoryInterface->findAll();
    }

    public function getOptionById(int $id)
    {
        return $this->optionRepositoryInterface->findById($id);
    }

    public function createOption(array $data) {

        return $this->optionRepositoryInterface->create($data);
    }

    public function updateOption(int $id, array $data)
    {
        
        return $this->optionRepositoryInterface->update($id, $data);

    }

    public function deleteOption(int $id)
    {
        return $this->optionRepositoryInterface->delete($id);
    }
}