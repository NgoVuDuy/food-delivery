<?php

namespace App\Services;

interface OptionService {

    function getAllOptions();
    function getOptionById(int $id);
    function createOption(array $data);
    function updateOption(int $id, array $data);
    function deleteOption(int $id);
}