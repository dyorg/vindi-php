<?php namespace Vindi\Exceptions;

use Exception;

class RequestException extends Exception
{
    /**
     * @var mixed
     */
    protected $errors;

    /**
     * @var array
     */
    protected $ids;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var array
     */
    protected $messages;

    /**
     * ValidationException constructor.
     *
     * @param int   $status
     * @param mixed $errors
     */
    public function __construct($status, $errors)
    {
        $this->errors = $errors;
        $this->code = $status;

        $this->ids = [];
        $this->parameters = [];
        $this->messages = [];

        foreach ($errors as $error) {
            $this->ids[] = $error->id;
            $this->parameters[] = $error->parameter;
            $this->messages[] = $error->message;
        }

        $this->message = trim(join('. ', $this->messages));
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
