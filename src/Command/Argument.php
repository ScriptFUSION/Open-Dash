<?php
namespace ScriptFUSION\OpenDash\Command;

class Argument {
    private
        $value,
        $quote
    ;

    public function __construct($value, $quote = '') {
        $this->value = Unescaper::unescape($value);
        $this->quote = $quote;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    public function getQuote() {
        return $this->quote;
    }

    public function isQuoted() {
        return !!$this->quote;
    }
}
