<?php

namespace MVC\Courses\Controller;

abstract class ControllerWithHTML 
{
    public function renderHTML(string $pathTemplate, array $data): string {
        
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $pathTemplate;
        $html = ob_get_clean();
        
        return $html;
    }
}