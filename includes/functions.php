<?php
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function active($page, $current)
{
    return $page === $current ? ' aria-current="page"' : '';
}
