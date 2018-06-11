<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 20:35
 */

namespace app\controllers\formbeans;
use comphp\base\FormBean;

class CreateNewPollFormBean extends FormBean
{
    private $boards;

    private $question;

    private $titleWarning;

    private $options;

    private $optionWarning;

    private $isMultiple = false;

    private $isMutiWarning;

    private $content;

    private $contentWarning;

    /**
     * @return mixed
     */
    public function getTitleWarning()
    {
        return $this->titleWarning;
    }

    /**
     * @param mixed $titleWarning
     */
    public function setTitleWarning($titleWarning): void
    {
        $this->titleWarning = $titleWarning;
    }

    /**
     * @return mixed
     */
    public function getOptionWarning()
    {
        return $this->optionWarning;
    }

    /**
     * @param mixed $optionWarning
     */
    public function setOptionWarning($optionWarning): void
    {
        $this->optionWarning = $optionWarning;
    }

    /**
     * @return mixed
     */
    public function getContentWarning()
    {
        return $this->contentWarning;
    }

    /**
     * @param mixed $contentWarning
     */
    public function setContentWarning($contentWarning): void
    {
        $this->contentWarning = $contentWarning;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question): void
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options): void
    {
        $this->options = $options;
    }

    /**
     * @return bool
     */
    public function isMultiple(): bool
    {
        return $this->isMultiple;
    }

    /**
     * @param bool $isMultiple
     */
    public function setIsMultiple(bool $isMultiple): void
    {
        $this->isMultiple = $isMultiple;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }



    /**
     * @return mixed
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param mixed $boards
     */
    public function setBoards($boards): void
    {
        $this->boards = $boards;
    }

    /**
     * @return mixed
     */
    public function getisMutiWarning()
    {
        return $this->isMutiWarning;
    }

    /**
     * @param mixed $isMutiWarning
     */
    public function setIsMutiWarning($isMutiWarning): void
    {
        $this->isMutiWarning = $isMutiWarning;
    }


}

class CreateNewPollFormBeanFactory
{
    public static function create()
    {
        return new CreateNewPollFormBean();
    }
}