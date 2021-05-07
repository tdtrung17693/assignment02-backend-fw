<?php

class ParameterCannotResolvedException extends Exception {
    protected string $parameterName;
    public function __construct(string $parameterName , $code = 0, Throwable $previous = null)
    {
        $this->parameterName = $parameterName;
        parent::__construct("Parameter $parameterName cannot be resolved", $code, $previous);
    }
}