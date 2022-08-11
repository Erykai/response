<?php

namespace Erykai\Response;

/**
 * translate return data in json, array and object
 */
trait Translate
{
    /**
     * @var array
     */
    private array $wordsDefaults;
    /**
     * @var array
     */
    private array $wordsTranslate;

    /**
     * @param object $response
     * @return object
     */
    protected function translate(object $response): object
    {
        $this->setWords();
        $t = [];
        $i = 0;
        foreach ($this->wordsDefaults as $wordsDefault) {
            if (!empty($this->getDynamic())) {
                $key = trim(str_replace("**********", $this->getDynamic(), $wordsDefault));
                if (empty($this->wordsTranslate[$i])) {
                    $value = "Insert text '" . trim($wordsDefault) . " <&>' in /" . RESPONSE_TRANSLATE_PATH . "/" . $this->getLang() . ".php";
                } else {
                    $value = trim(str_replace("**********", $this->getDynamic(), $this->wordsTranslate[$i]));
                }
            } else {
                $key = trim($wordsDefault);
                if (empty($this->wordsTranslate[$i])) {
                    $value = "Insert text '" . trim($wordsDefault) . " <&>' in /" . RESPONSE_TRANSLATE_PATH . "/" . $this->getLang() . ".php";
                } else {
                    $value = trim($this->wordsTranslate[$i]);
                }
            }
            $t[$key] = $value;
            $i++;
        }

        if (!empty($this->getDynamic())) {
            $value = trim(str_replace($this->getDynamic(), "**********", $response->message));
            $message = trim(str_replace("**********", $this->getDynamic(), $response->message));
            if (empty($t[$message])) {
                $response->message = "Create in 'en' /" . RESPONSE_TRANSLATE_PATH . "/_default.php and in '" . $this->getLang() . "' /" . RESPONSE_TRANSLATE_PATH . "/" . $this->getLang() . ".php insert text -> '$value <&>'";
                return $response;
            }
        }
        if (empty($t[$response->message])) {
            $response->message = "Create in 'en' /" . RESPONSE_TRANSLATE_PATH . "/_default.php and in '" . $this->getLang() . "' /" . RESPONSE_TRANSLATE_PATH . "/" . $this->getLang() . ".php insert text -> '$response->message <&>'";
            return $response;
        }

        $response->message = $t[$response->message];

        return $response;
    }

    /**
     *
     */
    private function setWords()
    {
        $this->createDir();
        require_once $this->fileDefault();
        require_once $this->fileTranslate();
        global $langDefault;
        global $langTranslate;
        $this->wordsDefaults = array_filter(explode("<&>", trim($langDefault)));
        $this->wordsTranslate = array_filter(explode("<&>", trim($langTranslate)));
    }

    /**
     *
     */
    private function createDir(): void
    {
        $path = $this->getPath();
        if (!is_dir($path) && !mkdir($path, 0755) && !is_dir($path)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $path));
        }
    }

    /**
     * @return string
     */
    private function fileDefault()
    {
        $fileDefault = $this->getPath() . "/_default.php";
        if (!is_file($fileDefault)) {
            $dataDefault = '<?php
global $langDefault;
$langDefault = "
put your text per line, if it is dynamic put 10 asterisks ********** and at the end put <&>
";';
            file_put_contents($fileDefault, $dataDefault);
        }
        return $fileDefault;
    }

    /**
     * @return string
     */
    private function fileTranslate()
    {
        $fileTranslate = $this->getPath() . "/" . $this->getLang() . ".php";
        if (!is_file($fileTranslate)) {
            $dataTranslate = '<?php
global $langTranslate;
$langTranslate = "
";';
            file_put_contents($fileTranslate, $dataTranslate);
        }
        return $fileTranslate;
    }
}