<?php


public function formatDescription($description)
{
    $length = strlen($description);
    if ($length > 100) {
        $description = substr($description, 0, 100);
        $description .= '...';
    }

    return $description;
}

public function formatCategoryType($type)
{
    $length = strlen($type);
    if ($length > 8) {
        $type = substr($type, 0, 10);
        $type .= '...';
    }

    return $type;
}
