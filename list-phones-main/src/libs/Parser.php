<?php

namespace App\Libs;

class Parser
{
    protected $validators;

    protected $parsed = [];


    /**
     * Parser constructor.
     * @param $validators
     */
    public function __construct($validators)
    {
        $this->validators = $validators;    
    }

    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        foreach ($data as $key => $value)
        {
            $phoneArray = explode(' ', $value);

            $parsed[$key]['country'] = $this->country($value);
            $parsed[$key]['state'] = $this->state($value);
            $parsed[$key]['code'] = $this->code($value);
            $parsed[$key]['number'] = end($phoneArray);
        }

        return $parsed;
    }

    /**
     * @param $value
     * @return int|string
     */
    protected function country($value)
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $value, $matches);
            
            if (count($matches) > 0) {
                $country = $key;
            }
        }

        return $country;
    }

    /**
     * @param $value
     * @return string
     */
    protected function state($value): string
    {
        $valid = "false";

        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . $validator['regex'] . '/', $value, $matches);
            
            if (count($matches) > 0) {
                $valid = "true";
            }
        }

        return $valid;
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function code($value)
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $value, $matches);
            
            if (count($matches) > 0) {
                $code = $validator['code'];
            }
        }

        return $code;
    }
}