<?php

namespace App\Components;

use DiDom\Document;
use DiDom\Exceptions\InvalidSelectorException;

class VstuNewsParser
{

    private string $newsAsHtml;

    /**
     * @param string $newsAsHtml
     */
    public function __construct(string $newsAsHtml)
    {
        $this->newsAsHtml = $newsAsHtml;
    }


    public function parse(): ?array
    {
        $document = new Document($this->newsAsHtml);
        try {
            if ($document->has('h1')) {
                $title = $document->first('h1')->text();
            }
            if ($document->has('.pictures')) {
                $mainPictureContainer = $document->first('.pictures');
                if ($mainPictureContainer->has('a')) {
                    $image = $document->first('.pictures a')->attr('href');
                }
                // VSTU website developers have not added any classes by the date of publication of the news. So sad :(
                if ($publishDateContainer = $mainPictureContainer->nextSibling('p')) {
                    $publishDate = $publishDateContainer->text();
                }
            }
        } catch (InvalidSelectorException) {
            return null;
        }
        return compact(
            'title',
            'image',
            'publishDate'
        );
    }


}
