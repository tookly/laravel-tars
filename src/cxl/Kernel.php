<?php

namespace Cxl;

class Kernel implements BaseKernel
{
    public $param;
    
    public function __construct($param = [])
    {
        $this->param = $param;
    }
}
