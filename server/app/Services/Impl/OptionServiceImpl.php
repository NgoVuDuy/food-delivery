<?php

namespace App\Services\Impl;

use App\Repositories\OptionRepository;
use App\Services\OptionService;

class OptionServiceImpl implements OptionService {

    private OptionRepository $optionRepository;

    public function __construct(OptionRepository $optionRepository) {
        
        $this->optionRepository = $optionRepository;
    }


    public function getAllOptions() {

        return $this->optionRepository->findAll();
    }

    public function getOptionById(int $id)
    {
        return $this->optionRepository->findById($id);
    }

    public function createOption(array $data) {

        return $this->optionRepository->create($data);
    }

    public function updateOption(int $id, array $data)
    {
        
        return $this->optionRepository->update($id, $data);

    }

    public function deleteOption(int $id)
    {
        return $this->optionRepository->delete($id);
    }
}